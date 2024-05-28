// app.js

import { navMenu } from "./navMenu.js";
import { slider } from "./slider.js";
import { closeMessage } from "./closeMessage.js";
import { slotButtons } from "./slotButtons.js";
import { ticketButtons } from "./ticketButtons.js";
import { search } from "./search.js";
import { tableSort } from "./tableSort.js";
import {contactButtons} from "./contactButtons.js";

const app = {
    init: function () {
        navMenu.init();
        slider.init();
        closeMessage.init();
        slotButtons.init();
        ticketButtons.init();
        search.init();
        tableSort.init();
        contactButtons.init();
    }
};

document.addEventListener("DOMContentLoaded", app.init);