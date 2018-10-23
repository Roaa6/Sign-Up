<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","authentication");
if(isset($_POST['login_btn']))
{
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
   $password = md5($password);
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
    $result = mysqli_query($db, $sql);
    
    if (mysqli_num_rows($result) == 1){
        $_SESSION['message'] = "You are now Logged in";
        $_SESSION['username'] = $username;
        header("location:home.php"); 
    }else{
        $_SESSION['message']=" Username/password combination incorrect";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login page</title> 
    <link type="text/css" rel="stylesheet" href="bla.css">
    <style >
    input[type="text"], input[type="password"] {
	width:100%;
	margin-bottom:20px;
	border:none;
	border-bottom:1px solid #fff;
	background:transparent;
	outline: none;
	height: 40px;
	color: #fff;
	font-size:18px;
    position: center;
    </style>
</head>
<body>
<div class="header">
<img src="STP.jpg" class="STP">
 <h1 >Login</h1>
    
    <?php
    if(isset($_SESSION['message'])){
        echo "<div id='error_msg'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
    
    ?>

<form method="post"  action="login.php">
 
         
Username : <input type="text" name="username" class="textInput" autocomplete="off" id="username"> 
Password :<input type="password"  name="password" autocomplete="off" class="textInput" id="password"> 
    <input type="Submit" name="login_btn" value="login"> 
        
    </form>
    </div>

 </body>
</html>