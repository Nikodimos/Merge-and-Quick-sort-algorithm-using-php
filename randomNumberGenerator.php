<?php
require_once './executionTime.php';
function randomNumber($length)
{
    echo "Enter the file name ... \n";
    $filename = rtrim(fgets(STDIN));
    $myfile = fopen("$filename.txt", "w") or die("Unable to open file!");
    $value = '';
    $time_start = microtime(true);
    for ($i = 0;$i < $length;$i++)
    {
        $value = rand();
        $txt = $value . "\n";
        fwrite($myfile, $txt);
    }
    fclose($myfile);
    // Display Script End time
    $time_end = microtime(true);
    $execution_time = ($time_end - $time_start);
    $execution_time = format_time($execution_time);
    echo 'Total Execution Time: ' . $execution_time;
}
echo "How many line of Random number do you want? \n";
$input = rtrim(fgets(STDIN));
randomNumber($input);
?>