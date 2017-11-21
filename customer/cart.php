<!DOCTYPE HTML>
<?php
    session_start();
    require('../functions/Connection.php');
    require('../functions/View.php');
    require('../functions/Insert.php');

    require('../functions/PdfConversion.php');

    // echo "Check Here";
    // echo $_SESSION['customerId'];
    // require_once('../vendor/tcpdf/tcpdf.php');
    $customerId = $_SESSION['customerId'];
    ob_start();
?>
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

table, tr, th, td, tbody{
    border: 1px solid white;
}

body{
	width:100%;
	height:100%;
	font-family: 'Roboto Condensed', sans-serif;
	
}


h1,h2,h3 {
	margin:0 0 35px 0;
	font-family: 'Patua One', cursive;
	text-transform: uppercase;
	letter-spacing:1px;
}

p{
	margin:0 0 25px;
	font-size:18px;
	line-height:1.6em;
}
a{
	color:#26a5d3;
}
a:hover,a:focus{
	text-decoration:none;
	color:#26a5d3;
}

#contact{
	background:#333333;
	color:#f4f4f4;
	padding-bottom:80px;
}

textarea.form-control{
    height:100px;
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
                        <a class="mdl-navigation__link" href="#">Customer</a>
                        <a class="mdl-navigation__link" href="../about.php">About</a>
                        <a class="mdl-navigation__link" href="../contact.php">Contact</a>
                        <a class="mdl-navigation__link" href="customerLogout.php">Logout</a>
                    </nav>
                    </div>
                </header>
                <div class="mdl-layout__drawer">
                    <span class="mdl-layout-title">Lynx Co</span>
                    <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="../index.php">Home</a>
                        <a class="mdl-navigation__link" href="../products.php">Products</a>
                        <a class="mdl-navigation__link" href="#">Customer</a>
                        <a class="mdl-navigation__link" href="../about.php">About</a>
                        <a class="mdl-navigation__link" href="../contact.php">Contact</a>
                        <a class="mdl-navigation__link" href="customerLogout.php">Logout</a>
                    </nav>
                </div>   
        </div>

        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <br/><br/><br/>
        
        <section id="contact" class="content-section text-center">
        <div class="contact-section">
            <div class="container">
                <br />
                <h2>Cart Details</h2>
                <div class="row">
                    <div class="col-md-2 col-md-offset-2"></div>
                    <div class="col-md-8 col-md-offset-2">
                        <table >
                        <thead>
                            <tr>
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

		<?php 
			//Here
                $i = 0;
                $customerQuery = "SELECT * FROM cart where customerId='$customerId'";

                $gettingConnection = new Connection();
                $gettingConnection -> setConnection();
                $connection = $gettingConnection -> getConnection();
        
                $viewProcess = new View();
                $data = $viewProcess -> execute($customerQuery, $connection);
        
                while ($row = mysqli_fetch_assoc($data)) {
                    $temp = 1;
                    
                    foreach ($row as $item) {
                        if($temp == 1)
                        {
							$productId = $row["productId"];
                            $temp = 0;
                        }
                    }               
				$i++;
		?>

		 <tr>
            <td><?php echo $productId; ?></td>
            <td>
            
            <?php

                $productQuery = "SELECT * FROM product where productId='$productId'";

                $viewProductProcess = new View();
                $productData = $viewProductProcess -> execute($productQuery, $connection);
        
                while ($row = mysqli_fetch_assoc($productData)) {
                    $temp = 1;
                    
                    foreach ($row as $item) {
                        if($temp == 1)
                        {
                            $productName = $row["productName"];
                            $temp = 0;
                        }
                    }               
                $i++;
                }
                echo $productName;
            ?>
            
            </td>	  
            <td>
                <img src="../admin/product/product_images/<?php
                $productsQuery = "SELECT * FROM product where productId='$productId'";
                $viewProductsProcess = new View();
                $productsData = $viewProductsProcess -> execute($productsQuery, $connection);
                while ($row = mysqli_fetch_assoc($productsData)) {
                    $temp = 1;
                    foreach ($row as $item) {
                        if($temp == 1)
                        {
                            $productImage = $row["productImage"];
                            $temp = 0;
                        }
                    }               
                    $i++;
                }
                echo $productImage; ?>" height="50" width="50" />
            </td>	  
            <td>    
                <a href="delete_cart.php?customerValue=<?php echo $customerId; ?>&productValue=<?php echo $productId; ?>" >Delete</a>
            </td>	  
        </tr>

		<?php 
		  }
			mysqli_close($connection); 
		?>	<!-- Closing of the while loop -->


 </tbody>
</table>

                    </div>
                    <div class="col-md-2 col-md-offset-2"></div>
                </div>
            </div>
        </div>          
        
      </section>

        
<br /><br />

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
    // if (isset($_POST['submit_report'])){
        
    // }
    
?>