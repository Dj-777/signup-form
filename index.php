<?php 
require 'header.php';
session_start();
?>
<body>
	<div class="container" id="containerregistration" >
		
		<form method="post" action="database/registration.php" name="signupform" onsubmit="return validateform()">
		<!--For Display Proper Error Message For Successfull Data registration And Email is already Taken  -->
		
		<?php
			if(isset($_SESSION['errormessageforemail']) && !empty($_SESSION['errormessageforemail'])){
				echo  $_SESSION['errormessageforemail'];
				//header("refresh: 5; url = http://localhost/signup/index.php");
			}
			elseif (isset($_SESSION['displaysuccessmessage']) && !empty($_SESSION['displaysuccessmessage'])){
				echo  $_SESSION['displaysuccessmessage'];
				header("refresh: 5; url = http://localhost/signup/index.php");
			}
			elseif(isset($_SESSION['OTP']) && !empty($_SESSION['OTP'])){
			
			echo '<div id="myModal" class="modal fade" data-backdrop="static" data-keyboard="false">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-body">
											<p>OTP has been sent please check your mail</p>
											<form method="get">
												<input type="number" class="form-control" placeholder="Enter OTP Here..." name="otpfromuser" id="otpfromuser">
												<button type="submit" name="otpbuttoncheck" id="otpbuttoncheck" class="btn btn-primary">Submit</button>
											</form>
										</div>
									</div>
								</div>
							</div>';
}
		?>	
		<!--For Display Proper Error Message For Successfull Data registration And Email is already Taken  -->
		<br>
			<div id="error_message">
			</div>
			
			<div class="row">
				<div class="col-sm-1">
				    <i class="fa fa-envelope-square fa-2x float-right"></i>
				</div>
				<div class="col-sm-10" >
					<input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email" >
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-1">
				    <i class="fa fa-user fa-2x float-right" aria-hidden="true"></i>
				</div>
				<div class="col-sm-10" >
					<input type="text" class="form-control"  name="name" id="name" placeholder="Enter Your Name" >
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-1">
				    <i class="fa fa-key fa-2x float-right" aria-hidden="true"></i>
				</div>
				<div class="col-sm-10" >
					<input type="password" class="form-control"  name="password" id="password" placeholder="Enter Your Password" >
					<input type="checkbox" onclick="myFunction()">Show Password
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-1">
				   <i class="fa fa-mars fa-2x float-right"></i>
				</div>
				<div class="col-sm-2" >
					<input  type="radio" name="gender" id="gender" value="male">
					<label for="male">Male</label>
				</div>
				<div class="col-sm-2" >
					<input  type="radio" name="gender" id="gender" value="female">
					<label for="female">Female</label>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-1">
				  <i class="fa fa-address-book fa-2x float-right"></i>
				</div>
				<div class="col-sm-10" >
					<div class="form-group">
					   <div class="col-lg-12">
						   <textarea name="address" id="address" class="form-control" cols="20" rows="3" placeholder="Enter your Address"></textarea>
					   </div><!--end col 10-->
					 </div><!--ends from group-->
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-1">
					<i class="fa fa-flag fa-2x float-right" aria-hidden="true"></i>
				</div>
				<div class="col-sm-10" >
					<select class="form-control" name="countries" id="countries" >
					  <option value="" >Select Countries</option>
					  <option value="india">India</option>
					  <option value="chaina">China</option>
					  <option value="United States">United States</option>
					</select>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-1">
					<i class='fas fa-city fa-2x float-right'></i>
				</div>
				<div class="col-sm-10" >
					<select class="form-control" name="states" id="states" >
					  <option value="" >Select States</option>
					  <option value="Maharastra">Maharastra</option>
					  <option value="wuhan">wuhan</option>
					  <option value="Texas">Texas</option>
					</select>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-1">
					<i class="fa fa-home fa-2x float-right"></i>
				</div>
				<div class="col-sm-10" >
					<select  class="form-control"  name="city" id="city">
					  <option value="" >Select City</option>
					  <option value="Gandhinagar">Gandhinagar</option>
					  <option value="Mubai">Mubai</option>
					  <option value="New York">New York</option>
					</select>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-1">
					<i class="fa fa-map-pin fa-2x float-right" ></i>
				</div>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="pincode" id="pincode" placeholder="Enter Your Pincode Here..." >
				</div>
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col-sm-12">
					<input type="submit"  class="btn btn-success btn-mg " name="submit" id="submit">
				</div>
			</div>
		</form>
		

	</div>
<?php
			
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
						echo $rno;
						$urno=$_GET["otpfromuser"];
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
session_destroy();
?>
</body>
</html>
