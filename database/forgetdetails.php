<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';
require 'C:\xampp\htdocs\signup\header.php';
require 'connection.php';
global $OTP;
if(isset($_REQUEST["emailsubmit"])){
	
	if (empty($_POST["email"])) 
	{  
		echo  "Error! You didn't enter the Email.";         
	} 
	
	else 
	{  
		global $email;
		$email=$_POST["email"];
		
		$check="select * from registration where email= '$email' ";
		$condition=mysqli_query($link,$check);
	
		if(mysqli_num_rows($condition)>0){
		$row=mysqli_fetch_assoc($condition);
			if($email==$row['email'])
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

				$mail->setFrom($emails, 'Get Details');
				$mail->addAddress($emails);              // Add a recipient
				$mail->addReplyTo('onlyforcompanywork@gmail.com');

				
				$mail->Subject = 'OTP For Forget Details';
				$mail->Body    = 'Your OTP To Get Details Is::'.$OTP.'';
			
					if(!$mail->send()) 
					{
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
					} 
					else
					{
						$_SESSION['OTP']=$OTP;
						$_SESSION['email']=$email;
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
		
		else
			{		
				$errormessageforemail = "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>$email is Not Registed Please Register Your Self First.&nbsp;&nbsp;<a href='http://localhost/signup/'>Click Here for Register.</a></div>";
				$_SESSION['errormessageforemail']=$errormessageforemail;
				header("Location:http://localhost/signup/forgetdetails.php");
				exit;	
			}  
			
	}
} 		
			if(isset($_REQUEST["otpbuttoncheck"]))
					{
						$rno=$_SESSION['OTP'];
						$urno=$_POST["otpfromuser"];
						
						if(!strcmp($rno,$urno))
						{
						echo "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Details will be disappear after 15 seconds </div>";
							$email=$_SESSION['email'];
							$qry="select * from registration where email = '$email' ";

						$result=mysqli_query($link,$qry);
						if(mysqli_affected_rows($link)>0)
						{
							echo "<table border='1' class='t1'>";
									echo "<tr>";
								echo"<th>id</th>";
								echo"<th>email</th>";
								echo"<th> name</th>";
								echo"<th>password</th>";
								echo"<th>gender</th>";
								echo"<th>address</th>";
								echo"<th>countries</th>";
								echo"<th>states</th>";
								echo"<th>city</th>";
								echo"<th>pincode</th>";
							echo "</tr>";
							while($row=mysqli_fetch_assoc($result))
								{
								echo "<tr>";
								
									echo "<td>".$row["id"]."</td>"; 
									echo "<td>".$row["email"]."</td>";  
									echo "<td>".$row["name"]."</td>"; 
									echo "<td>".$row["password"]."</td>"; 
									echo "<td>".$row["gender"]."</td>"; 
									echo "<td>".$row["address"]."</td>"; 
									echo "<td>".$row["countries"]."</td>"; 
									echo "<td>".$row["states"]."</td>"; 
									echo "<td>".$row["city"]."</td>"; 
									echo "<td>".$row["pincode"]."</td>"; 
									 
								echo "</tr>";
								}
						echo "</table>";
						header("refresh: 15; url = http://localhost/signup/forgetdetails.php");
						exit; 
						}
						else
							{
								echo "no record found";
							}
							//header("Location'http://localhost/signup/forgetdetails.php");
							//exit;
						}
						
						else{
								$email=$_SESSION['email'];
								$errormessageforotp= "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>$email YOU PUT WRONG OTP. <br> TO SEE YOUR DETAILS MAKE SURE TO ENTER OTP CORRECT .</div>";
								$_SESSION['errormessageforotp']=$errormessageforotp;
								header("Location:http://localhost/signup/forgetdetails.php");
								exit; 
							}
					}
?>
