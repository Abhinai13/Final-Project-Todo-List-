<?php
try {
	require_once '../conn/dbConn.php';
} catch (Exception $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
$sql = "INSERT INTO users (firstname, lastname, email,password, create_date) VALUES ('Peter', 'Parker', 'pparker@mail.com','welcome', CURRENT_TIMESTAMP)";    
try {
  
$db->exec($sql);
} catch (PDOException $e) {
echo $sql . "<br>" . $e->getMessage();
}
echo 'done';
?>