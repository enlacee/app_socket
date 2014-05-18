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
            width: 100%;
            min-width: 140px;
            height: 115px;
            padding: 10px;
            line-height: 1.4;
            border: 1px solid silver;
            background-color: #f9f9f9;
            font-weight: bold;
            margin: 2px;
        }
        .slot-name{
            font-size: 15px;

        }
        .slot-code{
            font-size: 12px;
        }
        .slot-value{
            font-size: 18px;
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
                    <div class="row">
                        <label class="col-sm-12 control-label">Seleccione Parametros</label>
                    </div>                    
                    <div class="row form-group">                        
                        <div class="col-sm-6 col-xs-6">
                            <select name="param_1" id="tipo_variable" class="form-control input-sm">
                                <option value="" selected="selected">- select 1</option>
                                <option value="1">entero</option>
                                <option value="2">real</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <select name="param_1" id="tipo_variable" class="form-control input-sm">
                                <option value="" selected="selected">- select 2</option>
                                <option value="1">entero</option>
                                <option value="2">real</option>
                            </select>
                        </div>            
                    </div>
                    <div class="row form-group">                        
                        <div class="col-sm-6 col-xs-6">
                            <select name="param_1" id="tipo_variable" class="form-control input-sm">
                                <option value="" selected="selected">- select 3</option>
                                <option value="1">entero</option>
                                <option value="2">real</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <select name="param_1" id="tipo_variable" class="form-control input-sm">
                                <option value="" selected="selected">- select 4</option>
                                <option value="1">entero</option>
                                <option value="2">real</option>
                            </select>
                        </div>            
                    </div>
                    <div class="row form-group">                        
                        <div class="col-sm-6 col-xs-6">
                            <select name="param_1" id="tipo_variable" class="form-control input-sm">
                                <option value="" selected="selected">- select 5</option>
                                <option value="1">entero</option>
                                <option value="2">real</option>
                            </select>
                        </div>           
                    </div>

                    <div class="row form-group">                        
                        <!--<div class="form-group">
                            <label class="col-sm-6 control-label" for="passwordinput">TOTAL DEPTH</label>
                            <div class="controls col-sm-6">
                                <input id="passwordinput" name="passwordinput" type="password" class="form-control input-sm">
                            </div>
                        </div>-->
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
            </div>
                
            <div class="col-md-9 column">col-md-8</div>
            </div>
            
            <div class="row">                
                <div class="col-md-3 column bs-glyphicons clearfix">                    
                        <ul id="contentSlot" class="bs-glyphicons-list">
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
                <div class="col-md-8"><!--col-md-8--></div>
            </div>
        </div> <!-- /container -->
        <script type="text/javascript" src="../public/vendor/jquery/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../public/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript">
        </script>
    </body>
</html>