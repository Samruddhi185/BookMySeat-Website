<?php
session_start();
 $db = mysqli_connect('localhost','root','','bms1');
 if (!$db) {
   die("connection failed :" .mysql_error());
 }

 $username = $email = $psw1 = $psw2 = $firstname = $lastname = $mobile = "";
 $errors = array();

if (isset($_POST['register']))
{
  if (empty($_POST["username"]))
  {
    array_push( $errors, "User-name is required.") ;
  }
  else
  {
    $username = mysqli_real_escape_string($db, $_POST["username"]);
    $sql = "SELECT * FROM `users` WHERE `user_name` = '$username' ";
     $res = mysqli_query($db, $sql);
     if((mysqli_num_rows($res))>0)
     {
       array_push( $errors, "Username already exists. Choose a new username.") ;
     }
  }

  if (empty($_POST["email"]))
  {
  array_push( $errors, "Email is required.");
  } else
  {
     if(!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL))
     {
      array_push( $errors, "The Email you have entered is invalid, try again.") ;
     }
     else{
      $email = mysqli_real_escape_string($db, $_POST["email"]);
    }
  }

  if (empty($_POST["firstname"]))
  {
  array_push( $errors, "First name is required.");
  } else
  {
    $firstname = mysqli_real_escape_string($db, $_POST["firstname"]);
  }

  if (empty($_POST["lastname"]))
  {
  array_push( $errors, "Last name is required.");
  } else
  {
    $lastname = mysqli_real_escape_string($db, $_POST["lastname"]);
  }


  if (empty($_POST["mobile"]))
  {
  array_push( $errors, "Mobile number is required.");
  } else
  {
    $mobile = mysqli_real_escape_string($db, $_POST["mobile"]);
  }

  if (empty($_POST["psw1"])) {
    array_push( $errors, "Password is required.");
  } else {
    $psw1 = mysqli_real_escape_string($db, $_POST["psw1"]);
  }

  $psw2 = mysqli_real_escape_string($db, $_POST["psw2"]);

  if ($psw1 != $psw2) {
    array_push( $errors, "The two passwords do not match.");
      }
    if(count($errors)==0)
    {
     $psw = md5($psw1);
     $sql = "INSERT INTO `users` (`user_id`, `user_name`, `first_name`, `last_name`, `mobile`, `email`, `password`, `reward_pts`) VALUES (NULL, '$username', '$firstname', '$lastname', '$mobile', '$email', '$psw', 0) ";
    mysqli_query($db, $sql);
    header('location: home1.php');
    }
}
if (isset($_POST['login']))
{
  if (empty($_POST["username"]))
  {
    array_push( $errors, "Name is required") ;
  } else
  {
    $username = mysqli_real_escape_string($db, $_POST["username"]);
  }
  if (empty($_POST["psw1"])) {
    array_push( $errors, "Password is required");
  } else {
    $psw1 = mysqli_real_escape_string($db, $_POST["psw1"]);
  }

      if(count($errors)==0)
    {
     $psw = md5($psw1);
     $sql = "SELECT * FROM `users` WHERE `user_name` = '$username' AND `password` = '$psw'";
     $res = mysqli_query($db, $sql);
     if((mysqli_num_rows($res)) > 0)
     {

       while($row = $res->fetch_assoc()) {
         $_SESSION['Name']=$row["user_name"];
         $_SESSION['id_user']=$row["user_id"];
    }

      header('location: home1.php');
     } else
     {
      array_push( $errors, "Combination of username and password is wrong.");
     }
    }
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['Name']);
  unset($_SESSION['id_user']);
  header('location: login.php');

}
?>
