$(document).ready(function(){	
	
$("#addtask_form").validate({
      rules:
	  {
	  		title: {
			required: true,
			},
			description: {
			required: true,
			},
			
	   },
       messages:
	   {
            title:{
            	required: "Please enter title"
            },
            description:{
            	required: "Please enter description"
            }                 
       },
	   submitHandler: addTaskForm

       }); 
});

 function addTaskForm()
	   {		
			var data = $("#addtask_form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : '/todo/controller/web_action_ctrl.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-add-task").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; adding ...');
			},
			success :  function(response)
			   {						
					if(response.indexOf('ok') > 0){									
						$("#btn-add-task").html('<img src="resources/img/btn-ajax-loader.gif" /> &nbsp; adding ...');
						//setTimeout('window.location.href = "/todo/view/home.php"; ',2000);
						$("#error").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-ok"></span> &nbsp; Task Added. Please continue to with additional tasks.</div>');						
					}
					else{									
						$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+'</div>');
						$("#btn-add-task").html('<span class="glyphicon glyphicon-plus"></span> &nbsp; ADD');
						});
					}
			  }
			});
			return false;
		}

