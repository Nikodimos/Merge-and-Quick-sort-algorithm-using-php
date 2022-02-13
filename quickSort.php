<?php
ini_set('memory_limit', '-1');
function quick_sort($numlist)
 {
	$loe = $gt = array();
	if(count($numlist) < 2)
	{
		return $numlist;
	}
	$pivot_key = key($numlist);
	$pivot = array_shift($numlist);
	foreach($numlist as $val)
	{
		if($val <= $pivot)
		{
			$loe[] = $val;
		}elseif ($val > $pivot)
		{
			$gt[] = $val;
		}
	}
	return array_merge(quick_sort($loe),array($pivot_key=>$pivot),quick_sort($gt));
}
//End of function

$files = glob("*.txt");

foreach($files as $file) {
    echo $file ."\n";
}
echo "select the file that you want to sort ...";
$input = rtrim(fgets(STDIN));

$lines = file(
    $input,
    FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES
);

if ($lines) {
    $lines = quick_sort($lines);
    $myfile = fopen("QuickSorted-$input", "w") or die("Unable to open file!");
$newline = "\n";
$value = '';
foreach ($lines as $line){
    $txt = $line.$newline;
    fwrite($myfile,$txt);
}
fclose($myfile);
}
?>