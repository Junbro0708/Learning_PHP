<?php
  class user{
    private $userDetails;

    function __construct($userDetails){
      $this->userDetails = $userDetails;
    }
    function D_fullName(){
      return $this->userDetails['firstName']." ".$this->userDetails['lastName'];
    }
  }
?>