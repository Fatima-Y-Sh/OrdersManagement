<?php
	require_once("controllers/database/connection.php");
	  $conn = openCon();
	date_default_timezone_set("Asia/Beirut");
	if(isset($_POST["submit"])){


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
            $_POST["freecutter"]='';
        }
    
   
        ///////////////////////////
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


        ////////////////////////////////

        $counter=trim($_POST["counter"]);
        $counter_sign=$_POST["counterSign"];
        $counter_qty=$_POST["counterQty"];
        $precutter=trim($_POST["precutter"]);
        $precutter_sign=$_POST["precutterSign"];
        $precutter_qty=$_POST["precutterQty"];
        $printer=trim($_POST["printer"]);
        $printer_sign=$_POST["printerSign"];
        $printer_qty=$_POST["printerQty"];
        $numbering=trim($_POST["numbering"]);
        $numbering_sign=$_POST["numberingSign"];
        $numbering_qty=$_POST["numberingQty"];
        $cutter=trim($_POST["cutter"]);
        $cutter_sign=$_POST["cutterSign"];
        $cutter_qty=$_POST["cutterQty"];
        $cellophaner=trim($_POST["cellophaner"]);
        $cellophaner_sign=$_POST["cellophanerSign"];
        $cellophaner_qty=$_POST["cellophanerQty"];
        $assembler=trim($_POST["assembler"]);
        $assembler_sign=$_POST["assemblerSign"];
        $assembler_qty=$_POST["assemblerQty"];
        $finisher=trim($_POST["finisher"]);
        $finisher_sign=$_POST["finisherSign"];
        $finisher_qty=$_POST["finisherQty"];
        $packer=trim($_POST["packer"]);
        $packer_sign=$_POST["packerSign"];
        $packer_qty=$_POST["packerQty"];

        $freecutter=trim($_POST["freecutter"]);
        $freecutter_sign=trim($_POST["freecutterSign"]);
        $freecutter_qty=$_POST["freecutterQty"];


        $plate_post_state=$_POST["platePostState"];


        $f1 = $_POST["nbFrom1"];
        $f2 = $_POST["nbFrom2"];
        $f3 = $_POST["nbFrom3"];
        $f4 = $_POST["nbFrom4"];

        $t1 = $_POST["nbTo1"];
        $f2 = $_POST["nbTo2"];
        $f3 = $_POST["nbTo3"];
        $f4 = $_POST["nbTo4"];




        $getorderValues = mysqli_query($conn, "SELECT * from orders WHERE order_nb =".$_GET["order"]);
		$val_order = mysqli_fetch_array( $getorderValues);


		if(mysqli_num_rows($getorderValues)<0){

			echo"<p>error</p>";
		}
		else
        {
            $orderValues ="";
        

            if( $counter !=$val_order["counter"])
            {
                $orderValues .="counter= '$counter',";
            }
            if( $counter_sign !=$val_order["counter_sign"])
            {
                $orderValues .="counter_sign= '$counter_sign',";
            }
            if( $counter_qty !=$val_order["counter_qty"])
            {
                $orderValues .="counter_qty= '$counter_qty',";
            }

            if( $precutter !=$val_order["precutter"])
            {
                $orderValues .="precutter= '$precutter',";
            }
            if( $precutter_sign !=$val_order["precutter_sign"])
            {
                $orderValues .="precutter_sign= '$precutter_sign',";
            }
            if( $precutter_qty !=$val_order["precutter_qty"])
            {
                $orderValues .="precutter_qty= '$precutter_qty',";
            }

            
            if( $printer !=$val_order["printer"])
            {
                $orderValues .="printer= '$printer',";
            }
            if( $printer_sign !=$val_order["printer_sign"])
            {
                $orderValues .="printer_sign= '$printer_sign',";
            }
            if( $printer_qty !=$val_order["printer_qty"])
            {
                $orderValues .="printer_qty= '$printer_qty',";
            }

            if( $numbering !=$val_order["numbering"])
            {
                $orderValues .="numbering= '$numbering',";
            }
            if( $numbering_sign !=$val_order["numbering_sign"])
            {
                $orderValues .="numbering_sign= '$numbering_sign',";
            }
            if( $numbering_qty !=$val_order["numbering_qty"])
            {
                $orderValues .="numbering_qty= '$numbering_qty',";
            }

            if( $cutter !=$val_order["cutter"])
            {
                $orderValues .="cutter= '$cutter',";
            }
            if( $cutter_sign !=$val_order["cutter_sign"])
            {
                $orderValues .="cutter_sign= '$cutter_sign',";
            }
            if( $cutter_qty !=$val_order["cutter_qty"])
            {
                $orderValues .="cutter_qty= '$cutter_qty',";
            }

            if( $cellophaner !=$val_order["cellophaner"])
            {
                $orderValues .="cellophaner= '$cellophaner',";
            }
            if( $cellophaner_sign !=$val_order["cellophaner_sign"])
            {
                $orderValues .="cellophaner_sign= '$cellophaner_sign',";
            }
            if( $cellophaner_qty !=$val_order["cellophaner_qty"])
            {
                $orderValues .="cellophaner_qty= '$cellophaner_qty',";
            }

            
            if( $assembler !=$val_order["assembler"])
            {
                $orderValues .="assembler = '$assembler',";
            }
            if( $assembler_sign !=$val_order["assembler_sign"])
            {
                $orderValues .="assembler_sign = '$assembler_sign',";
            }
            if( $assembler_qty !=$val_order["assembler_qty"])
            {
                $orderValues .="assembler_qty = '$assembler_qty',";
            }

                 
            if( $finisher !=$val_order["finisher"])
            {
                $orderValues .="finisher = '$finisher',";
            }
            if( $finisher_sign !=$val_order["finisher_sign"])
            {
                $orderValues .="finisher_sign = '$finisher_sign',";
            }
            if( $finisher_qty !=$val_order["finisher_qty"])
            {
                $orderValues .="finisher_qty = '$finisher_qty',";
            }

            if( $packer !=$val_order["packer"])
            {
                $orderValues .="packer = '$packer',";
            }
            if( $packer_sign !=$val_order["packer_sign"])
            {
                $orderValues .="packer_sign = '$packer_sign',";
            }
            if( $packer_qty !=$val_order["packer_qty"])
            {
                $orderValues .="packer_qty = '$packer_qty',";
            }


            
            if( $freecutter !=$val_order["freecutter"])
            {
                $orderValues .="freecutter= '$freecutter',";
            }
            if( $freecutter_sign !=$val_order["freecutter_sign"])
            {
                $orderValues .="freecutter_sign= '$freecutter_sign',";
            }
            if( $freecutter_qty !=$val_order["freecutter_qty"])
            {
                $orderValues .="freecutter_qty= '$freecutter_qty',";
            }

            if( $plate_post_state !=$val_order["plate_post_state"])
            {
                $orderValues .="plate_post_state = '$plate_post_state',";
            }


            if( $f1 !=$val_order["f1"])
            {
                $orderValues .="f1 = '$f1',";
            }
            if( $f2 !=$val_order["f2"])
            {
                $orderValues .="f2 = '$f2',";
            }
            if( $f3 !=$val_order["f3"])
            {
                $orderValues .="f3 = '$f3',";
            }
            if( $f4 !=$val_order["f4"])
            {
                $orderValues .="f4 = '$f4',";
            }
            if( $t1 !=$val_order["t1"])
            {
                $orderValues .="t1 = '$t1',";
            }
            if( $t2 !=$val_order["t2"])
            {
                $orderValues .="t2 = '$t2',";
            }
            if( $t3 !=$val_order["t3"])
            {
                $orderValues .="t3 = '$t3',";
            }
            if( $t4 !=$val_order["t4"])
            {
                $orderValues .="t4 = '$t4',";
            }

             $orderValues=substr($orderValues, 0, -1);
           	 mysqli_query($conn, "UPDATE orders set $orderValues where order_nb=".$_GET["order"]);
      
        }


			closeCon($conn);
  
        header("Location:index.php?success");



        }
    


else {
		header("Location:update-order.php?error=2");
	}




?>
