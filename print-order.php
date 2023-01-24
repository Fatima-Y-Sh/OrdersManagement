<!DOCTYPE html>
<?php
	require 'controllers/database/connection.php';
	$conn=openCon();
	
	$orderquery = $conn->query("SELECT * FROM orders where order_nb=".$_GET["order"]);
	$order = $orderquery->fetch_array();
	$customerquery = $conn->query("SELECT * FROM customer where customer_id=".$order["customer_nb"]);
	$customer = $customerquery->fetch_array();
	$itemquery = $conn->query("SELECT * FROM item where item_id=".$order["item_nb"]);
	$item = $itemquery->fetch_array();
	$platequery = $conn->query("SELECT * FROM plate where item_nb=".$order["item_nb"]);
	$plate = $platequery->fetch_array();
	$imgquery = $conn->query("SELECT * FROM img where item_id=".$order["item_nb"]);
	$img=$imgquery->fetch_array();
?>


    
 
<html lang="ar">
	<head>
		<style>	


.pull-left {
  float: left;
}
.pull-right {
  float: right;
}
.clearfix {
  clear: both;  
}
		.table {
			width: 100%;
		
		
		
		}	
		tr
		{
			height:20px !important;
			border: 1px solid;
		
		}

		th
		{
			border: 1px solid;
		}
		td
		{
			border: 1px solid;
		}
		#PrintButton
		{
			height:30px;
			margin-left:45%;
			width:150px;
			color: #fff;
 		 	background-color: #4650dd;
 			border-color: #4650dd;
  			border-radius: 0.2rem;
		}
 
		.table-striped tbody > tr:nth-child(odd) > td,
		.table-striped tbody > tr:nth-child(odd) > th {
			background-color: #f9f9f9;
		
		}
 
		@media print{
			#print {
				display:none;
			}
		}
		@media print {
			#PrintButton {
				display: none;
			}
		}

		@media print {
			#homeButton {
				display: none;
			}
		}
 
		@page {
			size: auto;   /* auto is the initial value */
			margin: 0;  /* this affects the margin in the printer settings */
		}
		@media print {
    .pagebreak { page-break-after: always; }
}
	</style>
	</head>
<body>


	<b style="color:blue;margin-left:20%;">تاريخ الإصدار:
	<?php
		$date = $order["date_created"];
		$extracted=date('Y-m-d',strtotime($date));
		echo $extracted;
	?>
	</b>

	<b style="color:blue;margin-left:10%;">رقم أمر الطباعة:
	<?php
		$order_nb = $_GET["order"];
		echo $order_nb;
	?>
</b>
<b style="color:blue;margin-left:20%;">إسم الزبون:
		
	<?php
		echo "<b style='font-size: 20px;'>".$customer['customer_name']."</b>";
	?>

