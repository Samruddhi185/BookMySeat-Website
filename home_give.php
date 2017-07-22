<?php include 'server.php'; 
if (empty($_SESSION['Name'])) {
  header('location: login.php');
}


?>

<!DOCTYPE html>
<html>
<title>RELINQUISH page</title>
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
  <img src="pic.jpg" style="width:100%">
  
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
   <a href="home_give.php?logout='1'" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
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
    <a href="home_give.php?logout='1'" class="w3-bar-item w3-button" style="width:25% !important">LOG OUT</a>
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

  
    

  <!-- Taking info from user -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <h2 class="w3-text-light-grey">RELINQUISH SEAT</h2>
    <hr style="width:250px" class="w3-opacity">

    
    <p>Enter your information.</p>

    <form action="server2.php" method="POST" target="_blank">
      <p><label for="trainnos">Train number :<br></label>
      <select class="w3-input w3-padding-16" id="trainnos" required name="trainno">
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
           <option value="6">6</option>
           <option value="7">7</option>
           <option value="8">8</option>
           <option value="9">9</option>
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
           <option value="13">13</option>
           <option value="14">14</option>
           <option value="15">15</option>
           <option value="16">16</option>
           <option value="17">17</option>
           </select></p>
      <p><label for="stations">Station where you will be getting down :<br></label>
      <select class="w3-input w3-padding-16" id="stations" required name="stn">
           <option value="ANDHERI">ANDHERI</option>
           <option value="BANDRA">BANDRA</option>
           <option value="BHAYANDER">BHAYANDER</option>
           <option value="BORIVALI">BORIVALI</option>
           <option value="BOMBAY CENTRAL">BOMBAY CENTRAL</option>
           <option value="CHURCHGATE">CHURCHGATE</option>
           <option value="DADAR">DADAR</option>
           <option value="VASAI ROAD">VASAI ROAD</option>
           <option value="VIRAR">VIRAR</option>
         </select>
      </p>
      <p><label for="compnos">Compartment Number :<br></label>
      <select class="w3-input w3-padding-16" id="compnos" required name="comp">
       <option value="1">1</option> 
      </select></p>

      <p><label for="seatnos">Seat Number :<br></label>
      <select class="w3-input w3-padding-16" id="seatnos" required name="seatno">
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
           <option value="6">6</option>
           <option value="7">7</option>
           <option value="8">8</option>
           <option value="9">9</option>
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
           <option value="13">13</option>
        </select></p>
      <p>Please check your information.</p>
      <p>
        <button class="w3-button w3-light-grey w3-padding-large" type="submit" name="submit2">
          <i class="fa fa-paper-plane"></i> RELINQUISH
        </button>
      </p>
    </form>
  <!-- End INFO Section -->
  </div>
  
    <!-- Footer -->
  <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">VJTI-CoC-Inheritance</a></p>
  <!-- End footer -->
  </footer>

<!-- END PAGE CONTENT -->
</div>

</body>
</html>