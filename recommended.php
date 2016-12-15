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
        <title>Recommended Documents</title>
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
        
        <h2 style="text-align:center;">Recommended Documents</h2>
        <div class="tabs">
        <h4>
        | <a href="browse.php">Browse</a> | 
        <a href="recommended.php">Recommended</a> |
         <a href="history.php">History</a> |
         <a href="signout.php">Sign Out</a> |
        </h4>
            <div style="text-align:left;">     
      <?php
      //get user's id
      $userID = $_SESSION['id'];
      
      //create counter for each category
      $arts = 0;
      $business = 0;
      $computers = 0;
      $games = 0;
      $health = 0;
      $home = 0;
      $recreation = 0;
      $science = 0;
      $society = 0;
      $sports = 0;
      
      //get user's browsing history and each document's primary category
      $sql = "SELECT history.document, first FROM history, category WHERE history.document=category.document AND account=" .$userID;
      $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
       if($result){
            while($newArray = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $docid = $newArray['document'];
                $category = $newArray['first'];
                
                //increment categories
                if($category == "arts"){
                    $arts++;
                }else if($category == "business"){
                    $business++;
                }else if($category == "computers"){
                    $computers++;
                }else if($category == "games"){
                    $games++;
                }else if($category == "health"){
                    $health++;
                }else if($category == "home"){
                    $home++;
                }else if($category == "recreation"){
                    $recreation++;
                }else if($category == "science"){
                    $science++;
                }else if($category == "society"){
                    $society++;
                }else{
                    $sports++;
                }                       
            }        
        }
        
        //place categories into array and sort by greatest interest
        $categories = array("arts" => $arts, "business" => $business, "computers" => $computers, "games" => $games, "health" => $health, "home" => $home, "recreation" => $recreation, "science" => $science, "society" => $society, "sports" => $sports);
        arsort($categories);
        //print_r($categories);
        $first = key($categories);
        
        //recommend 3 documents with the category with highest interest
        echo "<h3>" .strtoupper($first). "</h3>";
        $sql2 = "SELECT id, name FROM document, category WHERE id=document AND first='" .$first. "' ORDER BY rand() LIMIT 3";
        $result2 = mysqli_query($mysqli, $sql2) or die(mysqli_error($mysqli));
        if($result2){
            while($newArray = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
                $docid = $newArray['id'];
                $name = $newArray['name'];
                $name2 = urlencode($name);
                
                
                echo "<a href=viewdoc.php?name=$name2&docid=$docid>" .$name.  "</a>";
                echo "<br/>";
            }
        }
        
        //recommend 3 documents with the category with 2nd highest interest
        next($categories);
        $second = key($categories);
        echo "<h3>" .strtoupper($second). "</h3>";
        $sql3 = "SELECT id, name FROM document, category WHERE id=document AND first='" .$second. "' ORDER BY rand() LIMIT 3";
        $result3 = mysqli_query($mysqli, $sql3) or die(mysqli_error($mysqli));
        if($result3){
            while($newArray = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
                $docid = $newArray['id'];
                $name = $newArray['name'];
                $name2 = urlencode($name);
                
                
                echo "<a href=viewdoc.php?name=$name2&docid=$docid>" .$name.  "</a>";
                echo "<br/>";
            }
        }
        
        //recommend 3 documents with the category with 3nd highest interest
        next($categories);
        $third = key($categories);
        echo "<h3>" .strtoupper($third). "</h3>";
        $sql4 = "SELECT id, name FROM document, category WHERE id=document AND first='" .$third. "' ORDER BY rand() LIMIT 3";
        $result4 = mysqli_query($mysqli, $sql4) or die(mysqli_error($mysqli));
        if($result4){
            while($newArray = mysqli_fetch_array($result4, MYSQLI_ASSOC)){
                $docid = $newArray['id'];
                $name = $newArray['name'];
                $name2 = urlencode($name);
                
                
                echo "<a href=viewdoc.php?name=$name2&docid=$docid>" .$name.  "</a>";
                echo "<br/>";
            }
        }
        
      ?>
            </div>
        </div>
        <div class="col-sm-3">
        </div>
    </body>

</html>