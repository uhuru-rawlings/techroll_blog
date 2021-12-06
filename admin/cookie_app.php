<?php
  if(isset($_COOKIE['logedinuser'])){

  }else{
      header("location: login.php");
  }
?>