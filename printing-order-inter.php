<?php


/* li be5edun men l item ma fi de3e a3mellun save bel order*/
	require_once("controllers/database/connection.php");
	  $conn = openCon();
	date_default_timezone_set("Asia/Beirut");

	if(isset($_POST["submit"]))
    {
        if(!isset($_POST["counter"]))
        {
            $_POST["counter"]='';
        }
        if(!isset($_POST["precutter"]))
        {
            $_POST["precutter"]='';
        }
        if(!isset($_POST["checker"]))
        {
            $_POST["checker"]='';
        }
        if(!isset($_POST["printer"]))
        {
            $_POST["printer"]='';
        }
        if(!isset($_POST["numbering"]))
        {
            $_POST["numbering"]='';
        }
        if(!isset($_POST["cutter"]))
        {
            $_POST["cutter"]='';
        }
        if(!isset($_POST["cellophaner"]))
        {
            $_POST["cellophaner"]='';
        }
        if(!isset($_POST["assembler"]))
        {
            $_POST["assembler"]='';
        }
        if(!isset($_POST["finisher"]))
        {
            $_POST["finisher"]='';
        }
        if(!isset($_POST["packer"]))
        {
            $_POST["packer"]='';
        }
        if(!isset($_POST["freecutter"]))
        {
            $_POST["packer"]='';
        }
    
   

        if(!isset($_POST["counterSign"]))
        {
            $_POST["counterSign"]='';
        }
        if(!isset($_POST["precutterSign"]))
        {
            $_POST["precutterSign"]='';
        }
        if(!isset($_POST["checkerSign"]))
        {
            $_POST["checkerSign"]='';
        }
        if(!isset($_POST["printerSign"]))
        {
            $_POST["printerSign"]='';
        }
        if(!isset($_POST["numberingSign"]))
        {
            $_POST["numberingSign"]='';
        }
        if(!isset($_POST["cutterSign"]))
        {
            $_POST["cutterSign"]='';
        }
        if(!isset($_POST["cellophanerSign"]))
        {
            $_POST["cellophanerSign"]='';
        }
        if(!isset($_POST["assemblerSign"]))
        {
            $_POST["assemblerSign"]='';
        }
        if(!isset($_POST["finisherSign"]))
        {
            $_POST["finisherSign"]='';
        }
        if(!isset($_POST["packerSign"]))
        {
            $_POST["packerSign"]='';
        }
        if(!isset($_POST["freecutterSign"]))
        {
            $_POST["freecutterSign"]='';
        }
        if(!isset($_POST["cutterType"]))
        {
            $_POST["cutterType"]='';
        }
        if(!isset($_POST["plateType"]))
        {
            $_POST["plateType"]='';
        }
        if(!isset($_POST["platePostState"]))
        {
            $_POST["platePostState"]='';
        }

   
        if($_POST["counterQty"]=='')
        {
            $_POST["counterQty"]=0;
        }
        if($_POST["precutterQty"]=='')
        {
            $_POST["precutterQty"]=0;
        }
        if($_POST["freecutterQty"]=='')
        {
            $_POST["freecutterQty"]=0;
        }
    
        if($_POST["printerQty"]=='')
        {
            $_POST["printerQty"]=0;
        }
        if($_POST["numberingQty"]=='')
        {
            $_POST["numberingQty"]=0;
        }
        if($_POST["cutterQty"]=='')
        {
            $_POST["cutterQty"]=0;
        }
        if($_POST["cellophanerQty"]=='')
        {
            $_POST["cellophanerQty"]=0;
        }
        if($_POST["assemblerQty"]=='')
        {
            $_POST["assemblerQty"]=0;
        }
        if($_POST["finisherQty"]=='')
        {
            $_POST["finisherQty"]=0;
        }
        if($_POST["packerQty"]=='')
        {
            $_POST["packerQty"]=0;
        }
        if($_POST["qtyToCut2"]=='')
        {
            $_POST["qtyToCut2"]=0;
        }
        if($_POST["qtyToCut3"]=='')
        {
            $_POST["qtyToCut3"]=0;
        }
        if($_POST["qtyToCut4"]=='')
        {
            $_POST["qtyToCut4"]=0;
        }
        if($_POST["qtyToCut5"]=='')
        {
            $_POST["qtyToCut5"]=0;
        }
        if($_POST["qtyAfterCut2"]=='')
        {
            $_POST["qtyAfterCut2"]=0;
        }
        if($_POST["qtyAfterCut3"]=='')
        {
            $_POST["qtyAfterCut3"]=0;
        }
        if($_POST["qtyAfterCut4"]=='')
        {
            $_POST["qtyAfterCut4"]=0;
        }
        if($_POST["qtyAfterCut5"]=='')
        {
            $_POST["qtyAfterCut5"]=0;
        }
        if($_POST["boardSizex2"]=='')
        {
            $_POST["boardSizex2"]=0;
        }
        if($_POST["boardSizey2"]=='')
        {
            $_POST["boardSizey2"]=0;
        }
        if($_POST["boardSizex3"]=='')
        {
            $_POST["boardSizex3"]=0;
        }
        if($_POST["boardSizey3"]=='')
        {
            $_POST["boardSizey3"]=0;
        }
        if($_POST["boardSizex4"]=='')
        {
            $_POST["boardSizex4"]=0;
        }
        if($_POST["boardSizey4"]=='')
        {
            $_POST["boardSizey4"]=0;
        }
        if($_POST["boardSizex5"]=='')
        {
            $_POST["boardSizex5"]=0;
        }
        if($_POST["boardSizey5"]=='')
        {
            $_POST["boardSizey5"]=0;
        }

        if($_POST["qtyPerBoard2"]=='')
        {
            $_POST["qtyPerBoard2"]=0;
        }
        if($_POST["qtyPerBoard3"]=='')
        {
            $_POST["qtyPerBoard3"]=0;
        }
        if($_POST["qtyPerBoard4"]=='')
        {
            $_POST["qtyPerBoard4"]=0;
        }
        if($_POST["qtyPerBoard5"]=='')
        {
            $_POST["qtyPerBoard5"]=0;
        }






        $item_id=$_GET["item"];
        $ordered_qty=$_POST["orderedQty"];
        $nb_from=$_POST["nbFrom"];
        $nb_to=$_POST["nbTo"];
        $qty_per_board_1=$_POST["qtyPerBoard1"];
        $qty_per_board_2=$_POST["qtyPerBoard2"];
        $qty_per_board_3=$_POST["qtyPerBoard3"];
        $qty_per_board_4=$_POST["qtyPerBoard4"];
        $qty_per_board_5=$_POST["qtyPerBoard5"];

        $counter=trim($_POST["counter"]);
        $counter_sign=$_POST["counterSign"];
        $precutter=trim($_POST["precutter"]);
        $precutter_sign=trim($_POST["precutterSign"]);
        $checker=trim($_POST["checker"]);
        $checker_sign=trim($_POST["checkerSign"]);
        $printer=trim($_POST["printer"]);
        $printer_sign=trim($_POST["printerSign"]);
        $numbering=trim($_POST["numbering"]);
        $numbering_sign=trim($_POST["numberingSign"]);
        $cutter=trim($_POST["cutter"]);
        $cutter_sign=trim($_POST["cutterSign"]);
        $cellophaner=trim($_POST["cellophaner"]);
        $cellophaner_sign=trim($_POST["cellophanerSign"]);
        $assembler=trim($_POST["assembler"]);
        $assembler_sign=trim($_POST["assemblerSign"]);
        $finisher=trim($_POST["finisher"]);
        $finisher_sign=trim($_POST["finisherSign"]);
        $packer=trim($_POST["packer"]);
        $freecutter=trim($_POST["freecutter"]);
        $packer_sign=trim($_POST["packerSign"]);
        $freecutter_sign=trim($_POST["freecutterSign"]);

        $cutter_type=trim($_POST["cutterType"]);
        $plate_type=trim($_POST["plateType"]);
        $plate_post_state=trim($_POST["platePostState"]);
        $qty_to_cut_1=$_POST["qtyToCut1"];
        $qty_to_cut_2=$_POST["qtyToCut2"];
        $qty_to_cut_3=$_POST["qtyToCut3"];
        $qty_to_cut_4=$_POST["qtyToCut4"];
        $qty_to_cut_5=$_POST["qtyToCut5"];
        $qty_after_cut_1=$_POST["qtyAfterCut1"];
        $qty_after_cut_2=$_POST["qtyAfterCut2"];
        $qty_after_cut_3=$_POST["qtyAfterCut3"];
        $qty_after_cut_4=$_POST["qtyAfterCut4"];
        $qty_after_cut_5=$_POST["qtyAfterCut5"];

        $board_size_x_1=$_POST["boardSizex1"];
        $board_size_y_1=$_POST["boardSizey1"];
        $board_size_x_2=$_POST["boardSizex2"];
        $board_size_y_2=$_POST["boardSizey2"];
        $board_size_x_3=$_POST["boardSizex3"];
        $board_size_y_3=$_POST["boardSizey3"];
        $board_size_x_4=$_POST["boardSizex4"];
        $board_size_y_4=$_POST["boardSizey4"];
        $board_size_x_5=$_POST["boardSizex5"];
        $board_size_y_5=$_POST["boardSizey5"];


        $qty_to_print=$_POST["qtyToPrint"];
        $notes=$_POST["orderNotes"];


        $counter_qty=$_POST["counterQty"];
        $precutter_qty=$_POST["precutterQty"];
        $printer_qty=$_POST["printerQty"];
        $numbering_qty=$_POST["numberingQty"];
        $cutter_qty=$_POST["cutterQty"];
        $cellophaner_qty=$_POST["cellophanerQty"];
        $assembler_qty=$_POST["assemblerQty"];
        $finisher_qty=$_POST["finisherQty"];
        $packer_qty=$_POST["packerQty"];
        $freecutter_qty=$_POST["freecutterQty"];

        $f1 = $_POST["nbFrom1"];
        $f2 = $_POST["nbFrom2"];
        $f3 = $_POST["nbFrom3"];
        $f4 = $_POST["nbFrom4"];

        $t1 = $_POST["nbTo1"];
        $f2 = $_POST["nbTo2"];
        $f3 = $_POST["nbTo3"];
        $f4 = $_POST["nbTo4"];





        $item_res=mysqli_query($conn,"SELECT * FROM item WHERE item_id=".$item_id);
        $item=mysqli_fetch_array($item_res);
        $customer_id=$item["customer_nb"];
       
        $order_insert=mysqli_query($conn,"INSERT INTO orders VALUES(0,'$customer_id','$item_id','$ordered_qty','$qty_to_print','$nb_from','$nb_to','$qty_to_cut_1','$qty_to_cut_2','$qty_to_cut_3','$qty_to_cut_4','$qty_to_cut_5','$qty_after_cut_1','$qty_after_cut_2','$qty_after_cut_3','$qty_after_cut_4','$qty_after_cut_5','$qty_per_board_1','$qty_per_board_2','$qty_per_board_3','$qty_per_board_4','$qty_per_board_5','$counter','$counter_sign','$precutter','$precutter_sign','$checker','$checker_sign','$printer','$printer_sign','$numbering','$numbering_sign','$cutter','$cutter_sign','$cellophaner','$cellophaner_sign','$assembler','$assembler_sign','$finisher','$finisher_sign','$packer','$packer_sign','$freecutter','$freecutter_sign','$cutter_type','$plate_type','$plate_post_state',CURRENT_TIMESTAMP,'$counter_qty','$precutter_qty','$printer_qty','$numbering_qty','$freecutter_qty','$cutter_qty','$cellophaner_qty','$assembler_qty','$finisher_qty','$packer_qty','$board_size_x_1','$board_size_y_1','$board_size_x_2','$board_size_y_2','$board_size_x_3','$board_size_y_3','$board_size_x_4','$board_size_y_4','$board_size_x_5','$board_size_y_5','$notes','$f1','$f2','$f3','$f4','$t1','$t2','$t3','$t4');");
       // $order_id=mysqli_insert_id($conn);
     
       header("Location:print-order.php?order=".mysqli_insert_id($conn));
    }
    

else {
         header("Location:printing-order.php");
	}




?>