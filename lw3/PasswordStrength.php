<?php

header('Content-Type: text/plain');

function getParameter(string $key): ?string
{
	return isset($_GET[$key]) ? $_GET[$key] : null;
}

function CheckPassword($pass) {	
if (($pass === '') || ($pass === null) || preg_match('/[^[:alnum:]]/', $pass)) //RegEx
	return 'Wrong password';

$length = strlen($pass);
$result = 0;
$numCount = 0;
$upperCount = 0;
$lowerCount = 0;

for ($i = 0; $i < $length; $i++) 
	if (ctype_lower($pass[$i]))
		$lowerCount++;
	elseif (ctype_upper($pass[$i]))
		$upperCount++;
	else
		$numCount++;

$alphCount = $upperCount + $lowerCount;

$result = ($numCount != 0) ? $result + $numCount * 4 : $result - $alphCount;

if ($alphCount != 0) {
	$result += $alphCount * 4;
	if ($upperCount != 0)
		$result += ($length-$upperCount) * 2;
	if ($lowerCount != 0)
		$result += ($length-$lowerCount) * 2;
} else $result -= $numCount;

$arr = [];

for ($i = 0; $i < $length; $i++) { 
	$char = $pass[$i];
	$arr[$char] = (isset($arr[$char])) ? ++$arr[$char] : 1;
}

foreach ($arr as $value) {
	if ($value == 1) continue;
	$result -= $value;
}

return $result;           
}

echo CheckPassword(getParameter('password'));



