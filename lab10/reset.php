<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<style>

body{background-image: url("Plain-Black-Facebook-Timeline-Cover.jpg")}


input[type=password],select {
    width: 340px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top:10px;
}

input[type=submit] {
    width: 38%;
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    margin: 8px 210px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}


input[type=submit]:hover {
    background-color: #45a049;
}
div {
    width:340px;height:auto;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 50px;
    margin-top:10%;
    margin-left:33%;
}
</style>
</head>
<body>
<div>
   <h3 style="margin-left:70px;font-size:25px"><a href="homepage.php" style="text-decoration:none">IMPRESSIONS</a></h3>

  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input type="password"  placeholder="Current Password" name="currpass"><br>
    <input type="password" placeholder="New Password" name="newpass" ><br>
    <input type="password" placeholder="Re-enter New Password" name="renewpass" ><br>

   <input type="submit" name="submit" value="Reset Password" > 
   
  </form>
  
  <?php
  if(isset($_POST['submit']))
  {
	$currpass=$_POST['currpass'];
	$newpass=$_POST['newpass'];
	$renewpass=$_POST['renewpass'];
	$username=$_SESSION['username'];

	if($currpass&&$newpass&&$renewpass)
	{
			$connect=mysql_connect("localhost","root","") or die("Connection Error");
            mysql_select_db("online_cloth") or die("Coudn't find that database");
			$query=mysql_query("SELECT pass FROM users WHERE username='$username'");
            $numrows=mysql_num_rows($query);
            if($numrows!==0)
            {
                		while($row=mysql_fetch_assoc($query))
                		{
                  				$dbpass=$row['pass'];
                		}
						if($dbpass==$currpass)
						{
							if($newpass==$renewpass)
							{
							if(strlen($newpass)>25 || strlen($newpass)<6)
                            {
                            	echo '<script type="text/javascript">
									alert("Password should be between 25 and 6 characters");
									
								</script>';
                                
                            }		
							else
							{
								$sql = "UPDATE users SET pass = '$newpass' WHERE username = '$username'";
	                    		if(!mysql_query($sql))
	                        	{
	                             	 die("Error in updating!");
	                        	}
	                    		else
	                    		{
									echo '<script type="text/javascript">
									alert("Your password has been updated,please log in to continue " );
									</script>';
									session_destroy();
									?>
									<a href="login.php">Login</a>
									<?php
									
	                    		}
							}
							
							}
							else {
								
							}
						}
						else
							echo '<script type="text/javascript">
									alert("Your current password deos not match");
									
								</script>';
                
            }
         }
		 else
		 		echo '<script type="text/javascript">
									alert("Fields are not filled!");
									
								</script>';
                
	
}
?>
</div>
</body>
</html>