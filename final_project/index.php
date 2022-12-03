<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FooDie</title>
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
  html,body { 
  text-align: center;
  
}

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
#header-name{
  animation: 2s ease-out 0s 1 zoomIn;
}
.footer {
  height: 50px;
  margin-top: 200px;
}

button {
  border-radius: 4px;
  background-color: #5ca1e1;
  border: none;
  color: #fff;
  text-align: center;
  font-size: 32px;
  padding: 8px 16px;
  width: 300px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 36px;
  box-shadow: 0 10px 20px -8px rgba(0, 0, 0,.7);
  display: inline-block;
  position: relative;
}

button:after {
  content: '>';
  position: absolute;
  opacity: 0;  
  top: 14px;
  right: -20px;
  transition: 0.5s;
}

.rainbow-1:hover{
  background-image: linear-gradient(90deg, #00C0FF 0%, #FFCF00 49%, #FC4F4F 80%, #00C0FF 100%);
  animation:slidebg 5s linear infinite;
  padding-right: 24px;
  padding-left:8px;
}

.rainbow-1:hover:after {
  opacity: 1;
  right: 10px;
}

@keyframes slidebg {
  to {
    background-position:20vw;
  }
}



/* .zoom-in-out{
  animation: zoom-in-zoom-out 1s ease 1s; 
 
} */

/* @keyframes zoom-in-zoom-out {
  0% {
    transform: scale(1, 1);
  }
  50% {
    transform: scale(1.1, 1.1);
  }
  100% {
    transform: scale(1, 1);
  }
} */
/* @keyframes move{
0%{
 transform: scale(1) rotate(0deg);
}
  50%{
   transform: scale(2) rotate(0.1deg);

  }

} */
</style>
  </head>
  <body >
    <?php include 'nav.php'; ?>

    <div class="container-fluid ">
      
      <div class="row">
        <h1 class="col-12 mt-4" id="header-name" >FooDie Heaven <br>
        <span id="slogan">Changing the way you eat</span>
        </h1> 
      
      </div>
      

      <div class="row ">
        <form action="" method="GET" class="col-12" id="search-form" >
          
        <div class="form-group row">
				<label for="search-id" class="col-sm-3 col-form-label text-sm-right">Ingredients:</label>
				<div class="col-6">
					<select name="ingrid" id="search-id" class="form-control">
						<option value="" selected>-- Select one --</option>
            <option value="egg">Egg</option>
            <option value="rice">Rice</option>
            <option value="avocado">Avocado</option>
            <option value="tomato">Tomato</option>
            <option value="mozzarella">Mozzarella</option>
            <option value="salmon">Salmon</option>
            <option value="chicken">Chicken</option>
            <option value="sugar">Sugar</option>
						<!-- Rating dropdown options here -->
					</select>
          <div class="col-12 mt-4 col-sm-auto">
              <button type="submit" class="btn btn-outline-secondary btn-lg  rainbow-1" >
                Search
              </button>
            <!-- </div> -->
          </div>
				</div>
       </div>
        </form>
      </div>


      <!-- .row -->
      <div class="row">
        <div class="col-12 mt-4 ml-10">
          Showing
          <span id="num-results1" class="font-weight-bold ">1 </span> of
          <span id="num-results" class="font-weight-bold ">1 </span> result(s).
        </div>
      </div>
    </div>
    
    <div class="container">
      <div class="row" id="row_display"></div>
    </div>
    <footer class="footer">
      <div class="container">
        <p class="text-muted text-center">Foodie, Copyright 2022.</p>
      </div>
    </footer> <!-- Footer -->
<script src="finalpr.js"></script>
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
