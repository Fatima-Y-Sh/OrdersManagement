<?php
	require_once("controllers/database/connection.php");
	  $conn = openCon();
	date_default_timezone_set("Asia/Beirut");
	if(isset($_POST["submit"])){
        $item_id='';
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
        $item_plate_nb=$_POST['itemPlateNb'];
        $item_cutter_nb=$_POST['itemCutterNb'];
        $copies_per_plate=$_POST['copiesPerPlate'];

        $paper_size_x_1=$_POST['paperSizex1'];
        $paper_size_x_2=$_POST['paperSizex2'];
        $paper_size_x_3=$_POST['paperSizex3'];
        $paper_size_x_4=$_POST['paperSizex4'];
        $paper_size_y_1=$_POST['paperSizey1'];
        $paper_size_y_2=$_POST['paperSizey2'];
        $paper_size_y_3=$_POST['paperSizey3'];
        $paper_size_y_4=$_POST['paperSizey4'];
        $paper_size_x_5=$_POST['paperSizex5'];
        $paper_size_y_5=$_POST['paperSizey5'];

        $item_note_1=$_POST['note1'];
        $item_note_2=$_POST['note2'];
        $item_note_3=$_POST['note3'];
        $item_note_4=$_POST['note4'];
        $item_note_5=$_POST['note5'];

        $item_note=$_POST['itemNote'];

        $machine_1=trim($_POST["machine1"]);
        $machine_2=trim($_POST["machine2"]);
        $machine_3=trim($_POST["machine3"]);

        $additional=$_POST["itemAdditional"];
        $divide_nb=$_POST["divideNb"];







        if( $item_size_z=='')
        {
            $item_size_z=0;
        }

        if( $item_printing_color_2=='')
        {
            $item_printing_color_2='0';
        }
        if( $item_printing_color_3=='')
        {
            $item_printing_color_3='0';
        }
        if( $item_printing_color_4=='')
        {
            $item_printing_color_4='0';
        }
        if( $item_printing_color_5=='')
        {
            $item_printing_color_5='0';
        }

        if( $item_paper_color_2=='')
        {
            $item_paper_color_2='0';
        }
        if( $item_paper_color_3=='')
        {
            $item_paper_color_3='0';
        }
        if( $item_paper_color_4=='')
        {
            $item_paper_color_4='0';
        }
        if( $item_paper_color_5=='')
        {
            $item_paper_color_5='0';
        }
        
        if($paper_size_x_2=='')
        {
            $paper_size_x_2=0;
        }
        if($paper_size_x_3=='')
        {
            $paper_size_x_3=0;
        }
        if($paper_size_x_4=='')
        {
            $paper_size_x_4=0;
        }
        if($paper_size_x_5=='')
        {
            $paper_size_x_5=0;
        }
        if($paper_size_y_2=='')
        {
            $paper_size_y_2=0;
        }
        if($paper_size_y_3=='')
        {
            $paper_size_y_3=0;
        }
        if($paper_size_y_4=='')
        {
            $paper_size_y_4=0;
        }
        if($paper_size_y_5=='')
        {
            $paper_size_y_5=0;
        }

        if($item_gsm_2=='')
        {
            $item_gsm_2=0;
        }
        if($item_gsm_3=='')
        {
            $item_gsm_3=0;
        }
        if($item_gsm_4=='')
        {
            $item_gsm_4=0;
        }
        if($item_gsm_5=='')
        {
            $item_gsm_5=0;
        }

        if($item_material_2=='')
        {
            $item_material_2='0';
        }
        if($item_material_3=='')
        {
            $item_material_3='0';
        }
        if($item_material_4=='')
        {
            $item_material_4='0';
        }
        if($item_material_5=='')
        {
            $item_material_5='0';
        }

        if($item_cutter_nb=='')
        {
            $item_cutter_nb=NULL;
        }

        if($divide_nb=='')
        {
            $divide_nb='0';
        }
   
   
        $plateCheck = mysqli_query($conn,"Select * from plate WHERE plate_nb='$item_plate_nb';");
        if(mysqli_num_rows($plateCheck)>0){
			
			header("Location:e-commerce-product-new.php?error=1");
		}

       
		
        
        $res=mysqli_query($conn,"INSERT INTO item VALUES(0,'$item_name','$customer_id','$item_material_1','$item_material_2','$item_material_3','$item_material_4','$item_material_5','$item_paper_color_1','$item_paper_color_2','$item_paper_color_3','$item_paper_color_4','$item_paper_color_5','$item_gsm_1','$item_gsm_2','$item_gsm_3','$item_gsm_4','$item_gsm_5',' $paper_size_x_1',' $paper_size_y_1',' $item_copies','$item_paper_count',' $item_printing_color_1',' $item_printing_color_2','$item_printing_color_3',' $item_printing_color_4',' $item_printing_color_5','$item_cellophane','$item_size_x','$item_size_y','$item_size_z','$paper_size_x_2','$paper_size_y_2','$paper_size_x_3','$paper_size_y_3','$paper_size_x_4','$paper_size_y_4','$paper_size_x_5','$paper_size_y_5','$item_plate_nb',' $item_cutter_nb',' $item_note_1',' $item_note_2',' $item_note_3','$item_note_4','$item_note_5','$item_note','$machine_1','$machine_2','$machine_3','$additional','$divide_nb');");
        $item_id=mysqli_insert_id($conn);
        $insert3=mysqli_query($conn,"INSERT INTO plate VALUES ('$item_plate_nb','$customer_id','$copies_per_plate','$item_id');");
          

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

		
            header("Location:add-new-item.php?success");
        	closeCon($conn);
    }
    

else {
		header("Location:add-new-item.php");
	}




?>