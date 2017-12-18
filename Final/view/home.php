<?php
	require('./../config/config.php');
	require_once(__ROOT__.'/repo/todos.php'); 
	session_start();
	$user = $_SESSION['user'];
	$array = array( 
	    "userid" => $user['id']
	); 
	$records = todos::findAllBy($array);	
	if(!empty($records)){
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
	 }	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<base href="/~ap565/todo/" target="_blank">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>TO-DO</title>
		<link href="resources/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="resources/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
		<script type="text/javascript" src="resources/js/jquery-1.11.3-jquery.min.js"></script>
		<script type="text/javascript" src="resources/js/validation.min.js"></script>
		<link href="resources/css/style.css" rel="stylesheet" type="text/css" media="screen">
		<script type="text/javascript" src="resources/js/userhome.js"></script>
	</head>
	<body>
	<div id="add_task_id" class="modal fade" tabindex="-1"></div>
	<div id="delete_task_id" class="modal fade" tabindex="-1"></div>
	<div id="user_info_id" class="modal fade" tabindex="-1"></div>
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
					      <li><a href="#" onclick="javascript:getInformation(); return false;">Info</a></li>					     
					      <li><a href="#" onclick="javascript:logout(); return false;"> Sign Out</a></li>				
					    </ul>
					  </div>
				</div>	
			</div>	
		</div>
		<div class="page-header container-fluid">
			<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11"> 
		    <h3>TO DO TASKS&nbsp;&nbsp; ...</h3>
		 </div>
		 <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">	
		 	<br/>
		    <span class='pull-right'>																						
										<button type='button' class='btn btn-default btn-md' id='refresh' <input type="button" value="refresh" onclick='window.location.reload();'/><span class='glyphicon glyphicon-refresh'></span></button>
							</span>
			</div>
		</div>
		<div class="panel-body container-fluid">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
						<div class="panel panel-default">
							<div class="panel-heading">								
								<div class="row text-center">
									<button type="button" class="btn btn-info btn-lg" id="addtask"><span class="glyphicon glyphicon-plus"></span>  ADD TASK</button>
								</div>	
							</div>
						</div>
					</div>
				</div>

				<div id="edit_task_id" class="modal fade" tabindex="-1"></div>

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
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	<?php
										if(!empty($records)){
											for ($i = 1; $i <=count($id); $i++)
											{
												if($complete[$i] == "0"){
												echo 
													"<div class='row'>
														<div class='col-lg-9 col-md-9 col-sm-9 col-xs-9'>
															<strong>".$id[$i]."  ".$title[$i]."</strong>
																				<blockquote>".$body[$i]."</blockquote>
																			</div>
																			<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
																				<span class='pull-right'>
																					<button type='button' class='btn btn-default btn-md' id='edittask' onclick='javascript:editTask(".$id[$i].")'><span class='glyphicon glyphicon-pencil'></span></button>
																						 &nbsp;
																						 <button type='button' class='btn btn-default btn-md' id='deletetask' onclick='javascript:deleteTask(".$id[$i].")'><span class='glyphicon glyphicon-trash'></span></button>
																      		</span>
																				</div>
																				<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
																					<span class='text-muted'><small>Created: ".$create_date[$i]."</span><span class='text-muted pull-right'> Modified: ".$update_date[$i]."</small></span>	
																				</div>
																		</div><hr/>";
																	}
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
												if(!empty($records)){
														for ($i = 1; $i <=count($id); $i++)
																	{
																		if($complete[$i] == "1"){
																			echo 
																			"<div class='row'>
																				<div class='col-lg-9 col-md-9 col-sm-9 col-xs-9'>
																					<strong>".$id[$i]."  ".$title[$i]."</strong>
																					<blockquote>".$body[$i]."</blockquote>
																				</div>
																				<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>
																					<span class='pull-right'>																						
																	        <button type='button' class='btn btn-default btn-md' id='deletetask' onclick='javascript:deleteTask(".$id[$i].")'><span class='glyphicon glyphicon-trash'></span></button>
																	      </span>
																				</div>
																				<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
																					<span class='text-muted'><small>Created: ".$create_date[$i]."</span><span class='text-muted pull-right'> Modified: ".$update_date[$i]."</small></span>	
																				</div>
																			</div><hr/>";
																		}
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
		<script src="resources/js/bootstrap.min.js"></script>
	</body>
</html>