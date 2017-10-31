<?php
function combos($arr, $k)
{
	if ($k == 0)
	{
		return [([])];
	}
	if (count($arr) == 0)
	{
		return [];
	}
	$head = $arr[0];
	$combos = [];
	$subcombos = combos($arr, $k-1);
	foreach ($subcombos as $subcombo)
	{
		array_unshift($subcombo, $head);
		$combos[] = $subcombo;
	}
	array_shift($arr);
	$combos = array_merge($combos, combos($arr, $k));
	return $combos;
}
function calculate($result)
{
	$resultZero = [];
	foreach ($result as $oneResult)
	{
		if(array_sum($oneResult) === 0)
		{
			$resultZero[] = $oneResult;
		}
	}
	return empty($resultZero) ? false : $resultZero;
}
$arr = [ -10, 4, 5, 7, 3 ];
//$arr = [ 0 ];
//$arr = [ 1, 4, 2, -9 ];
$repeat = 3;
$result = combos($arr, $repeat);
print_r(calculate($result));
?>