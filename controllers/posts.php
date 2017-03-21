<?php

require(MODELS_PATH."post.php");

switch($route["view"])
{
	case "show":
		$post = retrieve_post($params["id"]);		
	break;
	case "index":
		$page = (isset($params["page"]) && ctype_digit($params["page"]))?$params["page"]:1;	
		$per_page = 3;
		$offset = $page * $per_page - $per_page;
		$posts = retrieve_posts($offset,$per_page);
		$total_pages =  ceil($posts["num_posts"]/$per_page);
		
	break;
	case "update":
	
		check_authentication();
		$errors = get_errors($post_validations,$params["post"]);
		
		if (!$errors)
		{
			$params["post"]["id"] = $params["id"];
			update_post($params["post"]);
			save_msg_success("Se ha actualizado correctamente la entrada.");
			redirect_to("posts/" . $params["id"]);
	
		}
		else
		{
			$params["post"]["id"] = $params["id"];
			$post = $params["post"];
			$route["view"] = "edit";
			save_msg_warnings("Corregir los siguientes campos: <br /><br />");
			
		}		
	break;
	case "edit":
		check_authentication();
		$post = retrieve_post($params["id"]);
	break;
	case "delete":
		check_authentication();
		if(delete_post($params["id"]))
		{
			save_msg_success("Se ha eliminado correctamente la entrada.");
			redirect_to("posts");
		}
	break;	
	case "new":
		check_authentication();
	break;	
	case "create":
		check_authentication();
		$errors = get_errors($post_validations,$params["post"]);
		if (!$errors)
		{
			if(create_post($params["post"]))
			{
				save_msg_success("Se ha creado correctamente la entrada.");
				redirect_to("posts");
			}
		}
		else
		{
			$post = $params["post"];
			$route["view"] = "new";
			save_msg_warnings("Corregir los siguientes campos: <br /><br />");
			
		}
	break;
}



?>