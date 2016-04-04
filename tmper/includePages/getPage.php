<?php
	switch($pageCode)
	{
		case 'new':
			$pageContents = file_get_contents('loginPage.html');
			break;
		case 'login':
			$pageContents = 'failure';
			break;
		case 'home':
			$pageContents = file_get_contents('homePage.html');
			break;
		case 'settings':
			$pageContents = file_get_contents('settingsPage.html');
			break;
		default:
			$pageContents = '<p>No Page Found</p>';
			break;
	}
	
	echo $pageContents; 
?>