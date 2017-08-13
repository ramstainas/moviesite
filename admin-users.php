<?php

include_once 'admin-header.php';
include_once 'includes/dbh.inc.php';

if(!isset($_SESSION['u_id'])){
  session_start();
}
$sql = "SELECT * FROM user;";
$result = $conn->query($sql);
  $message = "";
 if(isset($_GET['status'])){
      $status = $_GET['status'];
      if($status == "exist"){
        $message = "Can't change.";
      } else{
         $message = "Changed succesfully.";
      }
    
 }
?>


<fieldset>
  <legend>Users list</legend>
<div class="container">
  <div class="row">
    <div class="col-md-3">
        <?php include_once 'sidebar.php'?>
    </div>
    <div class="col-md-9">
    <div>
      <?php echo $message;  ?>
    </div>
    <table class="table table-bordered">
  <tr>
  <th>First name</th>
  <th>Last name</th>
  <th>Username</th>
  <th>Email</th>
  <th>Role</th>
  <th colspan="2">Make admin</th>
</tr>

<?php
if(mysqli_num_rows($result) > 0){
    
while($row = mysqli_fetch_assoc($result)){
?>
<tr>
<td><?php echo $row['firstname']; ?></td>  
<td><?php echo $row['lastname']; ?></td> 
<td><?php echo $row['uid']; ?></td> 
<td><?php echo $row['email']; ?></td>
  <?php
    if($row['IsAdmin'] == 1){
      $isAdmin = 'admin';
    } else{
      $isAdmin = 'user';
    }
  ?>
<td><?php echo $isAdmin; ?></td>
<td><a name ="mkadmin" href="admin-users-makeadmin.php?id=<?php echo $row['id']?>"><span class="glyphicon glyphicon-ok-sign" name = "mkadminico"></span></a></td> 
<td><a name = "mkuser" href="admin-users-makeuser.php?id=<?php echo $row['id']?>"><span class="glyphicon glyphicon-remove-sign" id = "canceladmin" ></span></a></td> 

<?php
}
}
?>
</tr>
</table>
</fieldset>
    
    </div>
    
    </div>
</div>  
  
  
