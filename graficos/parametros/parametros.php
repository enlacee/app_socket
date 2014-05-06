<?php
/**
 * List of slot
 */

$op = (!empty($_REQUEST['op'])) ? $_REQUEST['op'] : '';
$type = (!empty($_REQUEST['type'])) ? $_REQUEST['type'] : '';

require_once '../../vendor/class/MyPdo.php';    


if ($op == 'listaCombo_json') {
    listSlotComboBox();
    
} else if ($op == 'lista_parametros') {
    $order = (!empty($_REQUEST['order'])) ? $_REQUEST['order'] : 'asc';
    $limit = (!empty($_REQUEST['limit'])) ? $_REQUEST['limit'] : 30;
    $parameter = (!empty($_REQUEST['parameter'])) ? $_REQUEST['parameter'] : '';
    
    if ($type == 'json') {
        $data = listParameter($parameter, $order, $limit);
        echo json_encode($data);
    } else {
        return $data;
    }

} else {
    //echo "...";  
} 



//------------------------------------------------------------------------------
/**
* Lista para cargar el combo box (Modal)
*/
function listSlotComboBox($order="ASC") 
{
    $myPdo = MyPdo::getInstance();
    $conn  = $myPdo->getConnect();

    $stmt = $conn->prepare('SELECT * FROM slots order by name asc');
    $stmt->execute();
    $rs = $stmt->fetchAll();
    $conn = NULL;
    echo json_encode($rs);
}


/**
 * Lista slot con datos con 2 dia de intervalo
 * @param type $limit
 * @return type
 */
function listParameter($parameter, $order="ASC", $limit = 30)
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
    (SELECT datos.valor FROM datos WHERE datos.slot = slots.slot ORDER BY datos.fecha DESC limit 1) as valor
    FROM slots    
    ORDER BY slots.name $order
    LIMIT $limit";  

    $stmt = $conn->prepare($sql);    
    $stmt->execute();
    $rs = $stmt->fetchAll();
    $conn = NULL;    
    return $rs;
}