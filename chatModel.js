/*jslint node: true, browser: true, white: true */
"use strict";
function chatModel(){
    /* jshint validthis: true*/
    this.init = function () {
        setTimeout(updatePosts,500);
        setInterval(updatePosts,5000);
    };

    let lastSeenID = 0,newPostCallback = null,

     getUUID = function(){
        let random,timestamp,userid;
        if(localStorage.chat_uuid) {
            localStorage.chat_uuid = localStorage.chat_uuid*1 + 1;
        }
        else {
            random = Math.floor(Math.random()*10000);
            timestamp = (new Date()).getMilliseconds() % 100;
            userid = random*100 +  timestamp
            localStorage.chat_uuid = userid * 1000 // this will be our unique id
        }
        return localStorage.chat_uuid
    },

     updatePosts = function () {
        let http,repliesJSON,messageJSON, parameters,messageID,username,message;
        if (newPostCallback !== null){
            http =  new XMLHttpRequest();
            parameters = "startID=" +((lastSeenID*1)+1)
            http.open("GET","showChats.php?" + parameters,true);
            http.setRequestHeader("Content-type","application/x-www-for,-urlencoded");
            http.onreadystatechange = function(){
                if(http.readyState === 4 && http.status === 200){
                    repliesJSON = http.responseText.split("\n");
                    repliesJSON.forEach(function(messageTextLine){
                        if(messageTextLine.length > 0){
                            messageJSON = JSON.parse(messageTextLine);
                            messageID = messageJSON.insertID;
                            username = messageJSON.username
                            message = messageJSON.message
                            lastSeenID = messageID;
                            let newString = username + ":" + message;
                            newPostCallback(newString);
                        }
                    });
                }
            };
            http.send();
        }
    };

    
     this.setNewShowPostCallback = function(callback){
        newPostCallback = callback;
        updatePosts();
     };

     this.post = function(message,username){
        console.log("posting message " + message);
        let http = new XMLHttpRequest(),
            paramaters = "usrnme="+encodeURIComponent(username)+"&msg="+encodeURIComponent(message)+"&uid="+getUUID();
        http.open("Post","postChat.php",true);
        http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        http.onreadystatechange = function(){
            if(http.readyState === 4 && http.status === 200){
                console.log("Reply: " + http.responseText )
                window.setTimeout(updatePosts,100);
            }
        };
        http.send(paramaters);
     };
}
