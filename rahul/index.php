<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {  
    $_SESSION['msg'] = "You must log in first";
    echo
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  //$db = mysqli_connect('remotemysql.com', 'pxYp4Hh3H7', '6apPOdEDhw', 'pxYp4Hh3H7');
  $db = mysqli_connect('localhost', 'root', '', 'bkmh');
  
?>


<!DOCTYPE html>
<html>
<head>
  <title>Home</title>   
  <!-- <meta name="viewport" content="initial-scale=1, maximum-scale=1"> -->
  <link rel="stylesheet" type="text/css" href="logincss.css">
  <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>

<div class="header">
<?php  if (isset($_SESSION['username'])) : ?>
<?php endif ?>
    <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
    <a href="index.php?logout='1'" >logout </a>

</div>
<div class="main-body">




<div class="student-details">
<?php

      $sql="SELECT *  FROM register WHERE username='".$_SESSION['username']."' ";
      $result_set= mysqli_query($db,$sql);
      $row=mysqli_fetch_array($result_set)
?>
    <ul>
      <li><h3>Full name    : </h3><?php echo $row['fullname']; ?></li>
      <li><h3>Username     : </h3><?php echo $row['username']; ?></li>
      <li><h3>Email        : </h3><?php echo $row['email']; ?></li>
      <li><h3>Phone number : </h3><?php echo $row['phonenumber']; ?></li>
      <li><h3>College       : </h3><?php echo $row['college']; ?></li>
      <li><h3>Year         : </h3><?php echo $row['year']; ?></li>
      <li><h3>Course       : </h3><?php echo $row['course']; ?></li>

    </ul>
    <button>Edit Details</button>
</div>


<br>
<br>

<div class="library-details">
        <table width="80%" border="1">
           <tr>
           <td>Name of the book</td>
           <td>Author Name</td>
           <td>Issued Date</td>
           <td>Due Date</td>
           <td>Status</td>
           </tr>
           <?php
        $sql="SELECT L.bookname,L.author,L.issuedate,L.duedate,L.status FROM library L, register R WHERE R.student_id = L.student_id";
        $result_set=mysqli_query($db,$sql);
        while($row=mysqli_fetch_array($result_set))
        {
         ?>
               <tr>
               <td><?php echo $row['bookname'] ?></td>
               <td><?php echo $row['author'] ?></td>
               <td><?php echo $row['issuedate'] ?></td>
               <td><?php echo $row['duedate'] ?></td>
               <td><?php echo $row['status'] ?></td>
               </tr>
               <?php
               
               
        }
        ?>
           </table>
       </div>

</div>
<div class="mess">
    <h1>Mess Details</h1>
    <table width="80%" border="1">
        <tr>
        <td><h1>Day <h1></td>
        <td><h1>Morning Dish<h1></td>
        <td><h1>Evening Dish<h1></td>
        </tr>
        <?php
     $sql="SELECT day,morning,evening FROM mess ORDER BY id ";
     $result_set=mysqli_query($db,$sql);
     while($row=mysqli_fetch_array($result_set))
     {
      ?>
            <tr>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <td><label for=""><?php echo $row['day']?></label></td>
                <td><?php echo $row['morning']?></td>
                <td><?php echo $row['evening'] ?></td>
                
            </tr>
            <?php
            
            
     }
     ?>
        </table>
        
        
</div>

 
<br /><br />

<div>

</div>
    
  	
</div>


		
  	<script>

		function openNav() {
            document.getElementById("sidebar").style.width = "100%";
            }

          function closeNav() {
            document.getElementById("sidebar").style.width = "0";
            }
	</script>

</body>
</html>