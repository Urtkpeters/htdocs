<?php
	$loggedIn = false;

	if($pageCode == 'login')
	{
		include 'checkPassHash.php';
		
		if($passwordCorrect == true)
		{
			$loggedIn = true;
			$stmt = $db->prepare('update sessions set loggedIn = 1 where sessionID = :sessionID');
			$loggedInTime = $stmt->execute(array(':sessionID' => $sessionID));
			$pageCode = 'home';
		}
	}
	else
	{
		$loggedInDB = 0;
		
		$query = 'select loggedIn from Sessions where sessionID = ' . $sessionID;
		foreach($db->query($query) as $row) 
		{
			$loggedInDB = $row['loggedIn'];
		}
		
		if($loggedInDB == 1)
		{
			$query = 'select( case when TimeStamp < now() then 0 else 1 end ) as "ActiveTime" from sessions where sessionID = ' . $sessionID;
			$loggedInTime = 0;
			
			foreach($db->query($query) as $row) 
			{
				$loggedInTime = $row['ActiveTime'];
			}
			
			if($loggedInTime == 1)
			{
				$loggedIn = true;
				
				if($pageCode == 'new')
				{
					$pageCode = 'home';
				}
			}
		}
	}
	
?>