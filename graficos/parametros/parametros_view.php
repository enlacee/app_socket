<?php
require_once 'parametros.php';
$slot = listParameter("desc",4);
//var_dump($slot); exit;

?>
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
width: 25%;
min-width: 140px;
height: 115px;
padding: 10px;
/*font-size: 10px;*/
line-height: 1.4;
/*text-align: center;*/
border: 1px solid red;
background-color: #f9f9f9;
font-weight: bold;
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
                        <!--<li>cuadro 2</li>
                        <li>cuadro 3</li>
                        <li>cuadro 4</li>
                        <li>cuadro 5</li>-->
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
                                <input type="text" id="alarmMin" value="0" class="form-control" placeholder="0">
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
                        
                    </div>
                    <div class="modal-footer">
                        <button id ="btnSave" type="button" class="btn btn-default" data-dismiss="modal">Save</button>
                        <button id ="btnCancel" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
                }).on('changeColor', function(ev) { console.log("log : "+ev.color.toHex());
                    //bodyStyle.backgroundColor = ev.color.toHex();
                });
            });
        </script>
        <script src="../public/js/parametros/parametros.js"></script>
    </body>
</html>
