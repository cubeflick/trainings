<?php 
session_start();
include_once("rgstrdata.php");
$id =$_GET['id'];
function EditUserProfile()
{
global $con;
$id=$_GET['id'];
       $result = mysql_query("SELECT * FROM registered where id='$id'");
    while($r=mysql_fetch_array($result))
    {
    $name=$r['name'];
    $uname=$r['username'];
    $email=$r['email'];
    $password=$r['password'];
	$gender=$r['gender'];
	$path=$r['imgpath'];
	$role=$r['role'];
    return $r;
    }
}
$r = EditUserProfile();



function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<html>
<body>
<head>
<style>
.showbtn:hover
{
background-color: #FFFFFF;
color:8AC007;
}
.img
{
width:200px;
height:200px;
}
</style>
</head>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $id;?>">
Name:<br> <input type='text' name='name' id='name' maxlength='25'   style='width:247px' value="<?php echo $r['name'] ?>"/><br>
Image:<br><img class="img" src="<?php echo $r['imgpath'] ?>"/><br>
User Name:<br> <input type='text' name='username' id='username' maxlength='20' style='width:248px'    value="<?php echo $r['username'] ?>"/><br>
Role:<br> <input type="text" name="role" id="role" value="<?php echo $r['role'] ?>"/><br>
Email:<br> <input type='text' name='email' id='email' maxlength='50' style='width:250px'   value="<?php echo $r['email'] ?>"/><br>
Gender:<br> <input type="text" name="gender" id="gender" value="<?php echo $r['gender'] ?>"/><br>
Password:<br> <input type='text' name='password' id='password' maxlength='25'     style='width:251px' value="<?php echo $r['password'] ?>"/><br>
<input type="button" value="edit" onClick="parent.location='update2.php'"/>
</form>
</body>
</html>