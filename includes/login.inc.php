<?php
session_start();
if(isset($_POST['submit'])){
  include_once 'dbh.inc.php';
  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $psw = mysqli_real_escape_string($conn, $_POST['psw']);

  //error handlerss

  if(empty($uid) || empty($psw)){
    header("Location: ../login.php?login=empty");
    exit();
  } else{
    $sql = "SELECT * FROM  user WHERE uid='$uid'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck < 1){
      header("Location: ../login.php?login=exist");
      exit();
    } else {
      if($row = mysqli_fetch_assoc($result)){
       $hashedPwdCheck = password_verify($psw, $row['pwd']);

        if($hashedPwdCheck == false){
          header("Location: ../login.php?login=wrongpassword");
          exit();
        }
        elseif($hashedPwdCheck == true){
          // login in user here
          $_SESSION['u_id'] = $row['id'];
          $_SESSION['u_name'] = $row['firstname'];
          $_SESSION['u_last'] = $row['lastname'];
          $_SESSION['u_email'] = $row['email'];
          $_SESSION['u_uid'] = $row['uid'];

          $isAdminCheck = $row['IsAdmin'];
          if($isAdminCheck == 1){
            header("Location: ../admin-mng.php");
            exit();
          } else{
            header("Location: ../index.php");
            exit();
          }
          
          
        }
      }
    }
  }
} else {
  header("Location: ../login.php?login=error");
  exit();
}

$sql = "SELECT * FROM user WHERE uid= '$uid' and pwd='$pwd' ";
$result = $conn->query($sql);
if(!$row = $result->fetch_assoc()){
  echo "Your username or password is incorect ";

} else {
  $_SESSION['id'] = $row['id'];
}
header("Location: ../login.php?login=error");
$conn->close();

?>
