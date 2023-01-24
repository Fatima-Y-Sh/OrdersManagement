<?php
	require_once("controllers/database/connection.php");
	  $conn = openCon();
	date_default_timezone_set("Asia/Beirut");
	if(isset($_POST["submit"])){

        $item_id=$_GET['item'];
        $customer_id=$_POST['customer'];
        $item_name=trim($_POST['itemName']);
		$item_size_x =$_POST['itemSizex'];
        $item_size_y =$_POST['itemSizey'];
        $item_size_z =$_POST['itemSizez'];
        $item_material_1=trim($_POST['itemMaterial1']);
        $item_material_2=trim($_POST['itemMaterial2']);
        $item_material_3=trim($_POST['itemMaterial3']);
        $item_material_4=trim($_POST['itemMaterial4']);
        $item_material_5=trim($_POST['itemMaterial5']);
        $item_paper_color_1=trim($_POST['paperColor1']);
        $item_paper_color_2=trim($_POST['paperColor2']);
        $item_paper_color_3=trim($_POST['paperColor3']);
        $item_paper_color_4=trim($_POST['paperColor4']);
        $item_paper_color_5=trim($_POST['paperColor5']);
        $item_gsm_1=$_POST['itemGsm1'];
        $item_gsm_2=$_POST['itemGsm2'];
        $item_gsm_3=$_POST['itemGsm3'];
        $item_gsm_4=$_POST['itemGsm4'];
        $item_gsm_5=$_POST['itemGsm5'];
        $item_copies=$_POST['itemCopies'];
        $item_paper_count=$_POST['itemPaperCount'];
        $item_printing_color_1=trim($_POST['itemPrintingColor1']);
        $item_printing_color_2=trim($_POST['itemPrintingColor2']);
        $item_printing_color_3=trim($_POST['itemPrintingColor3']);
        $item_printing_color_4=trim($_POST['itemPrintingColor4']);
        $item_printing_color_5=trim($_POST['itemPrintingColor5']);

        $item_cellophane=$_POST['cellophane'];  
        $item_plate_nb=trim($_POST['itemPlateNb']);
        $item_cutter_nb=trim($_POST['itemCutterNb']);
        $copies_per_plate=trim($_POST['copiesPerPlate']);

        $paper_size_x_1=$_POST['paperSizex1'];
        $paper_size_x_2=$_POST['paperSizex2'];
        $paper_size_x_3=$_POST['paperSizex3'];
        $paper_size_x_4=$_POST['paperSizex4'];
        $paper_size_x_5=$_POST['paperSizex5'];
        $paper_size_y_1=$_POST['paperSizey1'];
        $paper_size_y_2=$_POST['paperSizey2'];
        $paper_size_y_3=$_POST['paperSizey3'];
        $paper_size_y_4=$_POST['paperSizey4'];
        $paper_size_y_5=$_POST['paperSizey5'];

        $note_1=$_POST['note1'];
        $note_2=$_POST['note2'];
        $note_3=$_POST['note3'];
        $note_4=$_POST['note4'];
        $note_5=$_POST['note5'];

        $additional=$_POST["itemAdditional"];



        $getitemValues = mysqli_query($conn, "SELECT * from item WHERE item_id =".$item_id);
		$val_item = mysqli_fetch_array($getitemValues);

        $getplateValues=mysqli_query($conn, "SELECT * from plate WHERE item_nb =".$item_id);
        $val_plate= mysqli_fetch_array($getplateValues);

        $getimgValues=mysqli_query($conn, "SELECT * from img WHERE item_id =". $item_id);
     //   $val_img= mysqli_fetch_array($getimgValues);


		if(mysqli_num_rows($getitemValues)<0){

			echo"<p>error</p>";
		}
		else
        {
            $itemValues ="";
            $plateValues ="";
            $imgValues ="";

            if($item_name !=$val_item["item_name"])
            {
                $itemValues .="item_name = '$item_name',";
            }
            if($item_size_x !=$val_item["final_size_x"])
            {
                $itemValues .="final_size_x = '$item_size_x',";
            }
            if($item_size_y !=$val_item["final_size_y"])
            {
                $itemValues .="final_size_y = '$item_size_y',";
            }
            if($item_size_z !=$val_item["final_size_z"])
            {
                $itemValues .="final_size_z = '$item_size_z',";
            }
            if($item_material_1 !=$val_item["material_1"])
            {
                $itemValues .="material_1 = '$item_material_1',";
            }
            if($item_material_2 !=$val_item["material_2"])
            {
                $itemValues .="material_2 = '$item_material_2',";
            }
            if($item_material_3 !=$val_item["material_3"])
            {
                $itemValues .="material_3 = '$item_material_3',";
            }
            if($item_material_4 !=$val_item["material_4"])
            {
                $itemValues .="material_4 = '$item_material_4',";
            }
            if($item_material_5 !=$val_item["material_5"])
            {
                $itemValues .="material_5 = '$item_material_5',";
            }
            if( $item_paper_color_1 !=$val_item["paper_color_1"])
            {
                $itemValues .="paper_color_1 = '$item_paper_color_1',";
            }
            if( $item_paper_color_2 !=$val_item["paper_color_2"])
            {
                $itemValues .="paper_color_2 = '$item_paper_color_2',";
            }
            if( $item_paper_color_3 !=$val_item["paper_color_3"])
            {
                $itemValues .="paper_color_3 = '$item_paper_color_3',";
            }
            if( $item_paper_color_4 !=$val_item["paper_color_4"])
            {
                $itemValues .="paper_color_4 = '$item_paper_color_4',";
            }
            if( $item_paper_color_5 !=$val_item["paper_color_5"])
            {
                $itemValues .="paper_color_5 = '$item_paper_color_5',";
            }
            if( $item_gsm_1 !=$val_item["paper_gsm_1"])
            {
                $itemValues .="paper_gsm_1 = '$item_gsm_1',";
            }
            if( $item_gsm_2 !=$val_item["paper_gsm_2"])
            {
                $itemValues .="paper_gsm_2 = '$item_gsm_2',";
            }
            if( $item_gsm_3 !=$val_item["paper_gsm_3"])
            {
                $itemValues .="paper_gsm_3 = '$item_gsm_3',";
            }
            if( $item_gsm_4 !=$val_item["paper_gsm_4"])
            {
                $itemValues .="paper_gsm_4 = '$item_gsm_4',";
            }
            if( $item_gsm_5 !=$val_item["paper_gsm_5"])
            {
                $itemValues .="paper_gsm_5 = '$item_gsm_5',";
            }
            if( $item_copies !=$val_item["copies"])
            {
                $itemValues .="copies = '$item_copies',";
            }
            if( $item_paper_count !=$val_item["paper_count"])
            {
                $itemValues .="paper_count = '$item_paper_count',";
            }
            if( $item_printing_color_1 !=$val_item["printing_color_1"])
            {
                $itemValues .="printing_color_1 = '$item_printing_color_1',";
            }
            if( $item_printing_color_2 !=$val_item["printing_color_2"])
            {
                $itemValues .="printing_color_2 = '$item_printing_color_2',";
            }
            if( $item_printing_color_3 !=$val_item["printing_color_3"])
            {
                $itemValues .="printing_color_3 = '$item_printing_color_3',";
            }
            if( $item_printing_color_4 !=$val_item["printing_color_4"])
            {
                $itemValues .="printing_color_4 = '$item_printing_color_4',";
            }
            if( $item_printing_color_5 !=$val_item["printing_color_5"])
            {
                $itemValues .="printing_color_5 = '$item_printing_color_5',";
            }
            if(  $paper_size_x_1 !=$val_item["paper_size_x_1"])
            {
                $itemValues .="paper_size_x_1 = '$paper_size_x_1',";
            }
            if(  $paper_size_x_2 !=$val_item["paper_size_x_2"])
            {
                $itemValues .="paper_size_x_2 = '$paper_size_x_2',";
            }
            if(  $paper_size_x_3 !=$val_item["paper_size_x_3"])
            {
                $itemValues .="paper_size_x_3 = '$paper_size_x_3',";
            }
            if(  $paper_size_x_4 !=$val_item["paper_size_x_4"])
            {
                $itemValues .="paper_size_x_4 = '$paper_size_x_4',";
            }
            if(  $paper_size_x_5 !=$val_item["paper_size_x_5"])
            {
                $itemValues .="paper_size_x_5 = '$paper_size_x_5',";
            }
          
            if(  $paper_size_y_1 !=$val_item["paper_size_y_1"])
            {
                $itemValues .="paper_size_y_1 = '$paper_size_y_1',";
            }
            if(  $paper_size_y_2 !=$val_item["paper_size_y_2"])
            {
                $itemValues .="paper_size_y_2 = '$paper_size_y_2',";
            }
            if(  $paper_size_y_3 !=$val_item["paper_size_y_3"])
            {
                $itemValues .="paper_size_y_3 = '$paper_size_y_3',";
            }
            if(  $paper_size_y_4 !=$val_item["paper_size_y_4"])
            {
                $itemValues .="paper_size_y_4 = '$paper_size_y_4',";
            }
            if(  $paper_size_y_5 !=$val_item["paper_size_y_5"])
            {
                $itemValues .="paper_size_y_5 = '$paper_size_y_5',";
            }

            if(  $note_1 !=$val_item["note_1"])
            {
                $itemValues .="note_1 = '$note_1',";
            }
            if(  $note_2 !=$val_item["note_2"])
            {
                $itemValues .="note_2 = '$note_2',";
            }
            if(  $note_3 !=$val_item["note_3"])
            {
                $itemValues .="note_3 = '$note_3',";
            }
            if(  $note_4 !=$val_item["note_4"])
            {
                $itemValues .="note_4 = '$note_4',";
            }
            if(  $note_5 !=$val_item["note_5"])
            {
                $itemValues .="note_5 = '$note_5',";
            }
            if(  $additional !=$val_item["additional"])
            {
                $itemValues .="additional = '$additional',";
            }
      
            if(  $item_cellophane !=$val_item["cellophane"])
            {
                $itemValues .="cellophane = '$item_cellophane',";
            }
            if( $item_plate_nb !=$val_item["plate_nb"])
            {
                $itemValues .="plate_nb='$item_plate_nb',";
                $plateValues.="plate_nb='$item_plate_nb',";

            }
            if( $item_cutter_nb !=$val_item["cutter_nb"])
            {
                $itemValues .="cutter_nb='$item_cutter_nb',";
                

            }
           

            if( $copies_per_plate != $val_plate["copiesperplate"])
            {
                $plateValues.="copiesperplate='$copies_per_plate',";
            }

      


			
             $itemValues=substr($itemValues, 0, -1);
           	 mysqli_query($conn, "UPDATE item set $itemValues where item_id=".$item_id);
             $plateValues=substr($plateValues, 0, -1);
			 mysqli_query($conn,"UPDATE plate set  $plateValues where item_nb=".$item_id);


			

			/******uploading section********/

            $uploadsDir = "img/items/";
            $allowedFileType = array('jpg','png','jpeg','pdf');
        // Validate if files exist
        if (!empty(array_filter($_FILES["itemImg"]["name"]))) 
        {
      

            // Loop through file items
            foreach($_FILES["itemImg"]["name"] as $id=>$val)
            {
                // Get files upload path
                $random=rand();
                $fileName        = $_FILES["itemImg"]["name"][$id];
                $tempLocation    = $_FILES["itemImg"]["tmp_name"][$id];
                $targetFilePath  = $uploadsDir . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $new_img_name= $uploadsDir."item-".$item_id."-".$random.".".$fileType;
                
                if(in_array($fileType, $allowedFileType))
                {
                        if(move_uploaded_file($tempLocation, $new_img_name))
                        {
                            $sqlVal = $new_img_name;
                            
                        } 
                    
                }
              if(!empty($sqlVal)) 
              {

                   $insert2=mysqli_query($conn,"INSERT INTO img VALUES ('$item_id','$sqlVal');");
                                  
                }
            }

          

        }


        }









			closeCon($conn);
   
         header("Location:view-items.php");



        }
    


else {
		header("Location:update-item.php?error=2");
	}




?>
