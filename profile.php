


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
    <link rel="stylesheet" href="popup.css">
    <title>index</title>
    <style>
        .popup{
            margin-top: 100px;
        }
    </style>
    
</head>
<body>

    <!--here we create our navigationn bar of our web site-->
    <Section id="header">
        <div>
            <ul id="navbar">
                <li><a  href="lindex.php">Home</a></li>
                <li><a href="lshop.html">Shop</a></li>
                <li><a href="lblog.html">Blog</a></li>
                <li><a href="labout.html">About</a></li>
                <li><a href="lcontact.html">Contact</a></li>
                
                

               
                <li><a href="movie.html">MiniTV</a></li>
                <div class="containe" >
                    <button  type="submit" class="btnn" onclick="openPopup()">logout</button>
                    <div class="popup" id="popup" style="margin-top:10%;">
                        <!-- <img style="align-items: center;" src="img/404-tick.png" alt=""> -->
                         <h2>thank you</h2>
                         <p>you want logged out</p>
                         <button  type="button" onclick="closePopup()">OK</button>
                    </div>
                </div>
                <li><a class="active" style="padding-left: 520px;" href="profile.php">myprofile</a></li> 
                
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

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<style>
        body{
            /* background-color: #ddd; */
            background-image: url("https://wallpaperaccess.com/full/7861225.jpg");
           background-size: cover;
        }
        div{
            /* margin-bottom: 30px; */
            /* margin-top: 30px; */
        }
        h1{
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            
        }
        .bimage{
            height: 500px;
        }
        img{
            display: flex;
            flex-direction: column;
            height: 250px;
            width: 250px;
            /* padding-bottom: 50px; */
            justify-content: center;
            align-items: center;
            margin-left: 550px;
            border-radius: 140px;
            box-shadow: 5px 5px 5px 5px orange;
        }
        .dive{
            color: brown;
            text-decoration: underline;
        }
        .divtwo{
           color: cornflowerblue;
           text-decoration: double;
        }
		table {
            padding-top: 50px;
            margin-top: 50px;
            background-color: gainsboro;
			border-collapse: collapse;
            border: none;
            box-shadow:  5px 5px 5px 5px orchid;
			width: 50%;
			margin: auto;

		}
		th, td {
            padding-top: 50px;
            margin-top:50px ;
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
	</style>
</head>
<body>
    <!-- <img class="bimage" src="https://e1.pxfuel.com/desktop-wallpaper/910/222/desktop-wallpaper-steam-community-guide-pink-profile-backgrounds-aesthetic-dark-pink-thumbnail.jpg"> -->
    
	<h1 class="dive">User Profile</h1>

    <div>
    <?php echo "<img src='Images/".$row['image']."' >"; ?>
    </div>
    <h1 class="divtwo">Welcome <?php echo $row['fname']; ?> <?php echo $row['lname']; ?></h1>

	<table>
		<!-- <tr>
			<th>Field</th>
			<th>Value</th>
		</tr> -->
        
        <!-- <tr class="first_tr">
			<td>First Name</td>
			<td class="first_td"></td>
		</tr> -->

		<!-- <tr>
			<td>First Name :</td>
			<td><?php echo $row['fname']; ?></td>
		</tr>
		<tr>
			<td>Last Name :</td>
			<td><?php echo $row['lname']; ?></td>
		</tr> -->
		<tr>
			<td>Your Email :</td>
			<td><?php echo $row['email']; ?></td>
		</tr>
		<tr>
			<td>Your Phone number :</td>
			<td><?php echo $row['phone']; ?></td>
		</tr>
	</table>

</body>
</html>
<script>
    let popup=document.getElementById("popup");
    function openPopup(){
        popup.classList.add("open-popup");
    }
    function closePopup(){
        popup.classList.remove("open-popup");
        location.href = "http://localhost/miniproject2/index.php";
    }
</script>
</body>
</html>