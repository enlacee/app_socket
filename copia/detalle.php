<?php
session_start();

if(empty($_SESSION['user']['id']))
{
	echo "<script>";
	echo "window.location = 'index';";
	echo "</script>";
}
else
{
	$menu = "<div class='menu'><a href='salir'>Salir</a></div>";
	//$menu.= "<div class='menu'><a href='bases'>Cambiar pozo</a></div>";
//   $menu.= "<div class='menu'><a href='gperforacion?id=".$_GET['id']."'>Perforacion</a></div>";
 //	$menu.= "<div class='menu'><a href='gvolumenes?id=".$_GET['id']."'>Volumenes</a></div>"; 
//	$menu.= "<div class='menu'><a href='gstrokes?id=".$_GET['id']."'>Strokes</a></div>";
//	$menu.= "<div class='menu'><a href='gcromatografia?id=".$_GET['id']."'>Cromatografia</a></div>";  
	if($_SESSION['user']['id'] == 1)
		$menu.= "<div class='menu'><a href='admin'>Administracion</a></div>";
}

if(empty($_GET['id']))
{
	echo "<script>";
	echo "window.location = 'bases';";
	echo "</script>";
}

/**
	* Proyectos
	* @package Proyectos
*/

$script = '
<script>
	$(document).ready(function() {
$("img[rel]").overlay();

		$("#responsecontainer").load("response.php?id='.$_GET['id'].'");
		var refreshId = setInterval(function() {
                        $("#perf").html("&nbsp;");
                        $("#perf").load("estado_perforacion.php?id='.$_GET['id'].'");
			$("#responsecontainer").load("response.php?id='.$_GET['id'].'");
$("img[rel]").overlay();


			}, 1500);
		$.ajaxSetup({ cache: false });
	});
</script>';
	
$titulo="<a href='detalle?id=".$_GET['id']."' style='text-decoration:none;color:#90F491;'>Pozo: ".$_GET['id']."</a>";

$titulo_="<a href='detalle_grafico?id=".$_GET['id']."' style='text-decoration:none;color:#90F491;'>Ver en Modo Grafico</a>";
require('libs/Smarty.class.php');
$smarty = new Smarty;
$smarty->caching = false;
$smarty->assign('menu',$menu);
$smarty->assign('titulo',$titulo);
$smarty->assign('titulo_',$titulo_);
$smarty->assign('script',$script);
$smarty->assign('pozo',$_GET['id']);
$smarty->display('detalle.tpl');
?>
