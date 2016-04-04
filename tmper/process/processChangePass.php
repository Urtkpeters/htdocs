<?PHP
	$newPass = $_GET["npw"];
	
	$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8mb4', 'admin', '');
	
	include 'checkPassHash.php';
	
	if($passwordCorrect == true)
	{
		$newPHash = hash('sha512',$newPass);
		
		$stmt = $db->prepare('update users set passwordHash = :newPHash where userId = 1');
		$stmt->execute(array(':newPHash' => $newPHash));
		
		$results = 'Password changed.';
	}
	else
	{
		$results = 'Old password incorrect.';
	}
	
	echo $results;
?>