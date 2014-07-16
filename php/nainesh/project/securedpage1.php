<?php

// Inialize session
session_start();

// Check, if type session is NOT set then this page will jump to login page
if (!isset($_SESSION['type'])) {
header('Location: login1.php');
}

?>
<?php
include('rgstrdata.php');

 $uname=$_SESSION['username'];
$pass=$_SESSION['password'];

// Retrieve username and password from database according to user's input
$login = mysql_query("SELECT * FROM registered WHERE (username = '$uname') and (password = '$pass') ");

while($info = mysql_fetch_array( $login )) 
 { 
  $name=$info['name'];
  $path=$info['imgpath'];
  }
//echo $name;
//$_SESSION['name']=$_POST['name'];
 ?>
<html>
<head>
<title>Secured Page</title>
<script src="jquery-1.11.1.min.js">
</script>
<script>
$(document).ready(function(){
$("#hd").hide();
  $("div").click(function(){
    $("#hd").show();
	});
	$("div").blur(function(){
    $("#hd").hide();
	});
		});
</script>
</head>
<style>
.img
{
width:200px;
height:200px;
}
</style>
<body>
<p>Welcome: <?php echo $name; ?></p>

<div><a href="#"><img class="img" src="<?php echo $path ?>"></a></div><br>
<a href="image.php" id="hd">Edit profile picture</a>

<p>This is secured page with session: <b><?php echo $_SESSION['type']; ?></b><p><a href="update1.php">Edit Profile</a></p>
<br>You can put your restricted information here.</p>
<p><a href="logout1.php">Logout</a></p>

</body>

</html>