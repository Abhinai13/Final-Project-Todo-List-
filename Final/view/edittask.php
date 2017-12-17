 <div class="modal-dialog modal-md">
	<?php
		require('./../config/config.php');
		require_once(__ROOT__.'/repo/todos.php'); 		
		$id = $_POST["task_id"];
		$record = todos::findOne($id);
	?>
    <!-- Start: Modal content-->
    <form role="form" class="form-horizontal" id="edittask_form" method="post">
    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Edit Task</h4>
	      </div>	   
		    <div class="modal-body">		    
		    	<div id="error">
						<!-- error will be shown here -->
				</div>
		    	<div class="form-group">
		    		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
						<input type="text" class="form-control" placeholder="Title" name="title" id="title" value="<?php echo $record["title"];?>"/>
						<span id="check-e"></span>
					</div>
				</div>					
				<div class="form-group">
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">					
						<textarea class="form-control" placeholder="Description" name="description" rows="4" id="description"><?php echo $record["body"];?></textarea>
						<span id="check-e"></span>
					</div>
				</div>			
				<!-- Add radio buton for status: Task completion -->
				<div class="checkbox">
    				<label><input type="checkbox" id="complete" name="complete" check="checked" value="1"> Completed</label>
  				</div>
			</div>	     
	      <div class="modal-footer">
	      	  <input type="hidden" name="actionType" value="EDITTASK" />
	      	  <input type="hidden" name="task_id" value="<?php echo $record["id"];?>" />
	      	  <input type="hidden" name="task_create_date" value="<?php echo $record["create_date"];?>" />	 
			  <button type="submit" class="btn btn-primary btn-md" name="btn-edit-task" id="btn-edit-task"><span class="glyphicon glyphicon-pencil"></span>  SAVE</button>
		      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  		</div>
	  	</div>
	  	<script src="/todo/resources/js/edittask.js"></script>
	  	</form>
 </div>
