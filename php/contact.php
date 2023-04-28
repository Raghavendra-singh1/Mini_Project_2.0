
<?php
include 'db.php'; 
// $connection_detail=mysqli_connect("localhost","root","","userform");
$name=$_POST['name'];
$email=$_POST['email'];
$sub=$_POST['sub'];
$msg=$_POST['msg'];
if(isset($_POST['save'])){
    $insert_query="INSERT INTO users(name,email,sub,msg) 
    VALUES ('$name','$email','$sub','$msg')";
    if(mysqli_query($conn,$insert_query)){
      echo "one record inserted succefully";
    }
    else{
      echo "unable to store the record";
    }
}
?>