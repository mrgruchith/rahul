<?php
$db = mysqli_connect('localhost', 'root', '', 'bkmh');
if(isset($_POST['library-upload'])){
      $username = mysqli_real_escape_string($db, $_POST['username']);
      $bookname = mysqli_real_escape_string($db, $_POST['bookname']);
      $author = mysqli_real_escape_string($db, $_POST['author']);
      $issuedate = mysqli_real_escape_string($db, $_POST['issuedate']);
      $duedate = mysqli_real_escape_string($db, $_POST['duedate']);
      $status = mysqli_real_escape_string($db, $_POST['status']);

      $query ="INSERT INTO library(student_id,bookname,author,issuedate,duedate,status) VALUES((SELECT student_id FROM register WHERE username = '$username'),'$bookname','$author','$issuedate','$duedate','$status')";
      mysqli_query($db,$query);
      
     
}
if(isset($_POST['btn-upload']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_name = $_FILES['file']['name'];
 $file_desig = $_FILES['file']['desig'];
 $folder="uploads/";
 
 // new file size in KB
 $new_name = mysqli_real_escape_string($db, $_POST['file_name']);
 $new_desig = mysqli_real_escape_string($db,$_POST['file_desig']);
 // new file size in KB
 
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql="INSERT INTO uploads(file,file_name,file_desig) VALUES('$final_file','$new_name','$new_desig')";
  mysqli_query($db,$sql);
  ?>

  <script>
  alert('successfully uploaded');
        window.location.href='admin.php?success';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error while uploading file');
        window.location.href='admin.php?fail';
        </script>
  <?php
 }
}


////messssssssssssssssssssssssssssssss
if(isset($_POST['mess-update']))
{    
     
 $day = mysqli_real_escape_string($db, $_POST['day']);
 

 $morning1 = mysqli_real_escape_string($db, $_POST['mor']);
 $evening1 = mysqli_real_escape_string($db,$_POST['eve']);


 

  $sql="UPDATE mess SET morning = '$morning1', evening = '$evening1' WHERE mess.day = '$day' ";
  mysqli_query($db,$sql);
  if(mysqli_query($db,$sql)){
  ?>

  <script>
  alert('successfully updated');
        window.location.href='index.php?success';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error while updating');
        window.location.href='index.php?fail';
        </script>
  <?php
 }
}


// trustessssss
if(isset($_POST['delete_item'])){
      
      $file_name = mysqli_real_escape_string($db, $_POST['name']);
      $query="DELETE FROM uploads WHERE file_name='$file_name' LIMIT 1 ";
      $result=mysqli_query ($db,$query);

// if ( == 1) { 
// //if it updated
// ?>

// <script>
//   alert('successfully deleted');
//         window.location.href='upload.php?success';
//         </script>
//   <?php


//  } else { 
// //if it failed
// ?>

// <script>
// alert('deletion unsuccessful');
//       window.location.href='upload.php?fail';
//       </script>



// // <?php
//  } 
            
    }

?>