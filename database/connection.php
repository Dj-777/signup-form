<?php
	$link=mysqli_connect("localhost","root","","signup");
	if($link->connect_error){
		die("Connection Failed:" .$link->connect_error );
	}
	else
	{
		echo "Connection Successfully";
	}
?>