<?php
//iniciamos sesion
session_start();
	
require("config.php");
  
function routing($routes)
{
	//obtiene la url de la barra de direcciones
	$url = $_SERVER["REQUEST_URI"];
	
	// recorta la url dejando solo lo necesario
	$url = str_replace("/".APP_ROOT."/","",$url);
	
	$url = str_replace("?".$_SERVER["QUERY_STRING"],"",$url);
	
	$params = params();
	//bucle que busca coincidencias a traves de las diferentes expresiones regulares
	foreach($routes as $route)
	{
	  if($num_routes = preg_match($route["url"],$url,$matches) > 0)
	  {
		  $params = array_merge($matches, $params);
		  break;
	  }
	}
	  
	//comprobando si existen coincidencias
	if($num_routes == 0)
	{
		exit("No se ha encontrado la ruta");
	}	
		  
	//incluyendo el script php de acuerdo al mapeo realizado	  
	include(CONTROLLERS_PATH . $route["controller"].".php");
	
	//añadiendo layouts	
	if (file_exists(VIEWS_PATH."layouts".DS.$route["controller"].".php"))
	{
		include(VIEWS_PATH."layouts".DS.$route["controller"].".php");
	}
	else
	{
		include(VIEWS_PATH."layouts".DS."default.php");
	}
	$_SESSION["msg"]["warnings"] = "";
	$_SESSION["msg"]["success"] = "";
}
  
function params()
{
	$params = array();
	
	if(!empty($_POST))
	{
		if(get_magic_quotes_gpc() ==1)
		{
			$params = array_merge($params,stripslashes_array($_POST));
		}
		else
		{
			$params = array_merge($params,$_POST);
		}
	}
	
	if(!empty($_GET))
	{
		if(get_magic_quotes_gpc() ==1)
		{
			$params = array_merge($params,stripslashes_array($_GET));
		}
		else
		{
			$params = array_merge($params,$_GET);
		}
		
	}
	
	return $params;
}

function stripslashes_array($value)
{
	if(is_array($value))
	{
		$value = array_map("stripslashes_array", $value);
	}
	else
	{
		$value = stripslashes($value);
	}
	
	return $value;
}
  
routing($routes);

?>