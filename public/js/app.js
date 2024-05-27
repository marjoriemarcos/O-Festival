// app.js

import { navMenu } from "./navMenu.js";
import { slider } from "./slider.js";

const app = {
    init: function () {
        navMenu.init();
        slider.init();
    }
};

document.addEventListener("DOMContentLoaded", app.init);