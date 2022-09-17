<!DOCTYPE html>
<html lang="en">
    <head>
        <!-----------Adjustments for Mobile--------------->
        <meta charset="UTF-8">
        <meta name="theme-color" content= "#B2EBF2">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <!-----------Bootstrap Links---------------------->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/mdb.min.css">
        <!-----------Custom Stylesheet & Icons------------->
        <link rel="stylesheet" href="css/appStylesheet.css">
        <link rel="apple-touch-icon" sizes = "128x128" href="icon128.png">
        <link rel="icon" sizes="192x192" href="icon192.png">
        <!-----------Manifest------------------------------>
        <link rel="manifest" href="manifest.json">
        <!-----------Content------------------------------->
        <title>Covid Support - Chatroom</title>
	</head>
    <body>
        <div class="covidHead d-flex align-items-center justify-content-center">
          <h1><strong>COVID-</strong><span class="text-muted">Support </span><i class="fas fa-hand-holding-heart fa-xs"></i></h1><br><br><br><br>
        </div>
        <div class="taskHead d-flex align-items-center justify-content-center">
        <h5 id= taskHeader></h5>
        </div>

        <div class="d-flex align-items-center justify-content-center">
          <div class="card" id="chatroomCard">
                <div class="card-body ">
                    <div id ="chatHistoryDiv"></div>
                        <div id ="chatFormDiv" >
                            <form id="chatForm" class="d-flex align-items-center justify-content-center">
                                <input type ="text" id="messageText"/>
                                <input type ="submit" id ="postButton" value ="Post"/>
                            </form>
                        </div>
                </div>
          </div>
        </div><br>

        <!-----------Navigation--------------------------------->
        <footer class="bg-dark text-center text-white">
            <div class="navBarWrapper">
                <div class="container p-4 pb-0">
                    <section class="mb-4">
                      <a class="btn btn-outline-light btn-floating m-1" href="scoreboard.html" role="button"
                        ><i class="fas fa-clipboard-list fa-lg"></i
                      ></a>
                      <a class="btn btn-outline-light btn-floating m-1" href="TaskPage.php" role="button"
                        ><i class="fas fa-clipboard-check fa-lg"></i
                      ></a>
                      <a class="btn btn-outline-light btn-floating m-1" href="Maps.html" role="button"
                        ><i class="fas fa-map-marker-alt fa-lg"></i
                      ></a>
                    </section>
              </div>
            </div>
      </footer>
        <!-----------Custom JS------------------------------->
        <script src="chatModel.js"></script>
        <script src="chatView.js"></script>
        <script src="chatController.js"></script>
        <script type="text/javascript" src="js/getTask.js"></script>

        <!-----------Bootstrap JS------------------------------->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/mdb.min.js"></script>
    </body>
</html>
