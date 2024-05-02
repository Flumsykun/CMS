export default (initialToast = [], displayTime = 5000) => ({
    initialToast: initialToast,
    toasts: [],
    visible: [],
    displayTime: displayTime,
    counter: {},
    delay: 0,

    highestId: 0,
    init() {
        this.highestId = this.toasts.length;

        if (typeof this.initialToast[Symbol.iterator] === 'function') {
            this.initialToast.forEach((toast) => this.add(toast))
        }
    },
    add(toast) {
        if (this.toasts.find(ot => ot.uuid === toast.uuid) !== undefined
            || this.visible.find(ot => ot.uuid === toast.uuid) !== undefined
        ) {
            return;
        }

        if (toast[0] !== undefined) {
            toast = toast[0];
        }

        // getting the current highest id
        toast.id = this.highestId

        // retrieving the toasts count and
        // setting the highest id to the toasts count
        this.highestId = this.toasts.push(toast);

        // showing the added toast
        this.show(toast.id)
    },
    show(id) {
        const toast = this.toasts.find(toast => toast.id === id);

        // Removing the toast;
        // using a `setTimeout` so it's queued.
        setTimeout(() => {
            // Make the toast visible.
            this.visible.push(toast);

            const timeShown = this.displayTime * this.visible.length

            // If it's not always shown, we will dispatch an event to hide it.
            if (! toast.alwaysShown) {
                const start = new Date().getTime();

                // This creates an interval that calculates the current progress for each toast.
                // This will be shown in percentages from 0% - 100%. We use a small delay so it doesn't run
                // _too_ often, but not too high that the progress bar stutters.
                let progress = setInterval(() => {
                    let diff = Math.round(new Date().getTime() - start);
                    this.counter[toast.uuid] = Math.round(diff / timeShown * 100);
                }, 50);

                // After the runtime has been completed, we will stop the interval (that's updating the progress
                // bar), and then we will hide the toast.
                setTimeout(() => {
                    clearInterval(progress);
                    this.remove(toast);
                }, timeShown + 100);
            }
        }, this.delay);
    },
    remove(visibleToast) {
        // Support both toast and ID passthrough
        if (typeof visibleToast === 'number') {
            visibleToast = this.visible.find(toast => toast.id === visibleToast)
        }

        const visibleIndex = this.visible.indexOf(visibleToast)

        // If visibleIndex === -1, it wasn't found. If that's the case, we do nothing, else we hide the last toast
        // instead. So, at this point in time, the toast we want to hide is no longer visible, which happens because
        // a user manually hid it, but the interval still is running. We could make some fancy schmancy code to try
        // and clear the interval and removal timeout, but that's just a lot of effort for adding a singular extra if
        // statement.
        if (visibleIndex !== -1) {
            this.visible.splice(visibleIndex, 1)

            //TODO: This is causing the ElInSpot/ElForSpot bug. Probably a diffing issue with Livewire/Alpine combo.
            // We do want this because otherwise the HTML gets cluttered
            // setTimeout(() => {
            //     this.toasts.splice(this.toasts.indexOf(visibleToast), 1)
            // }, 500);
        }
    },
    clear() {
        this.toasts = [];
    }
});
