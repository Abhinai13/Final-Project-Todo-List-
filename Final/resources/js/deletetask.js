$(document).ready(function(){	
	
$("#deletetask_form").validate({
      
	   submitHandler: deleteTaskForm

    }); 
});

 function deleteTaskForm()
	   {		
			var data = $("#deletetask_form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'controller/web_action_ctrl.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-delete-task").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; deleting ...');
			},
			success :  function(response)
			   {						
					if(response.indexOf('ok') > 0){									
						$("#btn-delete-task").html('<img src="resources/img/btn-ajax-loader.gif" /> &nbsp; deleting ...');
						setTimeout('window.location.href = "view/home.php"; ',2000);
					}
					else{									
						$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+'</div>');
						$("#btn-delete-task").html('<span class="glyphicon glyphicon-trash"></span> &nbsp; DELETE');
						});
					}
			  }
			});
			return false;
		}

