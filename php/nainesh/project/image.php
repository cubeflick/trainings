<html>
<body>
<?php
session_start();
include_once('rgstrdata.php');
$uname=$_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

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
    
$update= "update registered set imgpath='$path' where username= '$uname' ";


$insert1=mysql_query($update);
if(($insert1))
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
   
    
    $path=$r['imgpath'];

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="post">
Upload Image:<input type="file" name="file"/><br><br>
<input type="submit" value="upload" onClick="parent.location:'update.php'"/>
</form>
</body>
</html>