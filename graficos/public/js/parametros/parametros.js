/**
 * 
 */

$(function(){
    
    var vars = {
        //contenedor_opciones: '#adminEstaContentBox',
        url : 'parametros.php',
        contentSlot : "#contentSlot",
        btn_save : '#btnSave',
        btn_cancel: '#btnCancel',
        
        key : '#key',
        param_parameter_antes : '#parameter_antes',
        param_parameter : '#parameter',
        param_alarMin : '#alarmMin',
        param_alarMax : '#alarmMax',
        param_background: '#background',
        //data : 
        //form_opcion: '#modalOpcion',
    };

    var Slot = {
        data : [],
        init : function() {
            console.log("init SLOT");
            this.loadDataInicial();
            
            this.save();
        },
        // 01 : Carga datos inicial configuracion por defecto
        loadDataInicial: function() {
            $.ajax({
                url: vars.url,
                data : {op : 'lista_parametros', type : 'json', order : 'DESC', limit : 5},
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
                }
            });


        },
        // 02 : render vista
        render: function() {
                console.log("-------------- print slots atuales RENDER ------------");
                console.log(" Slot.data ",Slot.data);
                console.log("-------------- print slots atuales RENDER ------------")

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
            var countData = data.length;            
            if (countData > 0) {
                $(contentSlot).html('');
                for(var i = 0; i < countData; i++) {
                    var html = '';
                    html += '<li id="'+data[i].key+'" data-slot="'+data[i].slot+'" class="text-center slot" data-toggle="modal" data-target="#myModal">';
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
                //console.log(".slot");  console.log("slottt ID", $(this).attr('id'));
                $(vars.key).val($(this).attr('id'));
                $(vars.param_parameter_antes).val($(this).attr('data-slot'));
                $(vars.param_parameter).val($(this).attr('data-slot'));
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
        save: function() {
            $(vars.btn_save).unbind();
            $(vars.btn_save).bind('click', function() {         
                var array = new Array();
                array.key = $(vars.key).val();
                array.slot = $(vars.param_parameter).val();

                //array.name = $(vars.param_parameter).text();

                array.min = $(vars.param_alarMin).val();
                array.max = $(vars.param_alarMax).val();
                array.background = $(vars.param_background).val();
                //console.log(this);                
                
                // Slot.data.push(array); NO SE AGREGA
                Slot.ayuda_buscarSlot(array, array.key);
                console.log("-------------- print slots atuales ------------");
                console.log(" Slot.data ",Slot.data);
                console.log("-------------- print slots atuales ------------")
                Slot.clearForm();
                Slot.render();
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
                    data[i].min = (slot.min) ? slot.min : data[i].min;
                    data[i].max = (slot.max) ? slot.max : data[i].max;
                    data[i].background = slot.background;
                    flag = true;
                    break;
                }
            }
          return flag;
        },



    };
    
    //
    Slot.listOption();
    Slot.init();
    
    
});