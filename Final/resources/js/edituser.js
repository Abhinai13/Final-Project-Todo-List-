$(document).ready(function(){	

$("#lastname").hide();
$("#firstname").hide();
$("#email").hide();
$("#divChangePwd").hide();
$("#cancel-user-btn").hide();
$("#submit-user-btn").hide();

$("#confirm_password").keyup(checkPasswordMatch);
$("#edit-user-btn").click(editUsername);
$("#edit-pwd-btn").click(changePassword);
$("#cancel-user-btn").click(cancelEdit);

	
$("#edituser_form").validate({
      rules:
	  {
	  		lastname: {
			required: true,
			},
			firstname: {
			required: true,
			},
			email: {
			required: true,
			email: true
			},
			currentpassword: {
			required: true,
			minlength: 6
			},
			newpassword: {
			required: true,
			minlength: 6
			},
			confirm_password: {
			required: true,
			minlength: 6
			},
			
			
	   },
       messages:
	   {
            firstname:{
            	required: "Please enter your First Name"
            },
            lastname:{
            	required: "Please enter your Last Name"
            },
            currentpassword:{
            	required: "Please enter your password"
            },
            newpassword:{
            	required: "Please enter your password"
            },
            confirm_password:{
            	required: "Please enter your password"
            }, 
            email:{
            	required: "Please enter your email address"
            }                    
       },
	   submitHandler: submitEdituserForm

       }); 
});

 function submitEdituserForm()
	   {		
			var data = $("#edituser_form").serialize();
				
			$.ajax({
			 async: true,  	
			type : 'POST',
			url  : '/todo/controller/web_action_ctrl.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#submit-user-btn").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; adding ...');
			},
			success :  function(response)
			   {						
					if(response.indexOf('ok') > 0){									
						$("#submit-user-btn").html('<img src="/todo/resources/img/btn-ajax-loader.gif" /> &nbsp; adding ...');
						//setTimeout('window.location.href = "/todo/view/home.php"; ',2000);
						$("#error").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-ok"></span> &nbsp; Changed information.</div>');						
					}
					else{									
						$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+'</div>');
						$("#submit-user-btn").html('&nbsp; Submit');
						});
					}
			  }
			});
			return false;
		}

	function checkPasswordMatch() {
    	var password = $("#newpassword").val();
    	var confirmPassword = $("#confirm_password").val();
	    if (password != confirmPassword)
	        $("#error").html("Passwords do not match!");
		    else
	        $("#error").html("Passwords match.");
	}

	function changePassword(){
		$("#divChangePwd").show();		
		$("#fitstNameData").show();
		$("#lastNameData").show();
		$("#emailData").show();
		$("#lastname").hide();
		$("#firstname").hide();
		$("#email").hide();
		$("#edit-pwd-btn").hide();	
		$("#cancel-user-btn").show();
		$("#submit-user-btn").show();
		$("#actionType").val("CHANGEPWD");
	}

	function editUsername(){		
		$("#fitstNameData").hide();
		$("#lastNameData").hide();
		$("#emailData").hide();
		$("#lastname").show();
		$("#firstname").show();
		$("#email").show();
		$("#divChangePwd").hide();
		$("#edit-pwd-btn").show();
		$("#cancel-user-btn").show();
		$("#submit-user-btn").show();
		$("#actionType").val("EDITUSER");

	}

	function cancelEdit(){		
		$("#fitstNameData").show();
		$("#lastNameData").show();
		$("#emailData").show();
		$("#lastname").hide();
		$("#firstname").hide();
		$("#email").hide();
		$("#divChangePwd").hide();
		$("#edit-pwd-btn").show();
		$("#cancel-user-btn").hide();
		$("#submit-user-btn").hide();
		$("#actionType").val("");
	}

	
