<!DOCTYPE html><html>
<head>
	
<title>impressions</title>
	<link rel="icon" href="Logo-black.png" type="image/png">
	
	<style>
	
	#wholepage{
		width:auto;
		margin-left:1500px;
		margin-right:200px;
	 }

		
		body {
			 
	background:url("Plain-Black-Facebook-Timeline-Cover.jpg");
	background-repeat :repeat;
	background-size:100%;
	
	
     }
     
		img{
			border:2px solid white;
			margin-left:250px;
			/*margin-top:50px;*/
			width:290px;
			height:295px;
			padding: 10px 25px;
	 
		}
		
		
		td{
			width:400px;
			height:100px;
			text-decoration:none;
			float:center;
			font-size: 19px;
			color:white;
			text-align:justify;
			font-family: Georgia Pro;
		}
		
		img:hover{
   	  		background-color:black;
   	  	}
		
</style>
</head>

<body>
	
		
<?php
include ("head.html");
?>
		
		
		<?php
		require 'db.php';

		$per_page=5;

		if (isset($_GET["page"])) 
		{

			$page = $_GET["page"];

		}

			else {
 
			$page=1;

			}
			
			$start_from = ($page-1) * $per_page;
		
			$valueTosearch=$_POST["sea"];

			if($valueTosearch=="")
			{
				
			$query = "SELECT * FROM dress1 LIMIT $start_from, $per_page";
	
			}

			else
				
		   	 {
				
				$query="select * from dress1 where description like '%$valueTosearch%'";
				
			 }

			 
			$result = mysqli_query ($con,$query);

			if (!$result)
		 	{
			die(mysqli_error($con));
			} 

		?>


			<table align="center"  cellpadding="1">
	
		<?php
			while ($row = mysqli_fetch_array($result))
			 {
		?>

		<tr align="center">
	
			<td>
				<a href="single.php?<?php echo $row["Code"]; ?>">
					
				<?php echo '<img src="data:image/png;base64,' . base64_encode($row['content1']) . '" />';  ?>
				</a>
	
			</td>

			<td><?php echo $row['Item_Details']; ?>

		<br />
 
			<?php echo "Rs:";
		  	echo $row["price"]; ?>
		  	
		  	</td>
	
		</tr>
<?php
};
?>

		</table>

		<div>
	
		<?php

//select all from table
		$query = "select * from dress";
		$result = mysqli_query($con, $query);

// Count the total records
		$total_records = mysqli_num_rows($result);

//Using ceil function to divide the total records on per page
		$total_pages = ceil($total_records / $per_page);

//Going to first page
		echo "<center><a href='chathu.php?page=1'>".'First Page'."</a> ";

		for ($i=2; $i<$total_pages; $i++) {

		echo "<a href='chathu.php?page=".$i."'>".$i."</a> ";
		};
// Going to last page
		echo "<a href='chathu.php?page=$total_pages'>".'Last Page'."</a></center> ";
		?>

		</div>

		<?php
		include 'footer.html';
		 ?>

</body>
</html>