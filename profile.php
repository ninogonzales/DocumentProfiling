<!-- Main Page -->
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <style>

        html { 
        background: url('background.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        }


        </style>
    </head>
<?php
session_start();
$mysqli = mysqli_connect("localhost", "cosc419admin", "password", "documentrecommendation");
$email = $_POST["email"];
$password = $_POST["password"];
$_SESSION['id'] = "";
?>
    <body style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; text-align:center;color:white;" background="background.jpg">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
        
<?php
  if (isset($_POST['submit'])) {
     $sql = "SELECT id, fname, lname, email FROM account WHERE email = '".$email."' AND password = '".$password."'";
     $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
     if ($result) {        
         while ($newArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {    
             $fname  = $newArray['fname'];    
             $lname = $newArray['lname'];    
             $_SESSION['id'] = $newArray['id'];
  } } }
?>
    <div class="welcomemsg">
    <h2>Welcome <?php echo $fname; ?></h2>
    </div>
    
    <div class="tabs">
    <h4>
        | <a href="browse.php">Browse</a> | 
        <a href="recommended.php">Recommended</a> |
         <a href="history.php">History</a> |
         <a href="signout.php">Sign Out</a> |
    </h4>
    </div>
<?php 
mysqli_close($mysqli); ?>
        </div>
        <div class="col-sm-2">
        </div>
    </body>
</html>