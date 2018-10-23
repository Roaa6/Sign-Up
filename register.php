<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","authentication");
if(isset($_POST['register_btn']))
{
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $password2=mysqli_real_escape_string($db,$_POST['password2']);
     if($password==$password2)
     {           //Create User
            $password=md5($password); //hash password before storing for security purposes
            $sql="INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
            mysqli_query($db,$sql);
            $_SESSION['message']="You are now logged in";
            $_SESSION['username']=$username;
            header("location:home.php");  //redirect home page
    }
    else
    {
      $_SESSION['message']="The two password do not match";
     }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>  
    <link type="text/css" rel="stylesheet" href="bla.css">
</head>
<body>
<div class="header">
<img src="STP.jpg" class="STP">
 <h1 >Sign Up Form</h1>
<?php
    if(isset($_SESSION['message'])){
        echo "<div id='error_msg'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
    
    ?>
<form method="post"  action="register.php">
 
         
Username : <input type="text" name="username" class="textInput" autocomplete="off" id="username"> 
E-mail : <input type="email" name="email"  autocomplete="off" class="textInput" id="email"> 
Password :<input type="password"  name="password" autocomplete="off" class="textInput" id="password"> 
Re-password : <input type="password" name="password2"  autocomplete="off" class="textInput" id="password2"> 

    Already Member ? <a href="login.php"> Login</a>
    <input type="Submit" name="register_btn" value="register"> 
        
    </form>
    </div>

 </body>
</html>