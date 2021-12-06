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
    <script src="js/validation.js"></script>
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
                <li><a href="index.php">Home</a></li>
                <li><a href="contact.php" class="active">Contact</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
            </ul>
        </div>
    </nav>
     <div class="container" id="contact-card">
         <div class="card contact" id="sub-contact-cars">
             <h3 class="text-center" style="padding-top:20px;">Contact us</h3>
         <section id="footer" class="social-icons">
                <a href="https://web.facebook.com/uhuru.rawlings.7/"><img src="images/facebook.png" width="30px" height="30px" alt="" title="facebook"></a>
                <a href="https://www.instagram.com/uhururawlings/"><img src="images/instagram.png" width="30px" height="30px" title="Instagram"></a>
                <a href="https://www.linkedin.com/in/uhururawlings40/"><img src="images/linkedln.png" width="30px" height="30px" alt="" title="linkdln"></a>
                <a href="https://github.com/uhuru-rawlings"><img src="images/githubac.png" width="30px" height="30px" alt="" title="github"></a>
                <a href="mailto:uhururawlings40@gmail.com"><img src="images/email.png" width="30px" height="30px" title="email" ></a>
         </section>
             <form action="#" method="post" class="form" id="contactform">
                <div class="form-group">
                    <label for="usercontact">Contact address</label>
                    <input type="tel" autocomplete ="off" class="form-control" name="usercontact" id="usercontact" aria-describedby="emailHelp" placeholder="Enter contact">
                </div>
                <br>
                <div class="form-group">
                    <label for="useremail">Email address</label>
                    <input type="email" autocomplete ="off" class="form-control" name="useremail" id="useremail" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                
             <br>
            <div class="form-group">
                <label for="messages">Messages</label>
                 <textarea class="form-control" id="messages" name="messages" placeholder="Type your message here" rows="3"></textarea>
            </div>
             <br>
             <br>
             
             <input type="submit" value="Message" onclick="return validateform()" name="messagesubmit" class="btn btn-primary">
         </form>
         <script>
             const validateform = () =>{
                var contacts = document.getElementById("usercontact").value.trim();
                var useremail = document.getElementById("useremail").value.trim();
                var messages = document.getElementById("messages").value.trim();
                if(contacts == ""){
                     alert("please fill contact field");
                    return false;
                }else if(useremail == ""){
                    alert("please enter your email adress");
                    return false;
                }else if(messages == ""){
                    alert("please enter message item");
                    return false;
                }else{
                    return true;  
                }
            }
         </script>
         </div>
         <?php
           if(isset($_POST["messagesubmit"])){
               include("admin/connection.php");
               $contact = mysqli_real_escape_string($connection, $_POST["usercontact"]);
               $useremail = mysqli_real_escape_string($connection, $_POST["useremail"]);
               $messages = trim($_POST["messages"]);
               $messageid = "Mgs_".rand(0,100000);
               $sql = "INSERT INTO contacts(message_id,user_contact,user_email,message_content)
                     VALUES('$messageid','$contact','$useremail','$messages')";
               $execute = mysqli_query($connection,$sql);
               if($execute){
                echo('<script>alert("Thank you for contacting us, your reply will be sent to your email")</script>');
               }else{
                echo('<script>alert("Error submiting your request, reload and try again")</script>');
               }
           }
         ?>
     </div>
</body>
</html>