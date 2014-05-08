
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="public/bootstrap/ico/favicon.ico">
        <title>Panel | Parametros</title>
        
        <!-- Custom styles for this template -->
        <link href="../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../public/bootstrap/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style  type="text/css">
.bs-glyphicons-list {
padding-left: 0;
list-style: none;
}    
.bs-glyphicons li {
    /*
width: 12.5%;
font-size: 12px;*/
}    
.bs-glyphicons li {
float: left;
width: 23%;
min-width: 140px;
height: 115px;
padding: 10px;
/*font-size: 10px;*/
line-height: 1.4;
/*text-align: center;*/
border: 1px solid silver;
background-color: #f9f9f9;
font-weight: bold;
margin: 2px;
}
/*
.bs-glyphicons li:hover {
color: #fff;
background-color: #563d7c;
}

.bs-glyphicons .glyphicon {
margin-top: 5px;
margin-bottom: 10px;
font-size: 24px;
}
*/

.slot-name{
    font-size: 15px;
    
}

.slot-code{
    font-size: 12px;    
}

.slot-value{
    font-size: 18px;    
}

</style>
    </head> 
    <body>
        <div class="container">
            <header>
                <div class="row clearfix">
                    <div class="col-md-12 mgTop20">
                    </div>
                </div>
            </header>      


            <div class="container">
                <!--<div class="page-header">
                  <h2>Live Variable Data By Rig <small>DDSLP</small></h2>
                </div>-->
                <div class="bs-glyphicons">
                    <ul id ="contentSlot" class="bs-glyphicons-list">
                        <li id="1" data-slot="0116" class="text-center slot" data-toggle="modal" data-target="#myModal">
                            <div class="slot-name">C1</div>
                            <div class="slot-code">1212</div>
                            <div class="slot-value" id="slot-value">11111</div>
                            <div class="slot-code">feed</div>
                            <div class="">
                                <div class="pull-left">0</div>
                                <div class="pull-right">10000</div>                                    
                            </div>
                        </li>

                        <li id="2" data-slot="0116" class="text-center slot" data-toggle="modal" data-target="#myModal">
                            <div class="slot-name">TOTAL DEPTH</div>
                            <div class="slot-code">0108</div>
                            <div class="slot-value" id="slot-value">11111</div>
                            <div class="slot-code">feed</div>
                            <div class="">
                                <div class="pull-left">0</div>
                                <div class="pull-right">10000</div>                                    
                            </div>
                        </li>

                        <li id="3" data-slot="0116" class="text-center slot" data-toggle="modal" data-target="#myModal">
                            <div class="slot-name">ROP</div>
                            <div class="slot-code">0113</div>
                            <div class="slot-value" id="slot-value">11111</div>
                            <div class="slot-code">feed</div>
                            <div class="">
                                <div class="pull-left">0</div>
                                <div class="pull-right">10000</div>                                    
                            </div>
                        </li>

                        <li id="4" data-slot="0123" class="text-center slot" data-toggle="modal" data-target="#myModal">
                            <div class="slot-name">STROKE 1</div>
                            <div class="slot-code">0123</div>
                            <div class="slot-value" id="slot-value">11111</div>
                            <div class="slot-code">feed</div>
                            <div class="">
                                <div class="pull-left">0</div>
                                <div class="pull-right">10000</div>                                    
                            </div>
                        </li> 



                    </ul>
                </div>
            </div>
        </div> <!-- /container -->  
        
        <!-- modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content col-md-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Select Parameter in Modal</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <input type="hidden" id="key" name ="key" value ="">
                            <input type="hidden" id="parameter_antes" name ="parameter_antes" value ="">
                            <div class="col-md-4"><label>Select a Parameter</label></div>
                            <div class="col-md-6">
                                <select name="parameter" id ="parameter" class="form-control input-sm">
                                    <option value="">-</option>                              
                                </select>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-md-4"><label>Alarm Min</label></div>
                            <div class="col-md-6">
                                <input type="text" id="alarmMin" value="" class="form-control" placeholder="0">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-md-4"><label>Alarm Max</label></div>
                            <div class="col-md-6">
                                <input type="text" id="alarmMax" value="" class="form-control" placeholder="1000" >
                            </div>
                        </div>                          
                        
                        
                        <div class="row form-group">
                            <div class="col-md-4"><label>Background Color</label></div>
                            <div class="col-md-4">
                                <div class="input-group colorpicker-component demo demo-auto colorpicker-element">
                                    <input type="text" id="background" value="#ff0000" class="form-control"  >
                                    <span class="input-group-addon"><i style="background-color: rgb(0, 0, 0);"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group"></div>
                        <div class="row form-group"></div>
                        <div class="row form-group"></div>
                        <div class="row form-group"></div>                        
                        
                    </div>
                    <div class="modal-footer">
                        <button id ="btnSave" type="button" class="btn btn-default" data-dismiss="modal">Save</button>
                        <button id ="btnClose" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>          
        <script type="text/javascript" src="../public/vendor/jquery/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../public/bootstrap/js/bootstrap.min.js"></script>
        <!-- color picker -->
        <script src="../public/bootstrap/js/bootstrap-colorpicker.js"></script>
        <script type="text/javascript">
