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
    /*$order = (!empty($_REQUEST['order'])) ? $_REQUEST['order'] : '';
    $limit = (!empty($_REQUEST['limit'])) ? $_REQUEST['limit'] : '';
    $idSlot = (!empty($_REQUEST['idSlot'])) ? $_REQUEST['idSlot'] : '';   
    
    if ($type == 'json') {
        $data = listParameter($order, $limit, $idSlot);
        echo json_encode($data);
    } else {
        return $data;
    }*/
} else if($op == 'update_parametros') {
    /*$idSlot = (!empty($_REQUEST['idSlot'])) ? $_REQUEST['idSlot'] : '';
    $min = (!empty($_REQUEST['min'])) ? $_REQUEST['min'] : '';
    $max = (!empty($_REQUEST['max'])) ? $_REQUEST['max'] : '';      
        updateParameter($idSlot, $min, $max);*/

        
} else if($op == 'listaPorSlot') {
    $idSlot = (!empty($_REQUEST['slot'])) ? $_REQUEST['slot'] : '';
    //$max = (!empty($_REQUEST['max'])) ? $_REQUEST['max'] : '';     
    listaPorSlot($idSlot);
} else {
    //echo "...";  
} 

function listaPorSlot($slot) 
{
    $myPdo = MyPdo::getInstance();
    $conn  = $myPdo->getConnect();
    $sql = "select valor, fecha from datos where slot = ".$slot." ORDER BY id_lectura DESC LIMIT 1";
    $sql_string = $sql;
    $stmt = $conn->prepare($sql_string);
    
    $stmt->execute();
    $rs = $stmt->fetchAll();
    $conn = NULL;
    echo json_encode($rs);
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
function listParameter($order="ASC", $limit = 50, $idSlot='')
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
    FROM slots ";
    if (!empty($idSlot)) {
        $sql .= "WHERE slots.slot = $idSlot ";    
    }
    if (!empty($order)) {
        $sql .= "ORDER BY slots.name $order ";    
    }    
    
    
    if (!empty($limit) ) {
        $sql .= "LIMIT $limit ";  
    }
    

    $stmt = $conn->prepare($sql);    
    $stmt->execute();
    $rs = $stmt->fetchAll();
    $conn = NULL;    
    return $rs;
}

function updateParameter($idSlot, $min='', $max='')
{
    $myPdo = MyPdo::getInstance();
    $conn  = $myPdo->getConnect();
    $sql = "UPDATE slots SET min = '$min', max = '$max' WHERE slot = '$idSlot' ";

    $sqlString = $sql;    
    $stmt = $conn->prepare($sqlString);    
    $stmt->execute();
}