<?php
session_start();
$mysqli = mysqli_connect("localhost", "cosc419admin", "password", "documentrecommendation");
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Simulate User</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>

    <body>
    <?php       
    $counter = 1;
    //loop for 5 users
    for($counter; $counter<6; $counter++){
       $user = "user".$counter;
    //generate CPT for (Like|Category) 
    //since we will only be using the true row in the CPT, we can just generate 10 numbers (one for each category) that add up to 100
    $number_of_groups   = 10;
    $sum_to             = 100;
    $array             = array();
    $group              = 0;

    while(array_sum($array) != $sum_to){
    $array[$group] = mt_rand(0, $sum_to/mt_rand(1,5));
    if(++$group == $number_of_groups){
        $group  = 0;
        }
    }

    //assign values to each category
    $categories = array("arts" => $array[0], "business" => $array[1], "computers" => $array[2], "games" => $array[3], "health" => $array[4], "home" => $array[5], "recreation" => $array[6], "science" => $array[7], "society" => $array[8], "sports" => $array[9]);
    arsort($categories);
    //print_r($categories);
    
    //get amount of documents to add in history
    //e.g. if Arts is 23, round to the nearest tenth, then take the first digit and add that many documents
    $arts = (int)substr(round($categories['arts'], -1), 0, 1);
    $business = (int)substr(round($categories['business'], -1), 0, 1);
    $computers = (int)substr(round($categories['computers'], -1), 0, 1);
    $games = (int)substr(round($categories['games'], -1), 0, 1);
    $health = (int)substr(round($categories['health'], -1), 0, 1);
    $home = (int)substr(round($categories['home'], -1), 0, 1);
    $recreation = (int)substr(round($categories['recreation'], -1), 0, 1);
    $science = (int)substr(round($categories['science'], -1), 0, 1);
    $society = (int)substr(round($categories['society'], -1), 0, 1);
    $sports = (int)substr(round($categories['sports'], -1), 0, 1);
    
    //Create User
   $sql = "INSERT INTO account VALUES(null, '".$user."', '".$user."', '".$user."@gmail.com', 'password')";
   $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
   
   //get user's id
   $id;
   $sql2 = "SELECT id FROM account WHERE fname='".$user."' AND lname='".$user."';";
   $result2 = mysqli_query($mysqli, $sql2) or die(mysqli_error($mysqli));
   if($result2){
     while($newArray = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
         $id = $newArray['id'];
     }
   }
   
   //get random arts documents
   $arrayArts = array();
   $counterArts = 0;
   $sqlArts = "SELECT document FROM category WHERE first='arts' ORDER BY rand() LIMIT ".$arts;
    $resultArts = mysqli_query($mysqli, $sqlArts) or die(mysqli_error($mysqli));
   if($resultArts){
     while($newArray = mysqli_fetch_array($resultArts, MYSQLI_ASSOC)){
         $arrayArts[$counterArts] = $newArray['document'];
         
   //add to user's browsing history documents depending on their CPT value
   for($counterArts = 0; $counterArts<count($arrayArts); $counterArts++){
   $sqlAdd = "INSERT INTO history VALUES (".$id.", ".$arrayArts[$counterArts].")";}
   $resultAdd = mysqli_query($mysqli, $sqlAdd) or die(mysqli_error($mysqli));  
    }
     }
     
     //get random business documents
   $arrayBusiness = array();
   $counterBusiness = 0;
   $sqlBusiness = "SELECT document FROM category WHERE first='business' ORDER BY rand() LIMIT ".$business;
    $resultBusiness = mysqli_query($mysqli, $sqlBusiness) or die(mysqli_error($mysqli));
   if($resultBusiness){
     while($newArray = mysqli_fetch_array($resultBusiness, MYSQLI_ASSOC)){
         $arrayBusiness[$counterBusiness] = $newArray['document'];
         
   //add to user's browsing history documents depending on their CPT value
   for($counterBusiness = 0; $counterBusiness<count($arrayBusiness); $counterBusiness++){
   $sqlAdd = "INSERT INTO history VALUES (".$id.", ".$arrayBusiness[$counterBusiness].")";}
   $resultAdd = mysqli_query($mysqli, $sqlAdd) or die(mysqli_error($mysqli));  
    }
     }
     
     //get random Computers documents
   $arrayComputers = array();
   $counterComputers = 0;
   $sqlComputers = "SELECT document FROM category WHERE first='computers' ORDER BY rand() LIMIT ".$computers;
    $resultComputers = mysqli_query($mysqli, $sqlComputers) or die(mysqli_error($mysqli));
   if($resultComputers){
     while($newArray = mysqli_fetch_array($resultComputers, MYSQLI_ASSOC)){
         $arrayComputers[$counterComputers] = $newArray['document'];
         
   //add to user's browsing history documents depending on their CPT value
   for($counterComputers = 0; $counterComputers<count($arrayComputers); $counterComputers++){
   $sqlAdd = "INSERT INTO history VALUES (".$id.", ".$arrayComputers[$counterComputers].")";}
   $resultAdd = mysqli_query($mysqli, $sqlAdd) or die(mysqli_error($mysqli));  
    }
     }
     
     //get random Games documents
   $arrayGames = array();
   $counterGames = 0;
   $sqlGames = "SELECT document FROM category WHERE first='games' ORDER BY rand() LIMIT ".$games;
    $resultGames = mysqli_query($mysqli, $sqlGames) or die(mysqli_error($mysqli));
   if($resultGames){
     while($newArray = mysqli_fetch_array($resultGames, MYSQLI_ASSOC)){
         $arrayGames[$counterGames] = $newArray['document'];
         
   //add to user's browsing history documents depending on their CPT value
   for($counterGames = 0; $counterGames<count($arrayGames); $counterGames++){
   $sqlAdd = "INSERT INTO history VALUES (".$id.", ".$arrayGames[$counterGames].")";}
   $resultAdd = mysqli_query($mysqli, $sqlAdd) or die(mysqli_error($mysqli));  
    }
     }
     
     //get random health documents
   $arrayHealth = array();
   $counterHealth = 0;
   $sqlHealth = "SELECT document FROM category WHERE first='health' ORDER BY rand() LIMIT ".$health;
    $resultHealth = mysqli_query($mysqli, $sqlHealth) or die(mysqli_error($mysqli));
   if($resultHealth){
     while($newArray = mysqli_fetch_array($resultHealth, MYSQLI_ASSOC)){
         $arrayHealth[$counterHealth] = $newArray['document'];
         
   //add to user's browsing history documents depending on their CPT value
   for($counterHealth = 0; $counterHealth<count($arrayHealth); $counterHealth++){
   $sqlAdd = "INSERT INTO history VALUES (".$id.", ".$arrayHealth[$counterHealth].")";}
   $resultAdd = mysqli_query($mysqli, $sqlAdd) or die(mysqli_error($mysqli));  
    }
     }
     
     //get random home documents
   $arrayHome = array();
   $counterHome = 0;
   $sqlHome = "SELECT document FROM category WHERE first='home' ORDER BY rand() LIMIT ".$home;
    $resultHome = mysqli_query($mysqli, $sqlHome) or die(mysqli_error($mysqli));
   if($resultHome){
     while($newArray = mysqli_fetch_array($resultHome, MYSQLI_ASSOC)){
         $arrayHome[$counterHome] = $newArray['document'];
         
   //add to user's browsing history documents depending on their CPT value
   for($counterHome = 0; $counterHome<count($arrayHome); $counterHome++){
   $sqlAdd = "INSERT INTO history VALUES (".$id.", ".$arrayHome[$counterHome].")";}
   $resultAdd = mysqli_query($mysqli, $sqlAdd) or die(mysqli_error($mysqli));  
    }
     }
     
    //get random recreation documents
   $arrayRecreation = array();
   $counterRecreation = 0;
   $sqlRecreation = "SELECT document FROM category WHERE first='recreation' ORDER BY rand() LIMIT ".$recreation;
    $resultRecreation = mysqli_query($mysqli, $sqlRecreation) or die(mysqli_error($mysqli));
   if($resultRecreation){
     while($newArray = mysqli_fetch_array($resultRecreation, MYSQLI_ASSOC)){
         $arrayRecreation[$counterRecreation] = $newArray['document'];
         
   //add to user's browsing history documents depending on their CPT value
   for($counterRecreation = 0; $counterRecreation<count($arrayRecreation); $counterRecreation++){
   $sqlAdd = "INSERT INTO history VALUES (".$id.", ".$arrayRecreation[$counterRecreation].")";}
   $resultAdd = mysqli_query($mysqli, $sqlAdd) or die(mysqli_error($mysqli));  
    }
     }
     
      //get random science documents
   $arrayScience = array();
   $counterScience = 0;
   $sqlScience = "SELECT document FROM category WHERE first='science' ORDER BY rand() LIMIT ".$science;
    $resultScience = mysqli_query($mysqli, $sqlScience) or die(mysqli_error($mysqli));
   if($resultScience){
     while($newArray = mysqli_fetch_array($resultScience, MYSQLI_ASSOC)){
         $arrayScience[$counterScience] = $newArray['document'];
         
   //add to user's browsing history documents depending on their CPT value
   for($counterScience = 0; $counterScience<count($arrayScience); $counterScience++){
   $sqlAdd = "INSERT INTO history VALUES (".$id.", ".$arrayScience[$counterScience].")";}
   $resultAdd = mysqli_query($mysqli, $sqlAdd) or die(mysqli_error($mysqli));  
    }
     }
     
      //get random society documents
   $arraySociety = array();
   $counterSociety = 0;
   $sqlSociety = "SELECT document FROM category WHERE first='society' ORDER BY rand() LIMIT ".$society;
    $resultSociety = mysqli_query($mysqli, $sqlSociety) or die(mysqli_error($mysqli));
   if($resultSociety){
     while($newArray = mysqli_fetch_array($resultSociety, MYSQLI_ASSOC)){
         $arraySociety[$counterSociety] = $newArray['document'];
         
   //add to user's browsing history documents depending on their CPT value
   for($counterSociety = 0; $counterSociety<count($arraySociety); $counterSociety++){
   $sqlAdd = "INSERT INTO history VALUES (".$id.", ".$arraySociety[$counterSociety].")";}
   $resultAdd = mysqli_query($mysqli, $sqlAdd) or die(mysqli_error($mysqli));  
    }
     }
     
      //get random sports documents
   $arraySports = array();
   $counterSports = 0;
   $sqlSports = "SELECT document FROM category WHERE first='sports' ORDER BY rand() LIMIT ".$sports;
    $resultSports = mysqli_query($mysqli, $sqlSports) or die(mysqli_error($mysqli));
   if($resultSports){
     while($newArray = mysqli_fetch_array($resultSports, MYSQLI_ASSOC)){
         $arraySports[$counterSports] = $newArray['document'];
         
   //add to user's browsing history documents depending on their CPT value
   for($counterSports = 0; $counterSports<count($arraySports); $counterSports++){
   $sqlAdd = "INSERT INTO history VALUES (".$id.", ".$arraySports[$counterSports].")";}
   $resultAdd = mysqli_query($mysqli, $sqlAdd) or die(mysqli_error($mysqli));  
    }
     }
     
     
     
   }
   $counter = $counter - 1;
    echo "<h3>Successfully simulated ".$counter." users.</h3>";
   
    ?>     
    </body>

</html>