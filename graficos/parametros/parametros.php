<?php
/**
 * List of slot
 */

$op = (!empty($_REQUEST['op'])) ? $_REQUEST['op'] : '';
require_once '../../vendor/class/MyPdo.php';    


if($op == 'lista_json') {
    $myPdo = MyPdo::getInstance();
    $conn  = $myPdo->getConnect();

    $stmt = $conn->prepare('SELECT * FROM slots order by name asc');
    $stmt->execute();
    $rs = $stmt->fetchAll();
    $conn = NULL;

    echo json_encode($rs);    
    
}  else {
   //echo "...";
}



//------------------------------------------------------------------------------

/**
 * Lista slot con datos con 2 dia de intervalo
 * @param type $limit
 * @return type
 */
function view_listSlot($limit = 30)
{
    $myPdo = MyPdo::getInstance();
    $conn  = $myPdo->getConnect();
    //$stmt = $conn->prepare("SELECT * FROM slots order by name asc limit $limit");
    $sql = " 
    SELECT 
    slots.slot,
    slots.name,
    slots.min,
    slots.max,
    AVG(datos.valor) valor

    FROM slots
    LEFT JOIN datos ON slots.slot = datos.slot
    WHERE DATE(datos.fecha) < NOW()
    AND DATE(datos.fecha) > DATE_SUB(NOW(), INTERVAL 2 DAY) -- TIEMPO FILTRO 1 MINUTE  (PROMEDIO DE 1 MIN O 1 HORA)
    GROUP BY slots.slot
    LIMIT $limit";            
    $stmt = $conn->prepare($sql);
    
    $stmt->execute();
    $rs = $stmt->fetchAll();
    $conn = NULL;    
    return $rs;
}