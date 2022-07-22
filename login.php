<!-- start session -->
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
    <title>Login</title>
</head>
<body style="background-color:#DAE0E6;">

<!-- php for login  -->

<?php
  $errornotice ="";

//    include("database/connect.php");

// if(isset($_POST['login'])){

//   $username = $_POST ['username'];
//   $email = $_POST ['email'];
//   $password = $_POST ['password'];

//   $insert = "";

//   $sql ="SELECT id, username, email, password FROM blog_register WHERE  username=?, email =? AND password=?";

//   $data = $con->prepare($sql);
//   $data ->bind_param("sss",$username,$email,$password);
//   $data ->execute();
//   $data ->bind_result($id,$username,$email,$password);

//   while ($data -> fetch()):
//     $insert="correct";
//     header("location:index.php");
//   endwhile;

//   if($insert !== "correct"){
//     echo "invalid email or password entered";
//   }
// }

// if(isset($_POST['login'])){

//     $username = $_POST ['username'];
//     $email = $_POST ['email'];
//     $password = $_POST ['password'];

// include("database/connect.php");

// $sql = "SELECT  username, email, password FROM `blog_register` WHERE username=?, email=? AND password =?";
// $data->bind_param('sss',$username,$email,$password);
// $data = $con->prepare($sql);

// $data->execute();
// $data->bind_result($username,$email,$password);

// }


include("database/connect.php");

if(isset($_POST ['login'])){
  $email = $_POST ['email'];
  $password = $_POST ['password'];

  $check = "";

 $sql = "SELECT id, Email, password from user_register where email =? AND password =?";

//The $_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing script
 
 $data = $con->prepare($sql);
 $data ->bind_param("ss",$email,$password);

 $data -> execute();
 $data -> bind_result($id,$dbemail, $dbpassword);

 while ($data-> fetch()):
  $check = "correct";
  header("location:index.php");
 endwhile;

 if ($check !="correct"){
     echo "invalid email or password has been entered";
 }
}
?>


?>


    <div class="full-container">
      <div class="signup-form">
        <!-- form -->

        <div class="logo" style="text-align: center; font-size: 40px; padding-top: 40px;" >DEV<span>MEET</span></div>
        <center>
        <div class="form-content">
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <h2 style="text-align: center; padding-bottom: 20px;">Log in</h2>
            <p style="text-align: center; padding-bottom:20px;">by continuing, you agree  to our <a href="#">User Agreement</a> and <a href="#">Privacy Policy</a></p>

        <label for="name">Username</label><br>
        <input type="text" name="username" id="username"><br><br>

        <label for="name">Email</label><br>
        <input type="email" name="email" id="email"><br><br>
    

        <label for="name">Password</label><br>
        <input type="password" name="password" id="password"><br><br>
        <button type="submit" name="login" id="submit" >Log in</button>
        <p  style="text-align: center; margin-bottom: 28px;">Already have an account? <a href="signup.php">Signup</a></p>
      </div>
       </form>
      </div>
    </center>
    </div>
</body>
</html>