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
                <li><a href="view.php" class="active">View</a></li>
                <li><a href="post.php">Post</a></li>
                <li><a href="messages.php">Messages</a></li>
                <li><a href="logout.php">logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container container-fluid" id="blogs">
         <table class="table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>PostId</th>
                     <th>PostTitle</th>
                     <th>PostDate</th>
                 </tr>
             </thead>
             <tbody>
             <?php
                    include("connection.php");
                    $sql = "SELECT * FROM posts ORDER BY id DESC";
                    $query = mysqli_query($connection, $sql);
                    if($rows = mysqli_num_rows($query) > 0){
                        echo("<div class='flexblogitems'>");
                        while($results = mysqli_fetch_array($query)){
                            $id = $results['id'];
                            $posttext = $results['blog_posts'];
                            $postdates = $results['post_date'];
                            $blogtitle = $results['post_title'];
                            $postid = $results['post_id'];
                            echo("<tr>");
                            echo("<td>$id</td>");
                            echo("<td>$postid</td>");
                            echo("<td>$blogtitle</td>");
                            echo("<td>$postdates</td>");
                            echo("</tr>");
                        }
                        echo("</div>");
                    }else{
                        echo("<div class='card'>No data posted</div>");
                    }
                    ?>
             </tbody>
         </table>
    </div>
</body>
</html>