
<?php
 session_start();



 include "connect.php";

if($_POST){  
  
    $email= $_POST['email']; 
    $password= $_POST['password'];
   
  $query = "SELECT email, firstname, password FROM `users` WHERE email = '$email'";
 
      $row= mysqli_query($link, $query);
      $result= mysqli_fetch_array($row); //get result in an array  
   
            if($result["email"]== "NULL"|| $result["email"]== "" ){
              echo "User not found, Signup to have an account <br>";  
                  
              }
              
             
              
              if( !(password_verify($password, $result["password"]))){ 
                  echo "Incorrect Password";

              }

              
             
              if($result["email"] && password_verify($password, $result["password"])){
                 
                  $_SESSION['firstname']= $result["firstname"];
                  echo "welcome ".$_SESSION['firstname'];
              // header("Location: squads.php");
              
            //   https://ayodele.me/swimmembership/squads.php
            
       
}
}
?>

<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from 111.68.112.228:443/public/login-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:43:01 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SEP login</title>
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
    <link rel="stylesheet" href="css/login-3.min.css">
  </head>
  <body>
    <div class="login">
      <div class="login-body">
        <!-- <a class="login-brand" href="index.html">
          <img class="img-responsive" src="img/logo.svg" alt="Elephant">
        </a> -->
        <h3 class="login-heading">Sign in</h3>
        <div class="login-form">
          <form data-toggle="md-validator" method="post">
            <div class="md-form-group md-label-floating">
              <input class="md-form-control" type="email" name="email" spellcheck="false" autocomplete="off" data-msg-required="Please enter your email address." required>
              <label class="md-control-label">Email</label>
            </div>
            <div class="md-form-group md-label-floating">
              <input class="md-form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
              <label class="md-control-label">Password</label>
            </div>
            <div class="md-form-group md-custom-controls">
              <label class="custom-control custom-control-primary custom-checkbox">
                <input class="custom-control-input" type="checkbox" checked="checked">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-label">Keep me signed in</span>
              </label>
              <span aria-hidden="true"> · </span>
              <a href="password-3.html">Forgot password?</a>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
          </form>
        </div>
      </div>
      <div class="login-footer">
        Don't have an account? <a href="signup.php">Sign Up</a>
      </div>
    </div>
    <script src="js/vendor.min.js"></script>
    <script src="js/elephant.min.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
    </script>
  </body>

<!-- Mirrored from 111.68.112.228:443/public/login-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:43:04 GMT -->
</html>