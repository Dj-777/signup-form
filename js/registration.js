		function validateform(){
			
				var email =document.forms["signupform"]["email"];
				var name=document.forms["signupform"]["name"];
				var password =document.forms["signupform"]["password"];
				var gender=document.getElementsByName('gender');
				var address=document.forms["signupform"]["address"];
				var countries= $("#countries");
				var states= $("#states");
				var city= $("#city");
				var pincode=document.forms["signupform"]["pincode"];
				
				var error_message=document.getElementById("error_message"); 
				error_message.style.padding="10px";
				var text;				
				
				if(email.value==null || email.value==""){
				
					text = "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please Enter Your Email First!</div>";
					error_message.innerHTML=text;
					return false;
				}

				if(name.value==null || name.value==""){
					text = "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please Enter Your Name First!</div>";
					error_message.innerHTML=text;
					return false;
				}
				if(password.value==null || password.value=="" ){
					text = "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please Enter Your Password First!</div>";
					error_message.innerHTML=text;
					return false;
				}
				if(password.value.length<6){
					text = "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password Must Be More Than 6 Character!</div>";
					error_message.innerHTML=text;
					return false;
				}
				if (!(gender[0].checked || gender[1].checked)) {
					text = "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please Select Your Gender First!</div>";
					error_message.innerHTML=text;
					return false;
				}
				
				if(address.value==null || address.value=="" ){
					text = "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please Enter Your Address First!</div>";
					error_message.innerHTML=text;
					return false;
				}
				if(address.value.length<6){
					text = "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Address Must Be More Than 6 Character!</div>";
					error_message.innerHTML=text;
					return false;
				}
				if (countries.val() == "") {
                text = "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please Select Your Countrie First!</div>";
					error_message.innerHTML=text;
					return false;
				}
				if(states.val() == "" ){
					text = "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please Select Your State First!</div>";
					error_message.innerHTML=text;
					return false;
				}
				if(city.val()==null || city.val()=="" ){
					text = "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please Select Your City First!</div>";
					error_message.innerHTML=text;
					return false;
				}
				if(pincode.value==null || pincode.value=="" ){
					text = "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please Enter Your Pincode First!</div>";
					error_message.innerHTML=text;
					return false;
				}
				if(pincode.value.length<6 || pincode.value.length>6){
					text = "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>pincode Must Be Of 6 Characters!</div>";
					error_message.innerHTML=text;
					return false;
				}
				return true;


			}	
			function myFunction() {
			var x = document.getElementById("password");
			  if (x.type === "password") {
				x.type = "text";
			  } else {
				x.type = "password";
			  }
			}
			
		