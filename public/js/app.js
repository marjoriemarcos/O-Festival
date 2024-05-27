// app.js

import { navMenu } from "./navMenu.js";
import { slider } from "./slider.js";
import { closeMessage } from "./closeMessage.js";
import { backTablesSort } from "./backTablesSort.js";
import { slotButtons } from "./slotButtons.js";
import { ticketButtons } from "./ticketButtons.js";

const app = {
    init: function () {
        navMenu.init();
        slider.init();
        closeMessage.init();
        backTablesSort.init();
        slotButtons.init();
        ticketButtons.init();
    }
};

document.addEventListener("DOMContentLoaded", app.init);