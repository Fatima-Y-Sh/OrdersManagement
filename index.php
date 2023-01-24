
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

    <div class='col-md-6 col-lg-3'style="position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);"> 
      <div class='card mb-4' style="padding:2%">
    <img class="card-img-top img-fluid" style="height:auto" src="img/logo.png" alt='Logo'>

    <div class="card-body">

      </div>
 
      <a class='btn btn-primary' style="font-size:20px;background-color:darkorange;border-color:darkorange;color:darkblue;font-family: Arial, Helvetica, sans-serif;" href='add-new-item.php' ><strong>إضافة صنف جديد</strong></a>
      <br>
      <a class='btn btn-primary' style="font-size:20px;background-color:darkorange;border-color:darkorange;color:darkblue;font-family: Arial, Helvetica, sans-serif;" href='add-new-customer.php' ><strong>إضافة زبون جديد</strong></a>
      <br>
      <a class='btn btn-primary' style="font-size:20px;background-color:darkorange;border-color:darkorange;color:darkblue;font-family: Arial, Helvetica, sans-serif;" href='view-customers.php' ><strong> الزبائن </strong></a>
      <br>
      <a class='btn btn-primary' style="font-size:20px;background-color:darkorange;border-color:darkorange;color:darkblue;font-family: Arial, Helvetica, sans-serif;" href='search-item-by-customer.php' ><strong> منتجات الزبائن</strong></a>
      <br>
      <a class='btn btn-primary' style="font-size:20px;background-color:darkorange;border-color:darkorange;color:darkblue;font-family: Arial, Helvetica, sans-serif;" href='search-item.php' ><strong> بحث عن منتج</strong></a>
      <br>
      <a class='btn btn-primary' style="font-size:20px;background-color:darkorange;border-color:darkorange;color:darkblue;font-family: Arial, Helvetica, sans-serif;" href='search-order-by-customer.php' ><strong>بحث عن أمر طباعة</strong></a>
      <br>
      <a class='btn btn-primary' style="font-size:20px;background-color:darkorange;border-color:darkorange;color:darkblue;font-family: Arial, Helvetica, sans-serif;" href='view-items.php' ><strong>كل الأصناف</strong></a>
      <br>
      <a class='btn btn-primary' style="font-size:20px;background-color:darkorange;border-color:darkorange;color:darkblue;font-family: Arial, Helvetica, sans-serif;" href='payroll/index.php' ><strong>رواتب</strong></a>
      </div>
      </div>
</body>

</html>