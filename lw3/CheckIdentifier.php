<?php

header('Content-Type: text/plain');

function getParameter(string $key): ?string
{
	return isset($_GET[$key]) ? $_GET[$key] : null;
}

function checkId($id)
{
	if (($id === null) || ($id === ''))
		return 'Enter identifier, pls.';
	if (ctype_alpha($id[0])) {
		if (preg_match('/[^[:alnum:]]/', $id))
			return 'no, identifier can only contain alphabetic characters or numbers';
	} else {
		return 'no, identifier must begin with an alphabetic character';
	}
	return 'yes';
}


echo checkId(getParameter('identifier'));
