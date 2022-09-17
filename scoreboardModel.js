/*jslint node: true, browser: true, white: true */
"use strict";
function scoreboardModel() {
    /* jshint validthis: true*/
    this.init = function () {
        setTimeout(updatePosts,500);
        setInterval(updatePosts,5000);
        setInterval(updateScoreboardValue,30000);
    };

    let amountInScoreboard = 0, newPostCallback = null,
        updateScoreboardValue = function (){
            amountInScoreboard = 0;
        },

    updatePosts = function () {
        let http, repliesJSON, messageJSON, accountName, accountScore, parameters;
        if (newPostCallback !== null) {
            http = new XMLHttpRequest();
            parameters = "numberInScoreboard=" + amountInScoreboard;
            if (amountInScoreboard != 10) {
                document.getElementById("scoreboard").innerHTML = "<th >Number of completed task's</th><th>Account Name</th>";
                http.open("GET", "showAccountScores.php?" + parameters, true);
                http.setRequestHeader("Content-type", "application/x-www-for,-urlencoded");
                http.onreadystatechange = function () {
                    if (http.readyState == 4 && http.status == 200) {
                        repliesJSON = http.responseText.split("\n");
                        repliesJSON.forEach(function (messageTextLine) {
                            if (messageTextLine.length > 0) {
                                messageJSON = JSON.parse(messageTextLine);
                                amountInScoreboard += 1;
                                accountName = messageJSON.username;
                                accountScore = messageJSON.score;
                                newPostCallback(accountName, accountScore);
                            }
                        });
                    }
                };
                http.send();
            }
        }
    }

    this.setNewShowPostCallback = function (callback){
        newPostCallback = callback;
        updatePosts();
    };



}

