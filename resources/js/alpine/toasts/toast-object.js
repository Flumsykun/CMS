export class ToastObject {

    constructor(uuid, title, message, type, icon, alwaysShow = false, displayTime = 5000, delay = 0) {
        this.$el = null;
        this.uuid = uuid;

        // this.id = data.id;
        this.title = title;
        this.message = message;
        this.type = type;
        this.icon = icon;
        this.alwaysShow = alwaysShow;

        this.visible = false;
        this.displayTime = displayTime;
        this.delay = delay;
        this.afterRunCallback = null
        this.trashed = false;
        this.counter = 0;
    }

    static fromJson(data) {
        return new ToastObject(
            data.uuid,
            data.title,
            data.message,
            data.type,
            data.icon,
            data.alwaysShow,
            data.displayTime ?? null,
            data.delay ?? null
        );
    }


    show($el) {
        this.$el = $el;
        // using a `setTimeout` so it's queued.
        setTimeout(() => {
            // Make the toast visible.
            this.visible = true;

            // If it's not always shown, we will dispatch an event to hide it.
            if (!this.alwaysShown) {
                const start = new Date().getTime();
                const timeShown = this.displayTime

                // This creates an interval that calculates the current progress for each toast.
                // This will be shown in percentages from 0% - 100%. We use a small delay so it doesn't run
                // _too_ often, but not too high that the progress bar stutters.
                let progress = setInterval(() => {
                    let diff = Math.round(new Date().getTime() - start);
                    this.counter = Math.round(diff / timeShown * 100);
                }, 50);

                // After the runtime has been completed, we will stop the interval (that's updating the progress
                // bar), and then we will hide the toast.
                setTimeout(() => {
                    clearInterval(progress);
                    this.thrash();
                }, timeShown + 100);
            }
        }, this.delay);
    }

    afterRun(callback) {
        this.afterRunCallback = setTimeout(() => callback(this), this.delay + this.displayTime + 100)
    }

    thrash() {
        if (this.afterRunCallback) {
            clearTimeout(this.afterRunCallback);
        }

        this.visible = false;

        if (this.$el) {
            this.$el.addEventListener('transitioncancel', () => {
                this.trashed = true;
            })
            this.$el.addEventListener('transitionend', () => {
                this.trashed = true;
            })
        }

    }
}
