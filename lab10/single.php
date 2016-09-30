<!doctype html>

	<html>
		<head>
			
			<link rel="stylesheet" href="sin1.css">
			
		<title>impressions
		
		<link rel="icon" href="Logo-black.png" type="image/png">
		</title>
		</head>
		
		<body>
		
		<?php
		include ("head.html");
		?>


		<?php
	
			 require 'db.php'; 
	 
			 $student=$_SERVER['QUERY_STRING']; 

			$query="SELECT * FROM dress where Code='$student'";
 	
	//$query="SELECT * FROM dress where Code like '%WB%'";

	
			$result=mysqli_query($con,$query);

			if (!$result) {
		
					die(mysqli_error($con));
					} 
	
	
	
			echo "<table>";

		
			while($row=mysqli_fetch_array($result))
			{
			?>

   			 </head>
    

			<div id="wholepage">
		
		
			<table>
		
     		 <tr>
		
			
			<td>
		
			<?php echo '<img class="thumbnail zoom" src="data:image/png;base64,' . base64_encode($row['content1']) . '" />';  ?>
		
			<hr />
		
			</td>

	
			<tr>
			
			    <td style="padding-left: 500px; color: #ff6666" >
				
				<?php echo $row["Item_Details"]; ?>
	
				<br />
		
				<?php echo "Rs:";
			  			echo $row["price"]; ?>
			  
		  
				<p>Payments: 	
 					 <img src="mastercard.png" alt="master card" style="width:80px;height:50px;margin-left:40px">
				 	 <img src="americanexpress.png" alt="amex card" style="width:80px;height:50px;margin-left:40px"> 
					 <img src="visa.png" alt="visa card" style="width:80px;height:50px;margin-left:50px"> 
				 
				</p>
	
				</td>
		
			</tr>
		
			</tr>
		
			</table>
		
			<br />
				
						<table>
				
				
						<form name="feedback" method="post" action="">
							
							<td style="padding-left:500px">
								
								color :<br />
								
							 	<input type="radio" name="color" value="W"  checked> White <br />
								<input type="radio" name="color" value="B" > Black <br />
								<input type="radio" name="color" value="b" > Blue

							</td>	
					
							<td>
								size:<br />
								
								<input type="radio" name="size" value="s"  checked> Small <br />
								<input type="radio" name="size" value="m" > Medium <br />
								<input type="radio" name="size" value="l" > Large

						</td>

					</table>

				<tr>
						
				<td>
					
				<a href=".php?<?php echo $row["Code"]; ?>">		
   							
				<input type="submit" name="SubmitButton" value="ADD TO CART" class="sub">
					
				 </a> 


				</td>

				<td>
					
				<input type="reset" value="Reset" class="sub1">
				
				</td>
				
				
				</tr>
				
	            </form>

<?php
		
}
?>

</table>
</div>

</body>	
	
</html>