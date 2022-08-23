<?php
  function makeSelect($files, $depart){
    $departs = [];
    foreach($files as $value){
      array_push($departs, $value->Department);
    }

    $departs = array_unique($departs);

    echo "<select name='depart'>";
    if($depart == ""){
      echo "<option value='' selected>Department</option>";
    }
    foreach($departs as $value){
      if($value != $depart){
        echo "<option value='$value'>$value</option>";
      }else{
        echo "<option value='$value' selected>$value</option>";
      }
    }
    echo "</select>";
  }
?>