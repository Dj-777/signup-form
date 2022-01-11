function validateforgetdetails(){
				var email =document.forms["signupform"]["email"];
				//var otp=document.forms["signupform"]["otp"];
				
				var error_message=document.getElementById("error_message"); 
				error_message.style.padding="10px";
				var text;				
				
				if(email.value==null || email.value==""){
				
					text = "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please Enter Your Email First!</div>";
					error_message.innerHTML=text;
					return false;
				}
				return true;
			 
			}
			