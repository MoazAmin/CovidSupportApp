/*jslint node: true, browser: true, white: true */
"use strict";

function chatView(){
    /* jshint validthis: true*/
    let chatHistoryDiv,postForm,postTextField,usernameField;

    this.init = function() {
        chatHistoryDiv = document.getElementById("chatHistoryDiv");
        chatHistoryDiv.scrollTop = chatHistoryDiv.scrollHeight;
        postForm = document.getElementById("chatForm");
        postTextField = document.getElementById("messageText");
        usernameField = localStorage.getItem("name");
        postTextField.focus();
        setInterval(scrollToBottom,10000);
    };

    this.addMessage = function(message){
        chatHistoryDiv.innerHTML = chatHistoryDiv.innerHTML + "<p id ='chatMessage'>" + message + "<p>";
        chatHistoryDiv.scrollTop = chatHistoryDiv.scrollHeight;
    };



    let scrollToBottom = function (){
        chatHistoryDiv.scrollTop = chatHistoryDiv.scrollHeight;
    }

    this.setCallbackMessageHost = function(callback){
        postForm.addEventListener("submit",function(event){
            callback(postTextField.value,usernameField);
            postTextField.value = "";
            postTextField.focus();
            event.preventDefault();
        });
    };

    this.setCallbackClearMessages = function (callback){
        window.setTimeout(callback(),100);
    }
}
