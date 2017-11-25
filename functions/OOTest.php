<?php
session_start();
require('Connection.php');
require('View.php');

class OOTest{
    
    private $retrievedProductId;
    private $retrievedProductImage;
    private $retrievedProductDescription;
    private $retrievedProductCategory;
    private $retrievedProductName;
    private $retrievedProductPrice;
    private $retrievedProductQuantity;
    private $retrievedProductStock;
    private $productId;
    private $productImage;
    private $productDescription;
    private $productCategory;
    private $productName;
    private $productPrice;
    private $productQuantity;
    private $productStock;
    
    public function executeMain(){
        $i = 0;
        $retrievedCustomerId = $_GET['productValue'];
        //echo $retrievedCustomerId;
        $individualProductQuery = "SELECT * FROM product WHERE productId=$retrievedCustomerId";
        
        $gettingConnection = new Connection();
        $gettingConnection -> setConnection();
        $connection = $gettingConnection -> getConnection();
        //print_r($connection);
        
        $viewProcess = new View();
        $data = $viewProcess -> execute($individualProductQuery, $connection);
        
        while ($row = mysqli_fetch_assoc($data)) {
            $temp = 1;
            foreach ($row as $item) {
                if($temp == 1)
                {
                    $this -> productId = $row["productId"];
                    $this -> productImage = $row["productImage"];
                    $this -> productDescription = $row["productDescription"];
                    $this -> productCategory = $row["productCategory"];
                    $this -> productName = $row["productName"];
                    $this -> productPrice = $row["productPrice"];
                    $this -> productQuantity = $row["productQuantity"];
                    $this -> productStock = $row["productStock"];
                    $temp = 0;
                }
            }
            $i++;
        }
        mysqli_close($connection);
    }
    
    public function setProductId(){
        $this -> retrievedProductId = $this -> productId;
    }
    
    public function setProductImage(){
        $this -> retrievedProductImage = $this -> productImage;
    }
    
    public function setProductDescription(){
        $this -> retrievedProductDescription = $this -> productDescription;
    }
    
    public function setProductCategory(){
        $this -> retrievedProductCategory = $this -> productCategory;
    }
    
    public function setProductName(){
        $this -> retrievedProductName = $this -> productName;
    }
    
    public function setProductPrice(){
        $this -> retrievedProductPrice = $this -> productPrice;
    }
    
    public function setProductQuantity(){
        $this -> retrievedProductQuantity = $this -> productQuantity;
    }
    
    public function setProductStock(){
        $this -> retrievedProductStock = $this -> productStock;
    }
    
    public function getProductId(){
        return $this -> retrievedProductId;
    }
    
    public function getProductImage(){
        return $this -> retrievedProductImage;
    }
    
    public function getProductDescription(){
        return $this -> retrievedProductDescription;
    }
    
    public function getProductCategory(){
        return $this -> retrievedProductCategory;
    }
    
    public function getProductName(){
        return $this -> retrievedProductName;
    }
    
    public function getProductPrice(){
        return $this -> retrievedProductPrice;
    }
    
    public function getProductQuantity(){
        return $this -> retrievedProductQuantity;
    }
    
    public function getProductStock(){
        return $this -> retrievedProductStock;
    }
    
}

$productDetails = new OOTest();
$productDetails -> executeMain();
$productDetails -> setProductId();
$productDetails -> setProductImage();
$productDetails -> setProductDescription();
$productDetails -> setProductCategory();
$productDetails -> setProductName();
$productDetails -> setProductPrice();
$productDetails -> setProductQuantity();
$productDetails -> setProductStock();

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

  <link href="https://fonts.googleapis.com/css?family=Oswald:700|Patua+One|Roboto+Condensed:700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
  <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

  <style>
    table,
    tr,
    th,
    td,
    tbody {
      border: 1px solid white;
    }
    
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
      background: url('../img/productImage.jpg') center / cover;
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
              <a class="mdl-navigation__link" href="../customer/dashboard.php">Customer</a>
              <a class="mdl-navigation__link" href="../about.php">About</a>
              <a class="mdl-navigation__link" href="../contact.php">Contact</a>
              <a class="mdl-navigation__link" href="../customer/customerLogout.php">Logout</a>
            </nav>
          </div>
        </header>
        <div class="mdl-layout__drawer">
          <span class="mdl-layout-title">Lynx Co</span>
          <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="../index.php">Home</a>
            <a class="mdl-navigation__link" href="../products.php">Products</a>
            <a class="mdl-navigation__link" href="../customer/dashboard.php">Customer</a>
            <a class="mdl-navigation__link" href="../about.php">About</a>
            <a class="mdl-navigation__link" href="../contact.php">Contact</a>
            <a class="mdl-navigation__link" href="../customer/customerLogout.php">Logout</a>
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
            <h4>Product Details</h4>
            <div class="row">
              <div class="col-md-6 col-md-offset-6">
                <img src="../admin/product/product_images/<?php echo $productDetails -> getProductImage(); ?>" height="500" width="500" />
              </div>
              <div class="col-md-6 col-md-offset-6">
                <p>Product Name:
                  <?php echo $productDetails -> getProductName(); ?>
                </p>
                <p>Product Category:
                  <?php echo $productDetails -> getProductCategory(); ?>
                </p>
                <p>Product Price:
                  <?php echo $productDetails -> getProductPrice(); ?>
                </p>
                <p>Product Quantity:
                  <?php echo $productDetails -> getProductQuantity(); ?>
                </p>
                <p>Product Stock:
                  <?php echo $productDetails -> getProductStock(); ?>
                </p>
                <p>Product Description:
                  <?php echo $productDetails -> getProductDescription(); ?>
                </p>
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