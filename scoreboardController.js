/*global chatView*/
/*global chatModel*/
"use strict";

function scoreboardController(){
    /* jshint validthis: true*/
    let model = new scoreboardModel();
    let view = new scoreboardView();

    this.init = function(){
        model.init();
        view.init();

        model.setNewShowPostCallback(function (accountName,accountScore){
            view.addMessage(accountName,accountScore);
        })
    };
}

let scoreCntrl = new scoreboardController();
window.addEventListener("load",scoreCntrl.init);