</b>
<br> 
<a id="homeButton" href="index.php">الصفحة الرئيسية</a>
<br><br>

	<table class="pull-right" style="width:900px; " >
		<thead>
			<tr>
				<th>إسم المنتج</th>
				<th>عدد النسخات</th>
				<th>عدد الأوراق</th>
				<th>العدد المطلوب </th>
				<th >عدد الكبسات</th>
				<th>من رقم </th>
				<th>إلى رقم </th>
				<th>رقم البلاك</th>
				<th  style="width:80px;font-size: 10px">التكرار على البلاك</th>
				<th style="width:100px; ">رقم المقطع</th>
				<th>لون الطباعة</th>
				<th>قياس المنتج </th>
			
			</tr>
			
		</thead>


			<tr>

				<td style="text-align:center;font-size:20px"><strong><b><?php echo $item['item_name']?></b></strong></td>
			
				<td style="text-align:center;"><?php echo $item['copies']?></td>
				<td style="text-align:center;"><?php echo $item['paper_count']?></td>
				<td style="text-align:center;"><?php echo $order['ordered_qty']?></td>
				<td style="text-align:center;"><?php echo $order['qty_to_print']?></td>

	<td style="text-align:center;"><?php echo $order['number_from']?></td>
	<td style="text-align:center;"><?php echo $order['number_to']?></td>
			
				<td style="text-align:center;"><?php echo $item['plate_nb']?></td>
				<td style="text-align:center;"><?php echo $plate['copiesperplate']?></td>
				<td style="text-align:center;"><?php echo $item['cutter_nb']?></td>
				
	<td style="text-align:center;"><?php echo $item['printing_color_1']?></td>
	<td style="text-align:center;"><?php echo $item['final_size_x']." x ".$item['final_size_y']." x ".$item['final_size_z']?></td>
			
			</tr>
		
			<thead>
	

			</thead>
		<?php

			for($i=2;$i<=5;$i++)
			{
				if($item['material_'.$i]=='')
				{
					$item['paper_color_'.$i]=' ';
					$item['paper_gsm_'.$i]=' ';
					$item['paper_size_x_'.$i]=' ';
					$item['paper_size_y_'.$i]=' ';
					$order['board_size_x_'.$i]='';
					$order['board_size_y_'.$i]='';
					$order['qty_per_board_'.$i]='';
					$order['qty_to_cut_'.$i]='';
					$item['paper_size_x_'.$i]='';
					$item['paper_size_y_'.$i]='';
					$order['boards_after_cut_'.$i]='';
				}
			}
		 ?>
			<tr>
				<td style="text-align:center;border:none;"></td>
				<td style="text-align:center;border:none;"></td>
				<td style="text-align:center;border:none;"></td>
				<td style="border:none;"></td>
				<th style='border:none;'></th>
				<th style='border:none;'></th>
				<th style='border:none;'></th>
				<th style='border:none;'></th>
				<th style='border:none;'></th>

				<th>نوع المقطع </th>
				<th style="width: 100px;" >نوع البلاك</th>
				<th style="width: 100px;font-size:12px; "> حالة البلاك بعد الطباعة</th>

			

			
			
				
			</tr>
					
			<thead>
	
	
			</thead>
			<tr>
	
				<td style="text-align:center;border:none;"></td>
				<td style="text-align:center;border:none;"></td>
				<td style="text-align:center;border:none;"></td>
				<td style="text-align:center;border:none;"></td>
		
				<td  style='border:1px solid black;width:100px'><?php echo $order['f1']?></td>
				<td  style='border:1px solid black;width:100px'><?php echo $order['f2']?></td>
				<td  style='border:1px solid black;width:100px'><?php echo $order['f3']?></td>

				<td  style='border:1px solid black;width:100px'><?php echo $order['f4']?></td>
				<td  style='border:none;'></td>
				<?php
	if($order['cutter_type']==='new')
	{
		$order['cutter_type']='جديد';
	}
	else if($order['cutter_type']==='old')
	{
		$order['cutter_type']='قديم';
	}

	if($order['plate_type']==='new')
	{
		$order['plate_type']='جديد';
	}
	else if($order['plate_type']==='old')
	{
		$order['plate_type']='قديم';
	}

	if($order['plate_post_state']==='corrupt')
	{
		$order['plate_post_state']='تالف';
	}
	else if($order['plate_post_state']==='good')
	{
		$order['plate_post_state']='جيد';
	}

	?>

			<td style="text-align:center;"><?php echo $order['cutter_type']?></td>
			<td style="text-align:center;"><?php echo $order['plate_type']?></td>
			<td style="text-align:center;"><?php echo $order['plate_post_state']?></td>
			
				
			</tr>
<tr>


				<td style="text-align:center;border:none;"></td>
				<td style="text-align:center;border:none;"></td>
				<td style="text-align:center;border:none;"></td>
				<td style="text-align:center;border:none;"></td>

				<td style="border:none;font-size:25px;text-align:center;" > &#8595 </td>
				<td style="border:none;font-size:25px;text-align:center;" > &#8595 </td>

				<td style="border:none;font-size:25px;text-align:center;" > &#8595 </td>
				<td style="border:none;font-size:25px;text-align:center;" > &#8595 </td>


	
</tr>

<tr>

				<td style="text-align:center;border:none;"></td>
				<td style="text-align:center;border:none;"></td>
				<td style="text-align:center;border:none;"></td>
				<td style="text-align:center;border:none;"></td>

				<td  style='border:1px solid black;width:100px'><?php echo $order['t1']?></td>
				<td  style='border:1px solid black;width:100px'><?php echo $order['t2']?></td>
				<td style='border:1px solid black;width:100px' ><?php echo $order['t3']?></td>
				<td style='border:1px solid black;width:100px' ><?php echo $order['t4']?></td>
				
			<th>المكنة 1 </th>
			<th>المكنة 2 </th>
			<th>المكنة 3 </th>
			<th>سلوفان </th>
							

	<?php
	if($item['cellophane']==='without')
	{
		$item['cellophane']='بدون';
	}
	else if($item['cellophane']==='glossy')
	{
		$item['cellophane']='لميع';
	}
	else if($item['cellophane']==='matte')
	{
		$item['cellophane']='مات';
	}

	?>



