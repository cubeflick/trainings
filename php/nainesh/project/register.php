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
document.getElementById('error3').style.display= 'none';
}
function myfunction4()
{
document.getElementById('error4').style.display= 'none';
}
function myfunction5()
{
document.getElementById('error5').style.display= 'none';
}
function myfunction6()
{
if(document.register.name.value==''){
document.getElementById('error').style.display= 'block';
}}
function myfunction7()
{
if(document.register.username.value==''){
document.getElementById('error1').style.display= 'block';
}}
function myfunction8()
{
if(document.register.password.value==''){
document.getElementById('error2').style.display= 'block';
}}
function myfunction9()
{
if(document.register.password2.value==''){
document.getElementById('error3').style.display= 'block';
}}
function myfunction10()
{
if(document.register.email.value==''){
document.getElementById('error4').style.display= 'block';
}}
function myfunction11()
{
if(document.register.gender.value==''){
document.getElementById('error5').style.display= 'block';
}}
</script>
</head>
<style>
.style
{
background-color:#666666;
height:1080px;
width:670px;
}
.spacing
{
margin-left:30px;
}
.spacinga
{
margin-left:0px;
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

<body style="background-color:#000000">
<div align="center">
<p><font size="+5"></font></p>
<div class="style"/>

<?php

include('rgstrdata.php');
// define variables and set to empty values
$unameErr = $nameErr= $passErr = $passwErr= $emailErr = $genderErr = "";
$uname = $name= $pass= $passw= $email = $gender = $file= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   if (empty($_POST["username"])) {
     $unameErr = "*User Name is required";
   }
    else
	 {
     $uname = test_input($_POST["username"]);
   }
  
   if (empty($_POST["name"])) {
     $nameErr = "*Name is required";
   } else {
     $name = test_input($_POST["name"]);
   }
   
   if (empty($_POST["password"])) {
     $passErr = "*Password is required";
   } else {
     $pass = test_input($_POST["password"]);
   }
   
   if (empty($_POST["password2"])) {
     $passwErr = "*Confirm your Password";
   } else {
     $passw = test_input($_POST["password2"]);
  
   if ($_POST['password']!= $_POST['password2'])
 {
     $passwErr= "Oops! Password did not match! Try again. ";
 }}
   
   if (empty($_POST["email"])) {
     $emailErr = "*Email is required";
   } else {
     $email = test_input($_POST["email"]);
	
   }
    
   if (empty($_POST["gender"])) {
     $genderErr = "*select an option";
   } else {
     $gender = test_input($_POST["gender"]);
   }

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2000000)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    /*echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";*/
	$path="upload/" . $_FILES["file"]["name"];
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
	  //$path="upload/" . $_FILES["file"]["name"];
	  
    } else {
	
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
	  //$path="upload/" . $_FILES["file"]["name"];
	  
    	}
  }
} else {
  echo "Invalid file";
}


$query1 = "SELECT * FROM `registered` WHERE `email` = '$email' ";
    $result = mysql_query($query1); 
$query2 = "SELECT * FROM `registered` WHERE `username` = '$uname' ";
     
	 $result1 = mysql_query($query2);

if (mysql_num_rows($result)>0){
 $emailErr="*email already registered";
} 
elseif (mysql_num_rows($result1)>0){
$unameErr="*user already exists";
}elseif($_POST['password']!= $_POST['password2']){
//echo 'hello';
}
else {
$insert= "insert into registered (username, name, password, email, gender,imgpath,role) values ('$uname','$name','$pass','$email','$gender','$path','user')";
$insert1=mysql_query($insert);







if(($insert1))
{ 
echo "form successfully submitted";
}
else
{
echo "wrong";
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
<h1>Register Here..</h1></header>

<form name="register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="post" >
Name: <input type="text" class="spacing" name="name" id="name" onClick="myfunction()" onBlur="myfunction6()"/><br><div style="height:22px"><div class="error" id="error" style="color:#FF0000"> <?php echo $nameErr;?></div></div><br /><br />
Image: <input type="file" class="spacinge" name="file"/><br><br>
User Name: <input type="text" class="spacinga" name="username" onClick="myfunction1()" onBlur="myfunction7()"/><br><div style="height:22px"><div class="error" id="error1" style="color:#FF0000"> <?php echo $unameErr;?></div></div><br /><br />
Password: <input type="password" class="spacingb" name="password" onClick="myfunction2()" onBlur="myfunction8()"/><br><div style="height:22px"><div class="error" id="error2" style="color:#FF0000"> <?php echo $passErr;?></div></div><br /><br />
Confirm: <input type="password" class="spacingc" name="password2" onClick="myfunction3()" onBlur="myfunction9()"/><br><div style="height:22px"><div class="error" id="error3" style="color:#FF0000"> <?php echo $passwErr;?></div></div><br><br>
Email: <input type="text" class="spacingd" name="email" onClick="myfunction4()" onBlur="myfunction10()"/><br><div style="height:22px"><div class="error" id="error4" style="color:#FF0000"> <?php echo $emailErr;?></div></div><br /><br />
Gender:<input type="radio" name="gender" value="male" onClick="myfunction5()" onBlur="myfunction11()"> male
<input type="radio" name="gender" value="female" onClick="myfunction5()" onBlur="myfunction11()"> female<br>
<div style="height:22px"><div class="error" id="error5" style="color:#FF0000"> <?php echo $genderErr;?></div></div><br><br>

<input type="submit" value="register" /><br><br>
<p>or registered users:</p>
&nbsp;&nbsp;<a href="login1.php">signin</a>
</form>

</div>

</body>
</html>