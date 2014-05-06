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
        statusTimer : false,
        data : [],
        init : function() {
            console.log("init SLOT");
            this.loadDataInicial();
            
            this.btnSave();

            //this.loadDataSecuencial();
        },
        // 01 : Carga datos inicial configuracion por defecto
        loadDataInicial: function() {
            $.ajax({
                url: vars.url,
                data : {op : 'lista_parametros', type : 'json', order : vars.order, limit : vars.limit},
                type: 'GET',
                dataType: 'json',
                success: function (data){
                    var key = 0;
                    $.each(data, function(key, value) {
                        var array = new Array();
                        array.key = key;                        
                        array.slot = value.slot;
                        array.name = value.name;
                        array.min = value.min;
                        array.max = value.max;
                        array.valor = value.valor;
                        array.background = '';                        
                        Slot.data.push(array);
                        key++;
                    });
                    
                    Slot.render();

                    // Iniciar Timer
                    Slot.statusTimer = true;
                    Slot.loadDataSecuencial();

                }
            });

            // LISTEN CLOSE status || Falta manejar es boton Escape.
            $(".close, #btnClose, #myModal").unbind();
            $(".close, #btnClose, #myModal").bind('click', function() {
                Slot.statusTimer = true;
            });
        },
        // 03 : load data if statusTimer = true
        loadDataSecuencial : function() {
            var status = Slot.statusTimer;
            if (status) {
                setTimeout(function() {
                    console.log("time", "TIMER = " + status);
                    //alert("antes de UPDATE DATABASE");
                    Slot.loadDataServer();
                    Slot.loadDataSecuencial();
                }, 1000);
            } else {
                setTimeout(function() {
                    console.log("time", "TIMER = " + status);
                    Slot.loadDataSecuencial();
                }, 1000);
            }
        },
        loadDataServer : function() {
            $.ajax({
                url: vars.url,
                data : {op : 'lista_parametros', type : 'json', order : vars.order, limit : vars.limit},
                type: 'GET',
                dataType: 'json',
                success: function (rs){                    
                    $.each(rs, function(key, value) {
                        var data = Slot.data;
                        for(var i = 0; i < data.length; i++) {
                            // Encuentra  y actualiza
                            if(value.slot == data[i].slot) {
                                //console.log("encontro y actualizara", value.slot,  value.valor);                                
                                data[i].valor = value.valor;
                                data[i].min = value.min;
                                data[i].max = value.max;
                                //break;
                            }
                        }
                    });
                    Slot.render();
                }
            });            

        },
        // 02 : render vista
        render: function() {
            //console.log("-------------- print slots atuales RENDER ------------");
            //console.log(" Slot.data ",Slot.data);
            //console.log("-------------- print slots atuales RENDER ------------")

            var data = Slot.data;
/*            var html = '';
            html += '<li id="slot_0140" class="text-center slot" data-toggle="modal" data-target="#myModal">';
            html += '<div class="slot-name">TOTAL GAS</div>';
            html += '<div class="slot-code">0140</div>';
            html += '<div class="slot-value">90661</div>';
            html += '<div class="slot-code">feed</div>';
            html += '<div class="">';
            html += '<div class="pull-left">0</div>';
            html += '';
            html += '<div class="pull-right">20000</div>';
            html += '</div>';
            html += '</li>';
            html += '';
*/
            var countData = (data.length < vars.renderNumber) ? data.length : vars.renderNumber;  //data.length;            
            if (countData > 0) {
                $(contentSlot).html('');
                for(var i = 0; i < countData; i++) {
                    var html = '';
                    var style = this.ayuda_renderColor(data[i]);
                    html += '<li id="'+data[i].key+'" data-slot="'+data[i].slot+'" class="text-center slot" data-toggle="modal" data-target="#myModal" '+style+' >';
                    html += '<div class="slot-name">'+data[i].name+'</div>';
                    html += '<div class="slot-code">'+data[i].slot+'</div>';
                    html += '<div class="slot-value">'+data[i].valor+'</div>';
                    html += '<div class="slot-code">feed</div>';
                    html += '<div class="">';
                    html += '<div class="pull-left">'+data[i].min+'</div>';
                    html += '';
                    html += '<div class="pull-right">'+data[i].max+'</div>';
                    html += '</div>';
                    html += '</li>';
                    html += '';                    
                    $(contentSlot).append(html);
                }
            }else {
                $(contentSlot).html("<li>not found data.</li>");    
            }
                     

            // LISTENER DESPUES DE CREAR LOS OBJETOS
            $(".slot").unbind();
            $(".slot").bind('click',function() {                
                $(vars.key).val($(this).attr('id'));
                $(vars.param_parameter_antes).val($(this).attr('data-slot'));
                $(vars.param_parameter).val($(this).attr('data-slot'));
                Slot.statusTimer = false;
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
                var array = new Array();
                array.key = $(vars.key).val();                
                array.slot = $(vars.param_parameter).val();
                array.name = $(vars.param_parameter+" option:selected").text();
                array.min = $(vars.param_alarMin).val() || 0;
                array.max = $(vars.param_alarMax).val() || 0;
                array.background = $(vars.param_background).val();

                Slot.statusTimer = false;
                Slot.ayuda_buscarSlot(array);
                Slot.statusTimer = true;            
                //console.log("-------------- print slots atuales ------------");
                //console.log(" Slot.data ",Slot.data);
                //console.log("-------------- print slots atuales ------------")
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