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
	<div id="add_task_id" class="modal fade" tabindex="-1"></div>
	<div class="container-fluid">
		<div class="panel panel-default">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="pull-right">
					<div class="dropdown">
					    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
					    	<a href="#" class="chip tag"><?php echo substr($user["firstname"],0,1)."".substr($user["lastname"],0,1)?></a>
					    <?php echo $user["firstname"]." ".$user["lastname"]?>	
					    <span class="caret"></span></button>
					    <ul class="dropdown-menu">
					      <li><a href="#">Sign Out</a></li>
					      <li><a href="#">Info</a></li>
					    </ul>
					  </div>
				</div>	
			</div>	
		</div>
		<div class="page-header container-fluid">
		    <h3>To Do TASK List &nbsp;&nbsp; ...</h3>
		</div>
		<div class="panel-body container-fluid">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
						<div class="panel panel-default">
							<div class="panel-heading">								
								<div class="row text-center">
									<button type="button" class="btn btn-info btn-lg" id="addtask"><span class="glyphicon glyphicon-plus"></span>  ADD TASK</button>
									<!--
									<h4><a href="javascript:addTask()" style="text-decoration: none" id="addtask"><span class="glyphicon glyphicon-plus"></span> &nbsp;&nbsp;
										  ADD TASK </a></h4>
										-->
								</div>	
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid">	
					<div class="row">
					<!-- begin Left Content -->
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3><span class="label label-success"><span class="glyphicon glyphicon-remove-circle">&nbsp;Active</span></span></h3>
								</div>
								<div class="panel-body">

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
												<?php
														for ($i = 1; $i <=count($id); $i++)
															{
																if($complete[$i] == "0"){
																	echo 
																	"<div class='row'>
																		<div class='col-lg-9 col-md-9 col-sm-9 col-xs-9'>
																			<strong>".$title[$i]."</strong>
																			<blockquote>".$body[$i]."</blockquote>
																		</div>
																		<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
																			<span class='pull-right'>
																				<a href='#'' class='btn btn-default btn-md'>
															          <span class='glyphicon glyphicon-pencil'></span> 
															        </a> &nbsp;
															        <a href='#'' class='btn btn-default btn-md'>
															          <span class='glyphicon glyphicon-trash'></span> 
															        </a>
															      </span>
																		</div>
																		<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
																			<span class='text-muted'><small>Created: ".$create_date[$i]."</span><span class='text-muted pull-right'> Modified: ".$update_date[$i]."</small></span>	
																		</div>
																	</div><hr/>";
																}
														}
												?>	
											</div>

										</div>
									</div>
							</div>
					</div>
					<!-- Begin Right Content -->
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> 
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3><span class="label label-success">
										<span class="glyphicon glyphicon-ok-sign"> Completed</span></span></h3>
								</div>								
								<div class="panel-body">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
												<?php
												for ($i = 1; $i <=count($id); $i++)
															{
																if($complete[$i] == "1"){
																	echo 
																	"<div class='row'>
																		<div class='col-lg-9 col-md-9 col-sm-9 col-xs-9'>
																			<strong>".$title[$i]."</strong>
																			<blockquote>".$body[$i]."</blockquote>
																		</div>
																		<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
																			<span class='pull-right'>
																				<a href='#'' class='btn btn-default btn-md'>
															          <span class='glyphicon glyphicon-pencil'></span> 
															        </a> &nbsp;
															        <a href='#'' class='btn btn-default btn-md'>
															          <span class='glyphicon glyphicon-trash'></span> 
															        </a>
															      </span>
																		</div>
																		<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
																			<span class='text-muted'><small>Created: ".$create_date[$i]."</span><span class='text-muted pull-right'> Modified: ".$update_date[$i]."</small></span>	
																		</div>
																	</div><hr/>";
																}
														}
												?>	
											</div>
								</div>							
							</div>	
						</div>
					</div>
				</div>
		</div>
	</div>
		</div>
		<script src="/todo/resources/js/bootstrap.min.js"></script>
	</body>
</html>