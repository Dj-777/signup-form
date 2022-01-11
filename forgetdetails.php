<?php
require 'header.php';
?>
<body>
<div class="container" id="containerregistration" >
		
		<form method="post" action="database/forgetdetails.php" name="signupform" onsubmit="return validateforgetdetails()">
		<?php
		session_start();
			if(isset($_SESSION['errormessageforemail']) && !empty($_SESSION['errormessageforemail'])){
				echo  $_SESSION['errormessageforemail'];
			}
			elseif(isset($_SESSION['errormessageforotp']) && !empty($_SESSION['errormessageforotp'])){
				echo  $_SESSION['errormessageforotp'];
				header("refresh: 5;");
			}
			
			
		?>	
			<div id="error_message">
			</div>
			<br>
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
				<div class="col-sm-12">
					<input type="submit"  class="btn btn-success btn-mg " name="emailsubmit" id="emailsubmit">
				</div>
			</div>
			<br>
			</form>
</div>
<?php
session_destroy();
?>
</body>
</html>