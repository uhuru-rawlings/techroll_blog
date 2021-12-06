<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" 
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/signup.css">
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
           include("admin/connection.php");
           $sql = "SELECT * FROM posts ORDER BY id DESC";
           $query = mysqli_query($connection, $sql);
           if($rows = mysqli_num_rows($query) > 0){
               echo("<div class='flexblogitems'>");
              while($results = mysqli_fetch_array($query)){
                  $images = "uploads/".$results['image_name'];
                  $posttext = $results['blog_posts'];
                  $postdates = $results['post_date'];
                  $blogtitle = $results['post_title'];
                  $postid = $results['post_id'];
                   echo("<a href='single_blog.php'>");
                   echo("<div class='blogitems' onclick='popuppost(this.id)' id='$postid' title='$blogtitle'>");
                   echo("<p>$postdates</p>");
                   echo("<h3>$blogtitle</h3>");
                   echo("<img src='$images' width='100%' height='350px' alt='$blogtitle'>");
                   echo("<p style='color:gray;'>$posttext</p>");
                   echo("</div>");
                   echo("</a>");
              }
              echo("</div>");
           }else{
               echo("<div class='card'>No data posted</div>");
           }
        ?>
    </div>
    <style>
        .flexblogitems a{
            color: gray;
            text-decoration: none;
        }
    </style>
    <script>
        const popuppost = (clicked_id) =>{
            var blogids = clicked_id;
            document.cookie = "clikedblog="+blogids;
            window.reload();
         }
    </script>
<section id="footer">
<div class="container" id="signupmails">
        <form action="#" method="post" class="form" id="form_data">
            <p class="text-secondary">Sign up to our Newslatter, you will be notified of our new updates</p>
           <label for="usermail">Email:
               <div class="blank">
                   <input type="email" name="usermail" id="usermail" class="form-control" placeholder="Enter email..." required>
                   <input type="submit" name="signups" value="SEND" class="btn btn-primary">
               </div>
           </label>
           <script>
               const closesignups = () =>{
                   document.getElementById("signupmails").style.display = "none";
               }
               const opnesignups = () =>{
                document.getElementById("signupmails").style.display = "block";
                setTimeout("opnesignups()", 60000);
             }
            window.onload = opnesignups;
           </script>
           <?php
           require "includes/Exception.php";
           require "includes/PHPMailer.php";
           require "includes/SMTP.php";
           // define name space
           use PHPMailer\PHPMailer\PHPMailer;
           use PHPMailer\PHPMailer\SMTP;
           use PHPMailer\PHPMailer\Exception;
             if(isset($_POST['signups'])){

                 include("admin/connection.php");
                 $usermail = mysqli_real_escape_string($connection, $_POST['usermail']);
                 $sql = "SELECT * FROM email_signups WHERE user_email = '".$useremail."'";
                 $query = mysqli_query($connection,$sql);
                 if($rows = mysqli_num_rows($query) > 0){
                    echo("<script>alert('Email already signed up, Thanks')</script>");
                 }else{
                     
                     $sql = "INSERT INTO email_signups(user_email)
                         VALUES('$usermail')";
                    $execute = mysqli_query($connection,$sql);
                    if($execute){
                        echo("<script>alert('Thanks for signing up.')</script>");
                        //  Include required files

                        // create instance of php mailer
                        $mail = new PHPMailer();
                        // set mail to use smtp
                        $mail->isSMTP();
                        // define smtp host

                        $mail->Host = "smtp.gmail.com";
                        // enable smtp authenticxation
                        $mail->SMTPAuth = "true";
                        // set type of encryption
                        $mail->SMTPSecure = "tls";
                        // port
                        $mail->Port ="587";
                        // set gmail username
                        $mail->Username = "techrollblogs@gmail.com";
                        // set gmail password
                        $mail->Password = "raw=lings36455589";
                        // set email subject
                        $mail->Subject = "Post Notification";
                        // sender
                        $mail->setFrom("techrollblogs@gmail.com");
                        // email body
                        $mail->Body = "Thanks for signing up. You are receiving this email because you signed up to Techroll post notification";
                        // add recipient
                        $mail->AddAddress($usermail);
                        // send
                        if($mail->Send()){
                            echo("Email sent...");
                        }else{
                            echo("Email not sent...");
                        }
                        // close connection
                        $mail->smtpClose();
                    }else{
                        echo("<script>alert('Problem signing up, reload and try again')</script>");
                    }
                 }
             }
           ?>

        </form>
    </div>
       <div class="links">
       <a href="https://web.facebook.com/uhuru.rawlings.7/"><img src="images/facebook.png" width="30px" height="30px" alt="" title="facebook"></a>
        <a href="https://www.instagram.com/uhururawlings/"><img src="images/instagram.png" width="30px" height="30px" title="Instagram"></a>
        <a href="https://www.linkedin.com/in/uhururawlings40/"><img src="images/linkedln.png" width="30px" height="30px" alt="" title="linkdln"></a>
        <a href="https://github.com/uhuru-rawlings"><img src="images/githubac.png" width="30px" height="30px" alt="" title="github"></a>
        <a href="mailto:uhururawlings40@gmail.com"><img src="images/email.png" width="30px" height="30px" title="email" ></a>
       </div>
    </section>
</body>
</html>