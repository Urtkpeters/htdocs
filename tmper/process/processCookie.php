<?php
	if(isset($_COOKIE['sessionCookie']))
	{
		$sessionID = $_COOKIE["sessionCookie"];
	}
	else
	{
		$sessionID = rand(0 , 999999999);
		
		setcookie( "sessionCookie", $sessionID, time()+7200, "/", "odonen.ddns.net", 0);
		
		// At this point the session in the database is not logged in.
		$stmt = $db->prepare("insert into sessions (sessionID, loggedIn, TimeStamp) values (:sessionID,0,date_add(now(),INTERVAL 2 hour))");
		$stmt->execute(array(':sessionID' => $sessionID));
	}
?>