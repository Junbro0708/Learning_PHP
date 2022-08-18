<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .customerLink{
            padding: 10px;
            border: 1px solid black;
            text-decoration: none;
            color: black;
            margin: 5px;
        }
        .customerLink:hover{
            background-color: lightgray;
        }
        table{
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Customer List</h1>
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
            function writeToTable(){
                return "<tr><td>".$this->pName."</td><td>".$this->price."</td><td>".$this->qty."</td><td>".$this->calTotal()."</td></tr>";
            }
        }
        if($_SERVER['REQUEST_METHOD']=="GET"){
            $customerDirectory = scandir('./files/customers');
            foreach($customerDirectory as $fileName){
                if($fileName=="." || $fileName==".."){
                    continue;
                }
                $cName = substr($fileName,0,strpos($fileName,"."));
                echo "<a href='".$_SERVER['PHP_SELF']."?cName=$cName' class='customerLink'>$cName</a>";
            }
        }
        if(isset($_GET['cName'])){
            $cName = $_GET['cName'];
            $addr = "./files/customers/$cName.txt";
            $fileHandler = fopen($addr,'r');
            $prodArray = [];
            $prodObj = [];
            while(!feof($fileHandler)){
                $content = explode(":",fgets($fileHandler));
                if($content[0] == "total" || $content[0] == ""){
                    if(count($prodArray) != 0){
                        $prodItem = new product($prodArray[0],$prodArray[1],$prodArray[2]);
                        array_push($prodObj,$prodItem);
                    }
                    $prodArray = [];
                }
                else{
                    array_push($prodArray,$content[1]);
                }
            }
            fclose($fileHandler);
            echo "<table><thead><tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Total</th></tr></thead>";
            echo "<tbody>";
            $sum = 0;
            foreach($prodObj as $array){
                echo $array->writeToTable();
                $sum += $array->calTotal();
            }
            echo "</tbody></table>";
            echo "<h2>The total price is: $sum";

        }
    ?>
</body>
</html>