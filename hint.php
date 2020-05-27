<?php
    $q = $_REQUEST["q"];

    $hint = "";

    $file = fopen("namesList.txt", "r") or die("Unable to open file!");
    
    if ($q != "") {
        $q = strtolower($q);
        $len=strlen($q);
        
        while(!feof($file)) {
            $name = fgets($file);
            
            if (stristr($q, substr($name, 0, $len))) {
                if ($hint == "") {
                    $hint = $name;
                } else {
                    $hint .= ", $name";
                }
            }
        }
    }

    fclose($file);

    echo $hint == "" ? "no match found" : $hint;
?>