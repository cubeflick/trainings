<html>
<head>
</head>
<style>
.style
{
background-color:white;
height:290px;
width:500px;
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

<body style="background-image:url(admin/images/bg.jpg); width:960; margin:auto; padding-top:150;">
<div align="center">
<p><font size="+5"></font></p>
<div class="style"/>

<?php
session_start();
include_once('rgstrdata.php');

if($_GET['id'])
{
$id = $_GET['id'];
}
else {
echo $id = $_POST['id']; 

}


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

$id = test_input($_POST["id"]);

$role=test_input($_POST["type"]);   
  
$update= "update registered set role='$role' where id= '$id' ";


$update1=mysql_query($update);
if(($update1))
{ 
echo "successfully updated";
//$id = test_input($_POST["id"]);
//header("location:update2.php");
}
else{
echo "not updated";
}
}

$select=mysql_query("select * from registered where id='$id'");

$r= mysql_fetch_array($select);
   
   
    $name=$r['name'];
    $email=$r['email'];
    $password=$r['password'];
    $path=$r['imgpath'];
    $role=$r['role'];
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<header>
<h1>Update Data</h1></header>

<form name="register"  enctype="multipart/form-data"  method="post" >
<input type="hidden" name="id" value="<?php echo $id;?>" >
<strong>User:</strong> <b class="spacing"><?php echo $r['name'] ?></b><br><br>

Role:&nbsp;&nbsp;<select id="type" name="type">
  <option value="user">User</option>
 <option value="admin">Admin</option>
 </select><br><br><br/><br/>

<input type="submit" value="update" /><p><br><a href="logout1.php">Logout</a>
<a style="margin-left:35px;" href="admin1.php">Back</a></p>

</form>
</div>
</body>
</html>