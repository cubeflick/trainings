function  updateUserDetailes($uname, $name, $password, $email)
{
  $sql="UPDATE registered SET username='$uname', name='$name', password='$password', email=' $email' where  username='$uname'";
  $result=mysql_query($sql);

  echo "<font color=red>Thanks your information updated</font>";
  $result = mysql_query("SELECT * FROM registered where username='$uname'");
    while($r=mysql_fetch_array($result))
    {
    $uname=$r[1];
    $name=$r[2];
    $password=$r[3];
    $email=$r[4];

    }
}  