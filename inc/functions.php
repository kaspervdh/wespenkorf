<?php

function connectToDatabase()
{
	$host	= "localhost";
	$user	= "root";
	$pass	= "";
	$dB		= "wespenkorf";
	
	$connect = mysqli_connect($host,$user, $pass, $dB);
	
	return $connect;
}



?>


