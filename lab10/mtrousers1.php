<!DOCTYPE  html>
<head>
	<title>impressions</title>
	<link rel="icon" href="Logo-black.png" type="image/png">
	
	 <body>
		
		<?php
		include ("head.html");
		?>

		<?php
	
		require 'db.php';
		
		/**/ $query="select * from dress where Code like 'MT%' ";
	
		$result=mysqli_query($con,$query);

		if (!$result)
		 {
			
					die(mysqli_error($con));
			} 
	
	
	
		echo "<table>";

		
	while($row=mysqli_fetch_array($result))
	{
		?>
		
		<style>
	
			#wholepage{
			width:auto;
			margin-left:2000px;
			margin-right:200px;
	   		}

		
			body {
			 
			background:url("Plain-Black-Facebook-Timeline-Cover.jpg");
			background-repeat :repeat;
			background-size:100%;
	
   			  }
     
		img{
			border:2px solid white;
			margin-left:400px;
			margin-top:100px;
			width:250px;
			height:250px;
			padding: 10px 20px;

			 
		}
		
		td{
			/*width:400px;*/
			/*height:100px;*/
			text-decoration:none;
			float:center;
			font-size: 15px;
			color:white;
			text-align:justify;
		}
		
		</style>
		
    
		
	<div id="wholepage">
		
	<tr>
		
		<td>
		
			<a href="single.php?<?php echo $row["Code"]; ?>">
			
		
			<?php echo '<img src="data:image/png;base64,' . base64_encode($row['content1']) . '" />';  ?>
			
			</a>
		</td>
	
		
		<td>
			
		<?php echo $row["Item_Details"]; ?>
		
		<br/>
		<br />

		<?php echo "Rs:";
		  	echo $row["price"]; ?>
	
		</td>
		
		
	</tr>
	</div>

<?php

}
?>

</table>

<?php
include ("footer.html");
?>

</body>	
	
</html>
	