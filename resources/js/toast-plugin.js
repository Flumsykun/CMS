import {ToastObject} from "./alpine/toasts/toast-object.js";


window.setupToasts = function (toastList, displayTime) {
    return {
        toasts: toastList,
        _toasts: [],
        displayTime: displayTime,
        // add: function(toast) {
        //     this.toasts.push(toast);
        // },
        remove: function (uuid) {
            this.toasts = this.toasts.filter(toast => toast.uuid !== uuid);
        },
        add(toast) {
            if (this._toasts.find(ot => ot.uuid === toast.uuid) !== undefined) {
                return;
            }

            if (toast[0] !== undefined) {
                toast = toast[0];
            }

            // getting the current highest id
            toast.id = this._highestId
            toast.displayTime = this.displayTime;

            toast.delay = this.toasts.length * this.defaultDelay

            // showing the added toast
            this.show(this.createToast(toast))
        },
        createToast(data) {
            return Alpine.reactive(ToastObject.fromJson(data));
        }
    };
};
