<?php 
session_start();

if(empty($_SESSION['user']['id']))
{
	echo "<script>";
	echo "window.location = 'index';";
	echo "</script>";
}

require('models/Consulta.class.php');
$consulta = new Consultas;
$param1 = $consulta->get_PARAMETRO();
for($i = 0; $i < count($param1); $i++)
	$temp[] = $param1[$i]['slot'];

$param = $consulta->get_PARAMETROS($_GET['id']);
echo rand(0,100);
echo "<div id='response'>";
for($i = 0; $i< count($param); $i++)
{
	if (in_array($param[$i][0], $temp, true))
	{
		$return = false;
		for($j = 0; $j < count($param1); $j++)
		{
			if($return) break;
			if($param[$i][0] == $param1[$j][1])
			{
				echo "<div><h2>".$param1[$j][2]."</h2>".$param[$i][2]."<h2>".$param1[$j][3]."</h2></div>";
				$return = true;
			}
		}
	}
}
echo "</div>";
?>