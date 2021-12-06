
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" 
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
     <link rel="stylesheet" href="css/admin.css">
     <link rel="stylesheet" href="css/index.css">
     <script src="js/index.js"></script>
    <title>Techroll || Portfolio | programing Solution | motivation | common computer trics</title>
</head>
<body>
   <nav>
    <div class="logo"><a href="index.php">Techroll</a></div>
         <div class="responsiv">
                 <div class="close"><i class="fas fa-times-circle" id="closebtn" onclick="closemenu()"></i></div>
                 <div class="menu"><i class="fal fa-bars" id="menubtn" onclick="openmenu()"></i></div>
             </div>
         <div class="navlist" id="listitems">
            <ul id="navlists">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
            </ul>
        </div>
    </nav>
    <div class="container" id="blogs">
        <?php
           if(isset($_COOKIE['clikedblog'])){
               $targetblog = $_COOKIE['clikedblog'];
           include("admin/connection.php");
           $sql = "SELECT * FROM posts WHERE post_id='".$targetblog."'";
           $query = mysqli_query($connection, $sql);
           if($rows = mysqli_num_rows($query) > 0){
               echo("<div class='flexblogitems'>");
              while($results = mysqli_fetch_array($query)){
                  $images = "uploads/".$results['image_name'];
                  $posttext = $results['blog_posts'];
                  $postdates = $results['post_date'];
                  $blogtitle = $results['post_title'];
                  $postid = $results['post_id'];
                  echo("<div class='blogitems' onclick='popuppost(this.id)' id='$postid' title='$blogtitle'>");
                  echo("<p>$postdates</p>");
                  echo("<h3>$blogtitle</h3>");
                   echo("<img src='$images' width='100%' height='400px' alt='$blogtitle'>");
                   echo($posttext);
                  echo("</div>");
              }
              echo("</div>");
           }else{
               echo("<div class='card'>No data posted</div>");
           }
        }
        ?>
        <style>
           .blogitems{
            width: 100%;
            height: fit-content;
            overflow: hidden;
            padding: 10px;
            cursor: pointer;
            background-color: rgb(236, 245, 236);
            position: relative;
           }
        </style>
    </div>
    <script>
        const popuppost = (clicked_id) =>{
            var blogids = clicked_id;
            document.cookie = "clikedblog="+blogids;
            window.reload();
         }
    </script>
</body>
</html>