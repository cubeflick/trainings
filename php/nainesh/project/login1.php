<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['username'])) {
header('Location: securedpage1.php');
}
?>
<html>
<head/>

<style>
.style
{
background-color: #FFFF99;
height:450px;
width:500px;
}
</style>

<body style="background-color: #333333">
<div align="center">
<p><font size="+5"></font></p>
<div class="style"/>

<header>
<h1>Login</h1></header>

<?php
if( isset( $_SESSION['errormsg'] ) ) {
  // do the output
  echo '<div style="Color:#FF0000" text-align="center">' .$_SESSION['errormsg']. '</div>';
  // delete the message from the session, so that we show it only once
  unset( $_SESSION['errormsg'] );
}
if( isset( $_SESSION['errormsg1'] ) ) {
  // do the output
  echo '<div style="Color:#FF0000" text-align="center">' .$_SESSION['errormsg1']. '</div>';
  // delete the message from the session, so that we show it only once
  unset( $_SESSION['errormsg1'] );
}
?>

<form action="loginproc1.php" method="post" >
User Name:&nbsp; <input type="text" name="username" /><br /><br /><br/><br/>
Password:&nbsp;&nbsp; <input type="password" name="password" id="password"/><br /><br /><br/><br/>
Login Type:&nbsp;&nbsp;<select id="type" name="type" >
 <option  value="">select an option</option>
 <option value="user">User</option>
 <option value="admin">Admin</option>
 </select><br><br><br/><br/>
<input type="submit" value="Login" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="cancel" onClick="header(Loctaion:'login1.php')"/>
</form>

</body>
</html>
