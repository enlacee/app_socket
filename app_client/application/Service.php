<?php 

/**
 * Class Servicio Intermediario para  enviar datos al socket servidor.
 */
class Service {

    public $data;

    /**
     * Init load Data 
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
            echo "error configure: congig.ini"; die;
        }
        return $ini_array;
    }

    /**
     * Send Data at server Socket 
     * @return [Boolean]   true if success
     */
    public function sendDataBySocket()
    {	
        $data = $this->data;
        $flag = false;

        $config = $this->readConfigFile();
        $ip = $config['server']['ip'];
        $port = $config['server']['port'];
        
        $client = stream_socket_client("tcp://$ip:$port", $errno, $errorMessage);

        if ($client === false) {
            throw new UnexpectedValueException("Failed to connect: $errorMessage");
        }

        // Send information to socket server
        if (is_string($data)) {
            fwrite($client, $data);
            $flag = true;         	
        }

        // close conexion socket
        fclose($client);

        return $flag;
    }        
}


