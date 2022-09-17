<?php
function connectOrDie(){

  $username= "mad_group_32";
  $password= "Ohgh3Quaihai";
  $database= $username;
  $servername= "devweb2020.cis.strath.ac.uk";

  $mysqli = new mysqli($servername,$username,$password,$database);
  if ($mysqli->connect_errno)
      die("Connect failed: %s ". $mysqli->connect_error);
  return $mysqli;
}

function addNewPost($mysqli, $postUsername, $postMessage, $postID){
    if (strlen($postMessage)==0) return $postID;
    $date = date("Y-m-d");
    if ($mysqli->query('INSERT INTO chatRoom (username,message,messageDate,uid) Values (\''.$postUsername.'\',\''.$postMessage.'\',\''.$date.'\',\''.$postID.'\')'))
      return $postID;
    else
      die("Query failed: %s ". $mysqli->error);
}

$mysqli = connectOrDie();
$postUsername = $mysqli->real_escape_string(urldecode ($_POST["usrnme"]));
$postMessage = $mysqli->real_escape_string(urldecode ($_POST["msg"]));
$postID = $mysqli->real_escape_string(urldecode ($_POST["uid"]));
$id = addNewPost($mysqli,$postUsername, $postMessage, $postID);
echo "$id";
?>
