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

} else if($op == 'getSlot') { // for : grafico 1
    $idSlot = (!empty($_REQUEST['slot'])) ? $_REQUEST['slot'] : '';
    $limit = (!empty($_REQUEST['limit'])) ? $_REQUEST['limit'] : '';    
    getSlot($idSlot, $limit);

} else if($op == 'getSlotTotalDepth') { // for : grafico 1
    $valor = (!empty($_REQUEST['valor'])) ? $_REQUEST['valor'] : '';
    getSlotTotalDepth($valor);

} else if($op == 'listaPorSlotCero') { // DEMOSS
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

/**
* lista 1 slot (con con # de datos requerido) :: GRAFICO 01
*/
function getSlot($idSlot, $limit = '') {
    $myPdo = MyPdo::getInstance();
    $conn  = $myPdo->getConnect();
    
    $rs = NULL;
    if (!empty($limit)){
        $sql = "SELECT valor,fecha FROM datos WHERE slot = ".$idSlot." ORDER BY id_lectura DESC LIMIT $limit";
        $stmt = $conn->prepare($sql);    
        $stmt->execute();
        $rs = $stmt->fetchAll();        
    }else {
        $sql = "SELECT valor,fecha FROM datos WHERE slot = ".$idSlot." ORDER BY id_lectura DESC LIMIT 1";
        $stmt = $conn->prepare($sql);    
        $stmt->execute();
        $rs = $stmt->fetch();
    }
    $conn = NULL;

    echo json_encode($rs);
}

/**
* lista solo el valor (unicos) total deppht :: GRAFICO 01
*/
function getSlotTotalDepth($valor) {
    $myPdo = MyPdo::getInstance();
    $conn  = $myPdo->getConnect();
    
    $rs = NULL;    
    if (!empty($valor)) {
        if($valor == ">1000") {
            $sql = "SELECT * FROM datos WHERE slot = '0110' AND valor > 1000 GROUP BY (valor)";
        } else {
            $sql = "SELECT * FROM datos WHERE slot = '0110' AND valor <= {$valor} GROUP BY (valor)";    
        }
        
        $stmt = $conn->prepare($sql);    
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