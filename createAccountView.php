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
        <link rel="apple-touch-icon" sizes = "128x128" href="images/icon128.png">
        <link rel="icon" sizes="192x192" href="images/icon192.png">
        <!-----------Manifest------------------------------>
        <link rel="manifest" href="manifest.json">
        <!-----------Content------------------------------->
        <title>Covid Support - Create Account</title>
    </head>
    <body>
        <div class="create_account_script">
            <?php include 'createAccount.php';?>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <h1><strong>COVID-</strong><span class="text-muted">Support </span><i class="fas fa-hand-holding-heart fa-xs"></i></h1><br><br><br><br>
        </div>
        <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method ="POST">
            <div class="d-flex align-items-center justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title">Create an Account</h5>
                            <div class="form-outline">
                                <input type="text" id="form1" class="form-control" name="username" placeholder="Enter Your Username" required/><br>
                                <input type="password" id="form1" class="form-control" name="password" placeholder="Enter Your Password" required/><br>
                                <input type="password" id="form1" class="form-control" name="confirm_password" placeholder="Confirm Your  Password" required><br>
                            </div>
                            <button type="submit" name="submit" class="btn btn-dark btn-rounded">Create Account</button><br><br>
                            <p>Have an account already? <a href="index.php">Login Here</a></p>
                        </center>
                    </div>
                </div>
            </div>
        </form>
<!-----------Bootstrap JS------------------------------->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/mdb.min.js"></script>
    </body>
</html>

