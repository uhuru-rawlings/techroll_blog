<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/login.css">
    <title>Rtechblog || Portfolio | programing Solution | motivation | common computer trics</title>
</head>
<body>
    <div class="container" id="logins">
        <form action="#" class="forms" method="post">
            <label for="username">userName:
                <br>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" autocomplete="off">
            </label>
            <br>
            <label for="passwords">password:
                <br>
                <input type="password" name="passwords" id="passwords" placeholder="Enter Password"autocomplete="off" class="form-control">
            </label>
            <br>
            <label for="passwords">confirmPassword:
                <br>
                <input type="password" name="cpasswords" id="cpasswords" placeholder="Confirm Password"autocomplete="off" class="form-control">
            </label>
            <br>
            <br>
            <input type="submit" onclick="return getvalidation()" value="Sign Up" name="signups" class="btn btn-primary" style="width: 150px;">
        </form>
        <?php
          include("connection.php");
          if(isset($_POST['signups'])){
             $username = mysqli_real_escape_string($connection, $_POST['username']);
             $passwords = trim($_POST['passwords']);
             $passwordshash = password_hash($passwords, PASSWORD_DEFAULT);
             $sql = "SELECT * FROM user_registration WHERE user_names = '".$username."'";
             $query = mysqli_query($connection, $sql);
             if($rows = mysqli_num_rows($query) < 1){
                 $user_id = uniqid(rand(0,100000));
                 $sql = "INSERT INTO user_registration(user_ids,user_names,passwords)
                      VALUES('$user_id','$username','$passwordshash')";
                 $execute = mysqli_query($connection, $sql);
                 if($execute){
                   header("location: login.php");
                 }else{
                    echo("<script>alert('Error submiting your request, please reload and try again')</script>");
                 }
             }else{
                 echo("<script>alert('User with this username already exist')</script>");
             }
          }
        ?>
    </div>
    <script>

      const getvalidation = () =>{
          var username = document.getElementById("username").value.trim();
          var passwords = document.getElementById("passwords").value.trim();
          var cpasswords = document.getElementById("cpasswords").value.trim();
        //   var autologin = document.getElementById("autologin").value.trim();
        if(username == "" || passwords == "" || cpasswords == ""){
            alert("Please fill all the fields");
            return false;
        }else{
            if(passwords === cpasswords){

            }else{
                alert("Password dont match");
                return false;
            }
        }
         
      }
    </script>
</body>
</html>