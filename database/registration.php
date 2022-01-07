<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
//Load Composer's autoloader
require 'vendor/autoload.php';
require 'C:\xampp\htdocs\signup\header.php';
require 'connection.php';
global $OTP;
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
				$_SESSION['errormessageforemail']=$errormessageforemail;
				header("Location:http://localhost/signup/index.php");
				exit;	
			}
		}
		else
			{
						
						// Function to generate OTP 
							function generateNumericOTP($n) { 
							  
							// Take a generator string which consist of 
							// all numeric digits 
							$generator = "1357902468"; 
						  
							// Iterate for n-times and pick a single character 
							// from generator and append it to $result 
							  
							// Login for generating a random character from generator 
							//     ---generate a random number 
							//     ---take modulus of same with length of generator (say i) 
							//     ---append the character at place (i) from generator to result 
						  
							$result = ""; 
						  
							for ($i = 1; $i <= $n; $i++) { 
								$result .= substr($generator, (rand()%(strlen($generator))), 1); 
							} 
							// Return result 
							return $result; 
						} 
						  
						// Main program 
						$n = 6; 
						
						$OTP = generateNumericOTP($n);
					//Create an instance; passing `true` enables exceptions
					$mail = new PHPMailer(true);
					$emails  = $_POST['email'];
								
					
				//$mail->SMTPDebug = 3;                               // Enable verbose debug output

				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'onlyforcompanywork@gmail.com';                 // SMTP username
				$mail->Password = 'work@work';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to

				$mail->SMTPOptions = array(
				'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
				)
				);

				$mail->setFrom($emails, 'Login');
				$mail->addAddress($emails);              // Add a recipient
				$mail->addReplyTo('onlyforcompanywork@gmail.com');

				
				$mail->Subject = 'OTP';
				$mail->Body    = 'Your OTP is::'.$OTP.'';
			
					if(!$mail->send()) 
					{
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
					} 
					else
					{
						$_SESSION['OTP']=$OTP;
						$_SESSION['email']=$email;
						$_SESSION['name']=$name;
						$_SESSION['hash']=$hash;
						$_SESSION['gender']=$gender;
						$_SESSION['address']=$address;
						$_SESSION['countries']=$countries;
						$_SESSION['states']=$states;
						$_SESSION['city']=$city;
						$_SESSION['pincode']=$pincode;
						$_SESSION['date']=$date;
						
						echo '<div id="myModal" class="modal fade" data-backdrop="static" data-keyboard="false">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-body">
											<p>OTP has been sent please check your mail</p>
											<form method="post">
												<input type="number" class="form-control" placeholder="Enter OTP Here..." name="otpfromuser" id="otpfromuser">
												<button type="submit" name="otpbuttoncheck" id="otpbuttoncheck" class="btn btn-primary">Submit</button>
											</form>
										</div>
									</div>
								</div>
							</div>';
					}
			}  
								
	}
} 		
		if(isset($_REQUEST["otpbuttoncheck"]))
					{
						$email=$_SESSION['email'];
						$name=$_SESSION['name'];
						$hash=$_SESSION['hash'];
						$gender=$_SESSION['gender'];
						$address=$_SESSION['address'];
						$countries=$_SESSION['countries'];
						$states=$_SESSION['states'];
						$city=$_SESSION['city'];
						$pincode=$_SESSION['pincode'];
						$date=$_SESSION['date'];
						
						$rno=$_SESSION['OTP'];
						
						$urno=$_POST["otpfromuser"];
						if(!strcmp($rno,$urno))
						{
							$query="insert into registration(email,name,password,gender,address,countries,states,city,pincode,date)values('$email','$name','$hash','$gender','$address','$countries','$states','$city','$pincode','". $date ."')";
							$success=mysqli_query($link,$query);
							if($success){
							//$display_name_aftersuccessfulreg=$name;
							$displaysuccessmessage="<div class='alert alert-success alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>$name Your Data Has Been Successfully Stored.</div>";
							
							$_SESSION['displaysuccessmessage']=$displaysuccessmessage;
							header("Location:http://localhost/signup/index.php");
							exit;
							}
						}
						else{
							echo"OTP IS WRONG";
							header("Location:http://localhost/signup/index.php");
							exit;
						}
						}
	
?>