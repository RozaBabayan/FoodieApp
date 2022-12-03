<?php
// Establish a DB connection
require './config/config.php';

// DB Connection
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	exit();
}

$mysqli->set_charset('utf8');
//-----Recipies
$sql="SELECT  name AS NAME,calories AS CALORIES,img_url as IMAGE,ingredients.ingredient_name AS MAIN_INGREDIENT,recipe_id
FROM recipes
LEFT JOIN ingredients 
	ON recipes.ingredients_ingredient_id=ingredients.ingredient_id;";

$result=$mysqli->query($sql);
if(!$result){
	echo $mysqli->error;
	exit();

}

// Close DB Connection
$mysqli->close();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MyFavorites</title>
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
		/* .form-check-label {
			padding-top: calc(.5rem - 1px * 2);
			padding-bottom: calc(.5rem - 1px * 2);
			margin-bottom: 0;
		} */
		.card{
    border-radius: 4px;
    background: #fff;
    box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
    transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
    cursor: pointer;
}

.card:hover{
     transform: scale(1.05);
     box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
}
	 
	</style>
</head>
<body>
	<?php include 'nav.php'; ?>
	
	
	<div class="container-fluid"  >
		<div class="row align-items-center">
			<h1 class="col-12 mt-4">MY FAVORITE RECIPES</h1>
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 mt-4 ml-10">
					Showing <?php echo  $result->num_rows;?> result(s).
			</div> <!-- .col -->
        </div><!--row-->
	</div> <!-- .container-fluid -->


	<div class="container">
		<div class="row">
    <?php while($row=$result->fetch_assoc()): ?>
			<div class="col-12 col-md-6 col-lg-3">
			
				<div class="card">
  				<img class="card-img-top" src="<?php echo $row["IMAGE"]?>" alt="Card image cap">
  				<div class="card-body">
   			    <h5 class="card-title"><?php echo $row["NAME"]?></h5>
            	</div>

                  <ul class="list-group list-group-flush">
                       	<li class="list-group-item"><?php echo $row["CALORIES"]?> kcal</li>
              			<li class="list-group-item"><?php echo $row["MAIN_INGREDIENT"]?></li>
                  </ul>
            <div class="card-body">

            <a href="delete.php?recipe_id=<?php echo $row['recipe_id'];?>&NAME=<?php echo $row['NAME']?>"  class="btn btn-light delete-btn">Remove form favorites</a>
            </div>
            
          </div>
    </div>
    <?php endwhile; ?>
		</div>
    </div>



	


	<!-- <script>
		//JS to pop up a message before user commits to deleting a track
		let delbutton=document.querySelectorAll(".delete-btn");
		for(let i=0; i<delbutton.length;i++){
			delbutton[i].onclick=function(){
				//if clicked 'ok' return true, else returns false if user clicks 'cancel'
				return confirm("You are about to delete <?php echo $_GET['title'];?>");
			}
		}
	</script> -->

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