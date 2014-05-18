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
            float: left;
            /*width: 100%;
            min-width: 150px;
            padding: 10px;*/
            min-width: 145px;
            line-height: 1.4;
            border: 2px solid white;
            background-color: #0000AA;
            color: #FFFFFF;
            font-weight: bold;
        }
        .slot-name{
            font-size: 15px;
        }
        .slot-code{
            font-size: 12px;
        }
        .slot-value{
            font-size: 25px;
        }
        /**/
        .column {
            border: 1px solid black;
        }
        </style>
    </head>
    <body><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-3 column">
                    <form name = "graf1" id="graf1">
                        <fieldset name = "fieldset" id = "fieldset">
                            <div class="row">
                                <label class="col-sm-12 control-label">Seleccione Parametros</label>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6 col-xs-6">
                                    <select name="param_1" id="param_1" class="form-control input-sm param">
                                        <option value="" selected="selected">- select 1</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <select name="param_2" id="param_2" class="form-control input-sm param">
                                        <option value="" selected="selected">- select 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6 col-xs-6">
                                    <select name="param_3" id="param_3" class="form-control input-sm param">
                                        <option value="" selected="selected">- select 3</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <select name="param_4" id="param_4" class="form-control input-sm param">
                                        <option value="" selected="selected">- select 4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6 col-xs-6">
                                    <select name="param_5" id="param_5" class="form-control input-sm param">
                                        <option value="" selected="selected">- select 5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="control-label col-sm-6 col-xs-6" for="total_depth">Total depth</label>
                                <div class="col-sm-6 col-xs-6">
                                    <select name="total_depth" id="total_depth" class="form-control input-sm">
                                        <option value="" selected="selected">- select</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="250">250</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-12 col-xs-12">
                                    <button id="btnSee" type="button" class="btn btn-primary col-sm-12 col-xs-12">Ver</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>

                    <!-- lista de parametros -->
                    <hr>
                    <div class="row bs-glyphicons">
                        <ul id="contentSlot" class="bs-glyphicons-list">
                            <li id="1" data-slot="0110" class="col-sm-12 text-center slot" data-toggle="modal" data-target="#myModal" style="background-color: rgb(0, 0, 170);">
                                <div class="slot-name">Bit Depth</div>
                                <div class="slot-code">0110</div>
                                <div class="slot-value" id="slot-value">-</div>
                                <div class="slot-code">feet</div>
                                <div class="">
                                    <div class="pull-left">1</div>
                                    <div class="pull-right">5000</div>
                                </div>
                                <div class="slot-color hidden">#DE0002</div>
                                <div class="slot-bcolor hidden">#000000</div>
                            </li>
                            <li id="1" data-slot="0110" class="text-center slot" data-toggle="modal" data-target="#myModal" style="background-color: rgb(0, 0, 170);">
                                <div class="slot-name">Bit Depth</div>
                                <div class="slot-code">0110</div>
                                <div class="slot-value" id="slot-value">-</div>
                                <div class="slot-code">feet</div>
                                <div class="">
                                    <div class="pull-left">1</div>
                                    <div class="pull-right">5000</div>
                                </div>
                                <div class="slot-color hidden">#DE0002</div>
                                <div class="slot-bcolor hidden">#000000</div>
                            </li>
                            <li id="1" data-slot="0110" class="text-center slot" data-toggle="modal" data-target="#myModal" style="background-color: rgb(0, 0, 170);">
                                <div class="slot-name">Bit Depth</div>
                                <div class="slot-code">0110</div>
                                <div class="slot-value" id="slot-value">-</div>
                                <div class="slot-code">feet</div>
                                <div class="">
                                    <div class="pull-left">1</div>
                                    <div class="pull-right">5000</div>
                                </div>
                                <div class="slot-color hidden">#DE0002</div>
                                <div class="slot-bcolor hidden">#000000</div>
                            </li>
                            <li id="1" data-slot="0110" class="text-center slot" data-toggle="modal" data-target="#myModal" style="background-color: rgb(0, 0, 170);">
                                <div class="slot-name">Bit Depth</div>
                                <div class="slot-code">0110</div>
                                <div class="slot-value" id="slot-value">-</div>
                                <div class="slot-code">feet</div>
                                <div class="">
                                    <div class="pull-left">1</div>
                                    <div class="pull-right">5000</div>
                                </div>
                                <div class="slot-color hidden">#DE0002</div>
                                <div class="slot-bcolor hidden">#000000</div>
                            </li>
                            <li id="1" data-slot="0110" class="text-center slot" data-toggle="modal" data-target="#myModal" style="background-color: rgb(0, 0, 170);">
                                <div class="slot-name">Bit Depth</div>
                                <div class="slot-code">0110</div>
                                <div class="slot-value" id="slot-value">-</div>
                                <div class="slot-code">feet</div>
                                <div class="">
                                    <div class="pull-left">1</div>
                                    <div class="pull-right">5000</div>
                                </div>
                                <div class="slot-color hidden">#DE0002</div>
                                <div class="slot-bcolor hidden">#000000</div>
                            </li>
                        </ul>
                </div>

            </div>

                <div class="col-md-9 column" style="height: 600px">col-md-8<br>

                </div>
            </div>

            <div class="row">
                <div class="col-md-9"><!--col-md-8--></div>
            </div>
        </div> <!-- /container -->
        <script type="text/javascript" src="../public/vendor/jquery/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../public/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript">
    // ----- init Class
    //Constructor
    function Slot() {
        //Atributos de la clase
        this.vars = {
            version : 1.0,
            url : 'parametros.php',
            // variable form
            fieldset : '#fieldset',
            param : '.param',
        };
    }
    //Getters y Setters
    Slot.prototype.get = function(atribute) {
        switch(atribute)
        {
            case 'url':
                return this.vars.url;
            case 'version':
                return this.vars.version;
            case 'fieldset':
                return this.vars.fieldset;
            case 'param':
                return this.vars.param;
        }
    };
    Slot.prototype.set = function(atribute, value) {
        switch(atribute)
        {
            case 'url':
                this.vars.url = value;
                break;
            case 'atributo2':
                this.vars.version = value;
                break;
        }
    };   
    Slot.prototype.listOption = function() {
        var self = this,
        $fieldset = $(self.get('fieldset')),
        $param = $(self.get('param'));
        
        $fieldset.attr('disabled',true);        
        $.ajax({
            url: self.get('url'),
            data : {op : 'listaCombo_json'},
            type: 'GET',
            dataType: 'json',
            success: function (data){
                for (var i = 1; i <= $param.length; i++) {
                    $.each(data, function(key, value) {
                        if (value.slot != '0108') {
                            $('#param_'+i)
                                .append($("<option></option>")
                                .attr("value", value.slot)
                                .text(value.name));
                        }
                    });
                }
                $fieldset.attr('disabled',false);
            }
        });
        
    }
    // ----- End Class

    // application
    var obj = new Slot();    
    obj.listOption();
        </script>
    </body>
</html>