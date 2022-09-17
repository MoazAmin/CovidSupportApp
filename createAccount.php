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
      $username_check = mysqli_query($conn, "SELECT username FROM accounts WHERE username='".$usrnm."'");
      
      if ($pwd != $cpwd) {
      ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
  		<?php echo ("The passwords don't match");?>
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  		</button>
	</div>    
      <?php
      }
      elseif ((strlen($usrnm) < 8) || (strlen($usrnm) > 16)) {
      ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
  		<?php echo ("Username must be between 8 and 16 characters");?>
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  		</button>
	</div>    
      <?php
      }
       elseif (mysqli_num_rows($username_check) > 0) {
      ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
  		<?php echo ("Sorry... username already taken");?>
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  		</button>
	</div>    
      <?php
      }
      elseif ((strlen($pwd) < 8) || (strlen($pwd) > 16)) {
      ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
  		<?php echo ("Password must be between 8 and 16 characters");?>
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  		</button>
	</div>    
      <?php
      }
      elseif (!ctype_alnum($usrnm)) {
      ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
  		<?php echo ("Username must only contain letters and numbers");?>
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  		</button>
	</div>    
     <?php
      }
      else {
            $result = $conn->query("SELECT COUNT(*) FROM accounts");
            $row = $result->fetch_assoc();
            $count  = $row["COUNT(*)"];
            $aid = $count + 1;
            $conn->query("INSERT INTO mad_group_32.accounts (username, password, score, accountID) VALUES ('$usrnm', '$pwd', 0, '$aid')");
            $url = 'index.php';
            header( "Location: $url" );
      }
    }
?>

