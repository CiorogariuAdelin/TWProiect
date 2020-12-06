<?php


$servername= "localhost";
$username="root";
$password="";
$name="tw";


$conn=mysqli_connect($servername,$username,$password,$name);

if(!$conn)
{
	die("Connection failed: ".mysqli_connect_error());
}
//mysql_select_db($database_name);

?>