<?php include ('server.php');?>

<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<h1 class="w3-jumbo"><a href="home.php"> BOOK MY SEAT </a></h1>
</head>
<body  class="w3-black">
<div class="header">
<h2>Login</h2>  
</div>
<form method="post" action="login.php">
    <?php include ('errors.php');?>
    <div class="input">
    <label>Username</label><br>
    <input type="text" placeholder="Enter Username" name="username">
    </div>
    
    <div class="input">
    <label>Password</label><br>
    <input type="password" placeholder="Enter Password" name="psw1">
    </div>
   
    <div class="input">
    <button type="submit" name="login">Login</button>
    </div>
    <p>Not yet a member?<a href="register.php">       Sign up</a></p>
</form>
</body>
</html>