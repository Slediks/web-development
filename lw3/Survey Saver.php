<?php

header("Content-Type: text/plain");

function getParameter(string $key): ?string
{
	return isset($_GET[$key]) ? $_GET[$key] : null;
}

function dataFile()
{
	if ((getParameter('email') === null) || (getParameter('email') === '')) {
		echo 'Enter email, pls.';
		return;
	}
	$path = './data/'.getParameter('email').'.txt';
	$dataArr = ['first_name' => 'First Name',
				'last_name' => 'Last Name',
				'email' => 'Email',
				'age' => 'Age'];
	if (file_exists($path)) {
		$fileArr = file($path);
		$strNum = 0;
		foreach ($dataArr as $key => $value) {
			if (($key !== 'email') && (getParameter($key) !== null)) {
				$fileArr[$strNum] = $value.': '.getParameter($key)."\n";
			}
			$strNum++;
		}
		file_put_contents($path, implode('', $fileArr));
	} else {
		$file = fopen($path, 'w');
		foreach ($dataArr as $key => $value) {
			fwrite($file, $value.': '.getParameter($key)."\n");
		}
		fclose($file);
	}
}


dataFile();




// echo file_get_contents('./data/'.getParameter('email').'.txt');