$(function() {
    $('.demo-auto').colorpicker({
        //format: 'rgba', // force this forma
    }).on('changeColor', function(ev) { //console.log("log : "+ev.color.toHex());
        //bodyStyle.backgroundColor = ev.color.toHex();
    });
});
        </script>
        <script type="text/javascript">
/*


        // lista de todos los slots
        var objSlotData = [
            {key:1, slot:'1212', nombre:'uno', min:'0', max:'10000', color:'red', valor:''},
            {key:2, slot:'1212', nombre:'dos', min:'0', max:'10000', color:'red', valor:''},
            {key:3, slot:'1212', nombre:'tres', min:'0', max:'10000', color:'red',valor:''}
        ];


        

       loadTimer();      
        function loadTimer() {

        //--      
        var arraySlot = [{1:'1212'},{2:'0108'},{3:'0113'},{4:'0123'}];
        console.log('arraySlot',arraySlot);

        var parametro = arrayToString(arraySlot);


            $.ajax({
                url: 'parametros.php',
                //data : {op : 'listaPorSlot', slot : '1212'},
                data : {op : 'listaPorSlot', slot : parametro},
                type: 'GET',
                dataType: 'json',
                success: function (rs){
                    
                    var data = rs[0];
                    var name = 'slot_';
                    var array = arraySlot;
                    var contador = 1;
                    for (var i=0; i<array.length; i++) {
                        var node = $("#"+contador).children();
                        var named = name+array[i][contador];
                        node[2].innerHTML = show_props(data, named) || '-';
                        contador++;
                    }
                 
                }
            }); 
            
        setTimeout(function() {
           loadTimer(); 
        }, 1000);            
            
            
        }
        */

        //------------------------------------------------------------------------------
        //------------------------------------------------------------------------------
        // todo a string
        function arrayToString(arraySlot)
        {
           var string = '';
           var contador = 1;
            for(var i=0; i < arraySlot.length;i++) {                
                if (arraySlot.length == i) {
                    string += arraySlot[i][contador];
                } else {
                    string += arraySlot[i][contador]+',';
                }
                contador++;
            }            
            return string;
        }

        function show_props(obj, objName) { 
            var result = ""; 
            for (var i in obj) {
                if ( i == objName) {
                result = obj[i];                
                break;
                }             
            }
           return result; 
        }


        </script>
        
        
        
        <script>
/**
 * 
 */

