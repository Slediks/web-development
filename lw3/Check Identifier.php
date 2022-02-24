<?php

header('Content-Type: text/plain');

$id = $_GET['identifier'];
$idLen = strlen($id);
$idCheck = 'yes';
if ($idLen != 0 && ctype_alpha($id[0])) {
	for ($i=1; $i < $idLen; $i++)
		if (!(is_numeric($id[$i]) || ctype_alpha($id[$i]))) 
			$idCheck = 'no, identifier can only contain alphabetic characters or numbers';
} else 
	$idCheck = 'no, identifier must begin with an alphabetic character';
echo $idCheck;