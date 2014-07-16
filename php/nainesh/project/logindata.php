<?php

$db_host="localhost";
$db_username="root";
$db_password="";
$db_name="logindatabase";


$con= mysql_connect(''.$db_host.'',''.$db_username.'',''.$db_password.'') or die ("could not connect to mysql");

$db=mysql_select_db($db_name,$con) or die ("no database");





?>