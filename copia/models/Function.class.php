<?php

class Functions
{	
	function moneda($valor)
	{
		return "$".number_format($valor,0,',','.');  ;
	}
	
	function password () {
		$long = 7;
		$letras_min = true;
		$letras_max = true;
		$num = true;
		
		$salt = $letras_min?'abchefghknpqrstuvwxyz':'';
		$salt .= $letras_max?'ACDEFHKNPRSTUVWXYZ':'';
		$salt .= $num?(strlen($salt)?'2345679':'0123456789'):'';
	 
		if (strlen($salt) == 0) 
			return '';
	 
		$i = 0;
		$str = '';
		srand((double)microtime()*1000000);
		while ($i < $long) {
			$num = rand(0, strlen($salt)-1);
			$str .= substr($salt, $num, 1);
			$i++;
		}
		return $str;
	}
	
	function restaFechas($fechaInicio, $fechaActual)
	{
		$diaActual = substr($fechaActual, 8, 2); 
		$mesActual = substr($fechaActual, 5, 2); 
		$anioActual = substr($fechaActual, 0, 4); 
		$diaInicio = substr($fechaInicio, 8, 2); 
		$mesInicio = substr($fechaInicio, 5, 2); 
		$anioInicio = substr($fechaInicio, 0, 4); 
		
		$b = 0; 
		$mes = $mesInicio-1; 
		if($mes==2){ 
		if(($anioActual%4==0 && $anioActual%100!=0) || $anioActual%400==0){ 
		$b = 29; 
		}else{ 
		$b = 28; 
		} 
		} 
		else if($mes<=7){ 
		if($mes==0){ 
		$b = 31; 
		} 
		else if($mes%2==0){ 
		$b = 30; 
		} 
		else{ 
		$b = 31; 
		} 
		} 
		else if($mes>7){ 
		if($mes%2==0){ 
		$b = 31; 
		} 
		else{ 
		$b = 30; 
		} 
		} 
		if(($anioInicio>$anioActual) || ($anioInicio==$anioActual && $mesInicio>$mesActual) || 
		($anioInicio==$anioActual && $mesInicio == $mesActual && $diaInicio>$diaActual)){ 
		echo "La fecha de inicio ha de ser anterior a la fecha Actual"; 
		}else{ 
		if($mesInicio <= $mesActual){ 
		$anios = $anioActual - $anioInicio; 
		if($diaInicio <= $diaActual){ 
		$meses = $mesActual - $mesInicio; 
		$dies = $diaActual - $diaInicio; 
		}else{ 
		if($mesActual == $mesInicio){ 
		$anios = $anios - 1; 
		} 
		$meses = ($mesActual - $mesInicio - 1 + 12) % 12; 
		$dies = $b-($diaInicio-$diaActual); 
		} 
		}else{ 
		$anios = $anioActual - $anioInicio - 1; 
		if($diaInicio > $diaActual){ 
		$meses = $mesActual - $mesInicio -1 +12; 
		$dies = $b - ($diaInicio-$diaActual); 
		}else{ 
		$meses = $mesActual - $mesInicio + 12; 
		$dies = $diaActual - $diaInicio; 
		} 
		} 
		return "Meses: ".$meses." - Días: ".$dies; 
		}
	}
}
?>