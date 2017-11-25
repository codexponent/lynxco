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
    background: url('../img/contactImage.jpg') center / cover;
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
          <span class="mdl-layout-title"><img src="../img/lynx.png" height="55" width="60" /></span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation -->
          <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="../index.php">Home</a>
            <a class="mdl-navigation__link" href="../products.php">Products</a>
            <a class="mdl-navigation__link" href="#">Admin</a>
            <a class="mdl-navigation__link" href="customer.php">Customer</a>
            <a class="mdl-navigation__link" href="../about.php">About</a>
            <a class="mdl-navigation__link" href="../contact.php">Contact</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Lynx Co</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="../index.php">Home</a>
          <a class="mdl-navigation__link" href="../products.php">Products</a>
          <a class="mdl-navigation__link" href="#">Admin</a>
          <a class="mdl-navigation__link" href="customer.php">Customer</a>
          <a class="mdl-navigation__link" href="../about.php">About</a>
          <a class="mdl-navigation__link" href="../contact.php">Contact</a>
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
          <h2>Admin Area</h2>
          <!-- <p>Feel free to shout us by feeling the contact form or visiting our social network sites like Fackebook,Whatsapp,Twitter.</p> -->
          <div class="row">
            <!-- style="margin-left: 50%;"  -->

            <div class="col-md-2 col-md-offset-2">
            </div>


            <div class="col-md-8 col-md-offset-2">
              <form class="form-horizontal" method="POST" action="adminLogin.php">
                <div class="form-group">
                  <label for="exampleInputEmail2">Email</label>
                  <input type="email" name="emailField" class="form-control" id="exampleInputEmail2" placeholder="Your Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputSubject2">Password</label>
                  <input type="password" name="passwordField" class="form-control" id="exampleInputSubject2" placeholder="Your Password">
                </div>
                <button type="submit" name="loginSubmit" class="btn btn-default">Login</button>
              </form>
            </div>

            <div class="col-md-2 col-md-offset-2">
            </div>


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

require('../functions/Connection.php');
require('../functions/View.php');

if (isset($_POST['loginSubmit'])){
    echo "Login Clicked";
    
    $c_email = $_POST['emailField'];
    $c_password = $_POST['passwordField'];
    
    $checkQuery = "SELECT * FROM admin WHERE password = '$c_password' AND email = '$c_email'";
    
    $gettingConnection = new Connection();
    $gettingConnection -> setConnection();
    $connection = $gettingConnection -> getConnection();
    
    $viewProcess = new View();
    $data = $viewProcess -> execute($checkQuery, $connection);
    
    
    $checkNumber = mysqli_num_rows($data);
    
    if ($checkNumber == 0) {
        echo "<script>alert('Email or Password is incorrect')</script>";
        exit();
    }
    
    $getQuery = "SELECT id FROM admin where email = '$c_email'";
    
    $gettingId = new View();
    $dataId = $gettingId -> execute($getQuery, $connection);
    
    $row = mysqli_fetch_assoc($dataId);
    // echo "Row is: <br />";
    // print_r($row);
    $id = $row["id"];
    // echo "Id is: " . $id . "<br />";
    
    $_SESSION['id'] = $id;
    echo "<script>alert('Admin Logged in Successfully')</script>";
    echo "<script>window.open('../admin/product/view_products.php', '_self')</script>";
    mysqli_close($connection);
}

?>