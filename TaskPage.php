<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content= "#B2EBF2"/>
    <script src="task.js" defer></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">

    <link rel="apple-touch-icon" sizes = "128x128" href="icon128.png">
    <link rel="icon" sizes="192x192" href="icon192.png">
    <link rel="manifest" href="manifest.json">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/appStylesheet.css">


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">


    <title>Task Page</title>
</head>
<body>
<?php include "username.php"?>
<div id ="loggedUser" hidden>
    <p id="username"><?php echo($usrnm)?></p>


</div>

<div class="d-flex align-items-center justify-content-center">
    <h1><strong>COVID-</strong><span class="text-muted">Support </span><i class="fas fa-hand-holding-heart fa-xs"></i></h1>
    <br><br><br><br>
</div>

<div id="high"> </div>
<br>
<div class="card bg-light mb-3" id="TaskTodayCard" style="max-width: 100%; text-align: center">
    <div class="card-header"><h3>Task of the Day</h3></div>
    <div class="card-body">
        <div class="card-title"><div id="TaskToday"></div></div>
    </div>
</div>
<div class="card bg-light mb-3" id="cardUgly" >

    <div class="checkbox_task">
        <label for="task_done"><h3>I have Done Today's Task</h3></label>
        <input type="checkbox" id="task_done">
    </div>
</div>

<!-------------------------------------------------------------------------------------------------------->

<button class="collapsible"><h3>Task Description</h3></button>
<div class="content">
    <br><br>
    <div id='Desc'></div> <br>   <a> <div id="link"></div> </a>
    <br><br>
</div>

<button class="collapsible"><h3><div id="footer"></div></h3></button>
<div class="content">
    <br><br>
    <div id="listOfTasks"></div>
    <br><br>

</div>


<!-------------------------------------------------------------------------------------------------------->


<footer class="bg-dark text-center text-white">
    <div class="navBarWrapper">
        <div class="container p-4 pb-0">
            <section class="mb-4">
                <a class="btn btn-outline-light btn-floating m-1" href="chatRoomView.php" role="button"
                ><i class="fas fa-comment-alt fa-lg"></i
                    ></a>

                <a class="btn btn-outline-light btn-floating m-1" href="scoreboard.html" role="button"
                ><i class="fas fa-clipboard-list fa-lg"></i></a>

                <a class="btn btn-outline-light btn-floating m-1" href="Maps.html" role="button"
                ><i class="fas fa-map-marker-alt fa-lg"></i
                    ></a>
            </section>
        </div>
    </div>
</footer>

<script type="text/javascript" src="js/setUsername.js"></script>

<script>
    let coll = document.getElementsByClassName("collapsible");

    let i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            let content = this.nextElementSibling;
            if (content.style.maxHeight){
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }
</script>
</body>
</html>
