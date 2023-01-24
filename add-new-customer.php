<?php

    include ('controllers/database/connection.php');
    $conn = openCon();
    header('Content-Type: text/html; charset=utf-8');
  
 

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shalhoub Press</title>
  
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
  <style>

.custom-form-input

{ margin-left:1%;
  margin-right:1%;
  width:20%;
  padding: 0.375rem 0.75rem;
  font-size: 0.9rem;
  font-weight: 400;
  line-height: 1.5;
  color: #343a40;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
    </style>
  <body style="background-color:lightyellow;">

  <?php
		  if(isset($_GET["success"])) {
			  echo "<p style='text-align:center;color:green;font-weight:bold;font-size:20px;'>تم الحفظ بنجاح</p>";
		  }
 
		?>

  <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
        <a class="navbar-brand fw-bold text-uppercase text-base" href="index.php" style="color:darkorange;">
          <span class="d-none d-brand-partial">Shalhoub</span>
          <span class="d-none d-sm-inline">Press</span>
        </a>
        </nav>
    </header>

    <div class="page-holder bg-gray-100" >

<div class="container-fluid px-lg-6 px-xl-5"  >
   

      <!-- Breadcrumbs -->
      <div class="page-breadcrumb" >
        <ul class="breadcrumb" >
          <li class="breadcrumb-item" ><a href="index.php">الصفحة الرئيسية</a></li>
          <li class="breadcrumb-item active"><a href="add-new-item.php">زبون جديد</a></li>
  
        </ul>
      </div>
  <!-- Page Header-->
  <div class="page-header" >
    <h1 class="arabic" style="text-align:center;"><strong>زبون جديد </strong></h1>
    
    <h3 class="page-heading" style="text-align:center;"><?php echo date('Y-m-d');?></h3>
  </div>
   <!-- here begins the main form-->
   <form  accept-charset="utf-8" id="productInfo" action="insert-customer-inter.php" method="post"  enctype="multipart/form-data" style="width:80%;margin-left:20%;margin-right:20%;float:none;" >
  <section>
    <div  class="row mb-5">
      <div class="col-lg-8 col-xxl-9 mb-4 mb-lg-0" >
        <div class="card mb-4">
          <div class="card-header">
            <h3 style="text-align:center;" class="arabic">المعلومات الأساسية</h3>
          </div>

          <div style="background-color:lightyellow;" class="card-body">

          <label class="form-label fw-bold" for="postTitle"><strong>إسم الزبون</strong></label>
          <br>
          <input  class="custom-form-input"   id="customer-name" name="customerName" type="text" required>
          <br>
          <br>
          <input id="customBtn" type="submit" value="Submit" name="submit">
          </section>
           
               </form>
        </div>
          

<footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 text-center text-md-start fw-bold">
        <p class="mb-2 mb-md-0 fw-bold">Shalhoub Press &copy; 2022</p>
      </div>
      <div class="col-md-6 text-center text-md-end text-gray-400">
        <p class="mb-0">Version 1.0</p>
      </div>
    </div>
  </div>
</footer>
</div>



   
</body>

</html>