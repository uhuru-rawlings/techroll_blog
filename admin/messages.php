<?php
  include("cookie_app.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" 
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
     <link rel="stylesheet" href="../css/admin.css">
     <script src="../js/index.js"></script>
    <title>Rtechblog || Portfolio | programing Solution | motivation | common computer trics</title>
</head>
<body>
    <nav>
    <div class="logo"><a href="index.php">RTECHBLOG</a></div>
         <div class="responsiv">
                 <div class="close"><i class="fas fa-times-circle" id="closebtn" onclick="closemenu()"></i></div>
                 <div class="menu"><i class="fal fa-bars" id="menubtn" onclick="openmenu()"></i></div>
             </div>
         <div class="navlist" id="listitems">
            <ul id="navlists">
                <li><a href="index.php">Home</a></li>
                <li><a href="view.php" >View</a></li>
                <li><a href="post.php">Post</a></li>
                <li><a href="messages.php" class="active">Messages</a></li>
                <li><a href="logout.php">logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container" id="all_messages_here">
        <?php
          include("connection.php");
          $sql ="SELECT * FROM contacts ORDER BY id DESC";
          $execute = mysqli_query($connection, $sql);
          if($rows = mysqli_num_rows($execute) > 0){
              while($results = mysqli_fetch_array($execute)){
                  $messages_id = $results['message_id'];
                  $user_contact = $results['user_contact'];
                  $user_email = $results['user_email'];
                  $message_content = $results['message_content'];
                  echo("<div class='messages_here'>");
                  echo("<p>FROM: $user_email</p>");
                  echo("<p>$message_content. <br> <a href='mailto:$user_email'>Reply By Email</a></p>");
                  echo("</div>");
              }
          }else{
              echo("<div class='text-danger' id='No_messages'>No messages to display</div>");
          }
        ?>
    </div>
</body>
</html>