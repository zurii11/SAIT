window.selectAllData = () => {
    return {
        selectall: false,

        toggleAllCheckboxes() {
            this.selectall = !this.selectall

            checkboxes = document.querySelectorAll('.weekday');
            [...checkboxes].map((el) => {
                el.checked = this.selectall;
            })
        }
    }
}

window.addNewSchedule = () => {

    return {
    schedules: [
        {
            hasInterval: false
        }
    ],
    addNewField() {
        this.schedules.push({
            hasInterval: false
        });
    },
    removeField(index) {
            if (this.schedules.length === 1) {
                return
            }
            this.schedules.splice(index, 1);
        }
    }
 }
