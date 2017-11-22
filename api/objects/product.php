<?php
class Product{
 
    // database connection and table name
    private $conn;
    private $table_name = "product";
    // private $table_name = "products";
 
    // object properties
    // public $id;
    // public $name;
    // public $description;
    // public $price;
    // public $category_id;
    // public $category_name;
    // public $created;
    public $producId;
    public $productCategory;
    public $productName;
    public $productImage;
    public $productDescription;
    public $productQuantity;
    public $productStock;
    public $productPrice;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    public function read(){
       // select all query
       $query = "SELECT
                   c.name as category_name, p.productId, p.productCategory, p.productName, p.productImage, p.productDescription, p.productQuantity, p.productStock, p.productPrice
               FROM
                   " . $this->table_name . " p
                   LEFT JOIN
                       categories c
                           ON p.productId = c.id
               ORDER BY
                   p.productName DESC";
       $returnedData = mysqli_query($this->conn, $query);
       return $returnedData;
    }

    // create product
    public function create(){
    
       // query to insert record
       $query = "INSERT INTO
                   " . $this->table_name . "
               SET
                   productCategory='" . $this->productCategory . "',
                   productName='" . $this->productName . "',
                   productImage='" . $this->productImage . "',
                   productDescription='" . $this->productDescription . "',
                   productQuantity='" . $this->productQuantity . "',
                   productStock='" . $this->productStock . "',
                   productPrice='" . $this->productPrice . "'";

        mysqli_query($this->conn, $query);
        mysqli_close($this->conn);
        return true;
    }

    public function readOne(){
        $query = "SELECT
                c.name as category_name, p.productId, p.productCategory, p.productName, p.productImage, p.productDescription, p.productQuantity, p.productStock, p.productPrice
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.productId = c.id
            WHERE
                p.productId = " . $this->productId ."
            LIMIT
                0,1";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        
        // set values to object properties
        $this->productCategory = $row['productCategory'];
        $this->productName = $row['productName'];
        $this->productImage = $row['productImage'];
        $this->productDescription = $row['productDescription'];
        $this->productQuantity = $row['productQuantity'];
        $this->productStock = $row['productStock'];
        $this->productPrice = $row['productPrice'];
       }

       // update the product
    public function update(){
       $query = "UPDATE
                   " . $this->table_name . "
               SET
                    productCategory='" . $this->productCategory . "',
                    productName='" . $this->productName . "',
                    productImage='" . $this->productImage . "',
                    productDescription='" . $this->productDescription . "',
                    productQuantity='" . $this->productQuantity . "',
                    productStock='" . $this->productStock . "',
                    productPrice='" . $this->productPrice . "'
               WHERE
                   productId = '" . $this->productId . "'";
    
        mysqli_query($this->conn, $query);
        mysqli_close($this->conn);
        return true;
    }

    // delete the product
    public function delete(){
        $tempId = htmlspecialchars(strip_tags($this->productId));
        $query = "DELETE FROM " . $this->table_name . " WHERE productId = " . $tempId;
        mysqli_query($this->conn, $query);
        mysqli_close($this->conn);
   }

   // search products
    public function search($keywords){
        //sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

       // select all query
       $query = "SELECT
                   c.name as category_name, p.productId, p.productCategory, p.productName, p.productImage, p.productDescription, p.productQuantity, p.productStock, p.productPrice
               FROM
                   " . $this->table_name . " p
                   LEFT JOIN
                       categories c
                           ON p.productId = c.id
               WHERE
                   p.productName LIKE '" . $keywords . "' OR p.productDescription LIKE '" . $keywords ."' OR c.name LIKE '" . $keywords ."'
               ORDER BY
                   p.productName DESC";

        $stmt = mysqli_query($this->conn, $query);
       return $stmt;

   }

    public function readPaging($from_record_num, $records_per_page){    // read products with pagination

       // select query
       $query = "SELECT
                   c.name as category_name, p.productId, p.productCategory, p.productName, p.productImage, p.productDescription, p.productQuantity, p.productStock, p.productPrice
               FROM
                   " . $this->table_name . " p
                   LEFT JOIN
                       categories c
                           ON p.productId = c.id
               ORDER BY p.productName DESC
               LIMIT " . $from_record_num . ", " . $records_per_page;
        $stmt = mysqli_query($this ->conn, $query);
        return $stmt;
   }

   // used for paging products
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
        $stmt = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($stmt);
        return $row['total_rows'];
    }

}