<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="design/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="design/assets/css/bootstrap.min.css">
	<!-- initialize jQuery Library -->
      <script src="design/assets/js/jquery.js"></script>

</head>
<body>
	<div class="container">
		<header class="">
			<nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
				<a href="index.php" class="navbar-brand"><img src="images/logo.png"></a>

				<button class="navbar-toggler" data-toggle="collapse" data-target="#nav_list">
					<span class="navbar-toggler-icon"></span>
				</button>
			

				<div class="collapse navbar-collapse" id="nav_list">
					<ul class="navbar-nav ml-auto" >

						<li class="nav-item">
							<a href="index.php" class="nav-link">Home</a>
						</li>

						<li class="nav-item">
							<a href="about.php" class="nav-link">About Us</a>
						</li>

						<?php
						if( isset( $_SESSION['user_id']) ) {
						?>	
							<li class="nav-item">
								<a href="profile.php" class="nav-link"><?php echo "Welcome ".$_SESSION['username']; ?></a>
							</li>

							<li class="nav-item">
								<a href="includes/logout.inc.php" class="nav-link">Logout</a>
							</li>

						<?php	

						} else {
						?>

						<li class="nav-item">
							<a href="login.php" class="nav-link">Login</a>
						</li>
						<li class="nav-item">
							<a href="create_account.php" class="nav-link">Register</a>
						</li>
						
						<?php	

						}


						?>
						
						
						
					</ul>
				</div>
				
				
			</nav>
		</header>
		
	</div>