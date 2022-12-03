<?php 
// Establish a DB connection
require '../config/config.php';


// if( isset($_SESSION["id"]) || !$_SESSION["id"]) {
if(!isset($_SESSION["id"]) || !$_SESSION["id"]){
	echo $error ="Please provide an email";
	exit();
}
//DB connection
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if($mysqli->connect_errno){
	echo $mysqli->connect_error;
	exit();
}
$mysqli->set_charset('utf8');


// var_dump($_SESSION);
// var_dump($_GET);
//Get the user email
$sql="SELECT * FROM users
WHERE user_email='" . $_SESSION["useremail"] . "';";

//Query the DB
 $result=$mysqli->query($sql);
 if(!$result){
     echo $mysqli->error;
     exit();

 }
 if($result->num_rows==1){
     $_SESSION["id"]=true;
     //$_SESSION["useremail"]=$_GET["email"];
 } else{
     $error="Invalid email.";
 }
//  else{
//     header("Location: /Assignment/final_project/index.php");
//  }


//Close DB connection
$mysqli->close();



 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UPDATE MY ACCOUNT</title>
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
	<!-- <style>
        html,body {
        margin: 0;
        padding: 0;
        font-family: "Oswald", sans-serif;
        /* background-color: #F4F3E7; */
        width: 100%;
        height: 100vh;
       display: flex;
       /* justify-content: center; */
       /* align-items: center; */
       flex-direction: column;
        }
		.form-check-label {
		padding-top: calc(.5rem - 1px * 2);
		padding-bottom: calc(.5rem - 1px * 2);
		margin-bottom: 0;
		} -->
       
        

	</style>
</head>
<body>
<?php include '../nav.php'; ?>
	
	<div class="container" >
		<div class="row ">
			<h1 class="col-12 mt-4 mb-4 text-left">Update an Email</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

<form action="update_confirmation.php" method="POST">


  <!-- Email input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="email-id">Current Email Address</label>
    <input type="email" id="email-id" class="form-control" placeholder=" <?php  echo $_SESSION['useremail']; ?>" readonly/>
    
    
  </div>

  <!-- New Email input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="newemail-id">New Email Address</label>
    <input type="newemail" name ="newemail" id="newemail-id" class="form-control" placeholder="user@user.com"/>
   
  </div>

 

  

  <!-- Register buttons -->
  <div class="text-center">
   <!-- Send a primary key for the dvd
   <input type="hidden" name="email-id" value="<?php echo $_GET["email"]; ?>"> -->
				<div class="form-group row ">
					<div class="col-sm-3"></div>
					<div class="d-flex justify-content-center"">
                    <button type="submit" class="btn btn-secondary btn-lg gradient-custom-4 text-light" id="choice" >Update</button>
					<a href="../home.php" role="button" class="btn btn-light btn-lg gradient-custom-4 text-body ">Cancel</a>
					</div>
				</div> <!-- .form-group -->
  </div>
   
</form>

	</div> <!-- .container -->


    <script>
		//JS should always be the first line of defense when validating user input
		document.querySelector('form').onsubmit = function(){
			
     // event.preventDefault();
			if ( document.querySelector('#newemail-id').value.trim().length == 0 ) {
				document.querySelector('#newemail-id').classList.add('is-invalid');
			} else {
				document.querySelector('#newemail-id').classList.remove('is-invalid');
                // let isExecuted = confirm("Are you sure to execute this action?");

                // console.log(isExecuted);
               // alert("Please confirm your choice!");
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

