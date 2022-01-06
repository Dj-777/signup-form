<?php
require 'connection.php';
//require 'C:/xampp/htdocs/signup/header.php';
if(isset($_REQUEST["submit"])){


	if (empty($_POST["email"])) 
	{  
		echo  "Error! You didn't enter the Email.";         
	} 
	
	elseif (empty($_POST["name"])) 
	{  
		$errMsg = "Error! You didn't enter the name.";  
          echo $errMsg;  
	} 
	
	elseif (empty($_POST["password"])) 
	{  
		$errMsg = "Error! You didn't enter the Password.";  
          echo $errMsg;  
	} 
	
	elseif(strlen($_POST["password"])<6){
		$errMsg=  "Password Must Be have  More Than 6 Characters.";
		echo $errMsg;
	}
	elseif (empty($_POST["gender"])) 
	{  
		$errMsg = "Error! You didn't select Gender.";  
          echo $errMsg;  
	} 
	
	elseif (empty($_POST["address"])) 
	{  
		$errMsg = "Error! You didn't enter the address.";  
          echo $errMsg;  
	} 
	
	elseif (empty($_POST["countries"])) 
	{  
		$errMsg = "Error! Please select the countrie.";  
          echo $errMsg;  
	} 
	
	elseif (empty($_POST["states"])) 
	{  
		$errMsg = "Error! Please select the state.";  
          echo $errMsg;  
	} 
	 
	elseif (empty($_POST["city"])) 
	{  
		$errMsg = "Error! Please select the city.";  
          echo $errMsg;  
	} 
	
	
	elseif (empty($_POST["pincode"])) 
	{  
		$errMsg = "Error! Please Enter the pincode.";  
          echo $errMsg;  
	} 
	else 
	{  
		$email=$_POST["email"];
		$name=$_POST["name"];
		
		$password=$_POST["password"];
		/*Encrypting password using password_hash()*/
		$hash = password_hash($password, PASSWORD_DEFAULT); 
		
		$gender=$_POST["gender"];
		$address=$_POST["address"];
		$countries=$_POST["countries"];
		$states=$_POST["states"];
		$city=$_POST["city"];
		$pincode=$_POST["pincode"];
		
		date_default_timezone_set('Asia/Kolkata'); 
		$date = date('Y-m-d H:i:s',time());
		$_POST['date'] = $date;
		
		$check="select * from registration where email= '$email' ";
		$condition=mysqli_query($link,$check);
	
		if(mysqli_num_rows($condition)>0){
		$row=mysqli_fetch_assoc($condition);
			if($email==$row['email'])
			{
				
				$errormessageforemail = "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>$email is Already Taken Please Use Another Email For SignUp.</div>";
				session_start();
				$_SESSION['errormessageforemail']=$errormessageforemail;
				header("Location:http://localhost/signup/registration.php");
				exit;	
			}
		}
		else
			{
				
				$query="insert into registration(email,name,password,gender,address,countries,states,city,pincode,date)values('$email','$name','$hash','$gender','$address','$countries','$states','$city','$pincode','". $date ."')";
				$success=mysqli_query($link,$query);
				if($success){
					//$display_name_aftersuccessfulreg=$name;
					$displaysuccessmessage="<div class='alert alert-success alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>$name Your Data Has Been Successfully Stored.</div>";
					session_start();
					$_SESSION['displaysuccessmessage']=$displaysuccessmessage;
					header("Location:http://localhost/signup/registration.php");
					exit;
				}
				
			}
	} 		
	}

?>