<!DOCTYPE HTML>
<html>

<head>
  <title>Lynx Co</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- load MUI -->
  <link href="//cdn.muicss.com/mui-0.9.16/css/mui.min.css" rel="stylesheet" type="text/css" />
  <script src="//cdn.muicss.com/mui-0.9.16/js/mui.min.js"></script>
  <link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>

</head>

<link href="https://fonts.googleapis.com/css?family=Oswald:700|Patua+One|Roboto+Condensed:700" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

<style>
  body {
    width: 100%;
    height: 100%;
    font-family: 'Roboto Condensed', sans-serif;
  }
  
  h1,
  h2,
  h3 {
    margin: 0 0 35px 0;
    font-family: 'Patua One', cursive;
    text-transform: uppercase;
    letter-spacing: 1px;
  }
  
  p {
    margin: 0 0 25px;
    font-size: 18px;
    line-height: 1.6em;
  }
  
  a {
    color: #26a5d3;
  }
  
  a:hover,
  a:focus {
    text-decoration: none;
    color: #26a5d3;
  }
  
  #contact {
    background: #333333;
    color: #f4f4f4;
    padding-bottom: 80px;
  }
  
  textarea.form-control {
    height: 100px;
  }
  
  .demo-layout-transparent {
    background: url('img/contactImage.jpg') center / cover;
  }
  
  .demo-layout-transparent .mdl-layout__header,
  .demo-layout-transparent .mdl-layout__drawer-button {
    /* This background is dark, so we set text to white. Use 87% black instead if
    your background is light. */
    color: white;
    background-color: black;
  }
  
  body {
    /* font-family: 'Sofia';font-size: 22px; */
    font-family: 'Julius Sans One', sans-serif;
    background-color: #3B3738
  }
</style>

<body>
  <div>
    <div class="demo-layout-transparent mdl-layout mdl-js-layout">
      <header class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title"><img src="img/lynx.png" height="55" width="60" /></span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation -->
          <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="index.php">Home</a>
            <a class="mdl-navigation__link" href="products.php">Products</a>
            <a class="mdl-navigation__link" href="login/adminLogin.php">Admin</a>
            <a class="mdl-navigation__link" href="login/customer.php">Customer</a>
            <a class="mdl-navigation__link" href="about.php">About</a>
            <a class="mdl-navigation__link" href="#">Contact</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Lynx Co</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="index.php">Home</a>
          <a class="mdl-navigation__link" href="products.php">Products</a>
          <a class="mdl-navigation__link" href="login/adminLogin.php">Admin</a>
          <a class="mdl-navigation__link" href="login/customer.php">Customer</a>
          <a class="mdl-navigation__link" href="about.php">About</a>
          <a class="mdl-navigation__link" href="#">Contact</a>
        </nav>
      </div>
    </div>

    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

    <section id="contact" class="content-section text-center">
      <div class="contact-section">
        <div class="container">
          <br />
          <h2>Contact Us</h2>
          <p>Feel free to shout us by feeling the contact form or visiting our social network sites like Fackebook,Whatsapp,Twitter.</p>
          <div class="row">
            <!-- style="margin-left: 50%;"  -->

            <div class="col-md-6 col-md-offset-2">


              <h3>Our Location</h3>

              <div id="googleMap" style="width:100%;height:400px;"></div>

              <script>
                function myMap() {
                  var mapProp = {
                    center: new google.maps.LatLng(51.508742, -0.120850),
                    zoom: 5,
                  };
                  var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                }
              </script>

              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEv5OvEi1QmTdEKi-_IOjnVXaIGXs3TOA&callback=myMap"></script>


              <!-- <div id="map"></div>
<script>
function initMap() {
    var uluru = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap">
</script> -->



            </div>

            <div class="col-md-6 col-md-offset-2">
              <form class="form-horizontal" method="POST" action="contact.php">
                <div class="form-group">
                  <label for="exampleInputName2">Name</label>
                  <input type="text" name="nameField" class="form-control" id="exampleInputName2" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">Email</label>
                  <input type="email" name="emailField" class="form-control" id="exampleInputEmail2" placeholder="Your Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputSubject2">Subject</label>
                  <input type="subject" name="subjectField" class="form-control" id="exampleInputSubject2" placeholder="Subject">
                </div>
                <div class="form-group ">
                  <label for="exampleInputText">Your Message</label>
                  <textarea name="messageField" class="form-control" placeholder="Description"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Send Message</button>
              </form>

              <hr>
            </div>

            <!-- <div class="col-md-2 col-md-offset-2">
</div> -->

          </div>
        </div>
      </div>
    </section>


    <br />
    <br />

    <!--//Footer-->
    <footer class="mdl-mega-footer">
      <div class="mdl-mega-footer__middle-section">

        <div class="mdl-mega-footer__drop-down-section">
          <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
          <h1 class="mdl-mega-footer__heading">Features</h1>
          <ul class="mdl-mega-footer__link-list">
            <li><a href="#">About</a></li>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Partners</a></li>
            <li><a href="#">Updates</a></li>
          </ul>
        </div>

        <div class="mdl-mega-footer__drop-down-section">
          <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
          <h1 class="mdl-mega-footer__heading">Details</h1>
          <ul class="mdl-mega-footer__link-list">
            <li><a href="#">Specs</a></li>
            <li><a href="#">Tools</a></li>
            <li><a href="#">Resources</a></li>
          </ul>
        </div>

        <div class="mdl-mega-footer__drop-down-section">
          <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
          <h1 class="mdl-mega-footer__heading">Technology</h1>
          <ul class="mdl-mega-footer__link-list">
            <li><a href="#">How it works</a></li>
            <li><a href="#">Patterns</a></li>
            <li><a href="#">Usage</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Contracts</a></li>
          </ul>
        </div>

        <div class="mdl-mega-footer__drop-down-section">
          <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
          <h1 class="mdl-mega-footer__heading">FAQ</h1>
          <ul class="mdl-mega-footer__link-list">
            <li><a href="#">Questions</a></li>
            <li><a href="#">Answers</a></li>
            <li><a href="#">Contact us</a></li>
          </ul>
        </div>

      </div>

      <div class="mdl-mega-footer__bottom-section">
        <div class="mdl-logo">Copyright Lynx Co</div>
      </div>

    </footer>

  </div>
</body>

</html>

<?php
require_once('functions/MailSender.php');

if (isset($_POST['submit'])){
    
    $email = $_POST['emailField'];
    $name = $_POST['nameField'];
    $subject = $_POST['subjectField'];
    $descriptions = $_POST['messageField'];
    
    $description = strip_tags($descriptions);
    
    // $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        
        echo "<script>alert('Email is incorrect')</script>";
        
    }else{
        $emailProcess = new MailSender($email, $name, $subject, $description);
        $emailProcess -> setEmail($email);
        $emailProcess -> setName($name);
        $emailProcess -> setSubject($subject);
        $emailProcess -> setDescription($description);
        $emailProcess -> sendMail();
    }
    
}

?>