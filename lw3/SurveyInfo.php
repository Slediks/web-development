<?php

header('Content-Type: text/plain');

function getParameter(string $key): ?string
{
	return isset($_GET[$key]) ? $_GET[$key] : null;
}

$email = getParameter('email');
$path = './data/'.$email.'.txt';
if (($email === null) || ($email === '')) {
	echo 'Enter email, pls.';
} elseif (file_exists($path)) {
	echo file_get_contents($path);
} else {
	echo 'No such file';
}