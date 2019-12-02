
<!DOCTYPE html>
<html>
<head>
    
    
</head>


</html>
<?php 
  
  $db = mysqli_connect('localhost', 'root', '', 'bkmh');
?>

<!DOCTYPE html>
<html>
<head>
<title>BKMH</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/css.css">
</head>
<body>

   

<body>

<nav >
    <a href="#">Home</a>
    <a href="login.php">Login</a>
</nav>

<div class="front">
    <img src="bkmh.jpg" width="97%" height="fit-content" style="padding: 20px;">

</div>

<div class="events">
    <h3 class="main-title">IMPORTANT EVENTS FROM CHARITIES</h3>
    <p>Silver Jubilee: BK Mariappa’s Hostel celebrates 25 years</p>
    <p>Golden Jublee: BK Mariappa’s Hostel celebrates 50 years</p>
    <p>Diamond Jublee: BK Mariappa’s Hostel celebrates 60 years</p>
    <p>Platinum Jublee: BK Mariappa’s Hostel celebrates 75 years</p>
    <p>Oak Jublee: BK Mariappa’s Hostel celebrates 80 years</p>
    <p>Girls’ Hotel Inaugural and Boys’ Hostel Golden Jublee Function</p>
    <p>Centenary Celebrations: BK Mariappa’s Hostel celebrates 100 years</p>
    <p>Old age home inaugural function</p>
</div>

<div class="charities">
    <div class="hostel">
        <img src="images\hostel-font.jpg" style="width: 300px;height:200px;">
        <div>
            <h3>B K MARIAPPA’S BOYS’ HOSTEL</h3>
            <p>Free Boarding & Lodging facilities for underprivileged and meritorious Students</p>
        </div>
    </div>
    <div class="hostel">
        <img src="images\hostel-girls.jpg" style="width: 300px;height:200px;">
        <div>
            <h3>B K MARIAPPA’S GIRLS’ HOSTEL</h3>
            <p>Free Boarding & Lodging facilities for underprivileged and meritorious Students</p>
        </div>
    </div>
    <div class="hostel">
        <img src="images\oldage.jpg" style="width: 300px;height:200px;">
        <div>
            <h3>SANDHYADHARA (SENIOR CITIZENS HOME)</h3>
            <p>Caring for Old age citizens along with boarding and lodging facilities.</p>
        </div>
    </div>
</div>
<div class="facilities">
    <h3 class="main-title">MARIAPPA’S <br>HOSTEL FACILITIES</h3>
   
    <div class="facility">
        <h1><span></span>PLAY GROUND</h1>
        <p>Students will be involved in all indoor and outdoor sports</p>
    </div>
    <div class="facility">
        <h1><span></span>LIBRARY</h1>
        <p>Students can utilize the library to enhance their knowledge.</p>
    </div>
    <div class="facility">
        <h1><span></span>MEDICAL</h1>
        <p>Student can avail Free medical facility</p>
    </div>
    <div class="facility">
        <h1><span></span>ASHOKA SANGHA</h1>
        <p>Cultural & Sports activities and many Inter Hostel competitions.</p>
    </div>

</div>
<div class="trustees">
    <h3 class="main-title">TRUSTEES</h3>
<div class="trustee-images">
        <?php
        
        
         $sql="SELECT * FROM uploads ";
         $result_set=mysqli_query($db,$sql);
         while($row=mysqli_fetch_array($result_set))
         {
          ?>
            <div class="card">
                <?php echo "<img src = 'uploads/".$row['file']."  '/>" ?> 
                <h3><?php echo $row['file_name'] ?></h3>
                <p><?php echo $row['file_desig'] ?></p>
            </div>
                
                <?php
                
                
         }
         ?>
        </div>

</div>
</body>

</body>
</html>






















































