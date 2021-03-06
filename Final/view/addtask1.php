<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Login Form using jQuery Ajax and PHP MySQL</title>
		<link href="/todo/resources/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="/todo/resources/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
		<script type="text/javascript" src="/todo/resources/js/jquery-1.11.3-jquery.min.js"></script>
		<script type="text/javascript" src="/todo/resources/js/validation.min.js"></script>
		<link href="/todo/resources/css/style.css" rel="stylesheet" type="text/css" media="screen">
		<script type="text/javascript" src="/todo/resources/js/register.js"></script>
	</head>
	<body>
		
		<div class="signin-form">
			<div class="container">				
				<form class="form-signin" method="post" id="register-form">					
					<h2 class="form-signin-heading">New Task </h2><hr />					
					<div id="error">
						<!-- error will be shown here -->
					</div>
	
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Title" name="title" id="title" />
						<span id="check-e"></span>
					</div>					
					<div class="form-group">					
						<textarea class="form-control" placeholder="Description" name="description" rows="6" id="description"></textarea>
						<span id="check-e"></span>
					</div>							
					<hr />					
					<div class="form-group">
						<button type="button" class="btn btn-info btn-md" name="btn-add-task" id="btn-add-task"><span class="glyphicon glyphicon-plus"></span>  ADD TASK</button>
						<input type="hidden" name="actionType" value="ADDTASK"/>
					</div>				
			</div>			
		</div>		
		<script src="/todo/resources/js/bootstrap.min.js"></script>
	</body>
</html>