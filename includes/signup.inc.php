<?php
session_start();
if (isset($_POST['submit'])){

  include_once 'dbh.inc.php';

  $first = mysqli_real_escape_string($conn,$_POST['first']);
  $last = mysqli_real_escape_string($conn,$_POST['last']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $uid = mysqli_real_escape_string($conn,$_POST['uid']);
  $pwd = mysqli_real_escape_string($conn,$_POST['psw']);

  //Error handlers
  //Check for empty fields
  if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) ){
    header("Location: ../signup.php?signup=empty");
    exit();
  } else {
    // Check if input characters
      if(!preg_match("/^[a-zA-z]*$/", $first) || !preg_match("/^[a-zA-z]*$/", $lastname)){
        header("Location: ../signup.php?signup=invalid");
        exit();
      } else {
        //check if email is valid
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          header("Location: ../signup.php?signup=email");
          exit();
        } else {
          $sql = "SELECT * FROM users WHERE uid='$uid'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          if($resultCheck >0){
            header("Location: ../signup.php?signup=usertaken");
            exit();
          } else{
            $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
            //insert the user into database
            $sql = "INSERT INTO user(firstname, lastname, email, uid, pwd) VALUES ('$first','$last', '$email', '$uid', '$hashed_pwd');";
            mysqli_query($conn, $sql);
            header("Location: ../signup.php?signup=success");
            exit();
          }

        }
      }

  }
} else {
  header("Location: ../signup.php?signup=error");
  exit();
}

$sql = "INSERT INTO user(firstname, lastname, uid, pwd) VALUES('$first', '$last', '$uid', '$pwd')";
$result = $conn->query($sql);
header("Location: index.php");

?>
