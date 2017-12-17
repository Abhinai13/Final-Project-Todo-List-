<?php
try {
	require('../config/config.php');	
	require_once(__ROOT__.'/conn/dbConn.php');
} catch (Exception $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
//$sql = "INSERT INTO todos (userid, title, body,complete, create_date,update_date) VALUES (2, 'Go to Movie', 'Go to movie in Dallas  on @09/08/2017',0, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";  
$sql = "CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `create_date` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;";

try {
  
$db->exec($sql);
} catch (PDOException $e) {
echo $sql . "<br>" . $e->getMessage();
}
echo 'done';
?>


