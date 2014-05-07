<?php
include('config.php');

if(class_exists('Mysql') != true)
	include('MySQL.class.php');

include('Function.class.php');

class Consultas extends Mysql
{
	protected $sql;
	
/************ SECCION BLOG *************/
	//Seleccion de la categoria
	function get_BD()
	{
		parent::Mysql();
		return parent::contarBD();
	}
	
	//Seleccion del usuario
	function get_User($login, $pass)
	{
		parent::Mysql('wellmobil');
		$sql = "SELECT * FROM usuarios WHERE user = '".$login."' AND pass = '".$pass."'";
		$datos = parent::consulta($sql);
		return $datos;
	}
	
	//Seleccion del usuario
	function get_ROP($database)
	{
		parent::Mysql($database);
		$sql = "create temporary table tmp1 as SELECT * FROM `datos` WHERE slot = 0113 ORDER BY id_lectura DESC";
		$datos = parent::crearTemp($sql);
		$sql = "SELECT * FROM tmp1 limit 0,1";
		$datos = parent::consulta($sql);
		return $datos;
	}
	
	//Seleccion del usuario
	function get_DEP($database)
	{
		parent::Mysql($database);
		$sql = "create temporary table tmp2 as SELECT * FROM `datos` WHERE slot = 0110 ORDER BY id_lectura DESC";
		$datos = parent::crearTemp($sql);
		$sql = "SELECT * FROM tmp2 limit 0,1";
		$datos = parent::consulta($sql);
		return $datos;
	}
	
	//Seleccion del usuario
	function get_IMG($database)
	{
		parent::Mysql($database);
		$sql = "SELECT fecha FROM datos ORDER BY fecha DESC limit 0,1";
		$datos = parent::consulta($sql);
		return $datos;
	}
	
	//Seleccion de parametros de la tabla parametros
	function get_PARAMETRO	()
	{
		parent::Mysql('wellmobil');
		$sql = "SELECT * FROM parametros ORDER by parametro";
		$datos = parent::consulta($sql);
		return $datos;
	}
	
	//Seleccion de parametros de la tabla parametros
	function get_PARAMETRO_by_slot($slot)
	{
		parent::Mysql('wellmobil');
		$sql = "SELECT * FROM parametros WHERE slot = ".$slot;
		$datos = parent::consulta($sql);
		return $datos;
	}
	
	//Seleccion del usuario
	function get_PARAMETROS($database,$filtro="")
	{
		parent::Mysql($database);
		$sql = "create temporary table tmp1 as select slot, id_lectura, valor from datos ".$filtro." order by id_lectura DESC;";
		$datos = parent::crearTemp($sql);
		$sql = "select * from tmp1 GROUP BY slot;";
		$datos = parent::consulta($sql);
		return $datos;
	}
	function get_Slots_Activos($database){
	parent::Mysql($database);
	$sql = "SELECT distinct(datos.slot),name FROM datos,slots where 	datos.slot=slots.slot";
	$datos = parent::consulta($sql);
	return $datos;
          }

        function GetFechasSlotActivos($database,$fi,$ff){
	parent::Mysql($database);
        $sql="SELECT distinct(fecha) FROM datos where fecha >='$fi' and fecha <= '$ff'";
        $datos = parent::consulta($sql);
	return $datos;
        }
        function GetValorSlotFecha($database,$slot,$fecha){
         parent::Mysql($database);
         $sql="select valor from datos where slot='$slot' and fecha='$fecha' LIMIT 0,1";
         $datos = parent::consulta($sql);
         $valor=$datos[0]["valor"];
         return (empty($valor))?0:$valor;
       }
	//Seleccion de parametros de la tabla parametros
	function get_PARAMETRO_grafico($database, $slot, $limit = '')
	{
		parent::Mysql($database);
		$sql = "select valor, fecha from datos where slot = ".$slot." ORDER BY id_lectura DESC ";
		if(empty($limit))
				$sql.= " LIMIT 0,50";
		$datos = parent::consulta($sql);
		return $datos;
	}
	
	//Seleccion de parametros de la tabla parametros
	function get_PARAMETRO_grafico1($database, $slot, $limit = '',$order='ASC')
	{
		parent::Mysql($database);
		$sql = "select valor, fecha from datos where slot = ".$slot." ORDER BY id_lectura ".$order." ".$limit;
		$datos = parent::consulta($sql);
		return $datos;
	}
	
	
	//Seleccion de parametros de la tabla parametros
	function get_PARAMETRO_valor($database, $slot)
	{
		parent::Mysql($database);
		$sql = "select valor from datos where slot = ".$slot." ORDER BY id_lectura DESC LIMIT 0,1;";
		$datos = parent::consulta($sql);
		return $datos;
	}
}
?>
