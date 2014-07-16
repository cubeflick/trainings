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
 $id=$info['id'];
  }
//echo $name;
$_SESSION['name']=$name;

 ?>
 


<html>

<head>
<title>Admin Page</title>
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
width:150px;
height:150px;
padding-top:17px;
}
.edit
{
position:relative;
left:756px;
bottom:170px;
}
.edit1
{
position:relative;
left:550px;
bottom:213px;
}
.logout
{
position:relative;
left:920px;
bottom:252px;
}
.user
{
position:relative;
bottom:-6px;
}
.user1{height:180px; text-transform:capitalize;}
.rol{
background-color:#669966;
display: block;
    height: 22px;
    line-height: 23px;
    padding: 0 0 0 10px;
    text-decoration: none;
    width: 65px;
	color:white;}
	.rol:hover{background-color:green;}
.page
{
margin-left: 400px;
}
.page li
{
list-style: none;
display:inline-block;
}
.page li a, .current
{
display: block;
padding: 5px;
text-decoration: none;
color: #8A8A8A;
}
.current
{
font-weight:bold;
color: #000;
}
.button
{
padding: 5px 15px;
text-decoration: none;
background: #333;
color: #F3F3F3;
font-size: 13PX;
border-radius: 2PX;
margin: 0 18PX;
display: block;
float: left;
}
.button1
{
padding: 5px 15px;
text-decoration: none;
background: #333;
color: #F3F3F3;
font-size: 13PX;
border-radius: 2PX;
margin: 0 18PX;
display: block;
float: right;
position:relative;
bottom:50px;
}
.box
{
position:relative; left:704px;}
.box1
{
position:relative; left:730px;}
.menu
{
position:absolute;
left:1005px;
top:49px;
}
.menu1
{
position:relative;
left:450px;
top:41px;
}
.menu li
{
list-style-type:none;

}
.menu ul li ul {
display:none;
}
.menu ul li:hover ul{
display:block;
}

.style
{
background-color:#FFFFFF;
height:620;
}
.admin{position:relative; top:8px; left:15px; color:#000000;}
.admin1{background-image:url(admin/images/buttony.png); background-repeat:no-repeat; background-size:150px 30px; padding:0 10px; text-decoration:none; color:white;}
.profile{background-image:url(admin/images/sidebar_menu_top_a.gif); padding:0 10px; text-decoration:none; color:white; line-height:22px;}
</style>
</head>

<body style="width:960px; margin:auto; padding-top:39px; background-image:url(image/bg.jpg);">
<div class="style">
<p class="admin"><strong>Welcome: <?php echo $_SESSION['type']; ?></strong></p>
<div align="center" style="border-top:1px double #000000;"><a href="#"><img class="img" src="<?php echo $path ?>"/></a></div><br>
<div class="menu">
<ul>
	<li class="menu2"><a class="admin1" href=""><?php echo $_SESSION['name']; ?><!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul class="menu3">
                        	<li><a href="update1.php" class="profile" title="">Edit Profile</a></li>
                        	<li><a href="passchange.php" class="profile" title="">Change Password</a></li>
                        	<li><a href="image.php" class="profile" title="">Edit Profile Picture</a></li>
                       		<li><a class="profile" href="logout1.php">Logout</a></li>
						</ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
     </li>
</ul>
</div>


<a style="position:relative; bottom:-50px; left:18px;" href="admin1.php?role=user&id=<?php echo $id;?>"><button>See users detail</button></a><br>
<br>
<?php
include('rgstrdata.php');
$start=0;
$limit=3;
if(isset($_GET['role']))
{
$role=$_GET['role'];
}

if(isset($_GET['id']))
{
$id=$_GET['id'];
	$start=($id-1)*$limit;
}

$search_result = '';
if(isset($_REQUEST['search'])) { 
$search_result = " AND username	= '".$_REQUEST['search']."'" ;
}

echo '<form action="admin1.php?id='.$id.'" method="get" ><input class="box" type="search" name="search"/><input class="box1" type="submit" value="search"/></form>';

echo "<ul class='user1' style='border-bottom:1px double #000000'>";
$query=mysql_query("select * from registered where role='user' {$search_result}  LIMIT $start, $limit");

while($info = mysql_fetch_array( $query )) 
 { 
 echo '<div class="user">'; 
 echo "<b> ".$info['username'] .  "</b><br> ";
 echo '<a class="rol" href="update2.php?id='  .$info['id']  . '">edit role</a></div><br>';
 }
 echo "</ul>";
 $rows=mysql_num_rows(mysql_query("select * from registered"));
$total=ceil($rows/$limit);


if($id>1)
{
	echo "<a href='admin1.php?id=".($id-1)."' class='button'>PREVIOUS</a>";
}
echo "<ul class='page'>";
		for($i=1;$i<=$total;$i++)
		{
			if($i==$id) { echo "<li class='current'>".$i."</li>"; }
			
			else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
		}

echo "</ul>";

if($id!=$total)
{
	echo "<a href='admin1.php?id=".($id+1)."' class='button1'>NEXT</a>";
}


?>

</div>
</body>

</html>