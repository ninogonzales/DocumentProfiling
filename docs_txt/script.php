<?php
$db = new mysqli('localhost', 'cosc419admin', 'password', 'documentrecommendation');

function select_files($dir) {
    if (is_dir($dir)) {
        if ($handle = opendir($dir)) {
            $files = array();
            while (false !== ($file = readdir($handle))) {
                if (is_file($dir.$file) && $file != basename($_SERVER['PHP_SELF'])) $files[] = $file;
            }
            closedir($handle);
            if (is_array($files)) sort($files);
            return $files;
        }
    }
}


function insert_record($name) {
    $db = new mysqli('localhost', 'cosc419admin', 'password', 'documentrecommendation');
    $path = dirname(__FILE__);
    $sql = sprintf("INSERT INTO document SET name = '%s', path='%s'", $name, $path);
    if ($db->query($sql)) {
        return true;
    } else {
        return false;
    }
}

$path = dirname(__FILE__);
$path .= (substr($path, 0, 1) == "/") ? "/" : "\\";
$file_array = select_files($path);

$num_files = count($file_array);
$success = 0;
$error_array = array();

if ($num_files > 0) {
     foreach ($file_array as $val) {
         if (insert_record($val)) {
             $success++;
         } else {
             $error_array[] = $val;
         }
     }
     echo "Copied ".$success." of ".$num_files." files...";
     if (count($error_array) > 0) echo "\n\n<blockquote>\n".print_r($error_array)."\n</blockquote>";
 } else {
     echo "No files or error while opening directory";
 }

?>