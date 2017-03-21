<?php
	/* crea una conexion al servidor mysql
	+@return resource 
	*/
	function connect_db()
	{
		$connection = @mysql_connect(HOST,USERNAME,PASSWORD); 
		if(!$connection)
		{
			return false;
		}
		$db_selected = mysql_select_db(DATABASE,$connection);
	
		if(!$db_selected)
		{
			return false;
		}
		return $connection;
	}
	
	/* convierte un recurso a matriz
	+@param resource $recurso
	*@return (array)
	*/
	function resource_to_array($resource)
	{
		$array = array();
		while($row = mysql_fetch_array($resource))
		{
			array_push($array, $row);
		}
		return $array;
	}

?>