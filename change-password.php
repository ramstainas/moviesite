<?php
  session_start();
  include_once 'header.php';
  include_once 'footer.php';
  include_once 'includes/dbh.inc.php';
if(isset($_POST['save']))
{
  
  echo "<<2>>";
  $id = $_SESSION['u_id'];  
  $oldpwd = md5($_POST['CurrPass']);
  $newpwd = md5($_POST['NewPass']);


  $sql = "SELECT id, pwd FROM user WHERE id='$id'";
  $result = $conn->query($sql);

  if($row = mysqli_fetch_assoc($result)){
    $hashedPwdCheck = md5($oldpwd, $row['pwd']);
    
    if($hashedPwdCheck == false){
  
  }else{
   //   $hashedPwd = password_hash($newpwd, PASSWORD_DEFAULT);
      $query = "UPDATE user SET pwd='$newpwd' WHERE id='$id'";
      mysqli_query($conn, $sql);
      exit();
    }
    }
  }

  
?>
<form class="form-horizontal" action="change-password.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>Change password</legend>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label">Old password</label>
  <div class="col-md-4">
    <input id="CurrPass" name="CurrPass" type="password" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label">New password</label>
  <div class="col-md-4">
    <input id="NewPass" name="NewPass" type="password" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label">Repeat new password</label>
  <div class="col-md-4">
    <input id="NewPassRepeat" name="NewPassRepeat" type="password" placeholder="" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-8">
    <button id="cancel" name="cancel" class="btn btn-danger">Cancel</button>
    <button id="save" name="save" class="btn btn-success">Save</button>
  </div>
</div>

</fieldset>
</form>
