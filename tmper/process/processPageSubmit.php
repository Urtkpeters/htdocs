<?php
	$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8mb4', 'admin', '');
	
	include 'processCookie.php';
	
	$pageCode = $_GET["pc"];
	
	include 'processLogin.php';
	include 'getPage.php';
?>