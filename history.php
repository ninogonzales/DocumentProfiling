<?php
session_start();
$mysqli = mysqli_connect("localhost", "cosc419admin", "password", "documentrecommendation");
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>History</title>
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
    <body style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; text-align:center; color:white;" background="background.jpg"> 
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
        
        <h2 style="text-align:center;">Browsing History</h2>
        <div class="tabs">
        <h4>
        | <a href="browse.php">Browse</a> | 
        <a href="recommended.php">Recommended</a> |
         <a href="history.php">History</a> |
         <a href="signout.php">Sign Out</a> |
        </h4>
            <br />
        <div style="text-align:left;">
        <?php
        $userID = $_SESSION['id'];
        //Display user's history
        $sql = "SELECT name FROM document, history WHERE history.document=document.id AND history.account=".$userID;
        $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
        $x = 1;
        if($result){
            while($newArray = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $docname = $newArray['name'];
                echo "<p>".$x.". ".$docname."</p>";
                $x++;
            }
        }
        ?>           
        </div>
            </div>
        <div class="col-sm-3">
        </div>
    </body>

</html>