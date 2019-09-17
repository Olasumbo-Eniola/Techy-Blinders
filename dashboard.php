<?php
	session_start();
  if(!$_SESSION['loggedIn'] && $_SESSION['username'] == '') {
		header("location: index.html");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Techy Blinders - dashboard</title>
   <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom style-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card" style="color: #fff">
      <h3>Welcome, <?php echo ucfirst($_SESSION['username'])?></h3>
      <p>This is Techy-Blinders welcome page. Feel free to walk around. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima maiores saepe nisi suscipit dolore est praesentium quam eligendi beatae impedit natus blanditiis voluptatibus quas iusto aut, ea cupiditate pariatur corrupti?</p>
			<a href="script/logout.php">
				<button class="btn btn-danger">Logout</button>
			</a>
		</div>
	</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>