 <div class="modal-dialog modal-md">
	<?php

	?>
    <!-- Start: Modal content-->
    <form role="form" class="form-horizontal" id="addtask_form" method="post">
    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">New Task</h4>
	      </div>	   
		    <div class="modal-body">
		    
		    	<div id="error">
					<!-- error will be shown here -->
				</div>
		    	<div class="form-group">
		    		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
						<input type="text" class="form-control" placeholder="Title" name="title" id="title" />
						<span id="check-e"></span>
					</div>
				</div>					
				<div class="form-group">
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">					
						<textarea class="form-control" placeholder="Description" name="description" rows="6" id="description"></textarea>
						<span id="check-e"></span>
					</div>
				</div>			
				
			</div>	     
	      <div class="modal-footer">
	      	 <input type="hidden" name="actionType" value="ADDTASK" />
			 <button type="submit" class="btn btn-primary btn-md" name="btn-add-task" id="btn-add-task"><span class="glyphicon glyphicon-plus"></span>  ADD </button> 
		      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  		</div>
	  	</div>
		<script src="resources/js/addtask.js"></script>
	  </form>
 </div>
