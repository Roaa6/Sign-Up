<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>  
    <link type="text/css" rel="stylesheet" href="bla.css">

</head>
<body>
<div class="header">
<img src="STP.jpg" class="STP">

    <?php
    if(isset($_SESSION['message'])){
        echo "<div id='error_msg'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
    
    ?>
    <h1>Home</h1>
    <div><h4> Welcome <?php echo $_SESSION['username'] ?></h4></div>
    <div><a href="logout.php">Logout</a></div>
     </div>

    </body>
</html>