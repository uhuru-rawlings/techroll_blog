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
    <link rel="stylesheet" href="css/signup.css">
    <script src="js/index.js"></script>
    <title>Rtechblog || Portfolio | programing Solution | motivation | common computer trics</title>
</head>
<body>
    <div class="container" id="signupmails">
        <form action="#" method="post" class="form" id="form_data">
            <p class="text-secondary">Sign up to our Newslatter, you will be notified of our new updates</p>
           <label for="usermail">Email:
               <div class="blank">
                   <input type="email" name="usermail" id="usermail" class="form-control" placeholder="Enter email..." required>
                   <input type="submit" name="signups" value="SEND" class="btn btn-primary">
               </div>
           </label>
           <?php
             if(isset($_POST['signups'])){
                 include("admin/connection.php");
                 $usermail = mysqli_real_escape_string($connection, $_POST['usermail']);
                 $sql = "SELECT * FROM email_signups WHERE user_email = '".$useremail."'";
                 $query = mysqli_query($connection,$sql);
                 if($rows = mysqli_num_rows($query) < 1){
                    $sql = "INSERT INTO email_signups(user_email)
                         VALUES('$usermail')";
                    $execute = mysqli_query($connection,$sql);
                    if($execute){
                        echo("<script>alert('Thanks for signing up.')</script>");
                    }else{
                        echo("<script>alert('Problem signing up, reload and try again')</script>");
                    }
                 }else{
                     echo("<script>alert('Email already signed up, Thanks')</script>");
                 }
             }
           ?>

        </form>
    </div>
</body>
</html>