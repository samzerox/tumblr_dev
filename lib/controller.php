<?php
	/*
	* redirecciona el navegador hacia una nueva direccion
	* @param string $address
	*/
	function redirect_to($address)
	{
		header("Location:".WEBSITE.APP_ROOT."/".$address);
		exit();
	}
	
	/*
	* Crea un mensaje de error que se almacena en la matriz superglobal $_SESSION
	* @param string $msg
	* @return bool
	*/
	function save_msg_warnings($msg)
	{
		if(empty($msg))
		{
			return false;
		}		
		$_SESSION["msg"]["warnings"] = $msg;
		return true;
	}
	
	/*
	* Crea un mensaje de exito que se almacena en la matriz superglobal $_SESSION
	* @param string $msg
	* @return bool
	*/
	function save_msg_success($msg)
	{
		if(empty($msg))
		{
			return false;
		}		
		$_SESSION["msg"]["success"] = $msg;
		return true;
	}
	
	/*
	* Verifica si el usuario ha iniciado sesion
	* y redirecciona el navegador hacia el formulario de logueo en caso no se haya iniciado sesion
	* @return bool
	*/
	function check_authentication()
	{
		if($_SESSION["user"])
		{
			return true;
		}
		else
		{
			redirect_to("sessions/new");
			return false;
		}
	}
?>