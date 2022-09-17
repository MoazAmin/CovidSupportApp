let todaysTask = localStorage.getItem("Current_Task");
let oldHeader = document.getElementById("taskHeader");
oldHeader.innerHTML = "Todays task is: <br> " + todaysTask
	
