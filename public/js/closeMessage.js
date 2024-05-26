const closeMessage = {
    init: function () {
        // selection du btn
        const closeButton = document.querySelector(".btn-close");
        if (closeButton) {
            closeButton.addEventListener("click", function () {
                const alert = document.querySelector(".alert-success");
                if (alert) {
                    alert.remove();
                }
            });
        }
    }
};

export { closeMessage };
