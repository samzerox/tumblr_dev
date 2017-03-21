<?php

require(MODELS_PATH."user.php");

switch($route["view"])
{
	case "new":	
	break;
	case "create":
		if(login($params["user"]["username"], $params["user"]["password"]))
		{
			save_msg_success("Te encuetras logeado.");
			redirect_to("posts");
		}
		else
		{
			save_msg_warnings("Nombre de usuario y/o contraseña incorrectos");
			$route["view"] = "new";
		}
		
	break;
	case "delete":
		$_SESSION["user"] = NULL;
		save_msg_success("Has cerrado sesion");
		redirect_to("sessions/new");
	break;
}

?>