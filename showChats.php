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

function getPosts($mysqli, $fromID){
    $date = date("Y-m-d");
    if ($result = $mysqli->query("SELECT * FROM `chatRoom` where insertID>=$fromID")) {
      $comments = array();
        while( $row =  $result->fetch_array(MYSQLI_ASSOC)) {
          if($row["messageDate"] == $date){
              $comments[] = $row;
          }
        }
        $result->close();
        return $comments;
    }
    else {
      die("Query failed: %s ". $mysqli->error);
    }
}

function clearPosts($mysqli){
    $fulldate = date("Ymd");
    $sql = "DELETE FROM `chatRoom` WHERE messageDate!=$fulldate";
    if ($mysqli->query($sql) === TRUE) {
    }
    else {
    }
}

header("Content-Type: text/plain");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

$mysqli = connectOrDie();
$firstID = isset($_GET["startID"]) ? $mysqli->real_escape_string($_GET["startID"]) : 0;
$lines = getPosts($mysqli, $firstID);
clearPosts($mysqli);

foreach ($lines as $line) {
    echo json_encode( $line ) . "\n" ;
}

?>
