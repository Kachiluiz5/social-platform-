<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      .error{
        color: red;
      }
    </style>
    <title>sign up</title>
</head>
<body style="background-color:#DAE0E6;">
<!-- --------php coding start----------- -->
<?php

   $ds="0";
   $sms ="";
    include("database/connect.php");
    $sms="";
    $nameerr = "";
    $usernameerr ="";
     $emailerr ="";
      $languageerr ="";
       $passworderr ="";
  //  $nameerr = $usernameerr = $emailerr = $languageerr = $passworderr ="";
  // if statement one
     
    if(isset($_POST['submit'])){

      $name = validate_text($_POST['name']);
      $username = validate_text($_POST['username']);
      $email = validate_text($_POST['email']);
      $language = validate_text($_POST['language']);
      $password = validate_text($_POST['password']);

   
      
      if(empty($name)){
       $nameerr = "enter name";
      }else if(empty($username)){
       $usernameerr = "enter username";
      }else if(empty( $email)){
       $emailerr = "enter email";
      }else if(empty($password)){
       $passworderr = "enter password";
      }else{
        $sql = "INSERT INTO `blog_register` (`name`,`username`,`email`,`language`,`password`) VALUE (?,?,?,?,?)";
    $data = $con->prepare($sql);
    $data->bind_param("sssss",$name, $username,$email,$language,$password);
    $redirect = $data->execute(); 

    if($redirect == 1){
      header("location:login.php");
    }else{
      $sms = "sorry no entry";
    }
      }
    }


    function validate_text($text){
      $data = htmlspecialchars(strip_tags(stripslashes($text)));
     
      return $data;
     }
    
    ?>

<!-- --------php end--------------- -->
    <div class="full-container">
      <div class="signup-form">
        <!-- form -->

        <div class="logo" style="text-align: center; font-size: 40px; padding-top: 40px;" >DEV<span>MEET</span></div>
        <center>
        <div class="form-content">

          <form method="post" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']) ?>">

            <h2 style="text-align: center; padding-bottom: 20px;">Sign up</h2>
            <p style="text-align: center; padding-bottom:20px;">by continuing you setting up a devmeet account and agree  to our <a href="rules/termsandcondutions.php" target="_blank">User Agreement</a> and
            <a href="rules/privacypolicy.php" target="_blank">Privacy Policy</a></p>

        <label for="name">Name</label><br>
        <input type="text" name="name" id="name"><br><br>
          <span class="error"><p><?php echo $nameerr ?></p></span>

        <label for="name">Username</label><br>
        <input type="text" name="username" id="username"><br><br>
        <span class="error"><p><?php echo $usernameerr ?></p></span>

        <label for="name">Email</label><br>
        <input type="email" name="email" id="email"><br><br>
        <span class="error"><p><?php echo $emailerr ?></p></span>

        <!---- select downdrop -->
        <label for="name">Language</label><br>
        <select name="language" id="language">
             <option value="course">---Select Your Language---</option>
             <option value="HTML">HTML</option>
             <option value="PHP">PHP</option>
             <option value="CSS">CSS</option>
             <option value="JAVASCRIPT">JAVASCRIPT</option>
             <option value="PYTHON">PYTHON</option>
             <option value="JAVA">JAVA</option>
             <option value="NODJS">NODEJS</option>
             <option value="C++">C++</option>
             <option value="C#">C#</option>
             <option value="C">C</option>
             <option value="GIT">GIT</option>
        </select><br><br>

        <label for="name">Password</label><br>
        <input type="password" name="password" id="password"><br><br>
        <span class="error"><p><?php echo $passworderr ?></p></span>

        <button type="submit" name="submit" id="submit" >Sign up</a></button>
        <p  style="text-align: center; margin-bottom: 28px;">Already have an account? <a href="login.php">Login</a></p>

      </div>
       </form>
      </div>
    </center>
    </div>
</body>
</html>