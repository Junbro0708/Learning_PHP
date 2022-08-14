<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="text" name="fname" placeholder="FirstName">
    <input type="text" name="lname" placeholder="LastName">
    <select name="country">
      <option value="">Select a country</option>
      <option>Canada</option>
      <option>USA</option>
      <option>UK</option>
      <option>Japan</option>
      <option>Korea</option>
      <option>India</option>
      <option>Australia</option>
    </select>
    <button type="submit">Submit</button>
  </form>

  <table>
    <tbody>
      <?php
        switch($_SERVER['REQUEST_METHOD']){
          case "POST":
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $country = $_POST['country'];
        if($fname == "" || $lname == "" || $country == ""){
          echo "<h2 style='color: red;'>All fields should be filled</h2>";
        }else{
      ?>
      <thead>
        <tr>
          <th>FirstName</th>
          <th>LastName</th>
          <th>Country</th>
        </tr>
      </thead>
      <?php
          echo "<tr>";
          echo "<td>$fname</td><td>$lname</td><td>$country</td>";
          echo "</tr>";
        }
        break;
        case "GET":
          echo "<h1>Welcome to My page</h1>";
        break;
        }
      ?>
    </tbody>
  </table>
</body>
</html>