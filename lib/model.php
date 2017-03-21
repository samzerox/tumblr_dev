<?php

/*
* Valida los campos del segundo parametro de acuerdo a las expresiones regulares
* del primer parametro
* @param array $validations
* @param array $fields
* @return bool o array
*/
function get_errors($validations,$fields)
{
	$errors = array("total_errors" => 0);
	foreach($validations as $field => $regexp)
	{
		if(!preg_match($regexp,$fields[$field]))
		{
			$errors["total_errors"]++;
			$errors[$field] = true;
		}
		else
		{
			$errors[$field] = false;
		}
	}
	if($errors["total_errors"] == 0)
	{
		return false;
	}
	else
	{
		return $errors;
	}
}
?>