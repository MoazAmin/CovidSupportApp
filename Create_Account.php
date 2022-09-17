<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Covid Support - Create Account</title>
</head>
<body>
<div class="php_script">
    <?php
    $servername = "devweb2020.cis.strath.ac.uk";
    $username = "mad_group_32";
    $password = "Ohgh3Quaihai";
    $dbname = $username;
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {

        $usrnm = $_POST['username'];
        $pwd = $_POST['password'];
        $cpwd = $_POST['confirm_password'];

        if ($pwd != $cpwd) {
            printf ("The passwords don't match\n");
        }
        elseif ((strlen($usrnm) < 8) || (strlen($usrnm) > 16)) {
            printf ("Username must be between 8 and 16 characters\n");
        }
        elseif ((strlen($pwd) < 8) || (strlen($pwd) > 16)) {
            printf ("Password must be between 8 and 16 characters\n");
        }
        elseif (!ctype_alnum($usrnm)) {
            printf ("Username must only contain letters and numbers\n");
        }
        else {
            $conn->query("INSERT INTO mad_group_32.accounts (username, password, score) VALUES ('$usrnm', '$pwd', 0)");
            $url = 'index.php';
            header( "Location: $url" );
        }
    }
    ?>
</div>
<form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method ="POST">
    <h2 class="form-signin-heading">Create an Account</h2>
    <input type="text" class="form-control" name="username" placeholder="Enter Your Username" required/>
    <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required/>
    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Your Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name ="submit">Create Account</button>
</form>
</body>
</html>
