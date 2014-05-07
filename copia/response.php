<?php 
session_start();

if(empty($_SESSION['user']['id']))
{
	echo "<script>";
	echo "window.location = 'index';";
	echo "</script>";
}


$filtro_="";
if(isset($_GET['filtro'])){
switch($_GET['filtro']){	
/*"0111","0018","0113","0116","0114","0120","0118"*/
case "gperforacion":$filtro_=" WHERE slot='0111' or  slot ='0108' or slot='0113' or slot='0116' or slot='0114'  or slot='0120' or slot='0118' or slot='0110'";break;
/*0142,0144,0127,1110*/
case "gvolumenes": $filtro_=" WHERE slot='0142' or slot='0144' or slot='0127' or slot='1110' ";break;
/*0123,0124,0125*/
case "gstrokes": $filtro_=" WHERE slot='0123' or slot='0124' or slot='0125' "; break;
}	
	}


require('models/Consulta.class.php');
$consulta = new Consultas;
$param1 = $consulta->get_PARAMETRO();
for($i = 0; $i < count($param1); $i++)
	$temp[] = $param1[$i]['slot'];

$param = $consulta->get_PARAMETROS($_GET['id'],$filtro_);
//echo rand(0,100);
echo "<div id='response'>";
echo "<table >";
$columnas=5;
$columna_Actual=0;

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
$columna_Actual++;
echo ($columna_Actual==1)?"<tr>":"";
$GIF=($param1[$j][1]=="0108")?GetGif($param[$i][2]):"";
$valor_slot=$param[$i][2];
$valor_slot=($param1[$j][1]=="0141")?GetTime():$valor_slot;
$valor_slot=($param1[$j][1]=="0142")?GetOnBoton():$valor_slot;
$valor_slot=($param1[$j][1]=="0143")?(($valor_slot>70)?"YES":"NO"):$valor_slot;


				echo "<td><div><h2>".$param1[$j][2]."</h2>".$valor_slot."<h2><a href='#' style='font-size:11px' onclick='document.getElementById(\"destino\").src = \"grafico?id=".$_GET['id']."&slot=".$param1[$j][1]."\"; document.getElementById(\"destino1\").src = \"grafico_h?id=".$_GET['id']."&slot=".$param1[$j][1]."\"; return false'><img src='images/grafico.png' title='actual' rel='#mies10'/></a> 
<a href='#' style='font-size:11px' onclick='document.getElementById(\"destino\").src = \"grafico?id=".$_GET['id']."&slot=".$param1[$j][1]."\"; document.getElementById(\"destino\").src = \"grafico_h?id=".$_GET['id']."&slot=".$param1[$j][1]."\"; return false'><img src='images/grafico.png' title='HIstorico' rel='#mies10'/></a>".$param1[$j][3]." 

				<a href='#' style='font-size:11px' onclick='document.getElementById(\"destino\").src = \"gauge?id=".$_GET['id']."&slot=".$param1[$j][1]."\";  return false'><img src='images/gauge.png' rel='#mies10'/></a>
".$GIF."
				</h2>

				</div></td>";
echo ($columna_Actual==$columnas)?"</tr>":"";
$columna_Actual=($columna_Actual==$columnas)?0:$columna_Actual;
				$return = true;
			}
		}
	}
}
echo ($columna_Actual==0)?"":"</tr>";
echo "</table>";
echo "</div>";

function GetGif($Bith_depth){
$consulta_ = new Consultas;
$param1_ = $consulta_->get_PARAMETRO_grafico1($_GET['id'], '0110'," LIMIT 0,1 ","DESC");
$Total_depth=$param1_[0]['valor'];
return ($Bith_depth>=$Total_depth)?"<img src=\"images/perforando.gif\" alt=\"gif\">":"";
}
function GetOnBoton(){
$consulta_ = new Consultas;
$param1_ = $consulta_->get_PARAMETRO_grafico1($_GET['id'], '0110'," LIMIT 0,1 ","DESC");
$Total_depth=$param1_[0]['valor'];
$param1_ = $consulta_->get_PARAMETRO_grafico1($_GET['id'], '0108'," LIMIT 0,1 ","DESC");
$Bith_depth=$param1_[0]['valor'];
return ($Bith_depth==$Total_depth)?"YES":"NO";
}
function GetTime(){
$consulta_ = new Consultas;
$result= $consulta_->get_PARAMETRO_grafico1($_GET['id'], '0138'," LIMIT 0,1 ","DESC");
$lag_Strokes=$result[0]['valor'];
$result= $consulta_->get_PARAMETRO_grafico1($_GET['id'], '0124'," LIMIT 0,1 ","DESC");
$SPM1=$result[0]['valor'];
$result= $consulta_->get_PARAMETRO_grafico1($_GET['id'], '0123'," LIMIT 0,1 ","DESC");
$SPM2=$result[0]['valor'];
$result= $consulta_->get_PARAMETRO_grafico1($_GET['id'], '0125'," LIMIT 0,1 ","DESC");
$SPM3=$result[0]['valor'];
$resultado=($lag_Strokes/($SPM1+$SPM2+$SPM3));
//return $resultado;
return Decimal_To_Time($resultado);
}

function Decimal_To_Time($decimal){
$horas="00";
$minutos="00";
$seconds="00";
if($decimal>=60){
$decimal=$decimal/60;
$temp=explode(".",$decimal);
$horas=$temp[0];
$decimal="0.".$temp[1];
$decimal*=60;
$temp=explode(".",$decimal);
$minutos=$temp[0];
$decimal="0.".$temp[1];
$seconds=ceil($decimal*60);
}
else{
$temp=explode(".",$decimal);
$minutos=$temp[0];
$decimal="0.".$temp[1];
$seconds=ceil($decimal*60);
}

return $horas.":".$minutos.":".$seconds;



}


?>


