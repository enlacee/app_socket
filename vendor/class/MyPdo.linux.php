<?php 

/**
 * Class Servicio Save data in db.
 */
class MyPdo {
    /**
     *
     * @var type Connection
     */
    protected static $_instance;
    public $conn;

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
            $this->conn = new PDO('mysql:host=localhost;dbname=free_xploralog', 'root', '123456'); //LOCAL
            //$this->conn = new PDO('mysql:host=localhost;dbname=xplora-genesis2014', 'root', 'xploralog'); // SERVER
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
    
    public function getConnect()
    {
        return $this->conn;
    }
}


