/*global chatView*/
/*global chatModel*/
"use strict";
function chatController(){
    /* jshint validthis: true*/
    let model = new chatModel()
    let view = new chatView();

    this.init = function(){
        model.init();
        view.init();

        model.setNewShowPostCallback(function(message){
            view.addMessage(message);
        });
        view.setCallbackMessageHost(model.post);
    };
}
let chatCntrl = new chatController();
window.addEventListener("load",chatCntrl.init);
