<?php
try {
	require_once '../conn/dbConn.php';
} catch (Exception $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
//$sql = "INSERT INTO todos (userid, title, body,complete, create_date,update_date) VALUES (2, 'Go to Movie', 'Go to movie in Dallas  on @09/08/2017',0, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";  
$sql = "CREATE TABLE `todos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) unsigned NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` varchar(2000) NOT NULL,
  `complete` bit(1) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid_idx` (`userid`),
  CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;";

try {
  
$db->exec($sql);
} catch (PDOException $e) {
echo $sql . "<br>" . $e->getMessage();
}
echo 'done';
?>


