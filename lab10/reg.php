<?php
session_start();
?>
<html>
<style>

body{background-image:url("Plain-Black-Facebook-Timeline-Cover.jpg")}
input[type=text],[type=tel],select {
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
    margin-top:5%;
    margin-left:33%;
}
</style>
<body>
<div>
   <h3 style="margin-left:70px;font-size:25px"><a href="homepage.php" style="text-decoration:none">IMPRESSIONS</a></h3>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input type="text"  placeholder="First Name" name="fname"></br>
    <input type="text"  placeholder="Last Name" name="lname">     
    <input type="text"  placeholder="Address" name="address"> 
    <input type="tel"  placeholder="Contact Number" name="contact">
    <input type="text"  placeholder="E-mail" name="email" >
    <input type="text"  placeholder="Choose a username" name="username">
    <input type="password" placeholder="Password" name="pass" >
    <input type="password" placeholder="Retype password" name="repass">
    <input type="submit" name="sign" value="Sign up">
    <input type="reset" value="Reset">
    <a href="login.php" style="text-decoration:none" >I already have a membership</a>
  </form>
  <?php
   if(isset($_POST['sign']))
         {  
            
                $sign=$_POST['sign'];

                $fname=$_POST['fname'];

                $lname=$_POST['lname'];
            
                $address=$_POST['address'];
        
                $email=$_POST['email'];

                $password=$_POST['pass'];

                $number=$_POST['contact'];

                $username=$_POST['username'];
				
				$file_path = $username . "/";	
				
				$repassword=$_POST['repass'];
				
                if($username&&$fname&&$lname&&$address&&$email&&$password&&$repassword&&$number)
                
                {
                
						if($password!==$repassword)
            			{
            		
                
                    		echo '<script type="text/javascript">
									alert("Password does not match");
									
								</script>';
					
							}
                    		if(strlen($username)>25 || strlen($username)<4)
                        	{
                            	echo '<script type="text/javascript">
									alert("Username should be betwen 25 and 4!");
									
								</script>';
                            	echo " </br>";
								
                        	}
							else {
								if (!preg_match("/^[a-zA-Z ]*$/",$lname,$fname)) 
								{
     							 	echo '<script type="text/javascript">
									alert("Only characters and white spaces are allowed for the first name and last name!");
									
								</script>';
    							}
								
								
							}
							if (preg_match("/^[a-zA-Z ]*$/",$number)) 
								{
     							 	echo '<script type="text/javascript">
									alert("Characters are not allowed for the contact number!");
									
								</script>';
    							}
							
                            if(strlen($password)>25 || strlen($password)<6)
                            {
                            	echo '<script type="text/javascript">
									alert("Password should be between 25 and 6 characters!");
									
								</script>';
                                
                            }
							if (!filter_var($email, FILTER_VALIDATE_EMAIL))
							{
								echo '<script type="text/javascript">
									alert("Invalid email address!");
									
								</script>';
							}
                            else
                            {
                                $con=mysqli_connect("localhost", "root", "", "online_cloth");
                                if(mysqli_connect_errno())
                                {
                                    die('Connection Error' .mysqli_connect_error());
                                }
								$query=mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
								$numrows=mysqli_num_rows($query);
								if($numrows!==0)
								{
									
									echo "User already exist";
								}
								else 
								{
									$_SESSION['username']=$_POST['username'];
									$insert="INSERT INTO users(fname,lname,address,email,pass,phone_number,username,usertype,picURL) VALUES('$fname','$lname','$address','$email','$password','$number','$username','member','anonymous.png')";
                                	
                                	if(!mysqli_query($con,$insert))
                                	{
                                    	die("Error in adding!");
                                	}
                                	if (!file_exists($file_path)) 
									{
    									mkdir($file_path);
									}
									
									
														
						
									
                        		?>
									<script>
										window.location="profile.php";
									</script>
									<?php
								
								}
								
							}

                  }
                  else
                       echo '<script type="text/javascript">
									alert("One or more fields are not filled!");
									
								</script>';
                

	
			
}			
			
?>
  
</div>

</body>
</html>
 