$('document').ready(function()
{ 
     /* validation */
	 $("#login-form").validate({
      rules:
	  {
			password: {
			required: true,
			},
			user_email: {
            required: true,
            email: true
            },
	   },
       messages:
	   {
            password:{
               required: "Please enter your password"
            },
            user_email:{
               required: "Please enter your email address"
            },           
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* login submit */
	   function submitForm()
	   {		
			var data = $("#login-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'controller/web_action_ctrl.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success :  function(response)
			   {						
					//alert("respose:" + response);
					//if(response == 'ok'){
					//console.log("response: " + response);
					if(response.indexOf("ok")>0){
						$("#btn-login").html('<img src="/todo/resources/img/btn-ajax-loader.gif" /> &nbsp; Signing In ...');
						setTimeout('window.location.href = "/todo/view/home.php"; ',4000);
					}
					else{									
						$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+'</div>');
						$("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
						});
					}
			  }
			});
				return false;
		}
	   /* login submit */
});

