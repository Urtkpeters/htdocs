<?PHP
	$pass = $_GET["pw"];
	
	$pHash = hash('sha512',$pass);
	
	$query = 'select passwordHash from users where userid = 1';
	foreach($db->query($query) as $row) 
	{
		$dbPass = $row['passwordHash'];
	}
	
	if($pHash == $dbPass)
	{
		$passwordCorrect = true;
	}
?>