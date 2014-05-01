<?php 

/**
 * Class Servicio Save data in db.
 */
class Service {
    /**
     *
     * @var type Connection
     */
    public $conn;

    /**
     * Init process 
     */
    public function __construct()
    {
      $this->connection();
    }

    /**
     * Conexion 
     */
    private  function connection()
    {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=free_xploralog', 'root', '123456');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        } 
    
    }
    
    /**
     * Send Data
     * @param  [String] $data [String, response serial]
     * @return [Void]       [description]
     */
    public function saveData($data)
    {	
        
        $slot = '1206';
        $valor = '222735';
        $fecha = date("Y-m-d");
        
        $stmt = $this->conn->prepare('INSERT INTO datos (slot, valor, fecha) VALUES(?, ?, ?)');
        try {
            $this->conn->beginTransaction();
            
            $stmt->bindValue(1, $slot, PDO::PARAM_STR);
            $stmt->bindValue(2, $valor, PDO::PARAM_INT);
            $stmt->bindValue(3, $fecha, PDO::PARAM_STR);
            $stmt->execute();            
            
            $this->conn->commit();
            
        } catch (Exception $exc) {
            $this->conn->rollBack();
            echo $exc->getTraceAsString();
        }
            
        
        

    }        
}


