<?php include 'server.php';
if (empty($_SESSION['Name'])) {
  header('location: login.php');
}
?>

<?php
//session_start();
$dbServername="localhost";
$dbUsername="root";
$dbPass="";
$dbName="bms1";
 $db3 = mysqli_connect($dbServername, $dbUsername, $dbPass, $dbName);
 if (!$db3) {
   die("connection failed :" .mysql_error());
 }
 ?>
<!DOCTYPE html>
<html>
<title>reward page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
<body class="w3-black">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
   <img src="pic1.jpg" style="width:100%">

  <a href="home_give.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>RELINQUISH SEAT</p>
  </a>
  <a href="home_accept1.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>ACCEPT SEAT</p>
  </a>
  <a href="reward_direct.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>REWARD POINTS</p>
  </a>
  <a href="contacts.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>CONTACT</p>
  </a>
  <?php if (isset($_SESSION['Name'])): ?>
   <a href="home_accept1.php?logout='1'" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>LOG OUT</p>
    </a>
  <?php endif ?>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="home_give.php" class="w3-bar-item w3-button" style="width:25% !important">RELINQUISH SEAT</a>
    <a href="home_accept1.php" class="w3-bar-item w3-button" style="width:25% !important">ACCEPT SEAT</a>
    <a href="reward_direct.php" class="w3-bar-item w3-button" style="width:25% !important">REWARD POINTS</a>
    <a href="contacts.php" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
    <?php if (isset($_SESSION['Name'])): ?>
    <a href="home_accept1.php?logout='1'" class="w3-bar-item w3-button" style="width:25% !important">LOG OUT</a>
    <?php endif ?>
  </div>
</div>


<!-- Page Content -->





<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h3><span class="w3-hide-small">
    Welcome,<i> user !</i>

    </h3>
  </header>



  <!-- INFO Section -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <h2 class="w3-text-light-grey">REWARD POINTS:</h2>
    <hr style="width:250px" class="w3-opacity">


  </div>
  <div>
      <form action="#abcd" method="POST">
      <?php include ('errors.php');?>
      <p><input class="w3-input w3-padding-16"  placeholder="Please enter your username to increment your reward points and then open reward page." required name="usern">
      </p>
        <button class="w3-button w3-light-grey w3-padding-large" type="submit" name="submit7">
          <i class="fa fa-paper-plane"></i> SUBMIT
        </button>
      </p>
    </form>



   </div>
  <div>


  <?php
 if (isset($_SESSION['Name'])): ?>

  <?php

$errors=array();
 if(isset($_POST['submit7']))
 {
     if(empty($_POST['usern']))
 {
 array_push( $errors, "Filling this field is mandatory.");
 }else
 {
  $usern=mysqli_real_escape_string($db3, $_POST['usern']);
 }


     if($_POST['usern']!=$_SESSION['Name'])
 {
 array_push( $errors, "This is not your own username !");
 }


  if(count($errors)==0)
 {

 	       $sql= "SELECT REWARD FROM users WHERE `users`.`USERNAME` = '$usern'; ";




  $result = mysqli_query($db3, $sql);
  if(mysqli_num_rows($result)== 1)
    {

	while ($row = mysqli_fetch_array($result))
	  {

$row["0"]=$row["0"]+1;

 	       $sql1= "UPDATE `users` SET `REWARD` = '$row[0]' WHERE `users`.`USERNAME` = '$usern'; ";
 	       mysqli_query($db3, $sql1);
 	       $sql2= "SELECT REWARD FROM users WHERE `users`.`USERNAME` = '$usern'; ";


 			  $result2 = mysqli_query($db3, $sql2);
 			    if(mysqli_num_rows($result2)== 1)
 			    {
 			    	while ($row2 = mysqli_fetch_array($result2))
 			    	{

 			    			echo " YOUR REWARD POINTS ARE : ".$row2["0"];
	    echo "<br>";
            header('location: home1.php');
 			    	}

 			    }




	//	echo " YOUR REWARD POINTS ARE : ".$row["0"];
	 //   echo "<br>";

	    echo "<br><br><h3></div>";

	  }

    }

  else
    {
	echo "ENTERED USERNAME IS INCORRECT !";
    }

/* else
 {
 header("Location: home1.php");
 exit();
 }*/
//}
}
//else
//{
//echo " ENTERED USERNAME IS INCORRECT !";
//}
}
?>

  <?php endif ?>







</div>

 <!-- Footer -->
  <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">VJTI-Computer-Department</a></p>
  <!-- End footer -->
  </footer>

</body>
</html>
