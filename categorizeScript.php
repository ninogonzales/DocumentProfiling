<?php
$mysqli = mysqli_connect("localhost", "cosc419admin", "password", "documentrecommendation");
ini_set('max_execution_time', 600);

$url = "https://api.uclassify.com/v1/uclassify/topics/classify";
$token = "Cbs1YyafB22N";
//$data = json_encode(array('texts'=>['Hello World']));
$headers = array(
        "Authorization:Token " . $token,
        "Content-type: application/json"
);
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Categorize Script</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>

    <body>
<?php
//categorize each document
$sql = "SELECT * FROM document";
    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    $x = 0;
    $y = 0;
   if ($result) {        
         while ($newArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {    
             $name[$x]  = $newArray['name']; 
             $docid[$x] = $newArray['id'];
             
              //Get file path
        $path = "docs_txt/" . $name[$x];

        //put text into a string
        $string = file_get_contents($path);
        
        //covert string to lowercase
        $string = strtolower($string);
        //echo $string;
        $string = utf8_encode($string);
        $data = json_encode(array("texts"=>[". $string ."]));

//initialize session
$ch = curl_init();

//set options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

$output = curl_exec($ch);

if($output == FALSE){
    echo "cURL Error: " . curl_error($ch);
}

curl_close($ch);
//echo $output;
//echo "<br/><br/>";

$pos = strpos($output, 'textCoverage');
$textCoverage = substr($output, $pos+14, 6); 
$textCoverage = floatval($textCoverage);

$pos = strpos($output, 'Arts');
$arts = substr($output, $pos+10, 6); 
$arts = floatval($arts);

$pos = strpos($output, 'Business');
$business = substr($output, $pos+14, 6); 
$business = floatval($business);

$pos = strpos($output, 'Computers');
$computers = substr($output, $pos+15, 6); 
$computers = floatval($computers);

$pos = strpos($output, 'Games');
$games = substr($output, $pos+11, 6); 
$games = floatval($games);

$pos = strpos($output, 'Health');
$health = substr($output, $pos+12, 6); 
$health = floatval($health);

$pos = strpos($output, 'Home');
$home = substr($output, $pos+10, 6); 
$home = floatval($home);

$pos = strpos($output, 'Recreation');
$recreation = substr($output, $pos+16, 6); 
$recreation = floatval($recreation);

$pos = strpos($output, 'Science');
$science = substr($output, $pos+13, 6); 
$science = floatval($science);

$pos = strpos($output, 'Society');
$society = substr($output, $pos+13, 6); 
$society = floatval($society);

$pos = strpos($output, 'Sports');
$sports = substr($output, $pos+12, 6);  
$sports = floatval($sports);

$categories = array("arts" => $arts, "business" => $business, "computers" => $computers, "games" => $games, "health" => $health, "home" => $home, "recreation" => $recreation, "science" => $science, "society" => $society, "sports" => $sports);
arsort($categories);
//print_r($categories);

//insert categories inside database
$stmt = $mysqli->prepare("INSERT INTO category (document, first, second, third, fourth, fifth, sixth, seventh, eighth, ninth, tenth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssssssss", $document, $first, $second, $third, $fourth, $fifth, $sixth, $seventh, $eighth, $ninth, $tenth);

// set parameters and execute
$document = $docid[$x];
$first = key($categories);
next($categories);
$second = key($categories);
next($categories);
$third = key($categories);
next($categories);
$fourth = key($categories);
next($categories);
$fifth = key($categories);
next($categories);
$sixth = key($categories);
next($categories);
$seventh = key($categories);
next($categories);
$eighth = key($categories);
next($categories);
$ninth = key($categories);
next($categories);
$tenth = key($categories);

$stmt->execute();
$stmt->close();

//count of how many categories added into documents
$y++;
   }}
   echo "<h3>Successfully added categories into " . $y . " documents</h3>";
?>
  </body> 
</html>