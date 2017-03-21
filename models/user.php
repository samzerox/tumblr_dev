<?php

/*
* crea una variable de sesion en caso se haya indicado nombre de usuario y contraseña
* correctos
*@param string $username
*@param string $password
*@return (bool)
*/
	function login($username, $password)
	{
		connect_db();
		  
		$query = sprintf("SELECT *
						FROM users
						WHERE username = '%s' and password = '%s'
						LIMIT 1",
						mysql_real_escape_string($username),
						mysql_real_escape_string($password));
						echo $query;
			  
		$result = mysql_query($query);
		 
		if($result && mysql_num_rows($result) == 1)
		{
			$_SESSION["user"] = mysql_fetch_array($result);
			return true;
		}
		else
		{
			return false;
		}
	}

?>