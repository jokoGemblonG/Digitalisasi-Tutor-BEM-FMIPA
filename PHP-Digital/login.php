<?php
	session_start();
	if(isset($_SESSION['submit'])){
		header("Location: index2.php");
		exit;
	}
?>
<head>
	<title> Tutor Bem FMIPA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<header>
		<h4 style='padding: 3px'> SITUS TERPADU </h4>
		<h2 style='padding: 3px'> Tutor BEM FMIPA </h2>	
</header>
	<nav class= "navbar navbar-inverse">
	<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php"> Home </a></li>
		</ul>
	  </div>
	</nav>
	
<div class="container">
  <h2>Login Here </h2>
  <form action="proseslogin.php" method="POST">
  
    <div class="form-group">
      <label for="username">username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
    </div>
     
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
     
    <input type="submit" name="submit" class="btn btn-primary" value="submit">
  </form></body>
</html>
