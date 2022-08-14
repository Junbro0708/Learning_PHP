<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    class student{
      // properties (we have to define access modifier)
      private $fname;
      private $lname;
      private $bdate;
      private $country;

      function __construct($fname, $lname, $bdate, $country)
      {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->bdate = $bdate;
        $this->country = $country;
      }

      function __destruct()
      {
        return "Bye";
      }

      // method (default access midifier is public)
      function displayDetails(){
        return "Student Name: $this->fname $this->lname, Birthdate: $this->bdate, From: $this->country";
      }
      function displayName(){
        return "Student Name: $this->fname $this->lname";
      }

      public function getFname()
      {
        return $this->fname;
      }
      public function setFname($fname)
      {
        $this->fname = $fname;
      }
    }

    $jun = new student("Jun", "Hyeong", "1997", "Korea");
    echo "<h1>".$jun -> displayDetails()."</h1>";
    echo "<h1>".$jun -> displayName()."</h1>";
  ?>
</body>
</html>