$(function(){
    
    var vars = {
        //contenedor_opciones: '#adminEstaContentBox',
        url : 'parametros.php',        
        contentSlot : "#contentSlot",
        btn_save : '#btnSave',
        
        key : '#key',
        param_parameter_antes : '#parameter_antes',
        param_parameter : '#parameter',
        param_alarMin : '#alarmMin',
        param_alarMax : '#alarmMax',
        param_background: '#background',

        // variables select
        order : 'DESC',
        limit : 40,
        renderNumber : 16,
    };

    var Slot = {
        statusTimer : true,
        data : [],
        arraySlot : [{1:'1212'},{2:'0108'},{3:'0113'},{4:'0123'}],
        init : function() {
            console.log("init SLOT");
            this.loadDataSecuencial();            
            this.btnSave();
        },
        // 03 : load data if statusTimer = true
        loadDataSecuencial : function() {
            var status = Slot.statusTimer;
            if (status) {
                setTimeout(function() {
                    console.log("time", "TIMER = " + status);
                    //alert("antes de UPDATE DATABASE");
                    Slot.loadTimer();
                    Slot.loadDataSecuencial();
                }, 1000);
            } else {
                setTimeout(function() {
                    console.log("time", "TIMER = " + status);
                    Slot.loadDataSecuencial();
                }, 1000);
            }
        },
        loadTimer : function() {    
            var arraySlot = Slot.arraySlot;            
            var parametro = arrayToString(arraySlot);
            $.ajax({
                url: 'parametros.php',                
                data : {op : 'listaPorSlot', slot : parametro},
                type: 'GET',
                dataType: 'json',
                success: function (rs){
                    var data = rs[0];
                    var name = 'slot_';
                    var array = arraySlot;
                    var contador = 1;
                    for (var i=0; i<array.length; i++) {
                        var node = $("#"+contador).children();
                        var named = name+array[i][contador];
                        node[2].innerHTML = show_props(data, named) || '-';
                        contador++;
                    }
                }
            });
        },
        // Cargar combo box (slots que existen)
        listOption : function() {            
            $(vars.param_parameter).attr('disabled',true);            
            $.ajax({
                url: 'parametros.php',
                data : {op : 'listaCombo_json'},
                type: 'GET',
                dataType: 'json',
                success: function (data){                   
                    $.each(data, function(key, value) {
                        $(vars.param_parameter)
                            .append($("<option></option>")
                            .attr("value", value.slot)
                            .text(value.name)); 
                    });                    
                    $(vars.param_parameter).attr('disabled',false);
                }
            });
            
            // LISTENER DESPUES DE CREAR LOS OBJETOS
            $(".slot").unbind();
            $(".slot").bind('click',function() {                
                $(vars.key).val($(this).attr('id'));
                $(vars.param_parameter_antes).val($(this).attr('data-slot'));
                $(vars.param_parameter).val($(this).attr('data-slot'));
                Slot.statusTimer = false;
            });
            $(".close, #btnClose, #myModal").unbind();
            $(".close, #btnClose, #myModal").bind('click', function() {
                Slot.statusTimer = true;
            });            
        },

        // clar variables del formulario
        clearForm: function() {             
            $(vars.param_parameter).val('');
            $(vars.param_alarMin).val('');
            $(vars.param_alarMax).val('');
            $(vars.param_background).val('');
        },        
        btnSave : function() {
            $(vars.btn_save).unbind();
            $(vars.btn_save).bind('click', function() {                
                var id = $(vars.key).val();               
                var node = $("#"+id).children();                
                //DATA
                var array = new Array();
                array.key = $(vars.key).val();                
                array.slot = $(vars.param_parameter).val();
                array.name = $(vars.param_parameter+" option:selected").text();
                array.min = $(vars.param_alarMin).val() || 0;
                array.max = $(vars.param_alarMax).val() || 0;
                array.background = $(vars.param_background).val();                
                //ENDDATA            
                
                $("#"+id).attr('data-slot', array.slot);                
                node[0].innerHTML = array.name
                node[1].innerHTML = array.slot;
                node[2].innerHTML = '-';
                node[4].children[0].innerHTML = array.min;                
                node[4].children[1].innerHTML = array.max;                
                //CAMBIAR LA PETICION
                var arraySlot = Slot.arraySlot; // arraySlot[0][1] console.log("arraySlot[i][contador] ",arraySlot[(id-1)][id]);
                arraySlot[(id-1)][id] = array.slot;

                //Slot.ayuda_buscarSlot(array);
                Slot.clearForm();
            });
        },

        ayuda_buscarSlot : function(slot) {
            var data = this.data;
            var flag = false;
            // buscar y actualizar
            for(var i = 0; i < data.length; i++) {
                // Encuentra  y actualiza
                if (data[i].key == slot.key) {                    
                    data[i].name = slot.name;
                    data[i].slot = slot.slot;
                    data[i].min = slot.min; //(slot.min) ? slot.min : data[i].min;
                    data[i].max = slot.max;  //(slot.max) ? slot.max : data[i].max;
                    data[i].background = slot.background; //(slot.background) ? slot.background : data[i].background;
                    flag = true;
                    // update en DB
                    if(slot.min !== 0 && slot.max !== 0){
                        Slot.ayuda_updateSlot(data[i]);    
                    }
                    
                    break;
                }
            }
            this.data = data;
            return flag;
        },
        ayuda_updateSlot : function(slot){
            $.ajax({
                url: vars.url,
                data : {op : 'update_parametros', idSlot : slot.slot, min:slot.min ,max:slot.max},
                type: 'GET',
                dataType: 'json',
                success: function (data){

                }
            });
        },
        ayuda_renderColor : function (slot) {

            var htmlStyle = '';
            /*if (slot.slot=="0140") {
                console.log("0140", slot);
            }*/

            //numeros
            //slot.valor = parseInt(slot.valor);
            //slot.min = parseInt(slot.min) || 0;
            //slot.max = parseInt(slot.max);

            if ( slot.valor >  slot.min ) {
                if (slot.valor > slot.max) {
                    var color = (slot.background) ? slot.background : 'red';
                    htmlStyle += ' style="background-color: '+color+';" ';                    
                }
              
            } else {
                //htmlStyle += ' style="background-color: gray;" ';
            }           

            return htmlStyle
        }




    };
    
    //
    Slot.listOption();
    Slot.init();
    
    
});        
        </script>
        
    </body>
</html>
