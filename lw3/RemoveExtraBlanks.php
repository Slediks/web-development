<?php

header('Content-Type: text/plain');

function getParameter(string $key): ?string
{
	return isset($_GET[$key]) ? $_GET[$key] : null;
}

function removeExtraBlanks($text)
{
	if (($text === null) || ($text === ''))
		return 'Enter text, pls.';
	$text = trim($text, ' ');
	while(str_contains($text, '  '))
		$text = str_replace('  ', ' ', $text);
	return $text;
}


echo removeExtraBlanks(getParameter('text'));