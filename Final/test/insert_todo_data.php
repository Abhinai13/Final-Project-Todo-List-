<?php
try {
	require_once '../conn/dbConn.php';
} catch (Exception $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
$sql = "INSERT INTO todos (userid, title, body,complete, create_date,update_date) VALUES (2, 'Go to Movie', 'Go to movie in Dallas  on @09/08/2017',0, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";    
try {
  
$db->exec($sql);
} catch (PDOException $e) {
echo $sql . "<br>" . $e->getMessage();
}
echo 'done';
?>