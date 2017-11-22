<?php
session_start();
    require('../../functions/Connection.php');
    require('../../functions/Update.php');
    require('../../functions/View.php');

    $adminQuery = "SELECT * FROM admin";
    
    $gettingConnection = new Connection();
    $gettingConnection -> setConnection();
    $connection = $gettingConnection -> getConnection();

    $viewProcess = new View();
    $data = $viewProcess -> execute($adminQuery, $connection);        
        
    $row = mysqli_fetch_assoc($data);
    $adminEmail = $row['email'];

	$productId = "";
    $productCategory = "";
	$productName = "";
	$productImage = "";
	$productDescription =  "";
	$productQuantity = "";
	$productStock = "";
	$productPrice = "";

	if (isset($_GET['edit_products'])) {
		$get_id = $_GET['edit_products'];

		$viewQuery = "SELECT * FROM PRODUCT where PRODUCTID='$get_id'";

        $viewProcess = new View();
        $stid = $viewProcess -> execute($viewQuery, $connection);        

        while ($row = mysqli_fetch_assoc($stid)) {
            $temp = 1;
            // print "<tr>\n";
            foreach ($row as $item) {
                if($temp == 1){
                    $productId = $row["productId"];
                    $productCategory = $row["productCategory"];
                    $productName = $row["productName"];
                    $productImage = $row["productImage"];
                    $productDescription =  $row["productDescription"];
                    $productQuantity = $row["productQuantity"];
                    $productStock = $row["productStock"];
                    $productPrice = $row["productPrice"];
                    $temp = 0;
                }
            }
        }
	}

?>
<!DOCTYPE html>
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
            <link rel="stylesheet" href="../style/styles.css">
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
                            <a href=".../adminLogout.php" ><li class="mdl-menu__item">Logout</li></a>
                        </ul>
                        </div>
                    </header>
            <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
                <header class="demo-drawer-header">
                <img src="../images/user.jpg" class="demo-avatar">
                <div class="demo-avatar-dropdown">
                    <span><?php echo $adminEmail ?></span>
                    <div class="mdl-layout-spacer"></div>
                    <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                        <i class="material-icons" role="presentation">arrow_drop_down</i>
                    <span class="visuallyhidden">Accounts</span>
                    </button>
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                    <a href="../adminLogout.php" ><li class="mdl-menu__item">Logout</li></a>
                    </ul>
                </div>
                </header>
                <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
                    <a href="view_products.php" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">backspace</i>Back</a>
                    <a href="../adminLogout.php" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">backspace</i>Logout</a>
                    <div class="mdl-layout-spacer"></div>
                </nav>
      </div>
    </div>
<br/><br/><br/><br/>
<h2 style="text-align: center;" >Update Products </h2>  

<div style="background-color: white; align: center; text-align:center; width: 50%;display: table; margin: 0 auto;" >
	<form action="edit_products.php?edit_products=<?php echo $_GET['edit_products']; ?>" method="post" enctype="multipart/form-data" class="mui-form" >	<!-- enctype for various form's of data -->
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="product_id" value="<?php echo $productId; ?>" hidden >
    				<label>Product ID:</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="product_category" value="<?php echo $productCategory; ?>" required>
    				<label>Category</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="text" name="product_title" value="<?php echo $productName; ?>" required>
    				<label>Title</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
					<img src="product_images/<?php echo $productImage; ?>" width="50" height="50"> 
    				<input type="file" name="product_image" >
    				<label>Image</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<textarea name="product_description"  required><?php echo $productDescription; ?></textarea>
    				<label>Description</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="product_quantity" value="<?php echo $productQuantity; ?>" required>
    				<label>Quantity</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="product_stock" value="<?php echo $productStock; ?>" required>
    				<label>Stock</label>
  				</div>
				<div class="mui-textfield mui-textfield--float-label">
    				<input type="number" name="product_price" value="<?php echo $productPrice; ?>" required>
    				<label>Price</label>
  				</div>
					<button type="submit" name="update_post" class="mui-btn mui-btn--raised">Submit</button>
		</form>
</div>


    </body>
</html>


<?php
	if (isset($_POST['update_post']) ) {

		$productIdN = $_POST['product_id'];
		$productCategoryN = $_POST['product_category'];
		$productNameN = $_POST['product_title'];

		//For Image
		$productImageN = $_FILES['product_image']['name']; 
		$productImageTmpN = $_FILES['product_image']['tmp_name'];
		move_uploaded_file($productImageTmpN, "product_images/$productImageN"); 

		$productDescriptionN =  $_POST['product_description'];
		$productQuantityN = $_POST['product_quantity'];
		$productStockN = $_POST['product_stock'];
		$productPriceN = $_POST['product_price'];

		$updateQuery = "UPDATE product SET productCategory = '$productCategoryN', 
		productName = '$productNameN', 
		productImage = '$productImageN', 
		productDescription = '$productDescriptionN', 
		productQuantity = '$productQuantityN', 
		productStock = '$productStockN', 
		productPrice = '$productPriceN' 
		WHERE 
		productId = '$productIdN'";	

        $updateProcess = new Update();
        $updateProcess -> execute($updateQuery, $connection);
		echo "<script>window.history.back();</script>";
	}
	

?>
