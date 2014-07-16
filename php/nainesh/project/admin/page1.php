<?php

include('rgstrdata.php');

$id=$_GET['id'];

$data = mysql_query("SELECT * FROM registered where id= ' $id '") 
 or die(mysql_error());
 //Print "<table border cellpadding=3>";

echo "<a>These are details:</a>";
while($info = mysql_fetch_array( $data )) 
 { 
 echo "<a>"; 
 //echo "<br/>";
 
 echo "<b> " .$info['role'] . "</b> " ;
 echo '<a href="update2.php?id='  .$info['id']  . '">edit role</a>';
  } 
 
?>