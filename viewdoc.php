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
        <title>View File</title>
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

    <body style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; color:white;" background="background.jpg">
        <?php
        
        //Insert user id and document id into history table
        $userid = $_SESSION['id'];
        $docid = $_GET["docid"];
        $sql = "INSERT IGNORE INTO history values(".$userid.", ".$docid.");";
        $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));    

        //Get file path
        $path = "docs_txt/" . $_GET["name"];

        //put text into a string
        $string = file_get_contents($path); 
        
        //convert to UTF encoding
        $string = utf8_encode($string);
        
        //print the string
        echo $string;
        

        
        ?>
        
    </body> 
</html>