</tr>



			<tr>

				<td style="text-align:center;border:none;"></td>
				<td style="text-align:center;border:none;"></td>
				<td style="text-align:center;border:none;"></td>
				<td style="text-align:center;border:none;"></td>
				<td  style='border:none;'> </td>
				<td  style='border:none;'></td>
				<td  style='border:none;'></td>
				<td  style='border:none;'></td>

				<td style="text-align:center;"><?php echo $item['machine_1']?></td>
				<td style="text-align:center;"><?php echo $item['machine_2']?></td>
				<td style="text-align:center;"><?php echo $item['machine_3']?></td>
				<td style="text-align:center;"><?php echo $item['cellophane']?></td>



			</tr>
</table>

<div class="image pull-left"><?php echo "<img  style='height:auto;width:500px;' src='".$img['img_path']."'>"; ?> </div>



	<table class="pull-right" style='width:600px;' >

		<thead>
			<tr>
				<th >نوع اللوح </th>
				<th>سماكة اللوح </th>
				<th>لون اللوح</th>

				<th>قياس اللوح</th>
				

			
				<th>التفصيل</th>
				<th>عدد الطرحيات</th>
			
				<th>القياس المطلوب</th>
				<th>العدد بعد القص</th>
				<th>عدد الكبسات</th>



			</tr>
	

			
		</thead>


			<tr>

				<td style="text-align:center;"><?php echo $item['material_1']?></td>
				<td style="text-align:center;"><?php echo $item['paper_gsm_1']?></td>
				<td style="text-align:center;"><?php echo $item['paper_color_1']?></td>
				<td style="text-align:center;"><?php echo $order['board_size_x_1']." x ".$order['board_size_y_1']?></td>
			
				<td style="text-align:center;"><?php echo $order['qty_per_board_1']?></td>
				<td style="text-align:center;"><?php echo $order['qty_to_cut_1']?></td>
				<td style="text-align:center;"><?php echo $item['paper_size_x_1']." x ".$item['paper_size_y_1']?></td>
				<td style="text-align:center;"><?php echo $order['boards_after_cut_1']?></td>
				<td style="text-align:center;"><?php echo $order['qty_to_print']?></td>
		
			
			</tr>





			<tr>

				<td style="text-align:center;"><?php echo $item['material_2']?></td>
				<td style="text-align:center;"><?php echo $item['paper_gsm_2']?></td>
				<td style="text-align:center;"><?php echo $item['paper_color_2']?></td>
				<td style="text-align:center;"><?php echo $order['board_size_x_2']." x ".$order['board_size_y_2']?></td>
				<td style="text-align:center;"><?php echo $order['qty_per_board_2']?></td>
				<td style="text-align:center;"><?php echo $order['qty_to_cut_2']?></td>
				<td style="text-align:center;"><?php echo $item['paper_size_x_2']." x ".$item['paper_size_y_2']?></td>
				<td style="text-align:center;"><?php echo $order['boards_after_cut_2']?></td>
				<td style="text-align:center;"><?php echo $order['qty_to_print']?></td>
		
			
			</tr>


			
			



			<tr>

				<td style="text-align:center;"><?php echo $item['material_3']?></td>
				<td style="text-align:center;"><?php echo $item['paper_gsm_3']?></td>
				<td style="text-align:center;"><?php echo $item['paper_color_3']?></td>

				<td style="text-align:center;"><?php echo $order['board_size_x_3']." x ".$order['board_size_y_3']?></td>
				<td style="text-align:center;"><?php echo $order['qty_per_board_3']?></td>
				<td style="text-align:center;"><?php echo $order['qty_to_cut_3']?></td>
				<td style="text-align:center;"><?php echo $item['paper_size_x_3']." x ".$item['paper_size_y_3']?></td>
				<td style="text-align:center;"><?php echo $order['boards_after_cut_3']?></td>
				<td style="text-align:center;"><?php echo $order['qty_to_print']?></td>
		
			
			</tr>


			
			



			<tr>

				<td style="text-align:center;"><?php echo $item['material_4']?></td>
				<td style="text-align:center;"><?php echo $item['paper_gsm_4']?></td>
				<td style="text-align:center;"><?php echo $item['paper_color_4']?></td>

				<td style="text-align:center;"><?php echo $order['board_size_x_4']." x ".$order['board_size_y_4']?></td>
				<td style="text-align:center;"><?php echo $order['qty_per_board_4']?></td>
				<td style="text-align:center;"><?php echo $order['qty_to_cut_4']?></td>
				<td style="text-align:center;"><?php echo $item['paper_size_x_4']." x ".$item['paper_size_y_4']?></td>
				<td style="text-align:center;"><?php echo $order['boards_after_cut_4']?></td>
				<td style="text-align:center;"><?php echo $order['qty_to_print']?></td>
		
			
			</tr>


			
			


			<tr>

				<td style="text-align:center;"><?php echo $item['material_5']?></td>
				<td style="text-align:center;"><?php echo $item['paper_gsm_5']?></td>
				<td style="text-align:center;"><?php echo $item['paper_color_5']?></td>

				<td style="text-align:center;"><?php echo $order['board_size_x_5']." x ".$order['board_size_y_5']?></td>
				<td style="text-align:center;"><?php echo $order['qty_per_board_5']?></td>
				<td style="text-align:center;"><?php echo $order['qty_to_cut_5']?></td>
				<td style="text-align:center;"><?php echo $item['paper_size_x_5']." x ".$item['paper_size_y_5']?></td>
				<td style="text-align:center;"><?php echo $order['boards_after_cut_5']?></td>
				<td style="text-align:center;"><?php echo $order['qty_to_print']?></td>
		
			
			</tr>
			<thead>
			<tr>
			<th>ملاحظات</th>
		

			</tr>
		</thead>

			<tr>
			<td  style="text-align:center;height:35px" colspan="15"  ><?php echo $order['notes']?></td>
			</tr>

