<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connection.php';
	createUser();
}


function createUser()
{
	global $connect;
	
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	$query = " Insert into users(email,password) values ('$email','$password');";
	
	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);
	
}








?>