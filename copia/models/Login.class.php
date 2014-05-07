<?php
session_start();

if(class_exists('Mysql') != true)
	include('MySQL.class.php');

class Login extends MySQL
{	
	function getUsuario()
	{
		//Validar si es primera vez que ingresa
		if(empty($_SESSION['username']) && !empty($_POST['username']) && !empty($_POST['password']))
		{
			//Conexion con MySQL
			parent::MySQL();
			$datos = parent::consulta('SELECT * FROM usuarios WHERE email = "'.$_POST['username'].'" AND password = "'.$_POST['password'].'"');
			if(empty($datos))
			{
				echo '<meta http-equiv="refresh" content="0; url=index">';
				exit();
				return false;
			}
			else
			{
				$_SESSION["username"] = $datos;
				echo '<meta http-equiv="refresh" content="0; url=panel">';
				return true;
			}
		}
		elseif(!empty($_SESSION['username']))
		{
			echo '<meta http-equiv="refresh" content="0; url=panel">';
			return true;
		}
	}
	
	function validUsuario()
	{
		//Validar si es primera vez que ingresa
		if(empty($_SESSION['username']))
		{
			echo '<meta http-equiv="refresh" content="0; url=index">';
			exit();
		}
	}
	function Logout()
	{
		session_unset();
		session_destroy();
		$_SESSION = array();
		session_start();
		session_unset();
		session_destroy();
		echo '<meta http-equiv="refresh" content="0; url=index">';
		exit();
	}
}
?>