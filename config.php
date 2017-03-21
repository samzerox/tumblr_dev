<?php

	//matriz que contiene las expresiones regulares con sus controladores y vistas
	$routes = array(
	//posts
				array(
					"url" => "/^posts\/(?P<id>\d+)\/?$/",
					"controller" => "posts",
					"view" => "show"),
				array(
					"url" => "/^posts\/create\/?$/",
					"controller" => "posts",
					"view" => "create"),
				array(
					"url" => "/^posts\/new\/?$/",
					"controller" => "posts",
					"view" => "new"),
				array(
					"url" => "/^posts\/?(page\/)?(?P<page>\d*)$/",
					"controller" => "posts",
					"view" => "index"),
				array(
					"url" => "/^posts\/(?P<id>\d+)\/edit\/?$/",
					"controller" => "posts",
					"view" => "edit"),
				array(
					"url" => "/^posts\/(?P<id>\d+)\/update\/?$/",
					"controller" => "posts",
					"view" => "update"),
				array(
					"url" => "/^posts\/(?P<id>\d+)\/delete\/?$/",
					"controller" => "posts",
					"view" => "delete"),
		//Sessions	
				array(
					"url" => "/^sessions\/new\/?$/",
					"controller" => "sessions",
					"view" => "new"),
				array(
					"url" => "/^sessions\/create\/?$/",
					"controller" => "sessions",
					"view" => "create"),
				array(
					"url" => "/^sessions\/delete\/?$/",
					"controller" => "sessions",
					"view" => "delete"));

	//constantes definidas para una base de datos
	define("HOST","localhost");
	define("USERNAME","tumblr_user");
	define("PASSWORD","root");
	define("DATABASE","");
	
	//carpeta raiza del proyecto
	define("APP_ROOT","tumblr_dev");
	
	//carpeta raiza del proyecto
	define("WEBSITE","http://localhost/");
	
	//separador de directorio
	define("DS","/");
	
	//$_SERVER["DOCUMENT_ROOT"]
	define("SERVER_ROOT",$_SERVER["DOCUMENT_ROOT"]);
	
	//ruta de controladores
	define("CONTROLLERS_PATH",SERVER_ROOT.DS.APP_ROOT.DS."controllers".DS);
	//ruta de modelos
	define("MODELS_PATH",SERVER_ROOT.DS.APP_ROOT.DS."models".DS);
	//ruta de vistas
	define("VIEWS_PATH",SERVER_ROOT.DS.APP_ROOT.DS."views".DS);
	
	
	//libreria de includes
	require("lib/database.php");
	require("lib/controller.php");
	require("lib/model.php");
	require("lib/view.php");

?>