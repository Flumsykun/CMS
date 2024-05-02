import {ToastObject} from "./toasts/toast-object.js";

export function ToastsPlugin(Alpine) {
    Alpine.data('setupToasts', (initToast = [], displayTime = 5000, defaultDelay = 500) => {
        return {
            initToast: initToast,
            _toasts: [],
            displayTime,
            defaultDelay,// in milliseconds

            // add: function(toast) {
            //     this.toasts.push(toast);
            // },

            init() {

                if (typeof this.initToast[Symbol.iterator] === 'function') {
                    this.initToast.forEach((toast) => this.add(toast))
                }
            },

            get toasts() {
                const toasts = this._toasts.filter(toast => !toast.trashed);

                if (this._toasts.length && !toasts.length) {
                    this.$nextTick(() => this.clear());
                }

                return toasts;
            },

            //
            // remove: function (uuid) {
            //     this.toasts = this.toasts.filter(toast => toast.uuid !== uuid);
            // },

            add(toast) {
                if (this._toasts.find(ot => ot.uuid === toast.uuid) !== undefined) {
                    return;
                }

                if (toast[0] !== undefined) {
                    toast = toast[0];
                }

                toast.displayTime = this.displayTime;

                toast.delay = this.toasts.length * this.defaultDelay

                // showing the added toast
                this.show(this.createToast(toast))
            },
            show(toast) {
                toast.afterRun(toast => toast.thrash());

                // retrieving the toasts count and
                // setting the highest id to the toasts count
                // this._highestId = this._toasts.push(toast);
            },
            clear() {
                this._toasts = [];
            },
            createToast(data) {
                return Alpine.reactive(ToastObject.fromJson(data));
            }
        }
    });
}
