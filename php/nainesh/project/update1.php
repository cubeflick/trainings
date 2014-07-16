<html>
<head>
</head>
<style>
.style
{
background-color:white;
height:500px;
width:500px;
}
.spacing
{
margin-left:30px;
}
.spacinga
{
margin-right:30px;
}
.spacingb
{
margin-left:13px;
}
.spacingc
{
margin-left:23px;
}
.spacingd
{
margin-left:39px;
}
.spacinge
{
margin-left:0px;
}
</style>

<body style="background-image:url(admin/images/bg.jpg);">
<div align="center">
<p><font size="+5"></font></p>
<div class="style"/>

<?php
session_start();
include_once('rgstrdata.php');

$uname=$_SESSION['username'];
  
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  
   if (empty($_POST["name"])) {
     $nameErr = "*Name is required";
   } else {
     $name = test_input($_POST["name"]);
   }
   
      if (empty($_POST["email"])) {
     $emailErr = "*Email is required";
   } else {
     $email = test_input($_POST["email"]);
	   }
   
$update= "update registered set  name='$name', password='$pass', email='$email' where username= '$uname' ";


$update1=mysql_query($update);
if(($update1))
{ 
//echo "successfully updated";
header("location:update.php");
}
else{
echo "not updated";
}
}

$select=mysql_query("select * from registered where username='$uname'");

$r= mysql_fetch_array($select);
   
    $name=$r['name'];
    $email=$r['email'];
    $password=$r['password'];
    $path=$r['imgpath'];

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<header>
<h1>Update Data</h1></header>

<form name="register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data"  method="post" >
Name: <input type="text" class="spacing" name="name" id="name" value="<?php echo $r['name'] ?>" /><br><br>
<img src="<?php echo $r['imgpath'] ?>" width="100" height="100"/><br><br>
Email: <input type="text" class="spacingd" name="email" value="<?php echo $r['email'] ?>" /><br><br>

<input type="submit" value="update"/><br>
<p><a class="spacinga" href="admin1.php">Back</a><a href="logout1.php">Logout</a></p><br>

</form>

</body>
</html>