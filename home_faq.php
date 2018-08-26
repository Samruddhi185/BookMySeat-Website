<!DOCTYPE html>
<html>
<title>FAQ page</title>
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
  <a href="login.php" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>LOGIN</p>
  </a>
  <a href="register.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>REGISTER</p>
  </a>
  <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>MAIN</p>
  </a>
    <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>CONTACT</p>
  </a>
</nav>
  
<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="login.php" class="w3-bar-item w3-button" style="width:25% !important">LOGIN</a>
    <a href="register.php" class="w3-bar-item w3-button" style="width:25% !important">REGISTER</a>
    <a href="home.php" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="contacts.php" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
  </div>
</div>


<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    
    <h3 class="w3-jumbo"><a href="home.php"> BOOK MY SEAT </a></h3>
    
  </header>

  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">FAQs</h2>
    <hr style="width:200px" class="w3-opacity">
    <p>Q-What sort of reward points are awarded?</p>
<p>A-We have collaborated with various companies and organisations,who give us different discounts, coupons and vouchers which we ultimately reward to the local public. We would suggest you to use our amazing seat exchange facility, get rewarded with points and see for yourself different kinds of reward benefits that we have to offer !</p>
<p>Q-When can I use this system?</p>
<p>A-Our system works on all days of the week and is closed only at night between 2-4 when Mumbai locals do not run.</p>
<p>Q-Can I reserve an empty seat from before?</p>
<p>A-No, an empty seat is as free to you as any other passenger. One cannot exchange seats when there is no one sitting on it. Seats which are given up by users on this website are the ones you can reserve.
    </p>
    <p>Q-Do I have to pay anything to accept a seat?
</p>
    <p>A-No, relinquishment and acceptance of seats are completely free. This is a system/service which can be used by any and every local for free.</p>
    <p>Q-Can I book two or more seats in a train (for my relatives / friends / colleagues
 )?</p>
    <p>A-Only one seat can be booked at a time by any user. To book a seat for your relative / friend / colleague, create a new legitimate account for them. Also, reward benefits will only be provided to legit accounts.</p>

  
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

<!-- END PAGE CONTENT -->
</div>

</body>
</html>
