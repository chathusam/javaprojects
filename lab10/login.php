<?php
session_start();

?>
<html>
<style>

body{background-image: url("Plain-Black-Facebook-Timeline-Cover.jpg")}

input[type=text],select {
    width: 340px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top:10px;
}
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

input[type=submit],[type=reset] {
    width: 30%;
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
<body>
<div>
   <h3 style="margin-left:70px;font-size:25px"><a href="homepage.php" style="text-decoration:none">IMPRESSIONS</a></h3>

  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input type="text"  placeholder="Username" name="username"><br>
    <input type="password" placeholder="Password" name="pass" ><br>
    <input type="submit" name="submit" value="Login">
    <a href="forgot.php" style="text-decoration:none" >Forgot Password?</a><br>

    <a href="reg.php" style="text-decoration:none" >Register as a new member</a>
  </form>
  <?php

  if(isset($_POST['submit']))
  {
	$username=$_POST['username'];
	$pass=$_POST['pass'];

	
	if($username)
	{
		if($pass)
		{
		$connect=mysql_connect("localhost","root","") or die("Connection Error");
		mysql_select_db("online_cloth") or die("Coudn't find that database");
		$query=mysql_query("SELECT * FROM users WHERE username='$username'");
		$numrows=mysql_num_rows($query);
		if($numrows!==0)
		{
			while($row=mysql_fetch_assoc($query))
			{
				$dbusername=$row['username'];
				$dbpass=$row['pass'];
				$usertype=$row['usertype'];
				$avatar = $row['picURL'];
			}
			if($username==$dbusername&&$pass==$dbpass)
			{
				if($usertype!='admin')
				{
					$_SESSION['username']=$dbusername;
					$_SESSION['picURL']=$avatar;
					?>
					<script type="text/javascript">
						
						window.location="profile.php";
					</script>
				<?php
				}
			
				else {
				?>
					<script>
						window.location="huu.php";
					</script>
				<?php
				}
			}
			else
				echo '<script type="text/javascript">
									alert("Password you entered is incorrect!");
									
								</script>';
		}
		else
			echo '<script type="text/javascript">
									alert("User does not exist!");
									
								</script>';;
		}
		else 
			echo '<script type="text/javascript">
									alert("Please enter your passsword!");
									
								</script>';
		
	}
	else
		echo '<script type="text/javascript">
									alert("Please enter your username!");
									
								</script>';
	

}

	

?>
</div>
</body>
</html>