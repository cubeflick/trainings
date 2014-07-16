<?php

// Inialize session
session_start();

// Include database connection settings
include('rgstrdata.php');
if(!empty($_POST))
{
$uname=$_POST['username'];
$pass=$_POST['password'];
$typ=$_POST['type'];


// Retrieve username and password from database according to user's input
$login = mysql_query("SELECT * FROM registered WHERE (username = '$uname') and (password = '$pass') ");
$role=mysql_fetch_array($login);
$type=$role['role'];
$name=$role['name'];
/*while($info = mysql_fetch_array( $login )) 
 { 
 $name=$info['name'];
 } */
// Check username and password match
if($typ != $type)
{
$_SESSION['errormsg1'] = "*incorrect type";
header('Location: login1.php');
}
else if (mysql_num_rows($login) == 1 && $typ=='admin') {
// Set type session variable
$_SESSION['type'] =$_POST['type'];
$_SESSION['name'] =$role['name'];
$_SESSION['username'] =$_POST['username'];
$_SESSION['password'] =$_POST['password'];
// Jump to admin page
header('Location: admin1.php');
}
else if (mysql_num_rows($login) == 1 && $typ=='user')
{
$_SESSION['type'] =$_POST['type'];
$_SESSION['name'] =$role['name'];
$_SESSION['username'] =$_POST['username'];
$_SESSION['password'] =$_POST['password'];
header('Location: securedpage1.php');
}
else {
$_SESSION['errormsg'] = "*user name or password is incorrect";
  header( "location: login1.php");
}
}
?>