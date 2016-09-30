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
    width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    margin: 8px 120px 0;
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
    margin-top:16.5%;
    margin-left:33%;
}
</style>
<body>
<div>
 <form action="#" method="post">
 	<p><b>Enter your email here</b></p>
    <input type="email"  name="email" style="width:290px;border-radius: 4px;height: 30px"><br>
    <input type="submit" name="submit1" value="Send ">
  </form>
  <?php
  if(isset($_POST['submit1']))
  {
	$email=$_POST['email'];

	if($email)
	{
		$connect=mysql_connect("localhost","root","") or die("Connection Error");
		mysql_select_db("online_cloth") or die("Coudn't find that database");
		$query=mysql_query("SELECT * FROM users WHERE email='$email'");
		$numrows=mysql_num_rows($query);
		if($numrows!==0)
		{
			while($row=mysql_fetch_assoc($query))
			{
				$dbemail=$row['email'];
				
			}
			if($email==$dbemail)
			{
				
				$random=rand(72891,92729);
				$new_password=$random;
				$email_password=$new_password;
				mysql_query("update customer set pass='$new_password'");
				$subject="Login Information";
				$message="Your password has been changed to $email_password";
				$from ="From: impressions.dacco@gmail.com";
				mail($email, $subject, $message,$from);
				echo "Your new password has been emailed to you";
				
			

		}
		else
				echo '<script type="text/javascript">
				alert("The email you entered is incorrect");
				</script>';
				
				
		}
		else
			echo '<script type="text/javascript">
				alert("That user does not exist!");
				</script>';
				
	}
	else
		echo '<script type="text/javascript">
				alert("Please enter your email!");
				</script>';
				

}
?>


</div>
</body>
</html>
