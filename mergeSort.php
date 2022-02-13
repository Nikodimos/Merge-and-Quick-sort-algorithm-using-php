<?php
require_once './executionTime.php';
ini_set('memory_limit', '-1');
function mergesort($numlist)
{
    if (count($numlist) == 1) return $numlist;

    $mid = count($numlist) / 2;
    $left = array_slice($numlist, 0, $mid);
    $right = array_slice($numlist, $mid);

    $left = mergesort($left);
    $right = mergesort($right);

    return merge($left, $right);
}

function merge($left, $right)
{
    $result = array();
    $leftIndex = 0;
    $rightIndex = 0;

    while ($leftIndex < count($left) && $rightIndex < count($right))
    {
        if ($left[$leftIndex] > $right[$rightIndex])
        {

            $result[] = $right[$rightIndex];
            $rightIndex++;
        }
        else
        {
            $result[] = $left[$leftIndex];
            $leftIndex++;
        }
    }
    while ($leftIndex < count($left))
    {
        $result[] = $left[$leftIndex];
        $leftIndex++;
    }
    while ($rightIndex < count($right))
    {
        $result[] = $right[$rightIndex];
        $rightIndex++;
    }
    return $result;
}
//End of function
$files = glob("*.txt");

foreach ($files as $file)
{
    echo $file . "\n";
}
echo "select the file that you want to sort ...";
$input = rtrim(fgets(STDIN));

$lines = file($input, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

if ($lines)
{
    $time_start = microtime(true);
    $lines = mergesort($lines);
    // Display Script End time
    $time_end = microtime(true);
    $execution_time = ($time_end - $time_start);
    $execution_time = format_time($execution_time);
    echo 'Total Execution Time: ' . $execution_time;
    $myfile = fopen("MergeSorted-$input", "w") or die("Unable to open file!");
    $newline = "\n";
    $value = '';
    foreach ($lines as $line)
    {
        $txt = $line . $newline;
        fwrite($myfile, $txt);
    }
    fclose($myfile);
}