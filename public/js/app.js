// app.js

import { navMenu } from "./navMenu.js";
import { slider } from "./slider.js";
import { slotButtons } from "./slotButtons.js";
import { ticketButtons } from "./ticketButtons.js";
import { search } from "./search.js";
import {contactButtons} from "./contactButtons.js";

const app = {
    init: function () {
        navMenu.init();
        slider.init();
        slotButtons.init();
        ticketButtons.init();
        search.init();
        contactButtons.init();
    }
};

document.addEventListener("DOMContentLoaded", app.init);