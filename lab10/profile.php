<?php 
session_start();
$user=$_SESSION['username'];
?>
<html>
<head>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<style>
body{background-image:url("Plain-Black-Facebook-Timeline-Cover.jpg")}
input[type=text] {
    width: 130px;
    
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('search.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 12px 12px 12px 40px;
    margin-top:6px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
input[type=text]:focus {
    width: 100%;
  }


.one {
    width:370px;height:auto;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 50px;
    margin-top:10%;
    margin-left:36%;
}
</style>
</head>
<body>
<nav class="navbar navbar-inverse" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"> </span>
        <span class="icon-bar"> </span>
        <span class="icon-bar"> </span>
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="homepage.html">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">FAQ</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Category <span class="caret"> </span> </a>
          <ul class="dropdown-menu">
            <li><p style="margin-left: 6px;">Women</p>
            	<ul><li><a href="#"> Blouse</a></li>
            		<li><a href="#"> Dresses</a></li>
            		<li><a href="#"> Trousers</a></li>
            	</ul>
            </li>
            <li>
            	<p style="margin-left: 6px;">Men</p>
            	<ul><li><a href="#"> T-Shirts</a></li>
            		<li><a href="#"> Shirts</a></li>
            		<li><a href="#"> Trousers</a></li>
            	</ul>
            </li>
          </ul>
        </li>
        <li><input type="text" placeholder="Search"></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="reg.php"><span class="fa fa-user"> </span> Sign Up</a></li>
        <li><a href="login.php"><span class="fa fa-sign-in"> </span> Login</a></li>
        <li><a href="login.php"><span class="fa fa-shopping-cart"> </span> Cart</a></li>
        <li style="color: white;margin-top: 13px">
         	<?php
         	if(isset( $_SESSION['username']))
        	{
        	?>
        		<?php echo "<img src=led-online.png /> " ?>
          		<?php echo  $_SESSION['username'] ?>
          		<?php
			} 

         	?>
        	
        	
        </li>

      </ul>
    </div>
  </div>
</nav>






<div class="one">
   <h3 style="margin-left:100px;font-size:20px;">
		   <?php echo $_SESSION['username']; ?>
   </h3>
   <div>
      <center>

          <?php
              $username = $_SESSION['username'];
              $connect=mysql_connect("localhost","root","") or die("Connection Error");
              mysql_select_db("online_cloth") or die("Coudn't find that database");
              $query=mysql_query("SELECT picURL FROM users WHERE username='$username'");
              $numrows=mysql_num_rows($query);
              if($numrows!==0)
              {
                while($row=mysql_fetch_assoc($query))
                {
                  $picurl=$row['picURL'];
                  
                }
                
              }
              else
                echo "No profile picture found";
?>
<img src="<?php echo $picurl ?>" style="max-width: 70%;max-height: 70%; border-radius: 100px "/>
   		</center>
   		<form action="propic.php" method="post" enctype="multipart/form-data">
      
      <input type="file" onchange="this.form.submit()" name="image" id="image"  />
      </form>

   <p style="margin-left:110px"><a href="logout.php" style="text-decoration: none">Logout</a> <br></p>
   <p style="margin-left: 80px"><a href="reset.php" style="text-decoration: none">Reset Password</a></p>
   <p style="margin-left: 80px"><a href="#" style="text-decoration: none">View Order History</a></p>

   


</div>

</body>
</html>


       
      
      
      

       
      
      
      
