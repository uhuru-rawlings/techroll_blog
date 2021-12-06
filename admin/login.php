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
            <input type="checkbox" name="autologin" id="autologin"> Remember Me?
            <br>
            <br>
            <input type="submit" onclick="return getvalidation()" value="Login" name="login" class="btn btn-primary" style="width: 150px;">
        </form>
        <?php
          include("connection.php");
          if(isset($_POST['login'])){
             $username = mysqli_real_escape_string($connection, $_POST['username']);
             $passwords = trim($_POST['passwords']);
             $sql = "SELECT * FROM user_registration WHERE user_names = '".$username."'";
             $query = mysqli_query($connection, $sql);
             if($rows = mysqli_num_rows($query) > 0){
                 while($results = mysqli_fetch_array($query)){
                     $userpasswords = $results['passwords'];
                     $passwordver = password_verify($passwords, $userpasswords);
                     if($passwordver){
                         header("location: index.php");
                         setcookie("logedinuser",$_POST['username'],time() + 3600);
                     }else{
                        echo("<script>alert('User with this username dont exist')</script>");
                     }
                 }
             }else{
                 echo("<script>alert('User with this username dont exist')</script>");
             }
          }
        ?>
    </div>
    <script>
        var usernames = localStorage.getItem("username"); 
        var passwords = localStorage.getItem("password"); 
        document.getElementById("username").value = usernames;
        document.getElementById("passwords").value = passwords;
      const getvalidation = () =>{
          var username = document.getElementById("username").value.trim();
          var passwords = document.getElementById("passwords").value.trim();
        //   var autologin = document.getElementById("autologin").value.trim();
        if(username == "" || passwords == ""){
            alert("Please fill all the fields");
            return false;
        }else{
            if(autologin.checked == 1){
             localStorage.setItem("username",username); 
             localStorage.setItem("password",passwords); 
          }else{
              
          }
        }
         
      }
    </script>
</body>
</html>