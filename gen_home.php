<?php 
session_start(); 
$_SESSION["Username"];
$_SESSION["staffID"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDBERT | Home</title>  
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="edcon.ico" type="image/x-icon"> 
	<link rel="stylesheet" type="text/css" href="styling.css" />
</head>
<body> 



<!-- HEADER -->
<style>
#container {
	width: 1100px;
	margin: 0 auto;
</style>
<div id="container">
<img class="toppage" src="header.png"/>






<!--SIDE BAR -->
<div id="containerNav">
<b>Navigation</b>
<br> <a href="gen_home.php">Home</a>
<br> <a href="elo_documents.html">Documents</a>
<br> <a href="settings.html">Settings</a>

<div id="Login">
  You are logged in as:
  <br><?php echo $_SESSION["staffID"];?>
  <br><font size=2><a href="Logout.php">Logout</font></a>
</div>
</div>



<!--MAIN STUFF -->
<div id="containerMain">
<div id="containerMainBody">

<?php //PHP for name
$con = mysqli_connect("ephesus.cs.cf.ac.uk","group3.2013","Jinays");
	if (!$con)
		{
		die("Could not connect: " . mysqli_error() );
		}
		
	mysqli_select_db($con,"group3_2013");
	
	$staffID = $_SESSION['staffID'];
	//Documents Table
	$UserResult = mysqli_query($con, "SELECT * FROM User WHERE staffID = '$staffID'");
	
	//Get the documents owned by the user
	while($User = mysqli_fetch_array($UserResult))
		{
		echo "<h1> Welcome ", $User["Title"], " ", $User["firstName"], " ", $User["surname"], " ";
		echo "to EDBERT! </h1>";
		}
?>
Welcome to the EDBERT homepage. From here, you can keep up to date with all matters
concerning exams and coursework for your modules.
<br><br>To get started, please use the links in the navigation bar, left.

</div>
</div>




<!--FOOTER-->




<div id="footer">
<font size = 2>E.D.B.E.R.T - Exam Database, Exchange & Reminder Tool.
<br> © 2014 Group 3 Incorporated.</font> 
</div>

</div>
</body>
</html>