</table>



<table class="pull-right" style="width:100%; " >

			<thead>
			<tr>
                <th style="width:60px; "></th>
				<th style="width:100px; ">عد </th>
				<th style="width:100px; ">قص </th>
				<th style="width:100px; ">طبع</th>
				<th style="width:100px; ">ترقيم</th>
				<th style="width:100px; ">سلوفان</th>
				<th style="width:100px; ">تقطيع</th>
				<th style="width:100px; ">تجميع</th>
				<th style="width:100px; ">تخريم</th>
				<th style="width:100px; ">تحرير</th>

				<th style="width:100px; ">توضيب</th>
                <th style="width:100px; ">التأكد من البلاك</th>
			</tr>
			
		</thead>

	

		<tr>
                <td style="text-align:center;"><?php echo "الإسم"?></td>
				<td style="text-align:center;"><?php echo $order['counter']?></td>
                <td style="text-align:center;"><?php echo $order['precutter']?></td>
                <td style="text-align:center;"><?php echo $order['printer']?></td>
                <td style="text-align:center;"><?php echo $order['numbering']?></td>
                <td style="text-align:center;"><?php echo $order['cellophaner']?></td>
                <td style="text-align:center;"><?php echo $order['cutter']?></td>
                <td style="text-align:center;"><?php echo $order['assembler']?></td>
                <td style="text-align:center;"><?php echo $order['finisher']?></td>
								<td style="text-align:center;"><?php echo $order['freecutter']?></td>

                <td style="text-align:center;"><?php echo $order['packer']?></td>
                <td style="text-align:center;"><?php echo $order['checker']?></td>
			</tr>

			<tr>
            <td style="text-align:center;"><?php echo "العدد"?></td>
					
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>

		
	<!--
            <td style="text-align:center;"><?php echo $order['counter_qty']?></td>			
            <td style="text-align:center;"><?php echo $order['precutter_qty']?></td>
			<td style="text-align:center;"><?php echo $order['printer_qty']?></td>
			<td style="text-align:center;"><?php echo $order['numbering_qty']?></td>
            <td style="text-align:center;"><?php echo $order['cellophaner_qty']?></td>
			<td style="text-align:center;"><?php echo $order['cutter_qty']?></td>
            <td style="text-align:center;"><?php echo $order['assembler_qty']?></td>
            <td style="text-align:center;"><?php echo $order['finisher_qty']?></td>
            <td style="text-align:center;"><?php echo $order['packer_qty']?></td>

            <td></td>
							-->
			</tr>

			<tr>
			<td style="text-align:center;"><?php echo "التوقيع"?></td>
            <td style="text-align:center;"><?php echo $order['counter_sign']?></td>			
            <td style="text-align:center;"><?php echo $order['precutter_sign']?></td>
			<td style="text-align:center;"><?php echo $order['printer_sign']?></td>
			<td style="text-align:center;"><?php echo $order['numbering_sign']?></td>
            <td style="text-align:center;"><?php echo $order['cellophaner_sign']?></td>
			<td style="text-align:center;"><?php echo $order['cutter_sign']?></td>
            <td style="text-align:center;"><?php echo $order['assembler_sign']?></td>
            <td style="text-align:center;"><?php echo $order['finisher_sign']?></td>
						<td style="text-align:center;"><?php echo $order['freecutter_sign']?></td>

            <td style="text-align:center;"><?php echo $order['packer_sign']?></td>
			<td style="text-align:center;"><?php echo $order['checker_sign']?></td>
			</tr>
			<tr>
            <td style="text-align:center;"><?php echo "التاريخ"?></td>
					
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>

			</tr>
		

	</table>

	

	<button id="PrintButton" onclick="PrintPage()">Print</button>

	<script type="text/javascript">
	function PrintPage() {
		window.print();
	}

</script>
</html>