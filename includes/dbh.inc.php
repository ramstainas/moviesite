<?php
include 'db.inc.php';

//create connection
$conn = mysqli_connect($servername, $username, $password, $db);

//check connection
if (!$conn){
  die ("Connection failed" . mysqli_connect_error());
}
?>
