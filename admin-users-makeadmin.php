<?php
  include_once 'includes/dbh.inc.php';


  if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql = "SELECT id, IsAdmin FROM user WHERE id = '$id'";
      $result = $conn->query($sql);
      $row = mysqli_fetch_assoc($result);
      $IsAdminCheck = $row['IsAdmin'];

      if($IsAdminCheck == 1){
          header("Location: admin-users.php?status=exist");
          exit();
      } else {
          $query = "UPDATE user SET IsAdmin = '1' WHERE id='$id'";
          $result = $conn->query($query);
          header("Location: admin-users.php?status=success");
          exit();
      }

} else{
    echo "Error. There is no id for user";
}

?>