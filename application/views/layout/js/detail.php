<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<script>

    $(document).ready( function () {
        $("#print").on("click",function(){
            window.print();
        });

  
                 
        var suma = 0;
        $('#abonoTable tr#datos').each(function(){ 
        suma += Number(parseInt($(this).find('td').eq(2).text()))

       
        })
             
            $('#totalabono').text(suma);
        // parseInt($(this).find('td').eq(2).text())


                $("#abono").keyup(function () {
                    var value = $(this).val();
                    
                    if (value != '' && value > 0){

                        $("#guardar").removeAttr('disabled');

                    
                        }   else {

                            $("#guardar").attr('disabled', 'disabled');
                        } 
                    }).keyup();
               

              
                    $(document).on("click","#guardar", function(){

               
                
                        var id = $("#id_credito").val();
                        var abono = $("#abono").val();

                        $.ajax({
                                url: "<?php echo base_url(); ?>credito-abono",
                                type: "POST",
                                dataType:"json",
                                data:{id:id,abono:abono},

                               
                                
                            });



                            location.reload();    


                     
           
               


                });

                

                total = Number($("#total").val());
                        abonado = Number($("#totalabono").text());

                        if (abonado >= total){

                        $('.container').hide();               // hubo que moverlo para que funcionara cuando fuera cero   
                        $('#print').removeAttr('hidden');
                        } 



                

        


    });


          





</script>