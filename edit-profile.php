<?php
if(!isset($_SESSION['u_id'])){
  session_start();
}

include_once 'header.php';
include_once 'footer.php';
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
    header("Location: edit-profile.php");

    
}



if(mysqli_num_rows($result) > 0){
    
while($row = mysqli_fetch_assoc($result)){
?>
<form class="form-horizontal" action="edit-profile.php" method="post">
  <fieldset>
    <legend>Profile</legend>
      <div class="form-group">
          <label class="col-md-4 control-label">Username:</label>
          <div class="col-md-4">
            <input type="text" name="name1" id="name1" value="<?php echo $row['uid']; ?>" readonly="readonly" /> 
            <a><span class="glyphicon glyphicon-pencil" id= "editBtn" onclick=editName('1')></span></a>
          </div>
            </div>
      <div class="form-group">
            <label class="col-md-4 control-label">Name:</label> 
            <div class="col-md-4">
                <input type="text" name="name2" id="name2" value="<?php echo $row['firstname']; ?>" readonly />
                <a><span class="glyphicon glyphicon-pencil" id= "editBtn" onclick=editName('2')></span></a>
            </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Lastname:</label>
              <div class="col-md-4">
                <input type="text" name="name3" id="name3" value="<?php echo $row['lastname']; ?>" readonly />
                 <a><span class="glyphicon glyphicon-pencil" id= "editBtn" onclick=editName('3')></span></a>
              </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Email: </label>
                <div class="col-md-4">
                <input type="text" name="name4" id="name4" value="<?php echo $row['email']; ?>" readonly />
                <a><span class="glyphicon glyphicon-pencil" id= "editBtn" onclick=editName('4')></span></a>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label"></label>
              <div id= "change-password" class="col-md-8">
                <button name = "submit" class="btn btn-success">Save</button>
                <a href="change-password.php">Change Password</a>
               
                
            </div>
            </div>
            
  
</fieldset>
</form>  
<?php    
}
}
?>

















<script>
  function editName(number) {
  document.getElementById('name' + number).readOnly=false;
  document.getElementById('name'+ number).focus();
};

</script>
