<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!--PAGE TITLE-->
        <title>Signup</title>
        <link rel="icon" href="images\logo small new.png" type="image/icon type">
        <!--MAIN STYLE SHEET-->
        <link href="signup.css" rel="stylesheet" type="text/css"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">  
        <!-- <base href="/"> -->
        <!--meta keywords and description-->
         <meta name="keywords" content="">
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      
      </head>

    <body>
       
        <?php 

         include 'registerdb.php';


            if(isset($_POST['submit'])){
                $username = mysqli_real_escape_string($con, $_POST['username']);
                $pass = mysqli_real_escape_string($con, $_POST['pass']);
                $confirm_pass = mysqli_real_escape_string($con, $_POST['confirm_pass']);
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);


                // $password = password_hash($pass, PASSWORD_BCRYPT);
                // $cpassword = password_hash($confirm_pass, PASSWORD_BCRYPT);

                
                    if($pass === $confirm_pass){
                        $pass = md5($pass);
                        
                        $insertquery = "insert into signup(username, pass, email, contact) values('$username','$pass','$email','$contact_no')";

                        $iquery = mysqli_query($con, $insertquery);

                        if($iquery){
                            echo" <script type='text/javascript'>
                            alert('succesfully inserted');
                            window.location = 'login.php';
                        </script> "  ;
                                
                                
                           
                            
                        }else{
                            echo "Error: " . $insertquery . ":-" . mysqli_error($con);
                        }

                    } else{
                        ?>
                                <script>
                                    alert("password not matching");
                                </script>
                            <?php
                    }

                
            }        


        ?>

        <div class="contanier-fluid">
            <nav class="navbar">
                <a class="navbar-brand" href="#">
                  <img src="images\logo small new.png" width="50" height="50" alt="icon" >
                </a>
            </nav>

            <div class="col-md-6 col-sm-offset-2" id="text-container">
   
                <h2 class="h2">BINGO </h2>
              
              
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
              
            </div>
       
            <div class="col-sm-3 col-sm-offset-3" id="signup-content">
                <form action="signup.php" method="POST"  style="margin-right: auto;" name="signupform" >
                    <h2>Register</h2>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <!-- <h5>Username</h5> -->
                            <input class="input" type="text" placeholder="Username" name="username" id="username" required >
                        </div>
                    </div>
                    <div class="input-div two">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div>
                            <!-- <h5>Password</h5> -->
                            <input class="input" type="password" placeholder="Password" name="pass" id="pass" required>
                        </div>
                    </div>
                    <div class="input-div five">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div>
                            <!-- <h5>Password</h5> -->
                            <input class="input" type="password" placeholder="Confirm Password" name="confirm_pass" id="confirm_pass" required>
                        </div>
                    </div>
                     <div class="input-div three">
                        <div class="i">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                             <!-- <h5>email</h5>  -->
                            <input class="input" type="text" placeholder="Email" name="email" id="email" required>
                        </div>
                    </div>
                    <div class="input-div four">
                        <div class="i">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div>
                             <!-- <h5>phone no</h5>  -->
                            <input class="input" type="text" placeholder="Contact no." name="contact_no" id="contact_no" required>
                        </div>
                    </div> 
                    <a href="login.html">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" value="register" id="register" name="submit" >REGISTER</button>
                    </a>
                </form>
                
            </div>
        

        </div>

        <!-- <script type="text/javascript" >
                function validate(){
                    var username=document.signupform.username.value;  
                    var password=document.signupform.pass.value;  
                    var confirmpass = document.signupform.confirmpass.value;
                    var email = document.email.value;
                    var atposition= email.indexOf("@");  
                    var dotposition= email.lastIndexOf(".");  
                    var contact = document.signupform.contact.value;

                    if (username==null || username==""){  
                        alert("Name can't be blank");  
                        return false;  
                    }
                    else if (password.length<6){
                        if(password==confirmpass){
                            return true;
                        }
                            
                        else{
                            alert("password not same");
                            return false;
                        }

                    }
                    else if (isNaN(contact)){
                        document.getElementById("number").innerHTML="Enter Numeric value only";
                        return false;
                            }
                    
                    else{

                        if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length){  
                            alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);  
                            return false;  
                            }  
                    }
                }

                alert("Sucessful registration");


        </script> -->
        <script src="form-validate.js"></script>
    </body>
</html>