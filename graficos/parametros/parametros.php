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

function view_listSlot($limit = 30)
{
    $myPdo = MyPdo::getInstance();
    $conn  = $myPdo->getConnect();
    $stmt = $conn->prepare("SELECT * FROM slots order by name asc limit $limit");
    $stmt->execute();
    $rs = $stmt->fetchAll();
    $conn = NULL;    
    return $rs;
}