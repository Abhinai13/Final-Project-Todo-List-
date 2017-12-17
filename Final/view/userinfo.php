 <div class="modal-dialog modal-md">
	<?php
		session_start();	
		$user = $_SESSION["user"];	
	?>
    <!-- Start: Modal content-->
    
    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">User Information</h4>
	      </div>	   
		    <div class="modal-body">	
		    	<p class="text-justify">
			    	<?php
			    		echo "<strong>".$user["firstname"]." ".$user["lastname"];			
			    		echo "</strong><br/><email>".$user["email"]."</email>";
			    	?>
		    	</p>    		
		    </div>
		    <div class="modal-footer">	      	 
		      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  		</div>
	  	   
	</div>
</div>

