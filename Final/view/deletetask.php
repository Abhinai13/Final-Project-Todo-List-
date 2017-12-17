 <div class="modal-dialog modal-md">
	<?php		
		if (isset($_POST["task_id"])){
			$id = $_POST["task_id"];		
		}
	?>
    <!-- Start: Modal content-->
    <form role="form" class="form-horizontal" id="deletetask_form" method="post">
    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Delete Task</h4>
	      </div>	   
		    <div class="modal-body">		    
		    	<div id="error">
					<!-- error will be shown here -->
				</div>
		    	<div class="alert alert-warning alert-dismissible" role="alert">
	 				<strong>Warning!</strong> Invoke  <b>DELETE</b> button to delete task <?php echo $id; ?>	
				</div>
			</div>	     
	      <div class="modal-footer">
	      	 <input type="hidden" name="actionType" value="DELETETASK" />
	      	 <input type="hidden" name="task_id" value="<?php echo $id;?>" />
			 <button type="submit" class="btn btn-primary btn-md" name="btn-delelte-task" id="btn-delelte-task"><span class="glyphicon glyphicon-plus"></span>  DELETE </button> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  		</div>
	  	</div>
		<script src="/todo/resources/js/deletetask.js"></script>
	  </form>
 </div>
