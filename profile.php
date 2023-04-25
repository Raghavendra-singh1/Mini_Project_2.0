


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/form.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"  />
    <script src="script.js"></script>

    <title>index</title>
</head>
<body>

    <!--here we create our navigationn bar of our web site-->
    <Section id="header">
        <div>
            <ul id="navbar">
                <li><a class="active" href="lindex.php">Home</a></li>
                <li><a href="lshop.html">Shop</a></li>
                <li><a href="lblog.html">Blog</a></li>
                <li><a href="labout.html">About</a></li>
                <li><a href="lcontact.html">Contact</a></li>
                
                

               
                <li><a href="minitv.html">MiniTV</a></li>
                <li><a  href="index.php">Logout</a></li> 
                
                <li><a style="padding-left: 520px;" href="profile.php">myprofile</a></li> 
                
            </ul>

        </div>
        
    </Section>
<?php
session_start();
if(!isset($_SESSION['unique_id'])){
  //redirect to login page if user is not logged in
  header("Location: login.php");
}

//connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userform";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

//fetch user data from the database
$unique_id = $_SESSION['unique_id'];
$sql = "SELECT * FROM users WHERE unique_id = $unique_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

//display the user data
echo "Name: " . $row['fname'] . "<br>";

echo "Email: " . $row['email'] . "<br>";
echo "Phone: " . $row['phone'] . "<br>";

mysqli_close($conn);
?>

</body>
</html>