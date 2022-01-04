<html>
	<head>
		<link rel="icon" href="download.ico">
		<link rel="stylesheet" type="text/css" href="css/header.css">
		<link rel="stylesheet" type="text/css" href="css/registration.css">
		
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		
		<!--For FA-FA ICONS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
		
		<title>
			Welcome||Signup
		</title>
		<script type='text/javascript'>
				
				function validateform(){
				
				var email =document.forms["signupform"]["email"];
				var name=document.forms["signupform"]["name"];
				var password=document.forms["signupform"]["password"];
				var gender=document.getElementsByName('gender');
				var address=document.forms["signupform"]["address"];
				var countries= $("#countries");
				var states= $("#states");
				var city= $("#city");
				var pincode=document.forms["signupform"]["pincode"];

				if(email.value==null || email.value==""){
					alert("Please Enter Valid Email Only");
					email.focus();
					return false;
				} 
				if(name.value==null || name.value==""){
					alert("Please Enter Name!");
					name.focus();
					return false;
				}
				if(password.value==null || password.value=="" ){
					alert("Please Add Your password");
					password.focus();
					return false;
				}
				if(password.value.length<6){
					alert("password Must Be More Than 6 character");
					password.focus();
					return false;
				}
				if (!(gender[0].checked || gender[1].checked)) {
					alert("Please Select Your Gender");
					return false;
				}
				
				if(address.value==null || address.value=="" ){
					alert("Please Add Your Address");
					address.focus();
					return false;
				}
				if(address.value.length<6){
					alert("Address Must Be More Than 6 character");
					address.focus();
					return false;
				}
				if (countries.val() == "") {
                alert("Please select an Countries!");
                return false;
				}
				if(states.val() == "" ){
					alert("Please Select Your states");
					return false;
				}
				if(city.val()==null || city.val()=="" ){
					alert("Please Select Your City");
					return false;
				}
				if(pincode.value==null || pincode.value=="" ){
					alert("Please Enter Your Pincode");
					pincode.focus();
					return false;
				}
				if(pincode.value.length<6 || pincode.value.length>6){
					alert("Pincode Must Be 6 character");
					pincode.focus();
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

		</script>
		
		<div class="container" id="containerheader">
			<h1>
				Sign-up Form
			</h1>
		</div>

	</head>