<?php 
require 'header.php';
?>
<body>
	<div class="container" id="containerregistration" >
		
		<form method="post" action="database/registration.php" name="signupform" onsubmit="return validateform()">
		<!--For Display Proper Error Message For Successfull Data registration And Email is already Taken  -->
		
		<?php
		session_start();
			if(isset($_SESSION['errormessageforemail']) && !empty($_SESSION['errormessageforemail'])){
				echo  $_SESSION['errormessageforemail'];
				//header("refresh: 5; url = http://localhost/signup/registration.php");
			}
			elseif (isset($_SESSION['displaysuccessmessage']) && !empty($_SESSION['displaysuccessmessage'])){
				echo  $_SESSION['displaysuccessmessage'];
				header("refresh: 5; url = http://localhost/signup/registration.php");
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
session_destroy();
?>
</body>
</html>
