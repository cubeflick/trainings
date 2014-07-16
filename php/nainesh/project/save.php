<?php
include('rgstrdata.php');

if(!empty($_POST))
{
$uname=$_POST['username'];
$name=$_POST['name'];
$pass=$_POST['password'];
$mail=$_POST['emailid'];
$sex=$_POST['gender'];


$query1 = "SELECT * FROM `registered` WHERE `email` = '$mail' ";

$query2 = "SELECT * FROM `registered` WHERE `username` = '$uname' ";

$result = mysql_query($query1);

$result1 = mysql_query($query2);

if (mysql_num_rows($result)>0){
 echo "email already registered";
} 

elseif (mysql_num_rows($result1)>0){
  echo "user already exists";
} else {
$insert1= "insert into registered (username, name, password, email, gender) values ('$uname','$name','$pass','$mail','$sex')";
//echo "no";
}
$result2 = @mysql_query($insert);
$result3 = @mysql_query($insert1);


/*if($result2)
{
echo "success";
}
else{
echo "wrong";
}*/
if($result3)
{
echo "success";
}
else{
echo "wrong";
}
/*if (!isset($_POST['submit'])) 
{ echo "form successfully submitted";// if page is not submitted to itself echo the form
}
else {
echo "form not submitted";
}*/}
?>