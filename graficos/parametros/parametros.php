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
    $idSlot = (!empty($_REQUEST['idSlot'])) ? $_REQUEST['idSlot'] : '';
    $min = (!empty($_REQUEST['min'])) ? $_REQUEST['min'] : 0;
    $max = (!empty($_REQUEST['max'])) ? $_REQUEST['max'] : 0;      
        updateParameter($idSlot, $min, $max);

        
} else if($op == 'listaPorSlot') {
    $idSlot = (!empty($_REQUEST['slot'])) ? $_REQUEST['slot'] : '';
    //$parametro = (!empty($_REQUEST['parametro'])) ? $_REQUEST['parametro'] : '';     
    listaPorSlot($idSlot);
    
} else if($op == 'listaPorSlotCero') {
    $idSlot = (!empty($_REQUEST['slot'])) ? $_REQUEST['slot'] : '';      
    listaPorSlotCero($idSlot);    
} else {
    //echo "...";  
} 


function listaPorSlotCero($slot) 
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

function listaPorSlot($slot) 
{
    $myPdo = MyPdo::getInstance();
    $conn  = $myPdo->getConnect();
    $sqlSlot = getSQLSlot($slot);
    $rs = NULL;
    if (!empty($sqlSlot)){
        $stmt = $conn->prepare($sqlSlot);    
        $stmt->execute();
        $rs = $stmt->fetchAll();        
    }
    $conn = NULL;

    echo json_encode($rs);
}
//------------------------------------------------------------------------------
/**
* Lista para cargar el combo box (Modal)
*/
function listSlotComboBox() 
{
    $myPdo = MyPdo::getInstance();
    $conn  = $myPdo->getConnect();
    // chamge of db
    $conn->exec('USE wellmobil');
    $stmt = $conn->prepare(
    'SELECT 
    id,
    slot,
    parametro AS name,
    medida,
    izquierda AS min,
    valor_final AS max,
    color 
    FROM parametros order by parametro asc');
    
    //$stmt = $conn->prepare('SELECT * FROM slots order by name asc');
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
function listParameter($order="ASC", $limit = 20)
{
    $myPdo = MyPdo::getInstance();
    $conn  = $myPdo->getConnect();
    // chamge of db
    $conn->exec('USE wellmobil');   
    
    $sql = 'SELECT 
    id,
    slot,
    parametro AS name,
    medida,
    izquierda AS min,
    valor_final AS max,
    color 
    FROM parametros order by parametro asc';
    
    if (!empty($limit) ) {
        $sql .= " LIMIT $limit ";  
    }    

    $stmt = $conn->prepare($sql);    
    $stmt->execute();
    $rs = $stmt->fetchAll();
    $conn = NULL;
    
    $respons['data'] = $rs;
    $respons['datajs'] = listParameterJs($rs);
    return $respons;
}

// ayuda array js
function listParameterJs($rs)
{
    $contador = 1;    
    $stringJs = ''; // {1:'1212'},{2:'0108'},{3:'0113'},{4:'0123'}
    if (is_array($rs) && count($rs)) {
        foreach ($rs as $value) {
            $stringJs .= "{".$contador.":'".$value['slot']."'},";
            $contador++;
        }
        $stringJs = substr($stringJs,0,-1);
    }
    return $stringJs;
}

function updateParameter($idSlot, $min=0, $max=0)
{
    if (!empty($idSlot)) {
        $myPdo = MyPdo::getInstance();
        $conn  = $myPdo->getConnect();
        $conn->exec('USE wellmobil'); 
        //$sql = "UPDATE slots SET min = '$min', max = '$max' WHERE slot = '$idSlot' ";
        $sql = "UPDATE parametros set izquierda = '$min', valor_final = '$max' WHERE slot = '$idSlot'";
        $sqlString = $sql;    
        $stmt = $conn->prepare($sqlString);    
        $stmt->execute();
    }
}

//-----------------------------------------------
//-------------------- HELPER -------------------
//-----------------------------------------------

function getSQLSlot($string)
{   
    if (empty($string)) { return ''; } 

    $sql = 'SELECT'; 
    $name = 'slot_';
    if (strpos($string, ',') !== false) {
        $chars = preg_split('/,/', $string);
        foreach ($chars as $key => $value) {
            if (!empty($value)) {
                $named = $name . $value;                
                $sql .= "(SELECT datos.valor FROM datos WHERE datos.slot = '{$value}' ORDER BY datos.id_lectura DESC LIMIT 1) AS '{$named}',";
            }            
        }
        $sql = substr($sql,0,-1);
    } else {
        $named = $name . $string;
        $sql .= "(SELECT datos.valor FROM datos WHERE datos.slot = '{$string}' ORDER BY datos.id_lectura DESC LIMIT 1) AS '{$named}'";        
    }


    $sql .= 'FROM datos LIMIT 1';
    return $sql;
}