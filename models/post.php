<?php

$post_validations = array("title" => "/^[[:alnum:][:space:][:punct:]]{1,100}$/", "body" => "/^[[:alnum:][:space:][:punct:]]{1,3000}$/");

/* crea una nueva entrada en la base de datos
* @param array $params
*@return (bool)
*/
function create_post($params)
{
	connect_db();
									
	$query = sprintf("INSERT INTO posts set title = '%s',body = '%s', created_at = NOW(), user_id = %s",mysql_real_escape_string($params['title']), mysql_real_escape_string($params['body']), mysql_real_escape_string($params['user_id']));
  
	$result = mysql_query($query);
	  
	if(!$result)
	{
		return false;
	}	
	else
	{
		return true;
	}
}

/* actualiza una entrada en la base de datos
* @param array $params
*@return (bool)
*/
function update_post($params)
{
	connect_db();
	$query = sprintf("UPDATE posts SET title='%s', body = '%s', user_id = %s where id = %s",mysql_real_escape_string($params['title']), mysql_real_escape_string($params['body']), mysql_real_escape_string($params['user_id']),mysql_real_escape_string($params['id']));
							  
	$result = mysql_query($query);
	
	if(mysql_affected_rows() != 1)
	{
		return false;
	}	
	else
	{
		return true;
	}
}

/* elimina una entrada en la base de datos
*@param int $id
*@return (bool)
*/
function delete_post($id)
{
		connect_db();
		$query = "DELETE FROM posts where id = " . mysql_real_escape_string($id);
	  
	  	$result = mysql_query($query);
	  
	  if(mysql_affected_rows() != 1)
	  {
		 return false;
	  }	
	  else
	  {
		  return true;
	  }
  }
  
 /* devuelve todas las entradas de la base de datos
* @return (array) OR (bool)
*/
function retrieve_posts($offset = NULL,$per_page = NULL)
{
	connect_db();
		  
	$query = "SELECT posts.title, posts.body, users.username, posts.id, posts.user_id
				FROM posts,users
				WHERE posts.user_id = users.id
				ORDER BY posts.id DESC";		  
	
	$result = mysql_query($query);
	 $num_rows = mysql_num_rows($result);
	 
	if(isset($offset) && isset($per_page))
	{
		$query .= " LIMIT $offset, $per_page";
		$result = mysql_query($query);
	}
	
	if(!$result && $num_rows == 0)
	{
		return false;
	}
	else
	{
		return array("result" => resource_to_array($result),"num_posts" => $num_rows);
	}
}

/* devuelve una entrada de la base de datos
* @param int $id
*@return (bool) OR (array)
*/
function retrieve_post($id)
{
	connect_db();
		  
	$query = "SELECT posts.title, posts.body, users.username, posts.id, posts.user_id
				FROM posts,users
				where posts.user_id = users.id and posts.id = " . $id;
		  
	 $result = mysql_query($query);
	 
	if(!$result)
	{
		return false;
	}
	else
	{
		return mysql_fetch_array($result);
	}
}


?>