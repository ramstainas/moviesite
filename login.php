	<?php 
	  include_once 'header.php';
	  
	  $error = "";
	  if(isset($_GET['login'])){
		  $message = $_GET['login'];
		  if($message == 'empty'){
		 $error = "Username or password is empty."; 
		 } elseif($message == 'dontexist'){
			$error = "Wrong username.";
		 }elseif($message == 'wrongpassword'){
			$error = "Wrong password.";
	  }elseif($message == 'error'){
			$error = "Error.";
	  }
	  }  
	?>
	
<div class="loginmodal">	
  <div class="modal-dialog">
    <div class="loginmodal-container">
      <h1> Log in</h1>
      <div class="login-message">
        <span><?php echo $error;?></span>
      </div>

      <form action="includes/login.inc.php" method="POST">
        <input type="text" name="uid" placeholder = "username"> 
        <input type="password" name="psw" placeholder = "password"> 
        <input type="submit" name= "submit" value ="Log in" class="login loginmodal-submit">
      </form>
      <div class="login-help">
        <a href="signup.php"> Sign up</a>
        <a href="#"> Forgot password</a>
      </div>
    </div>
  </div>
</div>
