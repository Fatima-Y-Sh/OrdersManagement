<?php
	require_once("controllers/database/connection.php");
			$con = openCon();
      $customer_id=$_GET["customer"];


      $delete_query=mysqli_query($con,"update customer set isDeleted=1 where customer_id=". $customer_id);

	 


		header("Location:view-customers.php");
	




?>