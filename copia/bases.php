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
	if($_SESSION['user']['id'] == 1)
		$menu.= "<div class='menu'><a href='admin'>Administracion</a></div>";
}

/**
	* Proyectos
	* @package Proyectos
*/

// Necesario para las consultas
require('models/Consulta.class.php');
$consulta = new Consultas;
$data = $consulta->get_BD();

$content = "";
if(!empty($data))
{	
	$i = 0;
	$script = '<script>';
	while ($row = mysql_fetch_object($data)) 
	{
		if(strstr($row->Database,'xplora'))
		{
			$class = '';
			
			/*$rop = $consulta->get_ROP($row->Database);
			$dep = $consulta->get_DEP($row->Database);*/
			$img = $consulta->get_IMG($row->Database);
			
			//if(empty($rop[0]['valor'])) $rop[0]['valor'] = 'N/A';
			//if(empty($dep[0]['valor'])) $dep[0]['valor'] = 'N/A';
			
			$imagen = "images/remal.png";
			$class= 'remal';
			if(!empty($img))
			{
				$class= 'mal';
				
				$fec1 = strtotime(substr($img[0]['fecha'], 0, 10));
				$fec2 = strtotime(date('Y-m-d'));
				
				$dias_diferencia = ($fec2 - $fec1)/86400;
				
				if($dias_diferencia <=7)
				{
					$imagen = "images/bien.png";
					$class= 'bien';
				}
				else
					$imagen = "images/mal.png";

			}
			
			/*$content.= '<li class="'.$class.'"><a href="detalle?id='.$row->Database.'">
					<img src="'.$imagen.'">
					'.$row->Database.'<br/>
					ROP: '.$rop[0]['valor'].' ft/hR<br/>
					DEPTH: '.$dep[0]['valor'].' feet</a></li>';*/
			
			$content.= '<li class="'.$class.'">
					<a href="detalle?id='.$row->Database.'">
					<img src="'.$imagen.'">
					'.$row->Database.'<br/>
					<div id="db-'.$i.'">
					</div>
					</a>
					</li>';
					
			$content.= '<li class="'.$class.'">
					<a target="_new" href="litologia/index.html">

					<img src="'.$imagen.'">

					'.$row->Database.'<br/>

					<div>Litologia</div>
					</a>
					</li>';

			$content.= '<li class="'.$class.'">
					<a target="_new" href="genesis/index.html">

					<img src="'.$imagen.'">

					'.$row->Database.'<br/>

					<div>REALTIME</div>
					</a>
					</li>';
			
			$script.= '
						$(document).ready(function() {
							$("#db-'.$i.'").load("bases_value.php?id='.$row->Database.'");
							$.ajaxSetup({ cache: false });
						});';
			$i++;
		}
	}
	$script.= '</script>';
}

require('libs/Smarty.class.php');
$smarty = new Smarty;
$smarty->caching = false;
$smarty->assign('script',$script);
$smarty->assign('menu',$menu);
$smarty->assign('detalle',$content);
$smarty->display('bases.tpl');
?>
