<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="./customerList.php">Show Customers</a>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="cName" placeholder="Customer Name" require/>
        <input type="text" name="product" placeholder="Write the product Name" require/>
        <input type="text" name="price" placeholder="Write the price" require/>
        <input type="number" name="qty" placeholder="Put the quantity" value="1" require/>
        <button type="submit">Add the product</button>
    </form>
    <?php
        class product{
            private $pName;
            private $price;
            private $qty;
            function __construct($productName,$price,$qty=1)
            {
                $this->pName = $productName;
                $this->price = $price;
                $this->qty = $qty;
            }
            function calTotal(){
                return $this->price * $this->qty;
            }
            function writeDetails(){
                return "product:".$this->pName."\nprice:".$this->price."\nquantity:".$this->qty."\ntotal:".$this->calTotal()."\n";
            }
        }
        function cFileCreator($cName){
            $addr = "./files/customers/$cName.txt";
            if(file_exists($addr)){
                $fileHandler = fopen($addr,'a');
                return $fileHandler;
            }else{
                $fileHandler = fopen($addr,'w');
                return $fileHandler;
            }
        }
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $cName = $_POST['cName'];
            $pname = $_POST['product'];
            $price = (float)$_POST['price'];
            $qty = (int)$_POST['qty'];
            $product = new product($pname,$price,$qty);
            $fileHandler = cFileCreator($cName);
            fwrite($fileHandler,$product->writeDetails());
            fclose($fileHandler);
        }
    ?>
</body>
</html>