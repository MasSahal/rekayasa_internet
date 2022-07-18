<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login Aplikasi</title>
	<!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
	<meta name="author" content="Codedthemes" />
	<!-- Favicon icon -->

	<link rel="icon" href="./assets/images/favicon.ico" type="image/x-icon">
	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap/css/bootstrap.min.css">
	<!-- waves.css -->
	<link rel="stylesheet" href="./assets/pages/waves/css/waves.min.css" type="text/css" media="all">
	<!-- themify-icons line icon -->
	<link rel="stylesheet" type="text/css" href="./assets/icon/themify-icons/themify-icons.css">
	<!-- ico font -->
	<link rel="stylesheet" type="text/css" href="./assets/icon/icofont/css/icofont.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="./assets/icon/font-awesome/css/font-awesome.min.css">
	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>

<body themebg-pattern="theme1">
	<!-- Pre-loader start -->
	<?php include('admin/layout/loader.php'); ?>
	<section class="login-block">
		<!-- Container-fluid starts -->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!-- Authentication card start -->

					<form class="md-float-material form-material" action="proses_login.php" method="post">
						<div class="text-center">
							<h5>Aplikasi E-ticket</h5>
						</div>
						<div class="auth-box card">
							<div class="card-block">
								<div class="row m-b-20">
									<div class="col-md-12">
										<h3 class="text-center">Sign In</h3>
									</div>
								</div>
								<span class="text-danger text-center"><?= isset($_GET['pesan']) ? $_GET['pesan'] : ""; ?></span>
								<div class="form-group form-primary">
									<input type="text" name="username" class="form-control">
									<span class="form-bar"></span>
									<label class="float-label">Username</label>
								</div>
								<div class="form-group form-primary">
									<input type="password" name="password" class="form-control">
									<span class="form-bar"></span>
									<label class="float-label">Password</label>
								</div>
								<div class="row m-t-25 text-left">
									<div class="col-12">
										<div class="checkbox-fade fade-in-primary d-">
											<label>
												<input type="checkbox" value="">
												<span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
												<span class="text-inverse">Remember me</span>
											</label>
										</div>
										<div class="forgot-phone text-right f-right">
											<a href="auth-reset-password.html" class="text-right f-w-600"> Forgot Password?</a>
										</div>
									</div>
								</div>
								<div class="row m-t-30">
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
									</div>
								</div>
								<hr />
								<div class="row">
									<div class="col-md-10">
										<p class="text-inverse text-left m-b-0">Thank you.</p>
										<p class="text-inverse text-left"><a href="index.html"><b>Back to website</b></a></p>
									</div>
									<div class="col-md-2">
										<img src="./assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
									</div>
								</div>
							</div>
						</div>
					</form>
					<!-- end of form -->
				</div>
				<!-- end of col-sm-12 -->
			</div>
			<!-- end of row -->
		</div>
		<!-- end of container-fluid -->
	</section>
	<!-- Required Jquery -->
	<script type="text/javascript" src="./assets/js/jquery/jquery.min.js "></script>
	<script type="text/javascript" src="./assets/js/jquery-ui/jquery-ui.min.js "></script>
	<script type="text/javascript" src="./assets/js/popper.js/popper.min.js"></script>
	<script type="text/javascript" src="./assets/js/bootstrap/js/bootstrap.min.js "></script>
	<!-- waves js -->
	<script src="./assets/pages/waves/js/waves.min.js"></script>
	<!-- jquery slimscroll js -->
	<script type="text/javascript" src="./assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script type="text/javascript" src="./assets/js/common-pages.js"></script>
</body>

</html>