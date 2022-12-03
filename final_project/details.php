
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Details</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
		/* body,html{
		 margin: 0;
  		padding: 0;
   		font-family: "Oswald", sans-serif;
		background-color: #F4F3E7;} */
	</style>
</head>
<body>
<?php include 'nav.php'; ?>

	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4 text-center">Recipe Details</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->


	<div class="row mt-4 mb-4">
			<div class="col-12">	
				<a href="index.php" role="button" class="btn btn-light text-center mt-5 mb-0 ml-5">Back to Home Page</a>
			</div> <!-- .col -->
	</div> <!-- .row -->


	<div class="container">

		<div class="row mt-4">
			<div class="col-12">
			<?php if(isset($error)&& !empty($error)) :?>
				<div class="text-danger font-italic">
					<!-- Display Errors Here -->
                     <?php echo $error; ?>	
				</div>
				<?php else: ?>

			<div class="row" id="display">
   						
			</div>
	
               <?php endif; ?>
			</div> <!-- .col -->
			<div class="col-12">
				<!--How to add an image next to the table-->
				</div>
		</div> <!-- .row -->
		<!--  <div class="row mt-4 mb-4">
			<div class="col-12">

				<a href="add_todb.php?id=<?php echo $_GET['id']; ?>" class="btn btn-secondary">Add to favorite</a>
		
		</div>  -->
		
	</div> <!-- .container -->

	<footer class="footer mt-1000" >
      <div class="container">
        <p class="text-body text-center">Foodie, Copyright 2022.</p>
      </div>
    </footer>

	<!-- Loaded jquery into this file -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<!-- <script src="finalpr.js"></script> -->

	<script> 
	let result = "<?php echo $_GET["id"] ?>";

	//let endpoint =" https://api.edamam.com/api/recipes/v2/"+result+"&app_id=e17c377f&app_key=42593f79d62588b8b81c32716454495b";

	$.ajax({
		method: "GET",
        url: "https://api.edamam.com/api/recipes/v2/"+result,
         
          data: {
              type: "public",
			  app_id: "e17c377f",
			  app_key: "42593f79d62588b8b81c32716454495b",
          }
        })
        .done(function(results){

          console.log(results);
		  displayResults(results);
        })
        .fail(function(results){
            console.log("API request failed");
      });
	 
 function displayResults(results) {
//convert the JSON to JS objects
let first = JSON.stringify(results);
let resJS= JSON.parse(first);

// console.log(resJS);
// console.log("Hello world");
//console.log(resultsJS.recipe.label);
 //show an image that says “Not available” when there is no img,otherwise show the img
    let image1=resJS.recipe.image;
    if(image1==null){
        image1="images/no-image.jpeg";
    }
    else{
        image1=resJS.recipe.image;
    }
    let htmlString=`<div class="row" >
	<div class="col"> <img src=${image1}  class="rounded img-thumbnail"  style="width: auto; height: 400px; text-align: center;"></div>
    <div class="col">
				  <table class="table table-responsive">
					<tr>
					<th class="text-right">Title:</th>
					<td>
					${resJS.recipe.label}</td>
					</tr>
					<tr>
					<th class="text-right">Calories:</th>
					<td>
					${resJS.recipe.calories.toFixed(0)}</td>
					</tr>
					<tr>
					<th class="text-right">Cuisine:</th>
					<td>
					${resJS.recipe.cuisineType}</td>
					</tr>
					<tr>
					<th class="text-right">Meal Type:</th>
					<td>
					${resJS.recipe.mealType}</td>
					</tr>

					<tr>
					<th class="text-right">Ingredients:</th>
					<td>
					${resJS.recipe.ingredientLines}</td>
					</tr>
					</table>
  					</div>

   
  </div>`;
   
    document.querySelector("#display").innerHTML+=htmlString;


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