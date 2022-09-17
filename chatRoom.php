<?php
  $username= "mad_group_32";
  $password= "Ohgh3Quaihai";
  $database= $username;
  $servername= "devweb2020.cis.strath.ac.uk";

  $mysqli = new mysqli($servername,$username,$password,$database);
  $usrnm = isset($_GET["username"]) ? $mysqli->real_escape_string($_GET["username"]) : "Guest";
?>
