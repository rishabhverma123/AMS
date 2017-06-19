<?php
	$host="localhost";
	$username="root";
	$password="";
	$database="project";
	
	
	global $connection;
	 $connection=mysqli_connect($host,$username,$password,$database);
	
	if(!$connection)
	{
		die("connection failed:".mysqli_error());
	}
	
?>