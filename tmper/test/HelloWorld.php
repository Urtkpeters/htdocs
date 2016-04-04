<?php
   echo 'Hello world';
?>
<p>&nbsp;</p>
<?PHP

/*phpinfo();*/

$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8mb4', 'admin', '');

echo 'Connection opened';
echo '<p>&nbsp;</p>';

//TxtData - TxtString
foreach($db->query('SELECT * FROM TxtData') as $row) 
{
	echo $row['TxtString'];
}

?>