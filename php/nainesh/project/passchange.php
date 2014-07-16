<html>
<head>
<script>
function myfunction()
{
document.getElementById('error').style.display= 'none';
}
function myfunction1()
{
document.getElementById('error1').style.display= 'none';
}
function myfunction2()
{
document.getElementById('error2').style.display= 'none';
}
function myfunction3()
{
if(document.register.password.value==''){
document.getElementById('error').style.display= 'block';
}}
function myfunction4()
{
if(document.register.pass1.value==''){
document.getElementById('error1').style.display= 'block';
}}
function myfunction5()
{
if(document.register.pass2.value==''){
document.getElementById('error2').style.display= 'block';
}}
</script>
</head>
<style>
.style
{
background-color:white;
height:500px;
width:500px;
}
.spacinga
{
margin-left:5px;
}
.spacingb
{
margin-left:13px;
}
.spacingd
{
margin-left:14px;
}
.margin
{
margin-right:50px;}
</style>

<body style="background-image:url(admin/images/bg.jpg);">
<div align="center">
<p><font size="+5"></font></p>
<div class="style"/>

<?php
session_start();
include_once('rgstrdata.php');


$uname=$_SESSION['username'];
$pass=$_SESSION['password'];  
$passErr = $passwErr = $npErr = "";
$pass = $passw = $np = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     if (empty($_POST["password"])) {
     $passErr = "*Password is required";
   } else {
     $pass = test_input($_POST["password"]);
    	}
   
   
   if (empty($_POST["pass1"])) {
     $npErr = "*New Password is required";
   } else {
     $np = test_input($_POST["pass1"]);
	   }
	   
	   if (empty($_POST["pass2"])) {
     $passwErr = "*Confirm your Password";
   } else {
     $passw = test_input($_POST["pass2"]);
 
 }
	
	$select=mysql_query("select * from registered where username='$uname' and password='$pass' ");
    $r= mysql_fetch_array($select);
    $password=$r['password'];
	
	if($_POST['password'] != $r['password'])
	{
	$passErr= "*password incorrect.";
	}
else if ($_POST['pass1'] != $_POST['pass2'])
 {
    $passwErr= "Oops! Password did not match! Try again. ";
 }	
 else
 {
$update= "update registered set password= '$np' where username= '$uname' ";

$update1=mysql_query($update);
if(($update1))
{ 
echo "successfully changed";
//header("location:update.php");
}
else{
echo "not updated";
}}
}


	
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<header>
<h1>Update Data</h1></header>

<form name="register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="post" >
Enter Password: <input type="password" class="spacingb" name="password" onClick="myfunction()" onBlur="myfunction3()"/><br>
<div style="height:22px"><div class="error" id="error" style="color:#FF0000"> <?php echo $passErr;?></div></div><br />
New Password: <input type="password" class="spacingd" name="pass1" onClick="myfunction1()" onBlur="myfunction4()"/><br>
<div style="height:22px"><div class="error" id="error1" style="color:#FF0000"> <?php echo $npErr;?></div></div><br>
Confirm Password:<input type="password" class="spacinga" name="pass2" onClick="myfunction2()" onBlur="myfunction5()"/><br>
<div style="height:22px"><div class="error" id="error2" style="color:#FF0000"> <?php echo $passwErr;?></div></div><br>
<input type="submit" value="update"/><br>
<p><a class="margin" href="admin1.php">Back</a><a href="logout1.php">Logout</a></p><br>

</form>

</body>
</html>