<?php
session_start();
$servername = "devweb2020.cis.strath.ac.uk";
$username = "mad_group_32";
$password = "Ohgh3Quaihai";
$dbname = $username;
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $usrnm = $_POST['username'];
    $pwd = $_POST['password'];
    $result = $conn->query("SELECT '$usrnm' FROM mad_group_32.accounts WHERE password = '$pwd' and username = '$usrnm'");
    if ($result->num_rows == 0) {
    ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
  		<?php echo ("Invalid username/password");?>
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  		</button>
	</div>    
    <?php
    }
    else {
        $_SESSION['username'] = $usrnm;
        $url = 'TaskPage.php?username='.$usrnm;
        header("Location: $url");
    }
}
?>
