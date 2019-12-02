<?php
session_start();


$username = "";
$email    = "";
$errors = array(); 
$adminuser = 'admin';
$adminpassword = 'admin@123';


$db = mysqli_connect('localhost', 'root', '', 'bkmh');

if (isset($_POST['reg_user'])) {
 
 
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $college = mysqli_real_escape_string($db, $_POST['college']);
  $year = mysqli_real_escape_string($db, $_POST['year']);
  $course = mysqli_real_escape_string($db, $_POST['course']);
 



  if (empty($username) || empty($password_1) || empty($password_2)|| empty($email)|| empty($fullname)|| empty($phone)|| empty($college)|| empty($year)|| empty($course) ) { array_push($errors, "Some fields are empty"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM register WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }


  if (count($errors) == 0) {
  	//$password = md5($password_1);

  	$query = "INSERT INTO register (fullname,username, email,phonenumber,college,course,year,password) 
  			  VALUES('$fullname', '$username', '$email','$phone', '$college', '$course','$year','$password_1')";
  	mysqli_query($db, $query);
  	$_SESSION['fullname'] = $fullname;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

//login
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
      array_push($errors, "Username is required");
  }
  if (empty($password)) {
      array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
     // $password = md5($password);
     
    
      $admin = "SELECT * FROM register WHERE username='admin' AND password='admin@1234'";
     $query = "SELECT * FROM register WHERE username='$username' AND password='$password'";
     
      $adminresults = mysqli_query($db, $admin);
      $results = mysqli_query($db, $query);
      if ($username == 'admin' && $password == 'admin@1234') {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = 'welcome admin';
        header('location: admin.php');
      }
      else if (mysqli_num_rows($results) == 1) {
       $_SESSION['username'] = $username;
       $_SESSION['success'] = "You are now logged in";
       header('location: index.php');
      }else {
         array_push($errors, "Wrong username/password combination");
      }
  }
}





  ?>