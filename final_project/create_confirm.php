<?php
require "config/config.php";
//var_dump($_POST);
$isAdded=false;

//Check to make sure that all required fields are filled out
if(!isset($_POST["title"]) || empty($_POST["title"])
|| !isset($_POST["calories"]) || empty($_POST["calories"])||
!isset($_POST["image"]) || empty($_POST["image"])||
!isset($_POST["ingredient_id"]) || empty($_POST["ingredient_id"]))
{
	$error= "Please fill out all required fileds!";
}
else{

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if($mysqli->errno){
	$mysqli->connect_error;
	exit();
}
$mysqli->set_charset('utf8');


// Use prepared statements 
// 1. prepare the SQL statement with placeholders
$statement=$mysqli->prepare("INSERT INTO recipes(name,calories,img_url,ingredients_ingredient_id) VALUES (?, ?, ?, ?)");


//2. Bind and execute
$statement->bind_param("sisi",$_POST["title"],$_POST["calories"],$_POST["image"],$_POST["ingredient_id"]);
$exe=$statement->execute();
if(!$exe){
	echo $mysqli->error;
}
//use affected_rows to see if update was successful
//echo "<hr>" . $statement->affected_rows . "<hr>";

if($statement->affected_rows ==1){
	$isAdded=true;
}
//close the prepared statement
$statement->close(); 
$mysqli->close();


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create Confirmation </title>
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
    <link rel="stylesheet" type="text/css" href="style.css" />
	<style>
		.form-check-label {
			padding-top: calc(.5rem - 1px * 2);
			padding-bottom: calc(.5rem - 1px * 2);
			margin-bottom: 0;
		}
	</style>
</head>
<body>

<?php include 'nav.php'; ?>
	
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Add a Recipe</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">
		<div class="row mt-4">
			<div class="col-12">
			<?php if(isset($error)&& !empty($error)) :?>
				<div class="text-danger font-italic"><?php echo $error; ?></div>
				<?php endif; ?>

			  <?php if ($isAdded) :?>
				<div class="text-success"><span class="font-italic"><?php echo $_POST['title']; ?></span> was successfully added.</div>
				<?php endif; ?>

			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="create.php" role="button" class="btn btn-secondary btn-lg">Back to the form</a>
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