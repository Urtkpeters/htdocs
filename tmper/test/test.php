<?php
	$device = $_GET["device"];
	$phone = $_GET["phone"];
	$smscenter = $_GET["smscenter"];
	$textdata = $_GET["text"];
	
	$headers = getallheaders();
	
	if(empty($device))
	{
		$device = $headers["device"];
	}
	
	if(empty($phone))
	{
		$phone = $headers["phone"];
	}
	
	if(empty($smscenter))
	{
		$smscenter = $headers["smscenter"];
	}
	
	if(empty($textdata))
	{
		$textdata = $headers["textdata"];
	}
	
	//Create database connection
	$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8mb4', 'admin', '');
	
	//Execute insert statement into the database
	$stmt = $db->prepare("insert into sms_storage (device, phone, smscenter, textdata, timestamp) values (:device,:phone,:smscenter,:textdata,now())");
	$stmt->execute(array(':device' => $device, ':phone' => $phone, ':smscenter' => $smscenter, ':textdata' => $textdata));
	
	echo $stmt->rowcount();

?>