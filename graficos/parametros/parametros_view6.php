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
                                    <select name="param_1" id="param_1" class="form-control input-sm param"
                                    onchange="obj.loadDatagraf()">
                                        <option value="" selected="selected">- select 1</option>
                                    </select>
                                    <div class="hide">i-tems</div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <select name="param_2" id="param_2" class="form-control input-sm param"
                                    onchange="obj.loadDatagraf()">
                                        <option value="" selected="selected">- select 2</option>
                                    </select>
                                    <div class="hide">i-tems</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6 col-xs-6">
                                    <select name="param_3" id="param_3" class="form-control input-sm param"
                                    onchange="obj.loadDatagraf()">
                                        <option value="" selected="selected">- select 3</option>
                                    </select>
                                    <div class="hide">i-tems</div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <select name="param_4" id="param_4" class="form-control input-sm param"
                                    onchange="obj.loadDatagraf()">
                                        <option value="" selected="selected">- select 4</option>
                                    </select>
                                    <div class="hide">i-tems</div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6 col-xs-6">
                                    <select name="param_5" id="param_5" class="form-control input-sm param"
                                    onchange="obj.loadDatagraf()">
                                        <option value="" selected="selected">- select 5</option>
                                    </select>
                                    <div class="hide">i-tems</div>
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
                                        <option value=">1000">>1000</option>
                                        
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

                <div id = "graf" class="col-md-9 column" style="height: 600px">...<br>

                </div>
            </div>

            <div class="row">
                <div class="col-md-9"><!--col-md-8--></div>
            </div>
        </div> <!-- /container -->
        <script type="text/javascript" src="../public/vendor/jquery/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../public/bootstrap/js/bootstrap.min.js"></script>
        <!-- graficos char-->
        <script src="../public/vendor/highcharts/highcharts.js"></script>
        <script src="../public/vendor/highcharts/modules/exporting.js"></script>        
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
                        if (value.slot != '0110') {
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
    };
    Slot.prototype.loadDatagraf = function() {
        var self = this,        
        $param = $(self.get('param'));

        // 01 : get datos basicos : creo array de parametros con datos
        for(var i = 1; i <= $param.length; i++) {            
            var dom = $('#param_'+i).next();
            var id = $('#param_'+i).val();
            getDataBySlot(dom, id, 10);            

        }

        // function ayuda
        function getDataBySlot (dom, idSlot, limit) {
            var $dom = dom
            $dom.text('');
            $.ajax({
                url: self.get('url'),
                data : {op : 'getSlot', slot : idSlot, limit : limit},
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    var array = new Array;                  
                    if (typeof(data) == 'object') {
                        for (var i = 0; i < data.length;i++) {                           
                            $dom
                                .append($("<span></span>")
                                .text(data[i].valor));
                        }                        
                    }
              
                }
            });

        };
    },
    Slot.prototype.graf = function() {
        var self = this,
        $fieldset = $(self.get('fieldset')),
        $param = $(self.get('param')),
        series = new Array();        

        // 01 : get datos basicos : creo array de parametros con datos
        for(var i = 1; i <= $param.length; i++) {
            var title = $('#param_'+i+' option:selected').text(),
                id = $('#param_'+i).val(),
                $dom = $('#param_'+i),
                item = $dom.next().children(),
                dataValues = new Array();

            if (item.length > 0) {
                for (var a = 0; a < item.length; a++) {
                    console.log('vaaal',item[a].innerHTML);
                    dataValues.push(parseFloat(item[a].innerHTML));
                }
            }
            series.push({name:title, data:dataValues, id:id});
        }


        // 02 : cargar data serie 
        var series0 = [
            {
                name: 'C1',
                data: [0, 1, 2, 3, 4, 5, 6,7, 8, 9, 10, 11, 12, 13]
            }, 
            {
                name: 'C2',
                data: [52916.9, 173, 64, 43, 133, 75, 64,213, 14, 133, 55, 74, 10, 120]
            },
            {
                name: 'C3',
                data: [529170, 73, 64, 143, 33, 75, 64,313, 14, 33, 155, 74, 110, 120]
            },
            {
                name: 'TOTAL GAS',
                data: [13, 14, 133, 55, 224, 130, 320,513, 14, 33, 55, 174, 10, 120]
            }            
            ];
        var real = [
            {
                name: 'C1', //1212
                data: [52902.6, 52903.5, 52905.3, 52906.2, 52908.0, 52908.9]
            }, 
            {
                name: 'C2', //1213
                data: [35268.4, 35269.0, 35270.2, 35270.8, 35272.0, 35272.6]
            },
            {
                name: 'C3', //1214
                data: [2470.3, 2470.3, 2470.5, 2470.5, 2470.6,2470.8]
            },
            {
                name: 'TOTAL GAS', //0140
                data: [90635, 90637, 90640, 90641, 90644, 90646, 50000]
            }            
            ];


        console.log(series.length);
        console.log("series",series);
        console.log("series0",series0);


        // init char
        $('#graf').highcharts({
            chart: {
                type: 'spline',
                inverted: true,
                events: {
                    load: function() {/*    
                        // set up the updating of the chart each second
                        var series = this.series[0];
                        setInterval(function() {
                            console.log("heleleel");
                            var x = (new Date()).getTime(), // current time
                                y = Math.random();
                            series.addPoint([x, y], true, true);
                        }, 1000);*/
                    }
                }                
            },
            title: {
                text: 'Graf'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                /*x: -150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                */
            },
            exporting: {
                enabled: false
            },
            xAxis: {
                categories: []
            },
            yAxis: {
                title: {
                    text: 'Prufundidad (pies)'
                },
                labels: {
                    formatter: function() {
                        return this.value;
                    }
                },
                min: 0
            },
            plotOptions: {
                area: {
                    fillOpacity: 0.5
                }
            },
            series: series//real
        });
        // end char





    }
    // ----- End Class

    // application
    var obj = new Slot();    
    obj.listOption();

    $("#btnSee").click(function(){
        console.log("click");
        //obj.loadDatagraf();
        obj.graf();
    });
    
        </script>
    </body>
</html>