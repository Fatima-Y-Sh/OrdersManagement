<?php

require_once("controllers/database/connection.php");
$conn=openCon();

$result=mysqli_query($conn,"select * from item where item_id=".$_GET["item"]);
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

{ margin-left:1%;
  margin-right:1%;
  width:20%;
  padding: 0.32rem 0.5rem;
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

label {
color:black;
}

    </style>
  <body style="background-color:lightyellow;">

<?php
    if(isset($_GET["success"])) {
      echo "<p style='text-align:center;color:green;font-weight:bold;font-size:20px;'>تم الحفظ بنجاح</p>";
    }

    if(isset($_GET["error"]) && $_GET["error"]==1) {
      echo "<p style='text-align:center;color:red;font-weight:bold;font-size:20px;'>البلاك موجود سابقًا.</p>";
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

  <div class="page-holder bg-gray-100"  style="background-color:lightyellow;">

<div class="container-fluid px-lg-6 px-xl-5" style="background-color:lightyellow;" >
 

    <!-- Breadcrumbs -->
    <div class="page-breadcrumb" >
      <ul class="breadcrumb" >
        <li class="breadcrumb-item" ><a href="index.php">الصفحة الرئيسية</a></li>
        <li class="breadcrumb-item active"><a href="add-new-item.php">منتج جديد</a></li>

      </ul>
    </div>
<!-- Page Header-->
<div class="page-header" >
  <h1 class="arabic" style="text-align:center;"><strong>منتج جديد </strong></h1>
  
  <h3 class="page-heading" style="text-align:center;"><?php echo date('Y-m-d');?></h3>
</div>
 <!-- here begins the main form-->
 <form  accept-charset="utf-8" id="productInfo" action="update-item-inter.php?item=<?php echo$_GET["item"] ?>"  method="post"  enctype="multipart/form-data" style="width:80%;margin-left:20%;margin-right:20%;float:none;" >
<section>
  <div  class="row mb-5" style="background-color:lightyellow;">
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
        <select name='customer' style="width: 250px; height:30px; margin: 2%">

         

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
                      $customer_res=mysqli_query($conn,"select * from customer where isDeleted=0 and customer_id=".$item['customer_nb']);
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
          <input style="width:20%;" class="custom-form-input" id="item-name" name="itemName" type="text" required value="<?php echo $item['item_name']?>">
<br>
<br>

          <label class="form-label fw-bold" for="postTitle"><strong>قياس المنتج</strong></label>
          <br>
          <label class="form-label fw-bold" for="postTitle"><strong>عرض</strong></label>
          <input  class="custom-form-input"   style="width:10%" id="item-size-x" name="itemSizex" type="text" required value="<?php echo $item['final_size_x']?>">
          <label class="form-label fw-bold" for="postTitle"><strong>طول</strong></label>
          <input class="custom-form-input"    style="width:10%" id="item-size-y" name="itemSizey" type="text" required value="<?php echo $item['final_size_y']?>">
          <label class="form-label fw-bold" for="postTitle"><strong>إرتفاع</strong></label>
          <input class="custom-form-input"   style="width:10%" id="item-size-z" name="itemSizez" type="text" value="<?php echo $item['final_size_z']?>">
          <br><br>



          <label class="form-label fw-bold" for="postTitle"><strong>ورق الطباعة</strong></label>
          <br>
          <label class="form-label fw-bold" for="postTitle"><strong>1 الورق</strong></label>
          <br>
         
          
          <label class="form-label fw-bold" for="postTitle"><strong>نوع 1</strong></label>
              <input required style="width:10%;" class="custom-form-input"  id="item-material-1" name="itemMaterial1" type="text" value="<?php echo $item['material_1']?>"  >
              <label class="form-label fw-bold" for="postTitle"><strong>لون 1</strong></label>
    <input required class="custom-form-input" style="width:10%" id="item-paper-color-1" name="paperColor1" type="text" value="<?php echo $item['paper_color_1']?>" >
    <label class="form-label fw-bold"><strong>سماكة 1</strong></label>
       
              
       <input   class="custom-form-input" style="width:10%" name="itemGsm1"  required value="<?php echo $item['paper_gsm_1']?>">
     
    <label class="form-label fw-bold"  for="postTitle"><strong> 1 عرض</strong></label>       
    <input class="custom-form-input" style="width:10%" id="paper-size-x-1" name="paperSizex1" type="text" required value="<?php echo $item['paper_size_x_1']?>">
    <label class="form-label fw-bold" for="postTitle"><strong> 1 طول</strong></label> 
    <input class="custom-form-input" style="width:10%" id="paper-size-y-1" name="paperSizey1" type="text" required value="<?php echo $item['paper_size_y_1']?>">
    <label class="form-label fw-bold" for="postTitle"><strong> ملاحظة</strong></label> 
    <input class="custom-form-input" style="width:10%" id="note-1" name="note1" type="text" value="<?php echo $item['note_1']?>">
   <br>


   <label class="form-label fw-bold" for="postTitle"><strong>2 الورق</strong></label>
          <br>


     <label class="form-label fw-bold" for="postTitle"><strong>نوع 2</strong></label>
     <input  style="width:10%;" class="custom-form-input"  id="item-material-2" name="itemMaterial2" type="text" value="<?php echo $item['material_2']?>">

     <label class="form-label fw-bold" for="postTitle"><strong>لون 2</strong></label>
    
    <input  class="custom-form-input" style="width:10%" id="item-paper-color-2" name="paperColor2" type="text" value="<?php echo $item['paper_color_2']?>">
    <label class="form-label fw-bold"><strong>سماكة 2</strong></label>



            
           
            <input  class="custom-form-input" style="width:10%" name="itemGsm2" value="<?php echo $item['paper_gsm_2']?>"  >
            <label class="form-label fw-bold"  for="postTitle"><strong> 2 عرض</strong></label> 
    <input class="custom-form-input"  style="width:10%" id="paper-size-x-2" name="paperSizex2" type="text" value="<?php echo $item['paper_size_x_2']?>">
    <label class="form-label fw-bold" for="postTitle"><strong> 2 طول</strong></label> 
    <input class="custom-form-input"  style="width:10%" id="paper-size-y-2" name="paperSizey2" type="text" value="<?php echo $item['paper_size_y_2']?>" >
    <label class="form-label fw-bold" for="postTitle"><strong> ملاحظة</strong></label> 
    <input class="custom-form-input" style="width:10%" id="note-2" name="note2" type="text" value="<?php echo $item['note_2']?>">
       

<br>
   <label class="form-label fw-bold" for="postTitle"><strong>3 الورق</strong></label>
          <br>

      <label class="form-label fw-bold" for="postTitle"><strong>3 نوع </strong></label>

      <input  style="width:10%;" class="custom-form-input"  id="item-material-3" name="itemMaterial3" type="text" value="<?php echo $item['material_3']?>"  >
      <label class="form-label fw-bold" for="postTitle"><strong>لون 3</strong></label>
    <input  class="custom-form-input" style="width:10%" id="item-paper-color-3" name="paperColor3" type="text" value="<?php echo $item['paper_color_3']?>" >
    <label class="form-label fw-bold"><strong>سماكة 3</strong></label>
            
            <input  class="custom-form-input" style="width:10%" name="itemGsm3"  value="<?php echo $item['paper_gsm_3']?>" >
            <label class="form-label fw-bold" for="postTitle"><strong> 3 عرض</strong></label> 
    <input class="custom-form-input"  style="width:10%" id="paper-size-x-3" name="paperSizex3" type="text" value="<?php echo $item['paper_size_x_3']?>"  >
    <label class="form-label fw-bold" for="postTitle"><strong> 3 طول</strong></label> 
    <input class="custom-form-input"  style="width:10%" id="paper-size-y-3" name="paperSizey3" type="text" value="<?php echo $item['paper_size_y_3']?>" >
    <label class="form-label fw-bold" for="postTitle"><strong> ملاحظة</strong></label> 
    <input class="custom-form-input" style="width:10%" id="note-3" name="note3" type="text" value="<?php echo $item['note_3']?>" >

    <br>
   <label class="form-label fw-bold" for="postTitle"><strong>4 الورق</strong></label>
          <br>





      <label class="form-label fw-bold" for="postTitle"><strong>نوع 4</strong></label>

      <input  style="width:10%;" class="custom-form-input"  id="item-material-4" name="itemMaterial4" type="text" value="<?php echo $item['material_4']?>" >

      <label class="form-label fw-bold" for="postTitle"><strong>لون 4</strong></label>
    
    <input  class="custom-form-input" style="width:10%" id="item-paper-color-4" name="paperColor4" type="text" value="<?php echo $item['paper_color_4']?>"  >
    <label class="form-label fw-bold"><strong>سماكة 4</strong></label>
             
             <input  class="custom-form-input" style="width:10%" name="itemGsm4" value="<?php echo $item['paper_gsm_4']?>" >

             <label class="form-label fw-bold" for="postTitle"><strong> 4 عرض</strong></label> 
    <input class="custom-form-input"  style="width:10%" id="paper-size-x-4" name="paperSizex4" type="text"  value="<?php echo $item['paper_size_x_4']?>">
    <label class="form-label fw-bold" for="postTitle"><strong> 4 طول</strong></label> 
    <input class="custom-form-input"  style="width:10%" id="paper-size-y-4" name="paperSizey4" type="text" value="<?php echo $item['paper_size_y_4']?>" >
    <label class="form-label fw-bold" for="postTitle"><strong> ملاحظة</strong></label> 
    <input class="custom-form-input" style="width:10%" id="note-4" name="note4" type="text" value="<?php echo $item['note_4']?>">



    <br>
   <label class="form-label fw-bold" for="postTitle"><strong>5 الورق</strong></label>
          <br>
      <label class="form-label fw-bold" for="postTitle"><strong>نوع 5</strong></label>

      <input  style="width:10%;" class="custom-form-input"  id="item-material-5" name="itemMaterial5" type="text"  value="<?php echo $item['material_5']?>">


     
    <label class="form-label fw-bold" for="postTitle"><strong>لون 5</strong></label>
    <input  class="custom-form-input" style="width:10%" id="item-paper-color-5" name="paperColor5" type="text" value="<?php echo $item['paper_color_5']?>" >

       
              <label class="form-label fw-bold"><strong>سماكة 5</strong></label>
           
                <input  class="custom-form-input" style="width:10%" name="itemGsm5" value="<?php echo $item['paper_gsm_5']?>" >
     

 
    <label class="form-label fw-bold" for="postTitle"><strong> 5 عرض</strong></label> 
    <input class="custom-form-input"  style="width:10%" id="paper-size-x-5" name="paperSizex5" type="text" value="<?php echo $item['paper_size_x_5']?>" >
    <label class="form-label fw-bold" for="postTitle"><strong> 5 طول</strong></label> 
    <input class="custom-form-input"  style="width:10%" id="paper-size-y-5" name="paperSizey5" type="text"  value="<?php echo $item['paper_size_y_5']?>" >
    <label class="form-label fw-bold" for="postTitle"><strong> ملاحظة</strong></label> 
    <input class="custom-form-input" style="width:10%" id="note-5" name="note5" type="text" value="<?php echo $item['note_5']?>">

    <br><br>
              <label class="form-label fw-bold" for="postTitle"><strong>عدد النسخات</strong></label>
    <input  class="custom-form-input"  style="width:10%" id="item-material" name="itemCopies" type="text" required value="<?php echo $item['copies']?>">

    <label class="form-label fw-bold" for="postTitle"><strong>عدد الأوراق</strong></label>
    <input class="custom-form-input"  style="width:10%" id="item-material" name="itemPaperCount" type="text" required value="<?php echo $item['paper_count']?>">
    <label class="form-label fw-bold" for="postTitle"><strong>العدد الإضافي</strong></label>
      <input class="custom-form-input"  style="width:10%" id="item-additional" name="itemAdditional" type="text" required value="<?php echo $item['additional']?>">
<br>
<br>
    <label  class="form-label fw-bold" for="postTitle"><strong>لون الطباعة</strong></label>
    <br>
    <label class="form-label fw-bold" for="postTitle"><strong>لون 1</strong></label>
    <input  class="custom-form-input" style="width:10%;" id="item-print-color-1" name="itemPrintingColor1" type="text" required value="<?php echo $item['printing_color_1']?>">
    <label class="form-label fw-bold" for="postTitle"><strong>لون 2</strong></label>
    <input  class="custom-form-input" style="width:10%;" id="item-print-color-2" name="itemPrintingColor2" type="text" value="<?php echo $item['printing_color_2']?>" >
    <label class="form-label fw-bold" for="postTitle"><strong>لون 3</strong></label>
    <input  class="custom-form-input" style="width:10%;" id="item-print-color-3" name="itemPrintingColor3" type="text" value="<?php echo $item['printing_color_3']?>" >
    <label class="form-label fw-bold" for="postTitle"><strong>لون 4</strong></label>
    <input  class="custom-form-input" style="width:10%;" id="item-print-color-4" name="itemPrintingColor4" type="text" value="<?php echo $item['printing_color_4']?>" >
    <label class="form-label fw-bold" for="postTitle"><strong>لون 5</strong></label>
    <input  class="custom-form-input" style="width:10%;" id="item-print-color-5" name="itemPrintingColor5" type="text"  value="<?php echo $item['printing_color_5']?>">
<br>
<br>
<label class="form-label fw-bold" for="postTitle"><strong>المكنة</strong></label> 
          <input  class="custom-form-input" style="width:10%;" id="machine-1" name="machine1" type="text" value="<?php echo $item['machine_1']?>" required>
          <input  class="custom-form-input"  style="width:10%;" id="machine-2" name="machine2" type="text" value="<?php echo $item['machine_2']?>" >
          <input  class="custom-form-input"  style="width:10%;" id="machine-3" name="machine3" type="text" value="<?php echo $item['machine_3']?>" >

<br>
<br>

                       <label class="form-label fw-bold" for="postTitle"><strong>رقم البلاك</strong></label>
                    
                       <input  class="custom-form-input"  style="width:10%" id="item-plate-nb" name="itemPlateNb" type="text" required value="<?php echo $item['plate_nb']?>">

                       <label class="form-label fw-bold" for="postTitle"><strong>التكرار على البلاك</strong></label>
                    <?php
                      $plate_res=mysqli_query($conn,"SELECT * FROM plate WHERE plate_nb='".$item['plate_nb']."'");
                      $plate = mysqli_fetch_array($plate_res);
                     echo" <input  style='width:10%' class='custom-form-input' id='copies-per-plate' name='copiesPerPlate' type='text' required value='".$plate['copiesperplate']."'>";
                    //echo"<label class='form-label fw-bold' for='postTitle'><strong>SELECT * FROM plate WHERE plate_nb=".$item['plate_nb']."</strong></label>";
                    ?>
                       
                       <label class="form-label fw-bold" for="postTitle"><strong>رقم المقطع</strong></label>
                    
                       <input  class="custom-form-input"  style="width:10%" id="item-cutter-nb" name="itemCutterNb" type="text" value="<?php echo $item['cutter_nb']?>" >
                       <br></br>

<label class="form-label fw-bold" for="postTitle"><strong>ملاحظة</strong></label>

<input  class="custom-form-input"  style="width:80%" id="item-cutter-nb" name="itemNote" type="text" value="<?php echo $item['note']?>" >

        
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
                    <input  <?php if($item['cellophane']=='glossy') echo"checked"; ?> type="radio" name="cellophane" value="glossy">  لميع
                    <br>
                    <input  <?php if($item['cellophane']=='matte') echo"checked"; ?> type="radio" name="cellophane" value="matte">  مات
                    <br>
                    <input  <?php if($item['cellophane']=='without') echo"checked"; ?> type="radio" name="cellophane" value="without">  بدون
                    </fieldset>

        </div>
      </div>



      <div style="background-color:lightyellow;" class="card mb-4">
        <div class="card-header">
        <h4 class="arabic">صور المنتج                   </h4> 
        </div>
        <div class="card-body">
            
          <div class="bg-gray-100 rounded-4" id="demo-upload" action="#">

          <input name="itemImg[]" id="chooseFile" type="file" multiple />

          </div>
      
        </div>
      </div>
      <input id="customBtn" type="submit" value="Submit" name="submit">
    </div>
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



 
</body>

</html>
<?php 
closeCon($conn);
?>