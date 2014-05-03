/**
 * 
 */

$(function(){
    
    var vars = {
        //contenedor_opciones: '#adminEstaContentBox',
        btn_save : '#btnSave',
        btn_cancel: '#btnCancel',
        
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
            this.save();
        },
        listOption : function() {            
            $(vars.param_parameter).attr('disabled',true);            
            $.ajax({
                url: 'parametros.php',
                data : {op : 'lista_json'},
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
        save: function() {
            $(vars.btn_save).unbind();
            $(vars.btn_save).bind('click', function() {           
                var array = new Array();
                array.parameter = $(vars.param_parameter).val();
                array.alarmMin = $(vars.param_alarMin).val();
                array.alarmMax = $(vars.param_alarMax).val();
                array.background = $(vars.param_background).val();
                //console.log(this); 
                
                
                Slot.data.push(array);
                console.log('array',array);
                console.log("addl data",Slot.data);
                
                console.log("___",Slot.data[1].parameter);
                
            });  
            
            /*
            $(vars.edit_class).unbind();
            $(a).bind('click', function() {
                $(vars.content_form_edit).html('');
                $(vars.content_form_edit).addClass('loading');
                var id = $(this).attr('rel');
                $.ajax({
                    url: '/admin/opciones/editar-opcion',
                    type: 'GET',
                    dataType: 'html',
                    data: {
                        id : id
                    },
                    success: function (html) {
                        $(vars.content_form_edit).removeClass('loading');
                        $(vars.content_form_edit).html(html);
                        $(vars.btn_cancelar).bind('click', function() {
                            $('.closeWM').trigger('click', null);
                        })
                        Opciones.validFields();
                    }
                })
            })
            */
        }

    };
    
    //
    Slot.listOption();
    Slot.init();
    
    
});