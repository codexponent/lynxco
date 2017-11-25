<?php
session_start();
require('../functions/Connection.php');
require('../functions/View.php');

$adminQuery = "SELECT * FROM admin";

$gettingConnection = new Connection();
$gettingConnection -> setConnection();
$connection = $gettingConnection -> getConnection();

$viewProcess = new View();
$data = $viewProcess -> execute($adminQuery, $connection);

$row = mysqli_fetch_assoc($data);
$adminEmail = $row['email'];
?>
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <link rel="stylesheet" href="style/styles.css">

  <body>


    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Home</span>
          <div class="mdl-layout-spacer"></div>

          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item">About</li>
            <li class="mdl-menu__item">Contact</li>
            <a href="adminLogout.php">
              <li class="mdl-menu__item">Logout</li>
            </a>
          </ul>
        </div>
      </header>

      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img src="images/user.jpg" class="demo-avatar">
          <div class="demo-avatar-dropdown">
            <span><?php echo $adminEmail; ?></span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons" role="presentation">arrow_drop_down</i>
              <span class="visuallyhidden">Accounts</span>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
              <a href="adminLogout.php">
                <li class="mdl-menu__item">Logout</li>
              </a>
            </ul>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <a href="product/view_products.php" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Products</a>
          <a href="adminLogout.php" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">backspace</i>Logout</a>
          <div class="mdl-layout-spacer"></div>
        </nav>
      </div>
    </div>

  </body>

  </html>