<?php
require '../config/config.php';
//server side validation check. 
if ( !isset($_POST['email']) || empty($_POST['email'])
	|| !isset($_POST['password']) || empty($_POST['password']) ) {
	$error = "Please fill out all required fields.";
}
else{
	//connect to DB and insert the user into the users table
	$mysqli=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	if($mysqli->connect_errno){
		echo $mysqli->connect_error;
		exit();
	}

//check the users table and see if  email adress already exists
$state_reg=$mysqli->prepare("SELECT * FROM users WHERE  user_email= ?");
$state_reg->bind_param("s", $_POST["email"]);
$executed=$state_reg->execute();
if(!$executed){
	echo $mysqli->error;
}


$state_reg->store_result();
$numrows=$state_reg->num_rows;
//echo "<hr> $numrows";
$state_reg->close(); 


//if there is more than one match same user/email
if($numrows==1){
$error="Email is anavailable, please enter another one.";
}
else {
	

$password= hash("sha256", $_POST["password"]);
//echo "<hr>" . $password . "<hr>";

	//sql to insert user into the table
	$statment=$mysqli->prepare("INSERT INTO users(user_email,password) VALUES(?,?)");
	$statment->bind_param("ss", $_POST["email"], $password);
	
	$executed=$statment->execute();
	if(!$executed){
		echo $mysqli->error;
	}
	$statment->close();


}
$mysqli->close();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Confirmation</title>
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
		body {
			margin: 0;
  			padding: 0;
  			font-family: "Oswald", sans-serif;
  			font-family: "Oswald", sans-serif;
            animation: fadeInAnimation ease 3s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }
        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
      </style>
</head>
<body>
<?php include '../nav.php'; ?>
	<div class="container">
		<div class="row">
			<h2 class="col-12 mt-4 text-uppercase mb-5 " class="animated bounce infinite" >Confirmation </h2>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<div class="row mt-4">
			<div class="col-12">
				<?php if ( isset($error) && !empty($error) ) : ?>
					<div class="text-danger"><?php echo $error; ?></div>
				<?php else : ?>
					<div class="text-success"><?php echo $_POST['email']; ?> was successfully registered.</div>
				<?php endif; ?>
		</div> <!-- .col -->
	</div> <!-- .row -->

	<div class="row mt-4 mb-4">
		<div class="col-12">
			<a href="login.php" role="button" class="btn btn-secondary btn-lg gradient-custom-4 text-light">Login</a>
			<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-light btn-lg gradient-custom-4 text-body">Back</a>
		</div> <!-- .col -->
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