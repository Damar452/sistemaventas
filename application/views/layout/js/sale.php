<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<script>
        $(document).ready( function () {

            $('#saleTable').DataTable();
            $('#credictTable').DataTable();
            $(".nav-sale").addClass("active");

            $("#subtotal").prop( "disabled", true );
            $("#voucherIgv").prop( "disabled", true );
            $("#igv").prop( "disabled", true );
            $("#total").prop( "disabled", true );
            $("#voucherId").prop( "disabled", true );
            $("#clientId").prop( "disabled", true );

            <?php if($this->session->flashdata("success")):?>
            Swal.fire({
                position: 'top-end',
                type: 'success',
                title: '<?php echo $this->session->flashdata("success"); ?>',
                showConfirmButton: false,
                timer: 2000
            })
            <?php endif; ?>

            <?php if($this->session->flashdata("error")):?>
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: '<?php echo $this->session->flashdata("error") ?>',
                })
            <?php endif; ?>
            
            voucher("Factura")
            search();

            $(document).on("click",".btn-remove", function(){
                $(this).closest("tr").remove();
                update();
            });


            $( document ).ready( function() {
                    $( "#credictTable tbody tr" ).each( function() {
                        
                       if (  Number($(this).find("td:eq(3)").text()) > Number($(this).find("td:eq(4)").text())  ) {
                           
                        $( this ).addClass( "table-danger" );

                       } 
                        
                 
                    });
                    });




            $(document).on("keyup",".list-product #cant", function(){
                cant = Number($(this).val());
                price = Number($(this).closest("tr").find("td:eq(2)").text());
                stock = Number($(this).closest("tr").find("td:eq(3)").text());
                if (cant <= stock) {
                    importe = cant*price;
                    $(this).closest("tr").find("td:eq(5)").text(importe);
                    update();
                    } else  {

                        Swal.fire({
                    type: 'error',
                    title: 'La cantidad supera el Stock',
                    text: '<?php echo $this->session->flashdata("error") ?>',
                             });
                  

    

                    }
                
            });

            $(document).on("keyup","#discount", function(){
                update();
            });

            $(".btn-voucher").on("click", function(){
                voucher($(this).html());
            });

            $(".list-client tr").on("click", function(){   
                $(".btn-inner--text").html($(this).find("td:eq(0)").text());
                $("#clientId").val(this.id);

                // aqui no hay problema
            });




            $("#btnSave").on("click", function(){ 

                if($("#tipo_venta").val() != "")
                     {
                subtotal=$("#subtotal").val();
                igv=$("#subtotal").val();
                discount=$("#discount").val();
                total=$("#total").val();
                clientId=$("#clientId").val();
                voucherId= "1";
                estado=$("#tipo_venta").val();
                    
                //corregido el cliente
         
             

                ids=new Array();
                $(".list-product").find('tr').each (function() {
                    ids.push($(this).find("td:eq(0)").text());
                });     
                
                prices=new Array();
                $(".list-product").find('tr').each (function() {
                    prices.push($(this).find("td:eq(2)").text());
                });     

                cants=new Array();
                $(".list-product").find('tr').each (function() {
                    cants.push($(this).find("#cant").val());
                }); 

                sale(subtotal,igv,discount,total,clientId,voucherId,estado,ids,prices,cants);

                     } else {

                    Swal.fire({
                    type: 'error',
                    title: 'Debe seleccionar un tipo de transaccion',
                    text: '<?php echo $this->session->flashdata("error") ?>',
                             });
                     }
            
            });



            
        });


                    $(document).on('click', '#borrar', function (event) {


                    var id = $(this).val();


                    Swal.fire({
                            title: "Estás por ejecutar una devolucion",
                            text: "¿Estás seguro?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Sí, eliminar",
                            cancelButtonText: "Cancelar",
                        })
                        .then(resultado => {
                            if (resultado.value) {
                                $.ajax({
                                url: "<?php echo base_url(); ?>eliminar-factura",
                                type: "POST",
                                dataType:"json",
                                data:{id:id},
                            });

                            location.reload(); 
                            
                            } else {
                                // Dijeron que no
                                console.log("*NO se elimina la venta*");
                            }
                        });



                         });



        function search(){
            $("#search-product").autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>sale/Main/getData",
                        type: "POST",
                        dataType:"json",
                        data:{ name: request.term},
                        success: function($data){
                            response($data);
                        }
                    });
                },
                minLength:1, // cantidad de letras minima para buscar
                select:function(event, ul){

                    var html='<tr>'+
                        '<td>'+ul.item.id+'</td>'+
                        '<td>'+ul.item.label+'</td>'+
                        '<td>'+ul.item.price+'</td>'+
                        '<td>'+ul.item.stock+'</td>'+
                        '<td><input id="cant" type="text" class="form-control" value="1" ></td>'+
                        '<td>'+ul.item.price+'</td>'+
                        '<td><button class="btn btn-icon btn-danger btn-remove" type="button"><span class="btn-inner--icon"><i class="ni ni-fat-remove ni-lg"></i></span></button></td>'
                        '</tr>';

                    $(".list-product").append(html);
                    update();
                },
            });
        }




        function voucher(name){
            $.ajax({
                url: "<?php echo base_url(); ?>sale/Main/voucherData",
                type: "POST",
                dataType:"json",
                data:{name:name},
                success: function(resp){

                    $("#dropdownMenuButton").html("Factura");
                    $("#voucherId").val(1);
                    $("#voucherIgv").val(0);
                    update();
                }
            });       
        }




        function update(){
            subtotal = 0;

            $(".list-product tr").each(function(){
                subtotal = subtotal + Number($(this).find("td:eq(5)").text());
            });
            
            $("#subtotal").val(subtotal);

            porcentajeIgv = $("#voucherIgv").val();
            igv = subtotal * (porcentajeIgv/100);
            $("#igv").val(igv);

            descuento = $("#discount").val();
            total = subtotal - descuento;
            $("#total").val(total);
        }




        function sale(subtotal,igv,discount,total,clientId,voucherId,estado,ids,prices,cants){
            $.ajax({
                url: "<?php echo base_url();?>nuevo-venta/save",
                type: "POST",
                dataType:"json",
                data:{subtotal:subtotal,igv:igv,discount:discount,total:total,clientId:clientId,voucherId:voucherId,estado:estado,ids:ids,prices:prices,cants:cants },
                success: function(resp){
                    
                    Swal.fire({
                        type: resp.type,
                        title: 'Oops...',
                        text: resp.message

                        
                    });

                   
                },
                error: function(){

                    $.ajax({
                    url: "<?php echo base_url();?>nuevo-venta/ver",
                    type: "POST",
                                success: function(resp){
                                        if (estado == 1){
                                window.location="<?php echo base_url(); ?>ventas/"+resp;
                                 } else if(estado == 0){
                                    window.location="<?php echo base_url(); ?>credito/"+resp;

                                 }
                               
                                }

                    });
                }
            });

        }

</script>