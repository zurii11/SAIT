window.selectAllData = () => {
    return {
        selectall: false,

        toggleAllCheckboxes() {
            this.selectall = !this.selectall

            const checkboxes = document.querySelectorAll('.weekday');
            [...checkboxes].map((el) => {
                el.checked = this.selectall;
            })
        }
    }
}

window.addNewSchedule = () => {
    const intervalCheckboxes = document.querySelectorAll('.interval_check');
    const initSchedules = [...intervalCheckboxes].map((el) => {
        if (el.checked) {
            return {
                hasInterval: true
            }
        }
        return {
            hasInterval: false
        }
    })
    return {
        schedules: initSchedules,
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
