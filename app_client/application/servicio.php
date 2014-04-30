<?php 
/**
 * Intermediario para  enviar datos.
 */
/*
echo "__________argv__________\n";
var_dump($argv);
echo "__________argv__________\n";
*/

//exit;
$cliente = new Servicio($argv);
$cliente->sendData();
echo " respuesta_final ";
var_dump($cliente);



/**
 * Class Servicio
 */
class Servicio {

	public $data;

	/**
	 * Init process 
	 */
	public function __construct($argv)
	{		
		if(isset($argv)) {
			$this->data = $argv;					
		} else {
			echo "No existen parametros : argv";
		}
	}

	/**
	 * Read file file.ini
	 * @return [Array] [data of configuration]
	 */
	private function readConfigFile()
	{
		$ini_array = parse_ini_file("config.ini", true);
		if (!empty($ini_array) && !is_array($ini_array)) {
			echo "configure: congig.ini"; die;
		}
		return $ini_array;
	}

	/**
	 * Send Data
	 * @param  [String] $data [String, response serial]
	 * @return [Void]       [description]
	 */
	public function sendData()
	{	
		$data = $this->data;

		$config = $this->readConfigFile();
		$ip = $config['server']['ip'];
		$port = $config['server']['port'];

		//$client = stream_socket_client("tcp://$addr:80", $errno, $errorMessage);
		$client = stream_socket_client("tcp://$ip:$port", $errno, $errorMessage);
		 
		if ($client === false) {
		    throw new UnexpectedValueException("Failed to connect: $errorMessage");
		}

		// Send information to socket server
		if (is_string($data[1])) {
			$flag = stream_socket_sendto($client, $data[1], STREAM_OOB);	
		} else {			
			/*for ($i = 1; $i < count($data); $i++) {
				$flag = stream_socket_sendto($client, $data[$i], STREAM_OOB);	
			}*/
		}


		// close conexion socket
		fclose($client);

		return $flag;
	}


}


