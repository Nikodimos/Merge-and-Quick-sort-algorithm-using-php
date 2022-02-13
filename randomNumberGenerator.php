<?php
function randomNumber($length){
    echo "Enter the file name ... \n";
    $filename = rtrim(fgets(STDIN));
    $myfile = fopen("$filename.txt", "w") or die("Unable to open file!");
    $value = '';
    for($i=0; $i<$length; $i++){
        $value = rand();
        $txt = $value."\n";
        fwrite($myfile, $txt);
    }
    fclose($myfile);
}
    echo "How many line of Random number do you want? \n";
    $input = rtrim(fgets(STDIN));
    randomNumber($input);
?>