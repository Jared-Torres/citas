<?php 
	$server = 'localhost';
	$username = 'root';
	$password ='';
	$database = 'gestor-citas';

	try{
		$conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
		//$conn = mysqli_connect('localhost','root','','commerce');
	} catch (PDOException $e){
		die('Connected failed: '.$e->getMessage());
	}

?>