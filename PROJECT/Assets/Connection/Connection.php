<?php
$server="localhost";
$user="root";
$pass="";
$db="db_virtuallibrary";
$con=mysqli_connect($server,$user,$pass,$db);
if(!$con)
{
	echo "Database Error";
}
?>