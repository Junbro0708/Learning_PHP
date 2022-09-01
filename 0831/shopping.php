<?php
  include './config.php';
  $dbCon = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
  if($dbCon->connect_error){
    die("Connect Error");
  }else{
    $select = "SELECT * FROM product_tb LIMIT 20";
    $productArray = [];
    $result = $dbCon->query($select);
    while($row = $result->fetch_assoc()){
      array_push($productArray, $row);
    }
    $dbCon->close();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>WELCOME</h1>
  <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
    <table>
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Product Price</th>
          <th>Select to buy</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($productArray as $product){
            echo "<tr>";
            echo "<td>".$product['productName']."</td><td>".$product['productPrice']."</td>";
            echo "<td><input type='checkbox' name='pid[]' value='".$product['productName']."'/></td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
    <!-- Email1:<input name="email[]" type="checkbox" value="1">
    Email2:<input name="email[]" type="checkbox" value="2">
    Email3:<input name="email[]" type="checkbox" value="3"> -->
    <button>Submit</button>
  </form>
  <?php
    // if($_SERVER['REQUEST_METHOD'] == "POST"){
    //   $email = $_POST['email'];
    //   print_r($email);
    // }
    echo time()+$_SESSION['user']['customer_id'];
  ?>
</body>
</html>