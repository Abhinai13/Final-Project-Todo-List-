$(document).ready(function(){
	var $modal = $('#add_task_id');
	$('#addtask').on('click', function(){
		$modal.load('view/addtask.php',{'id1': '1', 'id2': '2'},
			function(){
				$modal.modal('show');
		});
	});	

});

function editTask(id){
	var $editmodal = $('#edit_task_id');
	$editmodal.load('view/edittask.php',{'task_id':id, 'id2': '2'},
		function(){
		$editmodal.modal('show');
	});
    return false;
}

function deleteTask(id){
	var $deletemodal = $('#delete_task_id');
    $deletemodal.load('view/deletetask.php',{'task_id':id, 'id2': '2'},
    function(){
        $deletemodal.modal('show');
    });
    return false;
}
function getInformation(){
    var $infomodal = $('#user_info_id');
    $infomodal.load('view/userinfo.php',{'id1':'1', 'id2': '2'},
    function(){
        $infomodal.modal('show');
    });
    return false;
}

function logout(){	
    $.ajax({
        type: "GET",
        url: "controller/web_action_ctrl.php",
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