<?php
try
{
	//Logs in to festival database with username and password
	$pdo = new PDO('mysql:host=localhost;dbname=socialNetwork','root','root');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}
catch(PDOException $e)
{
	
}
?>