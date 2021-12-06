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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
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
                <li><a href="view.php">View</a></li>
                <li><a href="post.php" class="active">Post</a></li>
                <li><a href="messages.php">Messages</a></li>
                <li><a href="logout.php">logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
          <form action="#" class="form" method="post" enctype="multipart/form-data">
          <label for="blogtitle">Blog_Title
              <br>
              <input type="text" name="blogtitle" id="blogtitle" class="form-control">
          </label>
           <label for="images">Images
               <br>
               <input type="file" name="images" id="imagesform" style="width:100%;" class="form-control">
           </label>
           <br><br>
          <textarea placeholder="Type your blog here" name="blogpost" id="blogpost"></textarea>
            <script>
            new FroalaEditor('textarea');
            </script>
            <br>
            <br>
            <input type="submit" value="Post" name="submitpost" class="btn btn-primary" onclick="return validatepost()" style="width: 150px;">
        </form>
    </div>
    <script>
        const validatepost = () =>{
            var blogpost = document.getElementById("blogpost").value.trim();
            var images = document.getElementById("imagesform").value.trim();
            var blogtitle = document.getElementById("blogtitle").value.trim();
            if(blogpost == "" || images == "" || blogtitle == ""){
                if(blogpost == ""){
                  alert("Please pick an image to upload");
                  return false;
                }else{
                    alert("Please add blog text to upload");
                    return false;
                }
                return false;
            }else{
                document.getElementById("outputs").innerHTML = blogpost;
                return false;
            }
        }
    </script>
    <?php
    require "../includes/Exception.php";
    require "../includes/PHPMailer.php";
    require "../includes/SMTP.php";
    // define name space
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
      include("connection.php");
      if(isset($_POST['submitpost'])){
          $blogpost = trim($_POST['blogpost']);
          $posttitle = trim($_POST['blogtitle']);
          $postid = uniqid(rand(0,1000000));
          $images = $_FILES['images'];
          $filename = $_FILES['images']['name'];
          $filetmpname = $_FILES['images']['tmp_name'];
          $filesize = $_FILES['images']['size'];
          $filetype = $_FILES['images']['type'];
          $fileerror = $_FILES['images']['error'];
          if($fileerror == 0){
             if($filesize < 250000000){
                $acceptedd = array("jpg","jpeg","png");
                $fileextension = explode(".",$filename);
                $actualextension = strtolower(end($fileextension));
                if(in_array($actualextension,$acceptedd)){
                  $filenewname = uniqid(rand(0,10000)).".".$actualextension;
                  $filelocation = "../uploads/".$filenewname;
                  $movefiles = move_uploaded_file($_FILES['images']['tmp_name'],$filelocation);
                  if($movefiles){
                         $sql = "INSERT INTO posts(post_id,post_title,blog_posts,image_name)
                             VALUES('$postid','$posttitle','$blogpost','$filenewname')";
                          $execute = mysqli_query($connection,$sql);
                          if($execute){
                            echo("<script>alert('Blog posted, looking forward to next post')</script>");
                            $sql = "SELECT * FROM email_signups";
                            $query = mysqli_query($connection,$sql);
                            if($rows = mysqli_num_rows($query) > 0){
                              while($result = mysqli_fetch_array($query)){
                                  $usermail = $result['user_email'];
                            //  Include required files
                            $mail = new PHPMailer();
                            $mail->isSMTP();
                            $mail->Host = "smtp.gmail.com";
                            $mail->SMTPAuth = "true";
                            $mail->SMTPSecure = "tls";
                            $mail->Port ="587";
                            $mail->Username = "uhururawlings38@gmail.com";
                            $mail->Password = "raw=lings36455589";
                            $mail->Subject = "Post Notification";
                            $mail->setFrom("uhururawlings38@gmail.com");
                            $mail->Body = "RTECHBLOG POST NOTIFICATION,We have posted a articles, please checkout.You are receiving this email because you signed up to RTECHBLOG post notification, New Post $posttitle Check it out.";
                            $mail->addAddress($usermail);
                            }
                        }
                            if($mail->Send()){
                                echo("Email sent...");
                            }else{
                                echo("Email not sent...");
                            }
                            // close connection
                            $mail->smtpClose();
                          }else{
                              echo("<script>alert('Error submiting your request')</script>");
                          }
                  }else{
                    echo("<script>alert('Error moving file, reload and try again')</script>"); 
                  }
                }else{
                    echo("<script>alert('file type not allowed, only jpg,png or jpeg accepted')</script>");
                }
             }else{
                echo("<script>alert('File size, too large, please pick another file')</script>");
             }
          }else{
            echo("<script>alert('Damaged file, please pick another file')</script>");
          }
            
      }

    ?>
</body>
</html>