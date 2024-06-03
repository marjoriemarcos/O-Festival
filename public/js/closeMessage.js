const closeMessage = {
    init: function () {
        // Button Selector
        const closeButtons = document.querySelector(".btn-close");
        if (closeButtons) {
            closeButtons.forEach(function (closeButton) {
                closeButton.addEventListener("click", function () {
                    const alert = this.closest(".alert");
                    if (alert) {
                        alert.remove();
                    }
                });
            });
        }
    }
};

export {closeMessage};
