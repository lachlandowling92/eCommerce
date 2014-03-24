<?php
try
{
	//Logs in to festival database with username and password
	$pdo = new PDO('mysql:host=localhost;dbname=eCommerce','root','root');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}
catch(PDOException $e)
{
	
}
/*
try
{
	//Logs in to festival database with username and password
	$pdo2 = new PDO('mysql:host=mysql.ict.swin.edu.au; dbname=s1627600_db', 's1627600', '011292');
	$pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo2->exec('SET NAMES "utf8"');
}
catch(PDOException $e)
{
	
}
*/
?>