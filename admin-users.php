<?php

include_once 'admin-header.php';


if(!isset($_SESSION['u_id'])){
  session_start();
}
include_once 'includes/dbh.inc.php';

$sql = "SELECT * FROM user;";
$result = $conn->query($sql);
?>
<fieldset>
  <legend>Users list</legend>
<div class="container">
  <div class="row">
    <div class="col-md-3">
        <?php include_once 'sidebar.php'?>
    </div>
    <div class="col-md-9">
    <table class="table table-bordered">
  <tr>
  <th>First name</th>
  <th>Last name</th>
  <th>Username</th>
  <th>Email</th>
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
}
}
?>
</tr>
</table>
</fieldset>
    
    </div>
    
    </div>
</div>  
  
  
