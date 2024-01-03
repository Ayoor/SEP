<?php
session_start();
include "connection.php";

if ($_POST) {
    $newuser = array(
        'email' => $_POST['email'],
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'password' => $_POST['password'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'postcode' => $_POST['postcode'],
        'dob' => $_POST['dob'],
        'gender' => $_POST['gender'],
        'role' => "Admin"
    );

    extract($newuser);

    $retrivequery = "SELECT email FROM users WHERE email = '$email'";
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    $insertquery = "INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `address`, `postCode`, `phone`,`DOB`, `gender`, `role`) 
                    VALUES (NULL, '$firstname', '$lastname', '$email', '$hashedpassword', '$address', '$postcode', '$phone', '$dob', '$gender', '$role')";

    $row = mysqli_query($conn, $retrivequery);
    $result = mysqli_fetch_array($row); // get result in an array

    if ($result) {
        echo '<div class="alert alert-danger" role="alert">
                Email already exists!
              </div>';
    } else {
      mysqli_query($conn, $insertquery);
      // $_SESSION['email'] = $email;

      // Display success message and redirect after 3 seconds
      echo '<div class="alert alert-success" role="alert">
              Sign up successful! Redirecting in 3 seconds...
            </div>';

      echo '<script>
              setTimeout(function(){
                  window.location.href = "signin.php";
              }, 3000);
            </script>';
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from 111.68.112.228:443/public/signup-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:43:00 GMT -->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>New user Registration </title>
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <meta name="description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
  <meta property="og:url" content="http://demo.madebytilde.com/elephant">
  <meta property="og:type" content="website">
  <meta property="og:title" content="The fastest way to build Modern Admin APPS for any platform, browser, or device.">
  <meta property="og:description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
  <meta property="og:image" content="../../demo.madebytilde.com/elephant.html">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@madebytilde">
  <meta name="twitter:creator" content="@madebytilde">
  <meta name="twitter:title" content="The fastest way to build Modern Admin APPS for any platform, browser, or device.">
  <meta name="twitter:description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
  <meta name="twitter:image" content="../../demo.madebytilde.com/elephant.html">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="manifest.json">
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#d9230f">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
  <link rel="stylesheet" href="css/vendor.min.css">
  <link rel="stylesheet" href="css/elephant.min.css">
  <link rel="stylesheet" href="css/signup-3.min.css">
</head>

<body>
  <div class="signup">
    <div class="signup-body">
      <!-- <a class="signup-brand" href="index.html">
          <img class="img-responsive" src="img/logo.svg" alt="Elephant">
        </a> -->
      <h3 class="signup-heading">Sign up</h3>
      <div class="signup-form">
        <form data-toggle="md-validator" data-groups='{"birthdate": "birth_month birth_day birth_year"}' method="post">
          <div class="row">
            <div class="col-sm-6">
              <div class="md-form-group md-label-floating">
                <input class="md-form-control" type="text" placeholder="First Name" name="firstname" spellcheck="false" data-msg-required="Please enter your first name." required>
                
              </div>
            </div>
            <div class="col-sm-6">
              <div class="md-form-group md-label-floating">
                <input class="md-form-control" type="text" placeholder="Last Name" name="lastname" spellcheck="false" data-msg-required="Please enter your last name." required>
               
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="md-form-group md-label-floating">
                <input class="md-form-control" type="email" placeholder="Email" name="email" spellcheck="false" autocomplete="off" data-msg-required="Please enter your email address." required>
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="md-form-group md-label-floating">
                <input class="md-form-control" type="password" placeholder="Password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-9">
              <div class="md-form-group md-label-floating">
                <input class="md-form-control" type="text" placeholder="Address" name="address" spellcheck="false" data-msg-required="Please enter your Address" required>
               
              </div>
            </div>

             <div class="col-sm-3">
              <div class="md-form-group md-label-floating">
                <input class="md-form-control" type="text" placeholder="Post Code" name="postcode" spellcheck="false" data-msg-required="Please enter your PostCode" required>
                
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="md-form-group md-label-floating">
                <input class="md-form-control" type="tel" placeholder="Telephone"  name="phone" data-msg-required="Please enter your Phone Number"  required>
             
              </div>
            </div>

            <div class="col-xs-6">
              <div class="md-form-group">
                <select class="md-form-control" name="gender" data-msg-required="Please indicate your gender." required>
                  <option value="" disabled="disabled" selected="selected">Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Not Specified">Not specified</option>
                </select>
               
              </div>
            </div>


          </div>


          <div class="row">
            <div class="col-sm-12">
              <div class="md-form-group md-label-floating">
                
                <input class="md-form-control" placeholder="Date of Birth" type="date" name="dob" id="date" required>
              </div>
            </div>
          </div>


          <button class="btn btn-primary btn-block" type="submit">Sign up</button>
        </form>
      </div>
    </div>
    <div class="signup-footer">
      Already have an account? <a href="signin.php">Log in</a>
    </div>
  </div>

</body>

<!-- Mirrored from 111.68.112.228:443/public/signup-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:43:00 GMT -->

</html>