<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!--PAGE TITLE-->
        <title>login</title>
        <link rel="icon" href="images\logo small new.png" type="image/icon type">
        <!--MAIN STYLE SHEET-->
        <link href="login.css" rel="stylesheet" type="text/css"> 
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

      
      </head>

    <body>

        <?php
  require ("registerdb.php");
//   session_start();
  $success=null; 
  $login_error=null;
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: landingpage.html");
    exit;
  }
  $email=(isset($_POST['email']) ? $_POST['email'] : null );
  $password=(isset($_POST['password']) ? $_POST['password'] : null );
  if(isset($_POST['submit'])){
    if(!empty($email && $password)){
        $password=md5($password); 
        $query = mysqli_query($con, "SELECT * FROM signup WHERE email='$email' and pass='$password' "); 
        $rows = mysqli_num_rows($query);
        if($rows){
          session_start();
        //   $name=$rows['name'];
        //   $_SESSION['user'] = $name;
          $_SESSION["loggedin"] = true;
        //   $_SESSION["id"] = $id;
          $_SESSION["email"] = $email; 
          echo"logged in successfully";
          header("Location: homapge.html"); // Redirecting to other page
        }
        else 
        {
          $_SESSION["loggedin"] = false;
          $login_error = "Your Login Name or Password is invalid"; 
        }
        mysqli_close($con); // Closing connection
      }
      
    }                  // mysqli_close($conn);    
?>


        <div class="container-fluid">
            <nav class="navbar ">
                <a class="navbar-brand" href="#">
                  <img src="images\logo small new.png" width="50" height="50" alt="icon" >
                </a>
            </nav>

            <div class="col-md-6 col-sm-offset-2" id="text-container">
   
                <h2 class="h2">BINGO </h2>
              
              
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
              
            </div>
            <div class="col-sm-3 col-sm-offset-3" id="login-container">
            
                <form action="login.php" method="POST">
                    <img class="avatar" src="images/undraw_profile_pic_ic5t.png" alt="profile pic">
                    <h2>Welcome!</h2>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <!-- <h5>Username</h5> -->
                            <input class="input" type="text" placeholder="email" name = "email" >
                        </div>
                    </div>
                    <div class="input-div two">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div>
                            <!-- <h5>Password</h5> -->
                            <input class="input" type="password" placeholder="Password" name ="password">
                        </div>
                    </div>

                    <a href="homapge.html">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" id="button" name="submit" >LOGIN</button>
                    </a>
                    <div>
                    <a href="#">Forgot password?</a>
                    <a href="seller login.html">Login as a seller?</a>
                    <a href="signup.html">New user? Register here!</a>
                    </div>
                </form>
            </div>
          
        </div>

            

        </div>
    </body>
</html>