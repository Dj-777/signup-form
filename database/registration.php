<?php
require 'connection.php';
if(isset($_REQUEST["submit"])){
	$email=$_POST["email"];
	$name=$_POST["name"];
	$password=$_POST["password"];
	$gender=$_POST["gender"];
	$address=$_POST["address"];
	$countries=$_POST["countries"];
	$states=$_POST["states"];
	$city=$_POST["city"];
	$pincode=$_POST["pincode"];
	
	$check="select * from registration where email= '$email' ";
	$condition=mysqli_query($link,$check);
	
	if(mysqli_num_rows($condition)>0){
		$row=mysqli_fetch_assoc($condition);
			if($email==$row['email'])
			{
				/*header("Location:http://localhost/signup/registration.php");
				exit;*/
				?>
				
				<div class="alert alert-primary" role="alert">
					"Email is Already Taken Please Use Another Email For SignUp"
				</div>
			<?php
			}
	}
			else
			{
				$query="insert into registration(email,name,password,gender,address,countries,states,city,pincode)values('$email','$name','$password','$gender','$address','$countries','$states','$city','$pincode')";
				$suc=mysqli_query($link,$query);
				if($suc){
					header("Location:http://localhost/signup/success.php");
					exit;
				}
				
			}
	}

?>