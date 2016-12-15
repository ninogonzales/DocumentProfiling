<!DOCTYPE html>
<html>
<?php
session_start();
$mysqli = mysqli_connect("localhost", "cosc419admin", "password", "documentrecommendation");
?>
    <head>
        <title>Browse</title>
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
    <body style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; text-align:center;color: white;" background="background.jpg">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
        
    <h2 class="welcomemsg">
        Browse Documents
    </h2>
    <div class="tabs">
    <h4>
        | <a href="browse.php">Browse</a> | 
        <a href="recommended.php">Recommended</a> |
         <a href="history.php">History</a> |
         <a href="signout.php">Sign Out</a> |
    </h4>
        <br/>
    </div>
            <div style="text-align:left;">
    <?php
    //List all documents
    $sql = "SELECT * FROM document";
    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    $x = 0;
   if ($result) {        
         while ($newArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {    
             $name[$x]  = $newArray['name']; 
             $name2[$x] = urlencode($name[$x]);
             $docid[$x] = $newArray['id'];
             $x++;
  } }
    $counter=1;
    for ($a = 0; $a < count($name); $a++){
        echo $counter.". <a href=viewdoc.php?name=$name2[$a]&docid=$docid[$a]>" .$name[$a].  "</a>";
        echo "<br> ";
        $counter++;
    }
  
    ?>
            </div>
        </div>
            <div class="col-sm-3">
        </div>
    </body>
</html>