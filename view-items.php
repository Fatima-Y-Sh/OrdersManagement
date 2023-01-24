<?php

   require_once("controllers/database/connection.php");
            $conn=openCon();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shalhoub Press</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
       <!-- Google fonts - Popppins for copy-->
       <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
    <!-- Prism Syntax Highlighting-->
    <link rel="stylesheet" href="vendor/prismjs/plugins/toolbar/prism-toolbar.css">
    <link rel="stylesheet" href="vendor/prismjs/themes/prism-okaidia.css">
    <!-- The Main Theme stylesheet (Contains also Bootstrap CSS)-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/logo.png">

  </head>
  <body style="background-color:lightyellow;">
  <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
        <a class="navbar-brand fw-bold text-uppercase text-base" href="index.php" style="color:darkorange;">
          <span class="d-none d-brand-partial">Shalhoub</span>
          <span class="d-none d-sm-inline">Press</span>
        </a>
        </nav>
    </header>

  
      <div class="page-holder bg-gray-100">
        <div class="container-fluid px-lg-4 px-xl-5">
              <!-- Breadcrumbs -->
              <div class="page-breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">الصفحة الرئيسية</a></li>
          
                </ul>
              </div>
              <!-- Page Header-->
              <div class="page-header">
              <h1 class="arabic" style="text-align:center;"><strong>المنتجات</strong></h1>
                  <?php
                  $query=mysqli_query($conn,"select count(*) as tot from item");

                  while($row3 = mysqli_fetch_array($query)){

                      echo"<h6>"."المجموع: " . $row3['tot'] . "</h6>";

                 }



                  ?>
              </div>
          <section>
            <div class="row">

                <!-- Simple card-->


                    <?php



            // for testing purposes
             $image_path='';
		$result = mysqli_query($conn, "SELECT * FROM item ;");

		if(mysqli_num_rows($result)==0){
			echo "No results found";
		}
else{


    while ($row = mysqli_fetch_array($result)){
  echo"   <div class='col-md-6 col-lg-3'> <div class='card mb-4'>";
                $item_id=$row["item_id"];
                $result2=mysqli_query($conn,"select  img_path from img where item_id='$item_id'");

                if(mysqli_num_rows($result2)==0)
                {
                  echo "<img class='card-img-top img-fluid' style='height:250px;' src='img/items/default.jpg' alt='Card image cap'>";
                }

                else{
                while ($row2 = mysqli_fetch_array($result2)){
                 $image_path=$row2["img_path"];
                 if(file_exists( $image_path) )
                 {
                    $image_path=$row2["img_path"];
                }
                else
                {
                  $image_path="img/items/default.jpg";
                }
                   echo "<img class='card-img-top img-fluid' style='height:250px;' src='".$image_path."' alt='Card image cap'>";
                   break;//to display the first image only

                }
              }

                $item_name = $row["item_name"];
                $plate_nb = $row["plate_nb"];

                echo "<div class='card-body'>".
               "<h5 class='card-title'>". $item_name."</h5>".
               
               "<p class='card-text'>" . "رقم البلاك:" . $plate_nb ."</p>". "<a class='btn btn-primary' href='update-item.php?item=".$item_id."'>تعديل</a>"." ".
             
                "</div>       </div>
              </div>";



                }



}
  closeCon($conn);

?>




              </div>
            </section>
          </div>
        </div>
      </div>

    <!-- JavaScript files-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <!-- Main Theme JS File-->
    <script src="../js/back/theme.js"></script>
    <!-- Prism for syntax highlighting-->
    <script src="vendor/prismjs/prism.js"></script>
    <script src="vendor/prismjs/plugins/normalize-whitespace/prism-normalize-whitespace.min.js"></script>
    <script src="vendor/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
    <script src="vendor/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
      // Optional
      Prism.plugins.NormalizeWhitespace.setDefaults({
      'remove-trailing': true,
      'remove-indent': true,
      'left-trim': true,
      'right-trim': true,
      });


    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>
