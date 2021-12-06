<?php
  $connection = mysqli_connect("127.0.0.1","root","","Rtech");
  if($connection){

  }else{
      echo('<script>toastr.warning("cannot connect to the server")</script>');
  }
?>