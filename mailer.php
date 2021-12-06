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
    <script src="js/index.js"></script>
    <title>Rtechblog || Portfolio | programing Solution | motivation | common computer trics</title>
</head>
<body>
    <!-- php code -->
    <?php

//  Include required files
require "includes/Exception.php";
require "includes/PHPMailer.php";
require "includes/SMTP.php";
// define name space
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// create instance of php mailer
$mail = new PHPMailer();
// set mail to use smtp
$mail->IsSMTP();
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
$mail->Body = "You are receiving this email because you signed up to RTECHBLOG post notification";
// add recipient
$mail->addAddress("rawlings.huru@student.moringaschool.com");
// send
if($mail->Send()){
    echo("Email sent...");
}else{
    echo("Email not sent...");
}
// close connection
$mail->smtpClose();
?>
</body>
</html>