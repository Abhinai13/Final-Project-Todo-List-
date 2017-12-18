$(document).ready(function(){	
	
$("#edittask_form").validate({
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
	   submitHandler: editTaskForm

       }); 
});

 function editTaskForm()
	   {		
			var data = $("#edittask_form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'controller/web_action_ctrl.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-edit-task").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; saving ...');
			},
			success :  function(response)
			   {						
					if(response.indexOf('ok') > 0){									
						$("#btn-edit-task").html('<img src="resources/img/btn-ajax-loader.gif" /> &nbsp; saving ...');
						setTimeout('window.location.href = "view/home.php"; ',2000);
					}
					else{									
						$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+'</div>');
						$("#btn-edit-task").html('<span class="glyphicon glyphicon-pencil"></span> &nbsp; SAVE');
						});
					}
			  }
			});
			return false;
		}

