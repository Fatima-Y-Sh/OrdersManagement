<?php
	require_once("controllers/database/connection.php");
	  $conn = openCon();
	date_default_timezone_set("Asia/Beirut");
	if(isset($_POST["submit"])){
      
		$customer_name=trim($_POST['customerName']);
      mysqli_query($conn,"INSERT INTO customer VALUES(0,'$customer_name',0)");
            header("Location:add-new-customer.php?success");
        	closeCon($conn);
    }
    

else {
		header("Location:add-new-customer.php");
	}




?>