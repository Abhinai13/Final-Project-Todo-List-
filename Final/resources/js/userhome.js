$(document).ready(function(){
	var $modal = $('#add_task_id');
	$('#addtask').on('click', function(){
		$modal.load('/todo/view/addtask.php',{'id1': '1', 'id2': '2'},
			function(){
				$modal.modal('show');
		});
	});	

});

function editTask(id){
	var $editmodal = $('#edit_task_id');
	$editmodal.load('/todo/view/edittask.php',{'task_id':id, 'id2': '2'},
		function(){
		$editmodal.modal('show');
	});
    return false;
}

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

function logout(){	
    $.ajax({
        type: "GET",
        url: "/todo/controller/web_action_ctrl.php",
        data: {
            actionType:'SIGNOUT'
        },
        success: function (response){
           if(response.indexOf("ok")>0){			
				setTimeout('window.location.href = "/todo"; ',1000);
			}
        }
    });   
    return false;
}