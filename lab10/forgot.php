<?php
session_start();
?>
<html>
<head>

<script type="text/javascript" language="JavaScript">

function checkCheckBoxes(theForm) {
	if (
	theForm.forgot.checked == false) 
	{
		alert ('Please choose the given option!');
		return false;
	} else { 	
		return true;
	}
}

</script>
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
    width: 35%;
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
    margin-top:16.5%;
    margin-left:33%;
}
</style>
</head>
<body>
<div>
 <form action="f1.php" method="post" onsubmit="return checkCheckBoxes(this)" name="theform">
   <input type="checkbox"  name="forgot" >I would like my passsword emailed to me<br>
    <input type="submit" name="submit" value="Send password">
  </form>


</div>
</body>
</html>
