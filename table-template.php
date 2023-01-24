c
		<thead>
			<tr>
                <th></th>
				<th>عد </th>
				<th>قص </th>
				<th>طبع</th>
				<th>ترقيم</th>
				<th>سلوفان</th>
				<th>تقطيع</th>
				<th>تجميع</th>
				<th>تخريم</th>
				<th>توضيب</th>
                <th>التأكد من البلاك</th>
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
                <td style="text-align:center;"><?php echo $order['packer']?></td>
                <td style="text-align:center;"><?php echo $order['checker']?></td>
			</tr>

			<tr>
            <td style="text-align:center;"><?php echo "العدد"?></td>
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
            <td style="text-align:center;"><?php echo $order['packer_sign']?></td>
			</tr>
</table>
