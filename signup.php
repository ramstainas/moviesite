<?php
include_once 'header.php';

$error = "";
if(isset($_GET['signup'])){
  $message = $_GET['signup'];
  if($message == 'empty'){
    $error = "Fields are empty."; 
  }elseif($message == 'dontexist'){
    $error = "Wrong username.";
  }elseif($message == 'wrongpassword'){
    $error = "Wrong password.";
  }elseif($message == 'error'){
    $error = "Error.";
  }elseif($message == 'success'){
    $error = "Successfully created user.";
  }
}
  
 ?>


<div class="signmodal">
  <div class="modal-dialog">
  <div class="signmodal-container">
      <h1>Sign up</h1>
      <div class="sign-message">
        <span><?php echo $error;?></span>
      </div>
      <form action="includes/signup.inc.php" method="post">
        <input type="text" name = "first" placeholder="firstname">
        <input type="text" name = "last" placeholder="lastname">
        <input type="text" name = "email" placeholder="email">
        <input type="text" name = "uid" placeholder="username">
        <input type="password" name = "psw" placeholder="password">
        <input type="submit" name="submit" value="Sign up" class="signmodal-submit"> 
      </form>
    </div>
  </div>
</div>