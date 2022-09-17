/*jslint node: true, browser: true, white: true */
"use strict";

function scoreboardView() {
    /* jshint validthis: true*/

    this.init = function () {

    }

    this.addMessage = function(accountName,accountScore){
        let scoreboard = document.getElementById("scoreboard");
        scoreboard.innerHTML = scoreboard.innerHTML + "<td>" + accountScore + "</td>" + "<td>" + accountName +  "</td>";
    };
}
