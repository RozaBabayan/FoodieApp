<html><head>
    <title>FooDie | Home</title>
    <meta charset="UTF-8">
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
    <style type="text/css">
        /* body {
            background-color: bisque;
        } */
        
body {
  margin: 0;
  padding: 0;
  font-family: "Oswald", sans-serif;
  background: url("images/img1.jpg") no-repeat center center fixed; 
  background-size: cover;
  text-align: center;
}


        .demo-title-style {
            font-size: 80px;
            font-weight: 400;
        }

        .demo-description-style {
            font-size: 25px;
            font-weight: 200;
        }

        .zoom-in-out{

  animation: move 5s 1s;
}

@keyframes move{
0%{
 transform: scale(1) rotate(0deg);
}
  50%{
   transform: scale(2) rotate(0.1deg);

  }

}
</style>
</head>
<body>

    
<?php include 'nav.php'; ?>

    <div class="sticky-top hidden-spacer "></div>

    <div class="wrap ">
        <div class="container my-5 py-2 mx-auto mr-auto ">
            <div class="row justify-content-center my-3  zoom-in-out">
                <h1 class="text-white demo-title-style col-12 col-sm-12 col-md-12 col-lg-12"><em>"FooDie"</em></h1>
                <h2 class="description-style text-white  col-12 col-sm-12 col-md-12 col-lg-12">CONNECTING PEOPLE TO REAL FOOD.</h2>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center py-2">
                    <a href="index.php" class="btn btn-outline-light btn-lg">click to start</a>
                </div>
            </div>
        </div>
    </div>




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