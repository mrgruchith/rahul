<?php 
  session_start(); 


  $db = mysqli_connect('localhost', 'root', '', 'bkmh');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">

</head>
<body>
        <?php  if (isset($_SESSION['username'])) : ?>
        <?php endif ?>

<div class="header">
        <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
        <a href="index.php?logout='1'" >logout </a>
</div>

<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
	  <?php endif ?>
      
      

<div id="body">

<div class="trustees">
    <h1>Trustees </h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" />
        <input type="text" name="file_name" placeholder="name">
        <input type="text" name="file_desig" placeholder="designation">
    <button type="submit" name="btn-upload" style="align-content: center;padding:10px;margin:10px;">upload</button>
    </form>
</div>
<div class="library">
    <h1>Library details </h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="bookname" placeholder="Book name">
        <input type="text" name="author" placeholder="Author Name">
        <input type="text" name="issuedate" placeholder="Issue date">
        <input type="text" name="duedate" placeholder="Due date">
        <input type="text" name="status" placeholder="Status">
    <button type="submit" name="library-upload" style="align-content: center;padding:10px;margin:10px;">upload</button>
    </form>
</div>
<br>
<br>
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
                <input type="hidden" name="day" value="<?php echo $row['day'] ?>">
                <td><input type="text" name="mor" placeholder="<?php echo $row['morning']?>" vlaue=""></td>
                <td><input type="text" name="eve" placeholder="<?php echo $row['evening'] ?>" value=""></td>
                <td><button type="submit" name="mess-update">update</button></td>
            </tr>
            <?php
            
            
     }
     ?>
        </table>
        
        
</div>
<br>
<br>
<body>

<div class="contents">
 <table width="80%" border="1">
    <tr>
    <th>Images</th>
    </tr>
    <tr>
    <td></td>
    <td>Name</td>
    <td>Designation</td>
    </tr>
    <?php
 $sql="SELECT * FROM uploads ";
 $result_set=mysqli_query($db,$sql);
 while($row=mysqli_fetch_array($result_set))
 {
     
  ?>
<form action='upload.php' method="post">
        <tr>
        <td class="size"><?php echo "<img src = 'uploads/".$row['file']."  '/>" ?></td>
        <td><?php echo $row['file_name'] ?></td>
        <td><?php echo $row['file_desig'] ?></td>
        <td><input type="hidden" name="name" value="<?php echo $row['file_name'] ?>">
        <input type="submit" name="delete_item" value="Delete">
        </td>
        <td><?php echo $row['id'] ?></td>  
        </tr>
        </form>
        <?php
        
        
 }
 ?>
    </table>
   
</div>
<div>
<h1>RECENTS</h1>
        <?php
             $sql="SELECT * FROM logs";
             $result_set=mysqli_query($db,$sql);
             while($row=mysqli_fetch_array($result_set))
             {
                 ?>
                 <h3><?php echo $row['id'] ?> <?php echo $row['action'] ?> on <?php echo $row['cdate'] ?> </h3>
                 <?php
             }
        ?>
</div>
</body>
</html>