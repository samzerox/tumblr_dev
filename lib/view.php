<?php
	
	/*
	* devuelve la cadena $msg si existe un error, en caso contrario devuelve una cadena vacia
	* @param bool $error
	*@param string $msg
	* @return string
	*/
	function error_msg($error,$msg)
	{
		if(isset($error) && $error)
		{
			return $msg;
		}
		else
		{
			return "";
		}
	}
	
	/*
	* Verifica si el usuario ha iniciado sesion
	* @return bool
	*/
	function logged_in()
	{
		if(isset($_SESSION["user"]))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/*
	* devuelve el valor del campo indicado de la variable de sesion user
	* @param string $field
	* @return string
	*/
	function current_user($field)
	{
		if ($_SESSION["user"])
		{
			return $_SESSION["user"][$field];
		}
		else
		{
			return "";
		}
	}
?>