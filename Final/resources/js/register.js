$('document').ready(function()
{ 
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
			},
			confirm_password: {
			required: true,
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
            user_email: "Please enter your email address",
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
					if(response=="ok"){									
						$("#btn-register").html('<img src="resources/img/btn-ajax-loader.gif" /> &nbsp; Registering ...');
						setTimeout('window.location.href = "/todo"; ',4000);
					}
					else{									
						$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
						$("#btn-register").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register');
						});
					}
			  }
			});
				return false;
		}
	   /* login submit */
});