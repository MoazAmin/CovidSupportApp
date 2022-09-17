<?php
function connectOrDie(){
    $username="mad_group_32"; $password="Ohgh3Quaihai";  $database=$username;
    $servername="devweb2020.cis.strath.ac.uk";

    $mysqli = new mysqli($servername,$username,$password,$database);

    if ($mysqli->connect_errno)
        die("Connect failed: %s ". $mysqli->connect_error);

    return $mysqli;
}

function getPosts($mysqli, $fromID){
    if ($result = $mysqli->query("SELECT username, score,accountID FROM `accounts` ORDER BY score DESC LIMIT 10")){
        $comments = array();
          while( $row =  $result->fetch_array(MYSQLI_ASSOC) ) {
            $comments[] = $row;
        }
        $result->close();

        return $comments;
    } else {
        die("Query failed: %s ". $mysqli->error);
    }
}

header("Content-Type: text/plain");
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past


$mysqli = connectOrDie();
$firstID = isset($_GET["startID"]) ? $mysqli->real_escape_string($_GET["startID"]) : 0;
$lines = getPosts($mysqli, $firstID);
foreach ($lines as $line) {
    echo json_encode( $line ) . "\n" ;
}
?>
