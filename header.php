<html>
<head>
  <meta charset="utf-8">
  <title>One site page</title>
  <link rel='stylesheet' type='text/css' href="styles/css/bootstrap.css">
  <link rel='stylesheet' type='text/css' href="styles/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="styles/style.css">
 
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
	<div class="container-fluid">
	<div class="navbar-header">
      <a class="navbar-brand" href="#">Movie site</a>
    </div>
	<ul class="nav navbar-nav">
		<li><a href="index.php">Home</a></li>
		<li><a href="topmovies.php">Top movies</a></li>
	</ul>
	  <ul class="nav navbar-nav navbar-right">
	<?php
		 if(isset($_SESSION['u_name'])){
			 echo "<li class='dropdown'><a href='javascript:void(0)' class='dropbtn'>";
			echo $_SESSION['u_name'];
			echo "</a>";
            echo "<div class='dropdown-content'>";
            echo "<a href='edit-profile.php'>Edit Profile</a>";
            echo "<a href ='includes/logout.inc.php'>Log Out</a>";
            echo "</div>";
            echo "</li>";
			
		}else {
			echo '<li><a href ="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
			   echo '<li><a href ="login.php"><span class="glyphicon glyphicon-log-in"></span> Log In</a></li>';
			   
			} 
?>
	</ul>
	</div>
	</nav>
	

	 
	