// app.js

import { navMenu } from "./navMenu.js";
import { slider } from "./slider.js";
import { closeMessage } from "./closeMessage.js";

const app = {
    init: function () {
        navMenu.init();
        slider.init();
        closeMessage.init();
    }
};

document.addEventListener("DOMContentLoaded", app.init);
