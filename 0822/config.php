<?php
  function createCookie($cookieName, $cookieValue, $expDay = 1){
    setcookie($cookieName, $cookieValue, time()+(86400 * $expDay), '/');
  }
?>