<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script> -->
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />


<!-- Header -->
<div class="header bg-secondary pb-6">
    <div class="container-fluid">
    <div class="header-body">
        <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <h2 class=" text-black d-inline-block mb-0" id="titulo">Balance</h2>
            <h5 id="div_fecha"></h5>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            
            </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
        <a id="print" class="btn btn-success" >Imprimir</a>
            <a href="<?php echo base_url(); ?>ventas" class="btn btn-success" id="volver">Volver</a>
        </div>
        </div>
    </div>
    </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6 ">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card ">
            <div class="card-header">
                
                

            <div class="row pt-4" id="filtro">
                <div class="input-group col-lg-5">
                             <input  id="datepicker" type="text" class="form-control" placeholder="start date" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                </div>


                <div class="input-group col-lg-5">
                             <input  id="datepicker1" type="text" class="form-control" placeholder="finish date" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                </div>

                <div class="input-group col-lg-2">
                <button type="button" id="enviar" class="btn btn-primary">Filtrar <i class="fa fa-filter" aria-hidden="true"></i></button>
                </div>
                    
            </div>
                
            </div>


            <div class="card-body">
                <div class="row">

                   

                    <div class="col-lg-12">

                   
                        <table class="table table-bordered table-sm">
                            <thead class="thead-light">

                            <tr class="bg-secondary" > <!-- encabezado de tabla -->
                    <td colspan="2" class="text-center"><strong><h3>Ventas</h3></strong></td> 
                      </tr>

                                <tr >
                                <th scope="col" style=" width: 50%" class="text-right">Vendido</th>
                                <td  id="venta-v">0000</td>
                                </tr>

                                <tr >
                                <th scope="col" class="text-right">Invertido</th>
                                <td id="venta-i">0000</td>
                                </tr>

                                <tr class="table-success">
                                <th scope="col" class="text-right">ganancia</th>
                                <td id="ganancia">0000</td>
                                </tr>

                            </thead>
                    
                        </table>
                            <br>    

                    
                        <table class="table table-bordered table-sm">
                        <thead class="thead-light">

                        <tr class="bg-secondary" > <!-- encabezado de tabla -->
                    <td colspan="2" class="text-center"><strong><h3>Creditos</h3></strong></td> 
                      </tr>

                            <tr >
                            <th scope="col" style=" width: 50%" class="text-right">Facturado</th>
                            <td id="credito-f">0000</td>
                            </tr>

                            <tr >
                            <th scope="col" class="text-right">Abonado a la fecha</th>
                            <td id="credito-a">0000</td>
                            </tr>

                            <tr >
                            <th scope="col" class="text-right">Invertido</th>
                            <td id="credito-i">0000</td>
                            </tr>

                            <tr class="table-success">
                            <th scope="col" class="text-right">ganancia a la fecha</th>
                            <td id="credito-g">0000</td>
                            </tr>

                        </thead>
                    
                        </table>

                        <br>
                        
                        <table class="table table-bordered table-sm">
                        <thead class="thead-light ">

                        <tr class="bg-secondary" > <!-- encabezado de tabla -->
                    <td colspan="2" class="text-center"><strong><h3>Gastos</h3></strong></td> 
                      </tr>

                            <tr class="table-warning ">
                            <th scope="col" style=" width: 50%" class="text-right" >Gastos</th>
                            <td id="gasto">0000</td>
                            </tr>

                        </thead>
                        
                        </table>

                        <br>
    
                        <table class="table table-bordered table-sm">
                        <thead class="thead-light ">
                        <tr class="bg-secondary" > <!-- encabezado de tabla -->
                    <td colspan="2" class="text-center"><strong><h3>Ganancias Netas</h3></strong></td> 
                      </tr>
                            <tr class="table-success">
                            <th scope="col" style=" width: 50%" class="text-right" ><strong> Ganancia</strong></th>
                            <td id="netas">0000</td>
                            </tr>

                        </thead>
                        
                        </table>


                  
                  
                  

                    </div>
            </div>
            </div>
        </div>
    </div>

   
    </div>



    <script>
                        $('#datepicker').datepicker({
                            format: "dd-MM-yyyy",
                            uiLibrary: 'bootstrap4',
                            autoclose: true,
                            
                        });


                        $('#datepicker1').datepicker({
                            format: "dd-MM-yyyy",
                            uiLibrary: 'bootstrap4',
                            autoclose: true,
                            
                        });


                        $("#datepicker").blur(function(){
                            valor = $('#datepicker').val()
                         console.log(valor);



                     
	});
                     
                    </script>