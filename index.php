<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="assets/images/favicon.ico"> -->

    <title>Virtual Diary | Login </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="assets/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/skin_color.css">	

</head>
	
<body class="hold-transition theme-primary bg-img" style="background-image: url(assets/images/3.jpg)">
<?php  include "./includes/database.php" ?>
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary">Let's Get Started</h2>
								<p class="mb-0">Sign in to continue to Dashboard.</p>							
							</div>
							<div class="p-40">
								<form  method="post">
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="text" name="email" class="form-control ps-15 bg-transparent" required placeholder="Email">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											<input type="password" name="password" class="form-control ps-15 bg-transparent" required placeholder="Password">
										</div>
									</div>
									  <div class="row">
										<div class="col-6">
										  <div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-6">
										 <div class="fog-pwd text-end">
											<a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot password?</a><br>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" name="login" class="btn btn-danger mt-10">SIGN IN</button>
										</div>
										<!-- /.col -->
									  </div>
									  <?php
									  if(isset($_POST["login"]))
                                {

									
                                $email = $_POST["email"];
                                $password = $_POST["password"];
                            //    echo $email . " " .$password." ";

									if(!empty($email) || !empty($password)){
									
										if($password == $password){

												$sqlSelect = "SELECT * FROM `register` WHERE email = '$email' AND Password = '$password';";

												  $Query = mysqli_query($mysqli, $sqlSelect);		
												  

												  $rowcount = mysqli_num_rows($Query); 

												  if($rowcount > 0 ){
													    
													 $result = mysqli_fetch_assoc($Query);

														if($result["Password"] == $password){
															
															session_start();
															echo "Login Successful!";
															$_SESSION["id"] = $result["Id"];
															$_SESSION["email"] = $email;

															echo "<script> window.location.replace('addPost.php?valid=') </script>";

														}else{
															echo "Password not correct, please try again!!!";
														}

												  }else{
													   		echo "Email or password does not exist, please try again later!!!";
												  }

										}else {
											echo " Password does not Match, Please try again! ";
										}


									}else {

											echo " Fields Cann't empty!!! ";
									}
                                }
	                            ?>
								</form>	
								<div class="text-center">
									<p class="mt-15 mb-0">Don't have an account? <a href="register.php" class="text-warning ms-5">Sign Up</a></p>
								</div>	
							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="assets/js/vendors.min.js"></script>
	<script src="assets/js/pages/chat-popup.js"></script>
    <script src="assets/icons/feather-icons/feather.min.js"></script>	

</body>
</html>
