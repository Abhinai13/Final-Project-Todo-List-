$(document).ready(function(){
	var $modal = $('#add_task_id');

	$('#addtask').on('click', function(){
		$modal.load('/todo/view/addtask.php',{'id1': '1', 'id2': '2'},
		function(){
			$modal.modal('show');
		});

		});

	
});

$(function(){
	$("button#btn-add-task").click(
		function(){		
			alert("addtask");
			var data = $("#addtask_form").serialize();			
			$.ajax({
				type:'POST',
				url:'/todo/controller/web_action_ctrl.php',
				data: data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-add-task").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
				},
				success :  function(response)
				   {						
						if(response.indexOf('ok') > 0){									
							$("#btn-add-task").html('<img src="resources/img/btn-ajax-loader.gif" /> &nbsp; Registering ...');
							setTimeout('window.location.href = "/todo/view/home.php"; ',4000);
						}
						else{									
							$("#error").fadeIn(1000, function(){						
							$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+'</div>');
							$("#btn-add-task").html('<span class="glyphicon glyphicon-plus"></span>  ADD ');
							});
						}
				  }
			});
	});
});

function deleteTask(){
	//alert("here");
	/*
    $.ajax({
        type: "get",
        url: "like_audio",
        data: {
            aId:aId
        },
        success: function (data){
            alert(data);
        },
        error: function (xhr, ajaxOptions, thrownError){

        }
    });
    */
    return false;
}