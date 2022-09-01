<?php
  if(isset($_SESSION['loggedUser'])){
    header("Location: ".parse_url($_SERVER['REQUEST_URI'], PHP_URL_HOST)."/home");
  }
?>

<form method="POST" action="<?php echo $reqURL?>">
  <div class="form-floating mb-3">
    <input type="email" class="form-control" name="username" id="username" placeholder="test">
    <label for="username" class="form-label">Email</label>
  </div>
  <div class="form-floating mb-3">
    <input type="password" class="form-control" name="pass" id="pass" placeholder="pass">
    <label for="pass">Write your password</label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
<?php
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
    $pass = $_POST['pass'];

    if(!filter_var($username, FILTER_VALIDATE_EMAIL) === false){
      $user = find_username('user_tb', 'email', $username);
      if($user !== false){
        echo $user['pass'];
        if(password_verify($pass, $user['pass'])){
          $userObj = new user($user);
          $_SESSION['loggedUser'] = serialize($userObj);
          $_SESSION['timeout'] = time() + 40;
        }else{
          echo "<h1>Wrong username / password</h1>";
        }
      }else{
        echo "<h1>Wrong username / password</h1>";
      }
    }else{
      echo "<h1>Not Valid</h1>";
    }
  }
?>