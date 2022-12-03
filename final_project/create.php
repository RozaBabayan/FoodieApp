
<?php
// Establish a DB connection
require './config/config.php';


$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if($mysqli->errno){
	$mysqli->connect_error;
	exit();
}
$mysqli->set_charset('utf8');



//Populate all ingridients in dropdown
$sql_ing="SELECT * FROM ingredients;";
$result_ing=$mysqli->query($sql_ing);
if(!$result_ing){
	echo $mysqli->error;
	exit();
}
$mysqli->close();

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create a Recipe</title>
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
		<div class="row justify-content-center py-5 text-center">
			<h1 class="col-12 mt-4 mb-4">Add a Recipe</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<form action="create_confirm.php" method="POST">

			<div class="form-group row">
				<label for="title-id" class="col-sm-3 col-form-label text-sm-right">Name: <span class="text-danger">*</span></label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="title-id" name="title" >
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="calories-id" class="col-sm-3 col-form-label text-sm-right">Calories:<span class="text-danger">*</span></label>
				<div class="col-sm-9">
					<input type="calories" class="form-control" id="calories-id" name="calories">
				</div>
			</div> <!-- .form-group -->

		
			<div class="form-group row">
				<label for="image-id" class="col-sm-3 col-form-label text-sm-right">Image URL:<span class="text-danger">*</span></label>
				<div class="col-sm-9">
					<input name="image" id="image-id" class="form-control"></input>
				</div>
			</div> <!-- .form-group -->

			
			<div class="form-group row">
				<label for="ingredient-id" class="col-sm-3 col-form-label text-sm-right">Main Ingredient:</label>
				<div class="col-sm-9">
					<select name="ingredient_id" id="ingredient-id" class="form-control">
						<option value="" selected disabled>-- Select One --</option>

						<!-- PHP Output Here -->
						<?php while($row=$result_ing->fetch_assoc()) :?>
						<option value="<?php echo $row['ingredient_id']; ?>">
						<?php echo $row['ingredient_name']; ?>
						</option>
						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="ml-auto col-sm-9">
					<span class="text-danger font-italic">* Required</span>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2">
					<button type="submit" class="btn btn-secondary btn-lg">Create</button>
					<button type="reset" class="btn btn-light btn-lg">Reset</button>
				</div>
			</div> <!-- .form-group -->

		</form>

	</div> <!-- .container -->

	<footer class="footer">
      <div class="container">
        <p class="text-muted text-center">Foodie, Copyright 2022.</p>
      </div>
    </footer>

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