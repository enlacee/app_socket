<?php 

/**
 * Class Servicio Save data in db.
 */
class Service {
    /**
     *
     * @var type Connection
     */
    protected static $_instance;
    private $conn;

    public static function getInstance() 
    {
      if( self::$_instance === NULL ) {
        self::$_instance = new self();        
      }      
      return self::$_instance;
    }
    
    /**
     * Init process 
     */
    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=free_xploralog', 'root', '123456');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    /**
     * Create Sheme data for database
     * @param String min 4 char
     * @return Array assoc
     */
    public function formatData($dataString)
    {
        $data = array();
        if (isset($dataString) && !empty($dataString) ) {
            
            if (strlen($dataString) > 4 ){
                $data['slot'] = substr($dataString, 0,4);
                $data['valor'] = substr($dataString, 4); //despues de 4
                
            }// [ && , !! ]
        }
        
        return $data;
    }
    
    /**
     * Send Data
     * @param  Array $data SHEMA for database
     * @return [Void] Save in db
     */
    public function saveInDB($data)
    {   
        $flag = false;
        
        if (empty($data) && !is_array($data)) {
            return $flag;
        }
        
        $slot = $data['slot']; //"1206";
        $valor = $data['valor']; //'222735';
        $stmt = $this->conn->prepare('INSERT INTO datos (slot, valor) VALUES(?, ?)');
        try {
            $this->conn->beginTransaction();            
            $stmt->bindValue(1, $slot);
            $stmt->bindValue(2, $valor);
            $stmt->execute();
            $this->conn->commit();
            $flag = true;
        } catch (Exception $exc) {
            echo "rollbackkkk";
            $this->conn->rollBack();
            echo $exc->getTraceAsString();
        }
        
        return $flag;
    }        
}


