<script>
    $(document).ready( function () {

        $(".nav-balance").addClass("active");

        $("#print").on("click",function(){
            $('#filtro').hide(); 
            $('#print').hide(); 
            $('#volver').hide(); 
            window.print();
            $('#filtro').show();
            $('#print').show();
            $('#volver').show();
        });

        

        $("#enviar").on("click", function(){

            f1= $('#datepicker').val();
            f2= $('#datepicker1').val();

            if (f1 != "" && f1 != ""){
                

            var fecha1 = new Date(f1);
            var fecha2 = new Date(f2);

            var options = { year: 'numeric', month: 'long', day: 'numeric' };

               fecha1 =  fecha1.toLocaleDateString("es-ES", options)
               fecha2 =  fecha2.toLocaleDateString("es-ES", options)
                

            $('#div_fecha').text(fecha1+" - "+fecha2);
            

        

            $.ajax({
                url: "<?php echo base_url(); ?>balance/Main/filtroBalance",
                type: "POST",
                dataType:"json",
                data:{f1:f1, f2:f2},
                success: function(resp){

                    sum = 0;
                    $.each(resp.inversion_venta, (index, value) =>{
                        mult = Number(value.cants)*Number(value.precio)
                        sum = sum + mult 
                        });

                        $("#venta-v").text(Number(resp.ventas.total));
                        $("#venta-i").text(sum);
                        ganancia = $("#venta-v").text() - $("#venta-i").text();
                        $("#ganancia").text(ganancia);

                        //creditos
                        

                        sum1 = 0;
                    $.each(resp.inversion_credito, (index, value) =>{
                        mult = Number(value.cants)*Number(value.precio)
                        sum1 = sum1 + mult 
                        });

                         $("#credito-f").text(Number(resp.creditos.total));
                         $("#credito-i").text(sum1);
                         $("#credito-a").text(Number(resp.abonado.abonos));
                         credito_g = $("#credito-a").text() - $("#credito-i").text();
                        $("#credito-g").text(credito_g);

                        //gastos

                        $("#gasto").text(Number(resp.gasto.gastos));

                        gasto =  $("#gasto").text();

                        // ganancias netas

                        neta = ganancia + credito_g - gasto
                        $("#netas").text(neta);

                        if (neta == 0 && gasto==0 && credito_g == 0 ){

                            Swal.fire({
                
                            type: 'error',
                            title: 'No se encuentran registros en ese rango de fechas',
                            showConfirmButton: true,
                            
                        })
                        }

                    console.log(neta);
                
                }
            });  

           
        }  else {

            Swal.fire({
                
                type: 'error',
                title: 'Debe escoger un rango de fechas',
                showConfirmButton: true,
                
            })

           

        }

        });




    });

    
            

</script>