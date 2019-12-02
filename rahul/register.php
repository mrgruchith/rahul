<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="css/css2.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
	  <?php include('errors.php'); ?>
	  <p style="color:red;">Every Field is neccessary<p>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="">
	  </div>
	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
	  </div>
	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="">
  	</div>
  	<div class="input-group">
  	  <label>Full Name</label>
  	  <input type="text" name="fullname" value="">
  	</div>
  	<div class="input-group">
  	  <label>Phone</label>
		<input type="tel" name="phone" value="">
    </div>
		<div class="input-group">
  	  <label>College</label>
		<input type="text" name="college" value="">
	</div>
		<div class="input-group">
  	  <label>Year</label>
		<input type="integer" name="year" value="">
	</div>
		<div class="input-group">
  	  <label>Course</label>
  	  <input type="text" name="course" value="">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>


</body>
</html>