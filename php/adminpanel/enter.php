<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<title>Enter</title>
</head>
<body>
	<style>
		.center{
			margin: auto;
			width: 33.3%;
		}
	</style>
	<section>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-offset-1 col-md-10">
					<div class="login-form form ">
						<div class="center"><h2 >Enter to Admin Panel</h2></div>			 
						<form method="post" action="login.php">
							<div class="form-group">
								<label for="exampleInputEmail1">Login</label>
								<input type="login" name="login" class="form-control" id="exampleInputEmail1" placeholder="Login" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" autocomplete="off">
							</div>

							<button type="submit" class="btn btn-primary center-block">Enter</button>
						</form>
					</div>
			</div>
		</div>
	</div>
</div>



</section>
<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
</body>
</html>


