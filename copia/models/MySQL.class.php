<?php
	/* ***********************************************************************************
     ARCHIVO: class.mysql.php
     -----------------------------------------------------------------------------------
     DESCRIPCION:
         Define la clase DB.
				 Esta clase tiene como funcionalidad definir una capa de acceso entre la
				 aplicación y la base de datos que utiliza.
     -----------------------------------------------------------------------------------
		 AUTOR: Camilo Alexander Rincon Chala <CamiloAlex1643@yahoo.es>
		 		Junio 01 de 2011
     ********************************************************************************** */
class Mysql
{	
 	private $conexion;
 	private $resultado;
 	private $total_consultas;
	private $db;
	
	function Mysql($Database = '')
	{  
		include('adodb/adodb.inc.php');
		include("config.php");
		$this->db = &ADONewConnection('mysql');
		//$this->db->debug = true;
		$this->conexion = $this->db->Connect($Server, $User, $Passwd, $Database);
   	}  
	
  	function consulta($consulta)
	{  
		$this->db;
		try {
			$this->resultado = &$this->db->GetAll($consulta);
			return $this->resultado;
		} catch(exception $e){
			print_r($e);
			echo 'Error en MySQL: ' . $db->ErrorMsg();
		}
		$this->db->Close(); # optional
    }
	
	function contarFilas($consulta)
	{  
		$this->db;
		$datos = $this->db->Execute($consulta);
		$this->db->Close(); # optional
	    return $datos->RecordCount(); /* contamos el total de registros de resultado */ 
    }
	
	function contarBD()
	{  
		include("config.php");
		$link = mysql_connect($Server, $User, $Passwd);
	    return mysql_list_dbs($link);
	}
	
	function crearTemp($consulta)
	{  
		$this->db;
		$datos = $this->db->Execute($consulta);;
	}
}
?>