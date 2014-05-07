<?php
session_start();

/**
	* Proyectos
	* @package Proyectos
*/

// Necesario para las consultas
if(!empty($_POST))
{
	require('models/Consulta.class.php');
	$consulta = new Consultas;
	$data = $consulta->get_User($_POST['login'],$_POST['pass']);
	if(empty($data))
	{
		echo "Usuario y/o password incorrectos.";
	}
	else
	{
		$_SESSION['user'] = $data[0];
		echo "<script>";
		echo "window.location = 'bases';";
		echo "</script>";
	}
}

require('libs/Smarty.class.php');
$smarty = new Smarty;
$smarty->caching = false;
$smarty->display('index.tpl');
?>