<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
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
 background-color: #EFE4DC; 
  background-color: #F4F3E7;
} */
      </style>
</head>
<body>
<?php include '../nav.php'; ?>

	<div class="container register-container my-2 py-4 mx-auto mr-auto">
		<div class="row justify-content-cente">
			<h2 class=" description-style col-12 col-md-8 text-uppercase text-center mb-5">Create New Account</h2>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<form action="register_confirmation.php" method="POST">

	

			<div class="form-group row form-control-lg">
				<label for="email-id" class="col-sm-3 col-form-label text-sm-right col-form-label-lg">Email: <span class="text-danger">*</span></label>
				<div class="col-sm-9">
					<input type="email" class="form-control" id="email-id" name="email" placeholder="user@user.com">
					<small id="email-error" class="invalid-feedback">Email is required.</small>
				</div>
			</div> <!-- .form-group -->	

			<div class="form-group row form-control-lg">
				<label for="password-id" class="col-sm-3 col-form-label text-sm-right col-form-label-lg">Password: <span class="text-danger">*</span></label>
				<div class="col-sm-9">
					<input type="password" class="form-control" id="password-id" name="password" placeholder="Password input here…" input>
					<small id="password-error" class="invalid-feedback">Password is required.</small>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-3">
					<button type="submit" class="btn btn-secondary btn-lg gradient-custom-4 text-light">Create</button>
					<a href="../final_project" role="button" class="btn btn-light btn-lg gradient-custom-4 text-body ">Cancel</a>
				</div>
			</div> <!-- .form-group -->

			<div class="row">
				<div class="col-sm-9 ml-sm-auto">

				<p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="/Assignment/final_project/login/login.php" class="fw-bold text-body"><u>Login here</u></a></p>

				</div>
			</div> <!-- .row -->

		</form>
	</div> <!-- .container -->
	<script>
		//JS for validating user input
		document.querySelector('form').onsubmit = function(){
		
			if ( document.querySelector('#email-id').value.trim().length == 0 ) {
				document.querySelector('#email-id').classList.add('is-invalid');
			} else {
				document.querySelector('#email-id').classList.remove('is-invalid');
			}

			if ( document.querySelector('#password-id').value.trim().length == 0 ) {
				document.querySelector('#password-id').classList.add('is-invalid');
			} else {
				document.querySelector('#password-id').classList.remove('is-invalid');
			}

			return ( !document.querySelectorAll('.is-invalid').length > 0 );
		}
	</script>

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