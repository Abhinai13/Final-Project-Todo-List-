$('document').ready(function()
{ 
	$("#confirm_password").keyup(checkPasswordMatch);
     /* validation */
	 $("#register-form").validate({
      rules:
	  {
	  		firstname: {
			required: true,
			},
			lastname: {
			required: true,
			},
			password: {
			required: true,
			minlength: 6,
			},
			confirm_password: {
			required: true,
			minlength: 6,
			},
			user_email: {
            required: true,
            email: true
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
            password:{
            	required: "Please enter your password"
            },
            confirm_password:{
            	required: "Please enter your password"
            }, 
            user_email:{
            	required: "Please enter your email address"
            }                    
       },
	   submitHandler: submitForm	


       });  
	   /* validation */
	   
	   /* login submit */
	   function submitForm()
	   {		
			var data = $("#register-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : '/todo/controller/web_action_ctrl.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-register").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success :  function(response)
			   {						
					if(response.indexOf('ok') > 0){									
						$("#btn-register").html('<img src="/todo/resources/img/btn-ajax-loader.gif" /> &nbsp; Registering ...');
						setTimeout('window.location.href = "/todo"; ',4000);
					}
					else{									
						$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+'</div>');
						$("#btn-register").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register');
						});
					}
			  }
			});
			return false;
		}

		function checkPasswordMatch() {
    		var password = $("#password").val();
    		var confirmPassword = $("#confirm_password").val();
		    if (password != confirmPassword)
		        $("#error").html("Passwords do not match!");
		    else
		        $("#error").html("Passwords match.");
		}
	  
});