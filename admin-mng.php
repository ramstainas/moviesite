<?php
if(!isset($_SESSION['u_id'])){
  session_start();
}

include_once 'admin-header.php';
include_once 'includes/dbh.inc.php';


$id = $_SESSION['u_id'];  
$sql = "SELECT * FROM user WHERE id='$id'";
$result = $conn->query($sql);

if(isset($_POST['submit'])){
    $username = $_POST['name1'];
    $firstname = $_POST['name2'];
    $lastname = $_POST['name3'];
    $email = $_POST['name4'];
    
    
    $query = "UPDATE user SET firstname='$firstname', lastname='$lastname', email='$email', uid='$username' WHERE id='$id'";
    $result = $conn->query($query);
    $_SESSION['u_name']= $firstname;  
    header("Location: admin-mng.php");

    
}
?>

<div class="container">
  <fieldset>
  <legend>Edit profile</legend>
  <div class="row">
  <div class="col-md-3">
    <?php include_once 'sidebar.php'?>
  </div>
  
<div class="col-md-8"> 
<?php
if(mysqli_num_rows($result) > 0){
    
while($row = mysqli_fetch_assoc($result)){
?>
   
<form class="form-horizontal" action="admin-mng.php" method="post">
      <div class="form-group">
          <label class="col-md-2 control-label">Username:</label>
          <div class="col-md-4">
            <input type="text" name="name1" id="name1" value="<?php echo $row['uid']; ?>" readonly="readonly" /> 
            <a><span class="glyphicon glyphicon-pencil" id= "editBtn" onclick=editName('1')></span></a>
          </div>
            </div>
  
      <div class="form-group">
            <label class="col-md-2 control-label">Name:</label> 
            <div class="col-md-4">
                <input type="text" name="name2" id="name2" value="<?php echo $row['firstname']; ?>" readonly />
                <a><span class="glyphicon glyphicon-pencil" id= "editBtn" onclick=editName('2')></span></a>
            </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">Lastname:</label>
              <div class="col-md-4">
                <input type="text" name="name3" id="name3" value="<?php echo $row['lastname']; ?>" readonly />
                 <a><span class="glyphicon glyphicon-pencil" id= "editBtn" onclick=editName('3')></span></a>
              </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Email: </label>
                <div class="col-md-4">
                <input type="text" name="name4" id="name4" value="<?php echo $row['email']; ?>" />
                <a><span class="glyphicon glyphicon-pencil" id= "editBtn" onclick=editName('4')></span></a>
              </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <button name ="submit" class="btn btn-success col-md-3">Save</button>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <a href="change-password.php">Change Password</a>
            </div>  
</form>  
     
<?php    
}
}
?>  
  
</div>
    </div>
    </fieldset>
</div>




<script>
  function editName(number) {
  document.getElementById('name' + number).readOnly=false;
  document.getElementById('name'+ number).focus();
};

</script>
