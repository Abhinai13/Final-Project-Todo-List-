<?php
	require('./../config/config.php');
	require_once(__ROOT__.'/repo/todos.php'); 
	session_start();
	$user = $_SESSION['user'];
	$array = array( 
	    "userid" => $user['id']
	); 
	$records = todos::findAllBy($array);	
	$sorted = array_reverse($records);
	$i=1;
	foreach ($sorted as $row) {
	   $id[$i] = $row['id'];
	        $title[$i] = $row['title'];
	        $body[$i] = $row['body'];
	        $complete[$i] = $row['complete'];
	        $create_date[$i] = $row['create_date'];
	        $update_date[$i] = $row['update_date'];
	        $i++;
	   }  		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>TO-DO</title>
		<link href="/todo/resources/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="/todo/resources/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
		<script type="text/javascript" src="/todo/resources/js/jquery-1.11.3-jquery.min.js"></script>
		<script type="text/javascript" src="/todo/resources/js/validation.min.js"></script>
		<link href="/todo/resources/css/style.css" rel="stylesheet" type="text/css" media="screen">
		<script type="text/javascript" src="/todo/resources/js/userhome.js"></script>
	</head>
	<body>
	<div class="signin-form">
			<div class="container">	
				<h3>USER HOME</h3>
				<p>
					Get the userid from the session.<br/>
					Display todo list of user. <br/>
					Add a new Todo item to the list. <br/>
					Edit exiting todo item. <br/>
					Delete to do item.
					<h4> other items to do </h4>
					<em>Signout</em> implementation <br/>
					<em>Bcrypt</em> password encryption <br/>
				</p>
				<div class="container">
					<?php

					 for ($i = 1; $i <=count($id); $i++) 
			    		{
			    		// Show entries
				        echo    
				            "<div class='row'>
				            <div>$id[$i]</div>
				            <div>$title[$i]</div>
				            <div>$body[$i]</div>
				            <div>$create_date[$i]</div>
				            <div>$update_date[$i]</div>
				            <div>
				            <!--
				               	<input type=\"button\" name=\"btnEdit\" value=\"EDIT\" onclick=\"javascript:showEditUser('divEdit','$id[$i]')\" />
				            	&nbsp;
				            	<input type=\"button\" name=\"btnDelete\" value=\"DELETE\" onclick=\"javascript:deleteUser('$id[$i]')\" />
				            -->
				            </div>
				            </div>";
				    	}
					?>	
				</div>
			</div>
		</div>
		<script src="/todo/resources/js/bootstrap.min.js"></script>
	</body>
</html>