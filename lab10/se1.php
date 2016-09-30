<!DOCTYPE html>
<html>
	<title>impressions</title>
	<link rel="icon" href="Logo-black.png" type="image/png">
	
	<head>
		
 
	<style>
	
	#wholepage{
		width:auto;
		margin-left:1500px;
		margin-right:200px;
	 }

		
		body {
			 
	background:url(Plain-Black.jpg);
	background-repeat :repeat;
	background-size:100%;
	font-family:sans-serif;
	
     }
     
		img{
			border:2px solid white;
			margin-left:300px;
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
			font-size: 20px;
			color:white;
			text-align:justify;
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
		
		$valueTosearch=$_POST["sea"];

		if($valueTosearch=="")
		{
		$query="select * from dress";
	
		}

	else {
			$query="select * from dress  where Item_Details like '%$valueTosearch%' ";
			}
	   	   
$result=mysqli_query($con,$query);

if (!$result) {
	die(mysqli_error($con));
} 


echo "<table>";
		
while($row=mysqli_fetch_array($result))
{
	?>
	
	<div id="wholepage">
		
	<tr>
		
		<td>
		
			<a href="sin.php?<?php echo $row["Code"]; ?>">
			
		
			<?php echo '<img src="data:image/png;base64,' . base64_encode($row['content1']) . '" />';  ?>
			
			</a>
		</td>
	
		
		<td>
		
		
		<?php echo $row["Item_Details"]; ?>
		
		<br/>
		<br/>
		
		<?php echo "Rs:";
		  	echo $row["price"]; ?>
	
		</td>
		
		
	</tr>
	
		</div>
<?php
}
?>

</div>

</table>

<?php
include ("footer.html");
?>

</body>	
	
</html>