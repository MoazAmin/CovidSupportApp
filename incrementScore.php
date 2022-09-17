<?php
$username= "mad_group_32";
$password= "Ohgh3Quaihai";
$database= $username;
$servername= "devweb2020.cis.strath.ac.uk";

function incrementScore($mysqli,$usrnm){
    $mysqli->query("update mad_group_32.accounts set score = score + 1 where username = '$usrnm'");
}


$mysqli = new mysqli($servername,$username,$password,$database);
$usrnm = ($_GET["username"]) ? $mysqli->real_escape_string($_GET["username"]) : "Guest";
echo($usrnm);
$usrnm = str_replace('"', "", $usrnm);
$usrnm = str_replace('\\', "", $usrnm);
incrementScore($mysqli,$usrnm);
?>
