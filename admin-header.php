<?php
if(!isset($_SESSION['u_id'])){
  session_start();
}
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin page</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
	<nav class="navbar navbar-inverse">
	<div class="container-fluid">
	<div class="navbar-header">
      <a class="navbar-brand" href="#">Movie site</a>
    </div>
	  <ul class="nav navbar-nav navbar-right">
		   <li><a><?php echo $_SESSION['u_name']; ?> </a></li>
        <li><a href ='includes/logout.inc.php'>Log Out</a></li>
	</ul>
	</div>
	</nav>