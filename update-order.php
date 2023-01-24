<?php

require_once("controllers/database/connection.php");
$conn=openCon();
$res=mysqli_query($conn,"select * from orders where order_nb=".$_GET["order"]);
$order=mysqli_fetch_array($res);
$result=mysqli_query($conn,"select * from item where item_id=".$order["item_nb"]);
$item = mysqli_fetch_array($result);


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

{ margin-left:0.5%;
  margin-right:0.5%;
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

html,body{
  margin:0px;
  padding:0px;
  height:100%;

}
    </style>
  <body>

      <?php
		  if(isset($_GET["success"])) {
			  echo "<p style='text-align:center;color:green;font-weight:bold;font-size:20px;'>Successful insertion</p>";
		  }

		  if(isset($_GET["error"]) && $_GET["error"]==1) {
			  echo "<p style='text-align:center;color:red;font-weight:bold;font-size:20px;'>product already exists.</p>";
		  }
      if(isset($_GET["error"]) && $_GET["error"]==2) {
			  echo "<p style='text-align:center;color:red;font-weight:bold;font-size:20px;'>error.</p>";
		  }

           if(isset($_GET["errorImage"]) && $_GET["errorImage"]==1) {
			  echo "<p style='text-align:center;color:red;font-weight:bold;font-size:20px;'>error in image upload</p>";
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
          <li class="breadcrumb-item active">تعديل أمر طباعة</li>
  
        </ul>
      </div>
  <!-- Page Header-->
  <div class="page-header"  >
    <h1 class="arabic" style="text-align:center;"><strong>تعديل أمر طباعة</strong></h1>
    
    <h3 class="arabic" style="text-align:center;"><strong> تاريخ الإصدار <?php echo $order["date_created"];?> </strong></h3>
  </div>
            <!-- here begins the main form-->
            <form  accept-charset="utf-8" id="productInfo" action="update-order-inter.php?order=<?php echo $_GET["order"];?>" method="post"  enctype="multipart/form-data" style="width:80%;margin-left:20%;margin-right:20%;float:none;" >
  <section  >
    <div  class="row mb-5" >
    <div class="col-xl-12" style="position:absolute;top:0px;
right:0px;
bottom:0px;
left:0px;"  >
        <div class="card mb-4">
          <div class="card-header">
            <h3 style="text-align:center;" class="arabic">المعلومات الأساسية</h3>
          </div>

          <div style="background-color:lightyellow;" class="card-body">

          <label class="form-label fw-bold" for="postTitle"><strong>الزبون</strong></label>
        <br>
        <select disabled name='customer' style="width: 250px; height:30px; margin: 2%">

         

                   <?php
                    /*if($customer=='')
                    {
                    
                      echo "<option  disabled selected>-- إختر الزبون --</option>";
                      $result1 = mysqli_query($conn, "SELECT * From customer"); 
                      while($row1 = mysqli_fetch_array($result1))
                      {
                         echo "<option  value='". $row1['customer_id'] ."'>" .$row1['customer_name'] ."</option>"; 
                      }
                    }
                    
                    else
                    {*/
                      $customer_res=mysqli_query($conn,"select * from customer where customer_id=".$item['customer_nb']);
                      $customer_row=mysqli_fetch_array($customer_res);
                      echo "<option selected value='". $customer_row['customer_id'] ."'>" .$customer_row['customer_name'] ."</option>"; 
                      
                     $result2 = mysqli_query($conn, "SELECT * From customer where customer_id <>".$customer); 
                     while($row2 = mysqli_fetch_array($result2))
                     {
                        echo "<option  value='". $row2['customer_id'] ."'>" .$row2['customer_name'] ."</option>"; 
                     }
                   // }

                    
                    ?>
                   </select>
<br>
            <label class="form-label fw-bold" for="postTitle"><strong>إسم المنتج</strong></label>
            <input disabled style="width:20%;" class="custom-form-input" id="item-name" name="itemName" type="text" value="<?php echo $item["item_name"];?>" required >
<br>
<br>
<input class="form-control mb-4" id="itemId" name="itemtId" type="text" value="<?php echo $item["item_id"];?>"  hidden>


<label class="form-label fw-bold" for="postTitle"><strong>قياس المنتج</strong></label>
          <br>
          <label class="form-label fw-bold" for="postTitle"><strong>عرض</strong></label>
          <input disabled class="custom-form-input"   style="width:10%" id="item-size-x" name="itemSizex" type="text" required value="<?php echo $item['final_size_x']?>">
          <label class="form-label fw-bold" for="postTitle"><strong>طول</strong></label>
          <input disabled class="custom-form-input"    style="width:10%" id="item-size-y" name="itemSizey" type="text" required value="<?php echo $item['final_size_y']?>">
          <label class="form-label fw-bold" for="postTitle"><strong>إرتفاع</strong></label>
          <input disabled class="custom-form-input"   style="width:10%" id="item-size-z" name="itemSizez" type="text" value="<?php echo $item['final_size_z']?>">
          <br><br>
          <label class="form-label fw-bold" for="postTitle"><strong>ورق الطباعة</strong></label>
          <br>
          <label class="form-label fw-bold" for="postTitle"><strong>1 الورق</strong></label>
          <br>
         
          
          <label class="form-label fw-bold" for="postTitle"><strong>نوع 1</strong></label>
              <input disabled required style="width:10%;" class="custom-form-input"  id="item-material-1" name="itemMaterial1" type="text" value="<?php echo $item['material_1']?>"  >
              <label class="form-label fw-bold" for="postTitle"><strong>لون 1</strong></label>
    <input disabled class="custom-form-input" style="width:10%" id="item-paper-color-1" name="paperColor1" type="text" value="<?php echo $item['paper_color_1']?>" >
    <label class="form-label fw-bold"><strong>سماكة 1</strong></label>
       
              
       <input disabled  class="custom-form-input" style="width:10%" name="itemGsm1"  required value="<?php echo $item['paper_gsm_1']?>">
     
    <label class="form-label fw-bold"  for="postTitle"><strong> 1 عرض</strong></label>       
    <input disabled class="custom-form-input" style="width:10%" id="paper-size-x-1" name="paperSizex1" type="text" required value="<?php echo $item['paper_size_x_1']?>">
    <label class="form-label fw-bold" for="postTitle"><strong> 1 طول</strong></label> 
    <input disabled class="custom-form-input" style="width:10%" id="paper-size-y-1" name="paperSizey1" type="text" required value="<?php echo $item['paper_size_y_1']?>">
    <label class="form-label fw-bold" for="postTitle"><strong> ملاحظة</strong></label> 
      <input class="custom-form-input" style="width:10%" id="note-1" name="note1" type="text" value="<?php echo $item['note_1']?>" disabled>

     <br>


     <label class="form-label fw-bold" for="postTitle"><strong>2 الورق</strong></label>
            <br>


       <label class="form-label fw-bold" for="postTitle"><strong>نوع 2</strong></label>
       <input disabled style="width:10%;" class="custom-form-input"  id="item-material-2" name="itemMaterial2" type="text" value="<?php echo $item["material_2"];?>" >

       <label class="form-label fw-bold" for="postTitle"><strong>لون 2</strong></label>
      
      <input disabled class="custom-form-input" style="width:10%" id="item-paper-color-2" name="paperColor2" type="text" value="<?php echo $item["paper_color_2"];?>" >
      <label class="form-label fw-bold"><strong>سماكة 2</strong></label>



              
             
              <input  class="custom-form-input" style="width:10%" name="itemGsm2" value="<?php echo $item["paper_gsm_2"];?>" disabled>
              <label class="form-label fw-bold"  for="postTitle"><strong> 2 عرض</strong></label> 
      <input class="custom-form-input"  style="width:10%" id="paper-size-x-2" name="paperSizex2" type="text" value="<?php echo $item["paper_size_x_2"];?>" disabled>
      <label class="form-label fw-bold" for="postTitle"><strong> 2 طول</strong></label> 
      <input class="custom-form-input" style="width:10%" id="paper-size-y-2" name="paperSizey2" type="text" value="<?php echo $item["paper_size_y_2"];?>" disabled >
         
      <label class="form-label fw-bold" for="postTitle"><strong> ملاحظة</strong></label> 
      <input class="custom-form-input" style="width:10%" id="note-2" name="note2" type="text" value="<?php echo $item['note_2']?>" disabled>
<br>
     <label class="form-label fw-bold" for="postTitle"><strong>3 الورق</strong></label>
            <br>

        <label class="form-label fw-bold" for="postTitle"><strong>3 نوع </strong></label>

        <input disabled style="width:10%;" class="custom-form-input"  id="item-material-3" name="itemMaterial3" type="text" value="<?php echo $item["material_3"];?>" >
        <label class="form-label fw-bold" for="postTitle"><strong>لون 3</strong></label>
      <input disabled class="custom-form-input" style="width:10%" id="item-paper-color-3" name="paperColor3" type="text" value="<?php echo $item["paper_color_3"];?>" >
      <label class="form-label fw-bold"><strong>سماكة 3</strong></label>
              
              <input  class="custom-form-input" style="width:10%" name="itemGsm3" value="<?php echo $item["paper_gsm_3"];?>" disabled >
              <label class="form-label fw-bold" for="postTitle"><strong> 3 عرض</strong></label> 
      <input class="custom-form-input" style="width:10%" id="paper-size-x-3" name="paperSizex3" type="text" value="<?php echo $item["paper_size_x_3"];?>" disabled >
      <label class="form-label fw-bold" for="postTitle"><strong> 3 طول</strong></label> 
      <input class="custom-form-input" style="width:10%" id="paper-size-y-3" name="paperSizey3" type="text" value="<?php echo $item["paper_size_y_3"];?>" disabled >
      <label class="form-label fw-bold" for="postTitle"><strong> ملاحظة</strong></label> 
      <input class="custom-form-input" style="width:10%" id="note-3" name="note3" type="text" value="<?php echo $item['note_3']?>" disabled>

      <br>
     <label class="form-label fw-bold" for="postTitle"><strong>4 الورق</strong></label>
            <br>





        <label class="form-label fw-bold" for="postTitle"><strong>نوع 4</strong></label>

        <input disabled style="width:10%;" class="custom-form-input"  id="item-material-4" name="itemMaterial4" type="text" value="<?php echo $item["material_4"];?>" >
        <input hidden style="width:10%;" class="custom-form-input"  id="item-additional" name="itemAdditional" type="text" value="<?php echo $item["additional"];?>" >

        <label class="form-label fw-bold" for="postTitle"><strong>لون 4</strong></label>
      
      <input disabled class="custom-form-input" style="width:10%" id="item-paper-color-4" name="paperColor4" type="text" value="<?php echo $item["paper_color_4"];?>" >
      <label class="form-label fw-bold"><strong>سماكة 4</strong></label>
               
               <input  class="custom-form-input" style="width:10%" name="itemGsm4" value="<?php echo $item["paper_gsm_4"];?>" disabled>

               <label class="form-label fw-bold" for="postTitle"><strong> 4 عرض</strong></label> 
      <input class="custom-form-input" style="width:10%" id="paper-size-x-4" name="paperSizex4" type="text"  value="<?php echo $item["paper_size_x_4"];?>" disabled>
      <label class="form-label fw-bold" for="postTitle"><strong> 4 طول</strong></label> 
      <input class="custom-form-input" style="width:10%" id="paper-size-y-4" name="paperSizey4" type="text" value="<?php echo $item["paper_size_y_4"];?>" disabled>
      <label class="form-label fw-bold" for="postTitle"><strong> ملاحظة</strong></label> 
      <input class="custom-form-input" style="width:10%" id="note-4" name="note4" type="text" value="<?php echo $item['note_4']?>" disabled>


      <br>
     <label class="form-label fw-bold" for="postTitle"><strong>5 الورق</strong></label>
            <br>
        <label class="form-label fw-bold" for="postTitle"><strong>نوع 5</strong></label>

        <input disabled style="width:10%;" class="custom-form-input"  id="item-material-5" name="itemMaterial5" type="text" value="<?php echo $item["material_5"];?>" >


       
      <label class="form-label fw-bold" for="postTitle"><strong>لون 5</strong></label>
      <input disabled class="custom-form-input" style="width:10%" id="item-paper-color-5" name="paperColor5" type="text" value="<?php echo $item["paper_color_5"];?>" >

         
                <label class="form-label fw-bold"><strong>سماكة 5</strong></label>
             
                  <input  class="custom-form-input" style="width:10%" name="itemGsm5" value="<?php echo $item["paper_gsm_5"];?>" disabled >
       
 
   
      <label class="form-label fw-bold" for="postTitle"><strong> 5 عرض</strong></label> 
      <input class="custom-form-input" style="width:10%" id="paper-size-x-5" name="paperSizex5" type="text" value="<?php echo $item["paper_size_x_5"];?>" disabled>
      <label class="form-label fw-bold" for="postTitle"><strong> 5 طول</strong></label> 
      <input class="custom-form-input" style="width:10%" id="paper-size-y-5" name="paperSizey5" type="text" value="<?php echo $item["paper_size_y_5"];?>" disabled >
      <label class="form-label fw-bold" for="postTitle"><strong> ملاحظة</strong></label> 
      <input class="custom-form-input" style="width:10%" id="note-5" name="note5" type="text" value="<?php echo $item['note_5']?>" disabled>
      <br><br>
  
                <label class="form-label fw-bold" for="postTitle"><strong>عدد النسخات</strong></label>
      <input  disabled class="custom-form-input" style="width:10%;" id="item-material" name="itemCopies" type="text" value="<?php echo $item["copies"];?>" required>

      <label class="form-label fw-bold" for="postTitle"><strong>عدد الأوراق</strong></label>
      <input disabled class="custom-form-input" style="width:10%;" id="paper-count" name="itemPaperCount" type="text" value="<?php echo $item["paper_count"];?>" required>
      <label class="form-label fw-bold" for="postTitle"><strong>العدد الإضافي</strong></label>
      <input class="custom-form-input"  style="width:10%" id="item-additional" name="itemAdditional" type="text" required value="<?php echo $item['additional']?>" disabled>


<br>
<label class="form-label fw-bold" for="postTitle"><strong>تقسيم الترقيم</strong></label>
      <input class="custom-form-input"  style="width:10%" id="divide-nb" name="divideNb" type="text"  value="<?php echo $item['divide_nb']?>" disabled>
<br>


    <label  class="form-label fw-bold" for="postTitle"><strong>لون الطباعة</strong></label>
    <br>
    <label class="form-label fw-bold" for="postTitle"><strong>لون 1</strong></label>
    <input disabled class="custom-form-input" style="width:10%;" id="item-print-color-1" name="itemPrintingColor1" type="text" required value="<?php echo $item['printing_color_1']?>">
    <label class="form-label fw-bold" for="postTitle"><strong>لون 2</strong></label>
    <input disabled class="custom-form-input" style="width:10%;" id="item-print-color-2" name="itemPrintingColor2" type="text" value="<?php echo $item['printing_color_2']?>" >
    <label class="form-label fw-bold" for="postTitle"><strong>لون 3</strong></label>
    <input disabled  class="custom-form-input" style="width:10%;" id="item-print-color-3" name="itemPrintingColor3" type="text" value="<?php echo $item['printing_color_3']?>" >
    <label class="form-label fw-bold" for="postTitle"><strong>لون 4</strong></label>
    <input disabled  class="custom-form-input" style="width:10%;" id="item-print-color-4" name="itemPrintingColor4" type="text" value="<?php echo $item['printing_color_4']?>" >
    <label class="form-label fw-bold" for="postTitle"><strong>لون 5</strong></label>
    <input disabled  class="custom-form-input" style="width:10%;" id="item-print-color-5" name="itemPrintingColor5" type="text"  value="<?php echo $item['printing_color_5']?>">
<br>
<br>


                       <label class="form-label fw-bold" for="postTitle"><strong>رقم البلاك</strong></label>
                    
                       <input disabled  class="custom-form-input"  style="width:10%" id="item-plate-nb" name="itemPlateNb" type="text" required value="<?php echo $item['plate_nb']?>">

                       <label class="form-label fw-bold" for="postTitle"><strong>التكرار على البلاك</strong></label>
                    <?php
                      $plate_res=mysqli_query($conn,"SELECT * FROM plate WHERE plate_nb='".$item['plate_nb']."'");
                      $plate = mysqli_fetch_array($plate_res);
                     echo" <input  style='width:10%' class='custom-form-input' id='copies-per-plate' name='copiesPerPlate' type='text' required value='".$plate['copiesperplate']."'>";
                    //echo"<label class='form-label fw-bold' for='postTitle'><strong>SELECT * FROM plate WHERE plate_nb=".$item['plate_nb']."</strong></label>";
                    ?>
                       
                       <label class="form-label fw-bold" for="postTitle"><strong>رقم المقطع</strong></label>
                    
                       <input disabled  class="custom-form-input"  style="width:10%" id="item-cutter-nb" name="itemCutterNb" type="text" value="<?php echo $item['cutter_nb']?>" >
    
        
                       <!--
               <select name='itemPlateNb' style="width: 250px; height:30px; margin: 2%">
                <option disabled selected>-- إختر الرقم --</option>

                   <?php
                   /*
                    $result2 = mysqli_query($conn, "SELECT * From plate;"); 
                    while($row2 = mysqli_fetch_array($result2))
                    {
                       echo "<option  value='". $row2['plate_nb'] ."'>" .$row2['plate_nb'] ."</option>"; 
                    }

                    closeCon($conn);
                    */
                    ?>
                   </select>
                  -->
              <br>
              <br>
                  <label class="form-label fw-bold" for="postTitle"><strong>سلوفان</strong></label>
                  <fieldset id="cellophane">
                    <input disabled <?php if($item['cellophane']=='glossy') echo"checked"; ?> type="radio" name="cellophane" value="glossy">  لميع
                    <br>
                    <input disabled  <?php if($item['cellophane']=='matte') echo"checked"; ?> type="radio" name="cellophane" value="matte">  مات
                    <br>
                    <input disabled <?php if($item['cellophane']=='without') echo"checked"; ?> type="radio" name="cellophane" value="without">  بدون
                    </fieldset>

<br>
                 

          </div>
        </div>

        <div class="page-header">
        <h4  class="arabic">صور المنتج</h4>
              </div>
                <section>
            <div class="row"> 
              <?php 

              $image_query=mysqli_query($conn,"select * from img where item_id=".$item["item_id"]);

              if(mysqli_num_rows($image_query)==0)
              {

                echo"<div class='col-6 col-md-4 col-lg-3'>";
                echo"<div class='card mb-4'><a class='glightbox' href='img/items/default.jpg' data-gallery='gallery' data-title='Image 1'>";
                echo"<img style='height:200px;' class='card-img-top' src='img/items/default.jpg' alt='Image 1'></a>";
                  echo" <div class='card-body p-3 p-lg-4'>";
                    
                    echo"<p class='card-text text-muted text-sm'> default image </p>";
                  echo"</div>";
                echo"</div>";
              echo"</div>";

              }
              else{

              
              while($row=mysqli_fetch_array($image_query))
              {
                $image_path=$row['img_path'];
                if(!file_exists($image_path))
                {
                  $image_path="img/back/product/default.jpg";
                  echo"<div class='col-6 col-md-4 col-lg-3'>";
                  echo"<div class='card mb-4'><a class='glightbox' href='".$image_path."'"." data-gallery='gallery' data-title='Image 1'>";
                  echo"<img style='height:200px;' class='card-img-top' src='". $image_path."' alt='Image 1'></a>";
                    echo" <div class='card-body p-3 p-lg-4'>";
                      
                      echo"<p class='card-text text-muted text-sm'>". $image_path."</p>";
                    echo"</div>";
                  echo"</div>";
                echo"</div>";
                break;
                }
              
                


              echo"<div class='col-6 col-md-4 col-lg-3'>";
                echo"<div class='card mb-4'><a class='glightbox' href='". $image_path."'"." data-gallery='gallery' data-title='Image 1'>";
                echo"<img style='height:200px;' class='card-img-top' src='". $image_path."' alt='Image 1'></a>";
                  echo" <div class='card-body p-3 p-lg-4'>";
                    
                    echo"<p class='card-text text-muted text-sm'>". $image_path."</p>";
                  echo"</div>";
                echo"</div>";
              echo"</div>";
            }
            }




?>

<div class="card-header" > 
            <h3 style="text-align:center;" class="arabic">معلومات الطباعة</h3>
          </div>
          <div style="background-color:lightyellow;width:100%" class="card-body">


          <label class="form-label fw-bold" for="postTitle"><strong>العدد المطلوب</strong></label>
          <input  class="custom-form-input" style="width:10%" id="ordered-qty" name="orderedQty" type="number"  required value="<?php echo $order['ordered_qty'] ?>">
          <br><br>
    <?php
    $number_query=mysqli_query($conn,"SELECT * FROM orders WHERE item_nb=".$item["item_id"]." ORDER BY date_created DESC LIMIT 1");
    $number=mysqli_fetch_array($number_query);
    echo "<label class='form-label fw-bold' for='postTitle'><strong> آخر رقم:  ".$number['number_to'] ."</strong></label>";
    echo"<br><br>"
    ?>
          <label class="form-label fw-bold" for="postTitle"><strong> من رقم</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="nb-from" name="nbFrom" type="number"  required>
          <label class="form-label fw-bold" for="postTitle"><strong>إلى رقم</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="nb-to" name="nbTo" type="number"   required>
          <br>

    
         


          <script type="text/javascript">
             nbMethod=function getCalc(){
            var div = document.getElementById("divide-nb").value;;
            var to = document.getElementById("nb-to").value;
            var from = document.getElementById("nb-from").value;
            var k;
            if(from == 1)
            {
              from=0;
              k = (to)/div;    
            } 
            else{
             k = (to-from)/div;      

            }
             
          
                     
            for(var i=1; i<=div;i++){

              if(i==1 && from ==0){
                document.getElementById(`nb-from-${i}`).value = 1;

              }

              if(i>1)
              {
                document.getElementById(`nb-from-${i}`).value = parseFloat(from)+1;


              }
              else{
                document.getElementById(`nb-from-${i}`).value = parseFloat(from);


              }
             if(i>1)
             {
              document.getElementById(`nb-to-${i}`).value =parseFloat(from)+parseFloat(k);
            }
            else{
              document.getElementById(`nb-to-${i}`).value =parseFloat(from)+parseFloat(k);

            }
              from =parseFloat(from)+parseFloat(k) ;
              //from =  document.getElementById(`nb-to-${i}`).value;
              //k += k;
            }
          }


          </script>
          <br>
                    <a class='btn btn-primary'  onclick='nbMethod()'>أحسب</a>
          <br>
         <label class="form-label fw-bold" for="postTitle"><strong> تقسيم الترقيم</strong></label> 
          <br>
          <label class="form-label fw-bold" for="postTitle"><strong> من رقم</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="nb-from-1" name="nbFrom1" type="number"  required>
          <label class="form-label fw-bold" for="postTitle"><strong>إلى رقم</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="nb-to-1" name="nbTo1" type="number"   required>
          <br>

          <label class="form-label fw-bold" for="postTitle"><strong> من رقم</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="nb-from-2" name="nbFrom2" type="number"  required>
          <label class="form-label fw-bold" for="postTitle"><strong>إلى رقم</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="nb-to-2" name="nbTo2" type="number"   required>
          <br>

          <label class="form-label fw-bold" for="postTitle"><strong> من رقم</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="nb-from-3" name="nbFrom3" type="number"  required>
          <label class="form-label fw-bold" for="postTitle"><strong>إلى رقم</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="nb-to-3" name="nbTo3" type="number"   required>
          <br>

          <label class="form-label fw-bold" for="postTitle"><strong> من رقم</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="nb-from-4" name="nbFrom4" type="number"  required>
          <label class="form-label fw-bold" for="postTitle"><strong>إلى رقم</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="nb-to-4" name="nbTo4" type="number"   required>
          <br>
  

   

          <script type="text/javascript">

calcMethod=function getCalc(){
var ordered_qty=document.getElementById("ordered-qty").value;
var qty_per_board_1=document.getElementById("qty-per-board-1").value;
var qty_per_board_2=document.getElementById("qty-per-board-2").value;
var qty_per_board_3=document.getElementById("qty-per-board-3").value;
var qty_per_board_4=document.getElementById("qty-per-board-4").value;
var qty_per_board_5=document.getElementById("qty-per-board-5").value;
var qty_to_add=document.getElementById("item-additional").value;

var paper_count=document.getElementById("paper-count").value;
var copies_per_plate=document.getElementById("copies-per-plate").value;

var qty_total=ordered_qty*paper_count;

var qty_to_print=qty_total/copies_per_plate;//kabset

var qty_to_cut_1=(qty_to_print/qty_per_board_1)+qty_to_add;//torhiyet
var qty_to_cut_2=(qty_to_print/qty_per_board_2)+qty_to_add;//torhiyet
var qty_to_cut_3=(qty_to_print/qty_per_board_3)+qty_to_add;//torhiyet
var qty_to_cut_4=(qty_to_print/qty_per_board_4)+qty_to_add;//torhiyet
var qty_to_cut_5=(qty_to_print/qty_per_board_5)+qty_to_add;//torhiyet


var qty_after_cut_1=qty_to_cut_1*qty_per_board_1;//ba3d l 2as
var qty_after_cut_2=qty_to_cut_2*qty_per_board_2;//ba3d l 2as
var qty_after_cut_3=qty_to_cut_3*qty_per_board_3;//ba3d l 2as
var qty_after_cut_4=qty_to_cut_4*qty_per_board_4;//ba3d l 2as
var qty_after_cut_5=qty_to_cut_5*qty_per_board_5;//ba3d l 2as


document.getElementById("qty-to-cut-1").value=Math.ceil(qty_to_cut_1);
document.getElementById("qty-after-cut-1").value=Math.ceil(qty_after_cut_1);

document.getElementById("qty-to-cut-2").value=Math.ceil(qty_to_cut_2);
document.getElementById("qty-after-cut-2").value=Math.ceil(qty_after_cut_2);

document.getElementById("qty-to-cut-3").value=Math.ceil(qty_to_cut_3);
document.getElementById("qty-after-cut-3").value=Math.ceil(qty_after_cut_3);

document.getElementById("qty-to-cut-4").value=Math.ceil(qty_to_cut_4);
document.getElementById("qty-after-cut-4").value=Math.ceil(qty_after_cut_4);

document.getElementById("qty-to-cut-5").value=Math.ceil(qty_to_cut_5);
document.getElementById("qty-after-cut-5").value=Math.ceil(qty_after_cut_5);
  

document.getElementById("qty-to-print-1").value=Math.ceil(qty_to_print);
document.getElementById("qty-to-print-2").value=Math.ceil(qty_to_print);
document.getElementById("qty-to-print-3").value=Math.ceil(qty_to_print);
document.getElementById("qty-to-print-4").value=Math.ceil(qty_to_print);
document.getElementById("qty-to-print-5").value=Math.ceil(qty_to_print);






}


</script>
       

       


  <br><br>

  <label class="form-label fw-bold" for="postTitle"><strong>ملاحظات</strong></label> 
          <input  class="custom-form-input"  style="width:80%;" id="notes" name="orderNotes" type="text" value="<?php echo $order['notes']  ?>">
          <br><br>
  <label class="form-label fw-bold" for="postTitle"><strong>مجهز الطبع (عد)</strong></label> 
          <input  class="custom-form-input" style="width:10%;" id="counter" name="counter" type="text" value="<?php echo $order['counter']  ?>"  >
     <label class="form-label fw-bold" for="postTitle"><strong>العدد</strong></label> 
          <input  class="custom-form-input" style="width:10%;" id="counter-qty" name="counterQty" type="text" value="<?php echo $order['counter_qty']  ?>" >
<br>
          <label class="form-label fw-bold" for="postTitle"><strong>تم التوقيع</strong></label>

          <fieldset  id="counterSign">
                    <input  <?php if($order['counter_sign']=='yes') echo"checked"; ?> type="radio" name="counterSign" value="yes">  نعم
                    <br>
                    <input  <?php if($order['counter_sign']=='no') echo"checked"; ?> type="radio" name="counterSign" value="no">  كلا
       
                    </fieldset>


                    <br>
          <label class="form-label fw-bold" for="postTitle"><strong>مجهز الطبع (قص)</strong></label> 
          <input  class="custom-form-input" style="width:10%;" id="precutter" name="precutter" type="text"  value="<?php echo $order['precutter']  ?>">
    
     <label class="form-label fw-bold" for="postTitle"><strong>العدد</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="precutter-qty" name="precutterQty" type="text" value="<?php echo $order['precutter_qty']  ?>" >
          <br>
          <label class="form-label fw-bold" for="postTitle"><strong>تم التوقيع</strong></label>
    
          <fieldset  id="precutterSign">
                    <input  <?php if($order['precutter_sign']=='yes') echo"checked"; ?> type="radio" name="precutterSign" value="yes">  نعم
                    <br>
                    <input  <?php if($order['precutter_sign']=='no') echo"checked"; ?> type="radio" name="precutterSign" value="no">  كلا
       
                    </fieldset>
                    <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>التأكد من صحة البلاك من قبل</strong></label> 
          <input  class="custom-form-input" id="checker" style="width:10%;" name="checker" type="text" value="<?php echo $order['checker']  ?>" >
          <br>
          <label class="form-label fw-bold" for="postTitle"><strong>تم التوقيع</strong></label>
       
    
          <fieldset  id="checkerSign">
                    <input  <?php if($order['checker_sign']=='yes') echo"checked"; ?> type="radio" name="checkerSign" value="yes">  نعم
                    <br>
                    <input  <?php if($order['checker_sign']=='no') echo"checked"; ?> type="radio" name="checkerSign" value="no">  كلا
       
                    </fieldset>
                    <br>
                
                    <label class="form-label fw-bold" for="postTitle"><strong>منفذ الطباعة</strong></label> 
          <input  class="custom-form-input" id="printer" style="width:10%;" name="printer" type="text" value="<?php echo $order['printer']  ?>" >

     <label class="form-label fw-bold" for="postTitle"><strong>العدد</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="printer-qty" name="printerQty" type="text" value="<?php echo $order['printer_qty']  ?>" >
          <br>
          <label class="form-label fw-bold" for="postTitle"><strong>تم التوقيع</strong></label>
        
          <fieldset  id="printerSign">
                    <input  <?php if($order['printer_sign']=='yes') echo"checked"; ?> type="radio" name="printerSign" value="yes">  نعم
                    <br>
                    <input  <?php if($order['printer_sign']=='no') echo"checked"; ?> type="radio" name="printerSign" value="no">  كلا
       
                    </fieldset>
                    <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>منفذ الترقيم</strong></label> 
                    <input  class="custom-form-input" style="width:10%;" id="numbering" name="numbering" type="text" value="<?php echo $order['numbering']  ?>" >
              
                    <label class="form-label fw-bold" for="postTitle"><strong>العدد</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="numbering-qty" name="numberingQty" type="text" value="<?php echo $order['numbering_qty']  ?>"  >
          <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>تم التوقيع</strong></label>
                   
                    <fieldset  id="numberingSign">
                    <input  <?php if($order['numbering_sign']=='yes') echo"checked"; ?> type="radio" name="numberingSign" value="yes">  نعم
                    <br>
                    <input  <?php if($order['numbering_sign']=='no') echo"checked"; ?> type="radio" name="numberingSign" value="no">  كلا
       
                    </fieldset>
                    <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>منفذ التقطيع</strong></label> 
                    <input  class="custom-form-input" style="width:10%;" id="cutter" name="cutter" type="text" value="<?php echo $order['cutter']  ?>"  >
               
                    <label class="form-label fw-bold" for="postTitle"><strong>العدد</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="cutter-qty" name="cutterQty" type="text" value="<?php echo $order['cutter_qty']  ?>" >
          <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>تم التوقيع</strong></label>
                  
                    <fieldset  id="cutterSign">
                    <input  <?php if($order['cutter_sign']=='yes') echo"checked"; ?> type="radio" name="cutterSign" value="yes">  نعم
                    <br>
                    <input  <?php if($order['cutter_sign']=='no') echo"checked"; ?> type="radio" name="cutterSign" value="no">  كلا
       
                    </fieldset>
                    <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>منفذ السلوفان</strong></label> 
                    <input  class="custom-form-input" style="width:10%;" id="cellophaner" name="cellophaner" type="text" value="<?php echo $order['cellophaner']  ?>"  >
                
                    <label class="form-label fw-bold" for="postTitle"><strong>العدد</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="celliphaner-qty" name="cellophanerQty" type="text" value="<?php echo $order['cellophaner_qty']  ?>"  >
          <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>تم التوقيع</strong></label>
                  
                    <fieldset  id="cellophanerSign">
                    <input  <?php if($order['cellophaner_sign']=='yes') echo"checked"; ?> type="radio" name="cellophanerSign" value="yes">  نعم
                    <br>
                    <input  <?php if($order['cellophaner_sign']=='no') echo"checked"; ?> type="radio" name="cellophanerSign" value="no">  كلا
       
                    </fieldset>
                    <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>منفذ التجميع</strong></label> 
                    <input  class="custom-form-input" style="width:10%;" id="assembler" name="assembler" type="text" value="<?php echo $order['assembler']  ?>"  >
             
                    <label class="form-label fw-bold" for="postTitle"><strong>العدد</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="assembler-qty" name="assemblerQty" type="text"  value="<?php echo $order['assembler_qty']  ?>" >
          <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>تم التوقيع</strong></label>
                
                    <fieldset  id="assemblerSign">
                    <input  <?php if($order['assembler_sign']=='yes') echo"checked"; ?> type="radio" name="assemblerSign" value="yes">  نعم
                    <br>
                    <input  <?php if($order['assembler_sign']=='no') echo"checked"; ?> type="radio" name="assemblerSign" value="no">  كلا
       
                    </fieldset>
                    <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>منفذ الإنهاء</strong></label> 
                    <input  class="custom-form-input" style="width:10%;" id="finisher" name="finisher" type="text"  value="<?php echo $order['finisher']  ?>"  >
               
                    <label class="form-label fw-bold" for="postTitle"><strong>العدد</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="finisher-qty" name="finisherQty" type="text"  value="<?php echo $order['finisher_qty']  ?>" >
          <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>تم التوقيع</strong></label>
                    
                             
                    <fieldset  id="finisherSign">
                    <input  <?php if($order['finisher_sign']=='yes') echo"checked"; ?> type="radio" name="finisherSign" value="yes">  نعم
                    <br>
                    <input  <?php if($order['finisher_sign']=='no') echo"checked"; ?> type="radio" name="finisherSign" value="no">  كلا
       
                    </fieldset>
                    <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>منفذ التحرير</strong></label> 
                    <input  class="custom-form-input" style="width:10%;" id="freecutter" name="freecutter" type="text"  >
              
                    <label class="form-label fw-bold" for="postTitle"><strong>العدد</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="freecutter-qty" name="freecutterQty" type="number"  >
          <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>تم التوقيع</strong></label>
                
                    <fieldset id="freecutterSign">
                    <input  type="radio" name="freecutterSign" value="yes">  نعم
             
                    <input  type="radio" name="freecutterSign" value="no">  كلا
                    </fieldset>
                    <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>منفذ التوضيب</strong></label> 
                    <input  class="custom-form-input" style="width:10%;" id="packer" name="packer" type="text"  >
              
                    <label class="form-label fw-bold" for="postTitle"><strong>العدد</strong></label> 
          <input  class="custom-form-input" style="width:10%" id="packer-qty" name="packerQty" type="number"  >
          <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>تم التوقيع</strong></label>
                
                    <fieldset id="packerSign">
                    <input  type="radio" name="packerSign" value="yes">  نعم
             
                    <input  type="radio" name="packerSign" value="no">  كلا
                    </fieldset>
                    <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>المقطع</strong></label>
                    <fieldset  id="cutterType">
                    <input  <?php if($order['cutter_type']=='old') echo"checked"; ?> type="radio" name="cutterType" value="old">  قديم
                    <br>
                    <input  <?php if($order['cutter_type']=='new') echo"checked"; ?> type="radio" name="cutterType" value="new">  جديد
       
                    </fieldset>
                    <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>البلاك</strong></label>
                    <fieldset id="plateType">
                    <input   <?php if($order['plate_type']=='old') echo"checked"; ?> type="radio" name="plateType" value="old">  قديم
                
                    <input <?php if($order['plate_type']=='new') echo"checked"; ?> type="radio" name="plateType" value="new">  جديد
                    </fieldset>
                    <br>
                    <label class="form-label fw-bold" for="postTitle"><strong>حالة البلاك بعد الطباعة</strong></label>
                    <fieldset id="platePostState">
                    <input  <?php if($order['plate_post_state']=='good') echo"checked"; ?> type="radio" name="platePostState" value="good">  جيد
               
                    <input  <?php if($order['plate_post_state']=='corrupt') echo"checked"; ?> type="radio" name="platePostState" value="corrupt">  تالف
                    </fieldset>
                    <br><br>
                    <label class="form-label fw-bold" for="postTitle"><strong>أمر مقطع</strong></label> 
                    <br>
           <a class='btn btn-primary'  onclick='calcMethod()'>أحسب</a>
           <br>
           <br>
           <label class="form-label fw-bold" for="postTitle"><strong>النوع 1</strong></label>
           <br>
           <label class="form-label fw-bold" for="postTitle"><strong>نوع اللوح</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board_material_1" name="boardMaterial1" type="text" value="<?php echo $item["material_1"];?>" disabled>
          <label class="form-label fw-bold" for="postTitle"><strong>عرض</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board-size-x-1" name="boardSizex1" type="text" required>
          <label class="form-label fw-bold" for="postTitle"><strong>طول</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board-size-y-1" name="boardSizey1" type="text" required >
          <label class="form-label fw-bold" for="postTitle"><strong>التفصيل</strong></label> 
          <input  class="custom-form-input" style="width:5%;" id="qty-per-board-1" name="qtyPerBoard1" type="text"   required>
          <label class="form-label fw-bold" for="postTitle"><strong>سماكةاللوح</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board_gsm_1" name="boardGsm1" type="text" value="<?php echo $item["paper_gsm_1"];?>" disabled>
          
          <label class="form-label fw-bold" for="postTitle"><strong>عدد الطرحيات</strong></label> 
          <input  class="custom-form-input" style="width:5%;" id="qty-to-cut-1" name="qtyToCut1" type="text"   required>
          <label class="form-label fw-bold" for="postTitle"><strong>القياس المطلوب   </strong></label> 
          <input  class="custom-form-input"  style="width:8%;" id="req-size-1" name="reqSize1" type="text"  value="<?php echo $item["paper_size_x_1"]."x".$item["paper_size_y_1"];?>" disabled>
        
          <label class="form-label fw-bold" for="postTitle"><strong>العدد بعد القص</strong></label> 
          <input  class="custom-form-input"  style="width:5%;" id="qty-after-cut-1" name="qtyAfterCut1" type="text"   required>
     
          <label class="form-label fw-bold" for="postTitle"><strong>عدد الكبسات</strong></label> 
          <input  class="custom-form-input"  style="width:5%;" id="qty-to-print-1" name="qtyToPrint" type="text"   required>
      
          <br>
           <br>
           <label class="form-label fw-bold" for="postTitle"><strong>النوع 2</strong></label>
           <br>
           <label class="form-label fw-bold" for="postTitle"><strong>نوع اللوح</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board_material_2" name="boardMaterial2" type="text" value="<?php echo $item["material_2"];?>" disabled>
          <label class="form-label fw-bold" for="postTitle"><strong>عرض</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board-size-x-2" name="boardSizex2" type="text" >
          <label class="form-label fw-bold" for="postTitle"><strong>طول</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board-size-y-2" name="boardSizey2" type="text" >
          <label class="form-label fw-bold" for="postTitle"><strong>التفصيل</strong></label> 
          <input  class="custom-form-input" style="width:5%;" id="qty-per-board-2" name="qtyPerBoard2" type="text"   >
          <label class="form-label fw-bold" for="postTitle"><strong>سماكةاللوح</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board_gsm_2" name="boardGsm2" type="text" value="<?php echo $item["paper_gsm_2"];?>" disabled>
          
          <label class="form-label fw-bold" for="postTitle"><strong>عدد الطرحيات</strong></label> 
          <input  class="custom-form-input" style="width:5%;" id="qty-to-cut-2" name="qtyToCut2" type="text"   >
          <label class="form-label fw-bold" for="postTitle"><strong>القياس المطلوب   </strong></label> 
          <input  class="custom-form-input"  style="width:8%;" id="req-size-2" name="reqSize2" type="text"  value="<?php echo $item["paper_size_x_2"]."x".$item["paper_size_y_2"];?>" disabled>
        
          <label class="form-label fw-bold" for="postTitle"><strong>العدد بعد القص</strong></label> 
          <input  class="custom-form-input"   style="width:5%;" id="qty-after-cut-2" name="qtyAfterCut2" type="text"   >
     
          <label class="form-label fw-bold" for="postTitle"><strong>عدد الكبسات</strong></label> 
          <input  class="custom-form-input"   style="width:5%;" id="qty-to-print-2" name="qtyToPrint" type="text"   >

          <br>
           <br>
           <label class="form-label fw-bold" for="postTitle"><strong>النوع 3</strong></label>
           <br>
           <label class="form-label fw-bold" for="postTitle"><strong>نوع اللوح</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board_material_3" name="boardMaterial3" type="text" value="<?php echo $item["material_3"];?>" disabled>
          <label class="form-label fw-bold" for="postTitle"><strong>عرض</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board-size-x-3" name="boardSizex3" type="text" >
          <label class="form-label fw-bold" for="postTitle"><strong>طول</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board-size-y-3" name="boardSizey3" type="text" >
          <label class="form-label fw-bold" for="postTitle"><strong>التفصيل</strong></label> 
          <input  class="custom-form-input" style="width:5%;" id="qty-per-board-3" name="qtyPerBoard3" type="text"   >
          <label class="form-label fw-bold" for="postTitle"><strong>سماكةاللوح</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board_gsm_3" name="boardGsm3" type="text" value="<?php echo $item["paper_gsm_3"];?>" disabled>
          
          <label class="form-label fw-bold" for="postTitle"><strong>عدد الطرحيات</strong></label> 
          <input  class="custom-form-input" style="width:5%;" id="qty-to-cut-3" name="qtyToCut3" type="text"   >
          <label class="form-label fw-bold" for="postTitle"><strong>القياس المطلوب   </strong></label> 
          <input  class="custom-form-input"  style="width:8%;" id="req-size-3" name="reqSize3" type="text"  value="<?php echo $item["paper_size_x_3"]."x".$item["paper_size_y_3"];?>" disabled>
        
          <label class="form-label fw-bold" for="postTitle"><strong>العدد بعد القص</strong></label> 
          <input  class="custom-form-input"  style="width:5%;" id="qty-after-cut-3" name="qtyAfterCut3" type="text"   >
     
          <label class="form-label fw-bold" for="postTitle"><strong>عدد الكبسات</strong></label> 
          <input  class="custom-form-input"   style="width:5%;" id="qty-to-print-3" name="qtyToPrint" type="text"   required>

          <br>
           <br>
           <label class="form-label fw-bold" for="postTitle"><strong>النوع 4</strong></label>
           <br>
           <label class="form-label fw-bold" for="postTitle"><strong>نوع اللوح</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board_material_4" name="boardMaterial4" type="text" value="<?php echo $item["material_4"];?>" disabled>
          <label class="form-label fw-bold" for="postTitle"><strong>عرض</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board-size-x-4" name="boardSizex4" type="text" >
          <label class="form-label fw-bold" for="postTitle"><strong>طول</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board-size-y-4" name="boardSizey4" type="text" >
          <label class="form-label fw-bold" for="postTitle"><strong>التفصيل</strong></label> 
          <input  class="custom-form-input" style="width:5%;" id="qty-per-board-4" name="qtyPerBoard4" type="text"   >
          <label class="form-label fw-bold" for="postTitle"><strong>سماكةاللوح</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board_gsm_4" name="boardGsm4" type="text" value="<?php echo $item["paper_gsm_4"];?>" disabled>
          
          <label class="form-label fw-bold" for="postTitle"><strong>عدد الطرحيات</strong></label> 
          <input  class="custom-form-input" style="width:5%;" id="qty-to-cut-4" name="qtyToCut4" type="text"   >
          <label class="form-label fw-bold" for="postTitle"><strong>القياس المطلوب   </strong></label> 
          <input  class="custom-form-input"  style="width:8%;" id="req-size-4" name="reqSize4" type="text"  value="<?php echo $item["paper_size_x_4"]."x".$item["paper_size_y_4"];?>" disabled>
        
          <label class="form-label fw-bold" for="postTitle"><strong>العدد بعد القص</strong></label> 
          <input  class="custom-form-input"   style="width:5%;" id="qty-after-cut-4" name="qtyAfterCut4" type="text"   >
     
          <label class="form-label fw-bold" for="postTitle"><strong>عدد الكبسات</strong></label> 
          <input  class="custom-form-input"   style="width:5%;" id="qty-to-print-4" name="qtyToPrint" type="text"   >


          <br>
           <br>
           <label class="form-label fw-bold" for="postTitle"><strong>النوع 5</strong></label>
           <br>
           <label class="form-label fw-bold" for="postTitle"><strong>نوع اللوح</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board_material_5" name="boardMaterial5" type="text" value="<?php echo $item["material_5"];?>" disabled>
          <label class="form-label fw-bold" for="postTitle"><strong>عرض</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board-size-x-5" name="boardSizex5" type="text" >
          <label class="form-label fw-bold" for="postTitle"><strong>طول</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board-size-y-5" name="boardSizey5" type="text" >
          <label class="form-label fw-bold" for="postTitle"><strong>التفصيل</strong></label> 
          <input  class="custom-form-input" style="width:5%;" id="qty-per-board-5" name="qtyPerBoard5" type="text"   >
          <label class="form-label fw-bold" for="postTitle"><strong>سماكةاللوح</strong></label> 
          <input  class="custom-form-input" style="width:5%;"id="board_gsm_5" name="boardGsm5" type="text" value="<?php echo $item["paper_gsm_5"];?>" disabled>
          
          <label class="form-label fw-bold" for="postTitle"><strong>عدد الطرحيات</strong></label> 
          <input  class="custom-form-input" style="width:5%;" id="qty-to-cut-5" name="qtyToCut5" type="text"   >
          <label class="form-label fw-bold" for="postTitle"><strong>القياس المطلوب   </strong></label> 
          <input  class="custom-form-input"  style="width:8%;" id="req-size-5" name="reqSize5" type="text"  value="<?php echo $item["paper_size_x_5"]."x".$item["paper_size_y_5"];?>" disabled>
        
          <label class="form-label fw-bold" for="postTitle"><strong>العدد بعد القص</strong></label> 
          <input  class="custom-form-input"   style="width:5%;" id="qty-after-cut-5" name="qtyAfterCut5" type="text"   >
     
          <label class="form-label fw-bold" for="postTitle"><strong>عدد الكبسات</strong></label> 
          <input  class="custom-form-input"   style="width:5%;" id="qty-to-print-5" name="qtyToPrint" type="text"   >
      
              </div>
            
            </div>
          
          </section>
          <input  style="margin-left:45%;"  class="btn btn-primary" id="customBtn" type="submit" value="Submit" name="submit">
              </div>
            </div>
          </section>
        
          </div>
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
    </div>

    <!-- JavaScript files-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <!-- Choices.js-->
    <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <!-- VanillaJs DatePicker-->
    <script src="vendor/vanillajs-datepicker/js/datepicker-full.min.js"></script>
    <!-- Quill-->
    <script src="vendor/quill/quill.min.js"></script>
    <!-- Lightbox gallery-->
    <script src="vendor/glightbox/js/glightbox.min.js">    </script>
    <!-- Dropzone.js-->
    <script src="vendor/dropzone/dropzone.js">   </script>

    <!-- Add New Product JS-->
   
    <!-- Main Theme JS File-->
    <script src="js/theme.js"></script>
    <!-- Prism for syntax highlighting-->
    <script src="vendor/prismjs/prism.js"></script>
    <script src="vendor/prismjs/plugins/normalize-whitespace/prism-normalize-whitespace.min.js"></script>
    <script src="vendor/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
    <script src="vendor/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
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
<?php 
closeCon($conn);
?>