

<?php

require '../config/config.php';

// If user is NOT logged in,  Else, redirect the user out of this page
if( !isset($_SESSION["id"]) || !$_SESSION["id"]) {

	
	if ( isset($_POST['useremail']) && isset($_POST['password']) ) {
		// Check if username and password fields have been submitted
		if ( empty($_POST['useremail']) || empty($_POST['password']) ) {

			$error = "Please provide email and password.";

		}
		else {
			// user has provided username and password. Connect to the database and check if this username/password combination is correct!
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			if($mysqli->connect_errno) {
				echo $mysqli->connect_error;
				exit();
			}

			// hash the user's password input
			$passwordInput = hash("sha256", $_POST["password"]);

			// Search the users table. See if there is a record with the given username AND password
			$sql = "SELECT * FROM users
						WHERE user_email = '" . $_POST['useremail'] . "' AND password = '" . $passwordInput . "';";

			// echo "<hr>" . $sql . "<hr>";
			
			$results = $mysqli->query($sql);

			if(!$results) {
				echo $mysqli->error;
				exit();
			}

			// If the username/password combo is correct, there should be only ONE record returned.
			if($results->num_rows == 1) {
				// Store some user info in session
				$_SESSION["id"] = true;
				$row=$results->fetch_assoc();
				$_SESSION["userid"]=$row["user_id"];
				$_SESSION["useremail"] = $_POST["useremail"];
				header("Location: /Assignment/final_project/index.php");
			
			}
			else {
				$error = "Invalid username or password.";
			}
		} 
	}
}
else {
	// Redirect the user out of this page
	header("Location: /Assignment/final_project/indexs.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login </title>
	<!--Bootstrap's css-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />
    <!--Custom Fonts-->
    <link
      href="https://fonts.googleapis.com/css?family=Oswald"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Beau+Rivage&family=Dancing+Script:wght@400;600&family=Montserrat:wght@400;600&family=Quintessential&display=swap"
      rel="stylesheet"
    />
    <!--Icon-->
    <script
      src="https://kit.fontawesome.com/204bed0b66.js"
      crossorigin="anonymous"
    ></script>
    <!--Link to CSS-->
    <link rel="stylesheet" type="text/css" href="../style.css" />
	<style>
      /* html,body {
  margin: 0;
  padding: 0;
  font-family: "Oswald", sans-serif;
  background-color: #F4F3E7;
} */
      </style>
</head>
<body>
	<?php include '../nav.php'; ?>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4 mb-4 text-center" >Login to your account</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<form action="login.php" method="POST">

			<div class="row mb-3">
				<div class="font-bold text-danger col-sm-9 ml-sm-auto">
					<!-- Show errors here. -->
					<?php
						if ( isset($error) && !empty($error) ) {
							echo $error;
						}
					?>
				</div>
			</div> <!-- .row -->
			

			<div class="form-group row ">
				<label for="useremail-id" class="col-sm-3 col-form-label text-sm-right">UserEmail</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="useremail-id" name="useremail" placeholder="user@user.com">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="pass-id" class="col-sm-3 col-form-label text-sm-right">Password</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" id="pass-id" name="password" placeholder="Please enter your password">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2 text-center">
					<button type="submit" class="btn btn-secondary  btn-lg">Login</button>
					<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-light btn-lg">Cancel</a>
				</div>
			</div> <!-- .form-group -->
		</form>

		<div class="row text-center">
		<div class="col-sm-9 ml-sm-auto">
				<p class="text-center text-muted mt-5 mb-0">Would you like to register? <a href="register_form.php" class="fw-bold text-body"><u>Click here</u></a></p>
			<!-- <div class="col-sm-9 ml-sm-auto">
				<a href="register_form.php" class="link-secondary ">Register an account</a>
			</div> -->
		</div> <!-- .row -->

	</div> <!-- .container -->
	<script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
      integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
      crossorigin="anonymous"
    ></script>
</body>
</html>