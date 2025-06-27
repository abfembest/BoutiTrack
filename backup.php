<?php
include 'db_connect.php'; 
//$backup = $_GET['backup'];
$sql = "BACKUP DATABASE joe
TO DISK = 'C:\dbbackup\testDB.bak'
WITH DIFFERENTIAL";

if (mysqli_query($connect,$sql)) {
	echo "Backup was successful.";
	# code...
}
?>