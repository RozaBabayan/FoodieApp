<?php
require "config/config.php";
$isDeleted=false;
if( !isset($_GET['recipe_id'])|| empty($_GET['recipe_id'])){
	$error= "Invalid recipe.";
}
else{
	

	$mysqli = new mysqli(DB_HOST,DB_USER, DB_PASS, DB_NAME);
if($mysqli->connect_errno){
	echo $mysqli->connect_error;
	exit();
}


$statement = $mysqli->prepare("DELETE FROM recipes WHERE recipe_id= ?");
$statement->bind_param("i", $_GET["recipe_id"]);
$executed=$statement->execute();
if(!$executed){
	echo $mysqli->error;
	exit();
}
if($statement->affected_rows==1){
	$isDeleted=true;
}
$statement->close();
$mysqli->close();
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete a Recipe From DataBase</title>
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
</head>
<body>
<?php include 'nav.php'; ?>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Remove a Recipe From Favorites</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">
		<div class="row mt-4">
			<div class="col-12">
			<?php if(isset($error)&& !empty($error)) :?>
				<div class="text-danger">
					<?php echo $error;?>
				</div>
			<?php endif;?>
			<?php if($isDeleted):?>
				<div class="text-success"><span class="font-italic"><?php echo $_GET['NAME'];?></span> was successfully deleted.</div>
			<?php endif;?>
			</div> <!-- .col -->
		</div> <!-- .row -->


    <div class="row text-center">
		<div class="col-sm-9 ml-sm-auto">
				<p class="text-center text-muted mt-5 mb-0">Back to Favorites <a href="favorites.php" class="fw-bold text-body"><u>Click here</u></a></p>
		</div>
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