<script>
    $(document).ready( function () {
        $('#productTable').DataTable();
        $(".nav-product").addClass("active");

        category();

        upload();


                            $( document ).ready( function() {
                    $( "#productTable tbody tr td.stock" ).each( function() {
                    if ( $( this ).text() <= 1 ) {
                    $( this ).parents("tr").addClass( "table-warning" );
                    
                    }
                    });
                    });
        
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

    });


                    $(document).on('click', '#borrar', function (event) {


                         var id = $(this).val();


                            Swal.fire({
                                    title: "Estás por eliminar un producto",
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
                                        url: "<?php echo base_url().'producto/delete/'?>",
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







    function upload(){
        $('.custom-file-input').change(function() {
			var input = event.target;
			var name=this.id;
			var reader = new FileReader();
			reader.onload = function(){

				var dataURL = reader.result;
				var file = input.files[0];
				var form = new FormData();

                $("#img-product").attr('src', dataURL);
                
                $('.custom-file-input').val('');
                
				form.append('picture', file);

                $.ajax({
                    url: '<?php echo base_url(); ?>nuevo-producto/upload',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType:"json",
                    data : form,
                    success: function(resp){
                        Swal.fire({
                            type: resp.type,
                            title: resp.type,
                            text: resp.message
                        });
                    }
                });

			};

			reader.readAsDataURL(input.files[0]);
		});
    }

    function category() {
        $.ajax({
            url: "<?php echo base_url(); ?>product/Main/getData",
            type:"POST",
            dataType:"json",
            success:function(resp){

                var html=new Array();

                $.each(resp,function(key, value){
                    
                    if(value.id ==<?php echo set_value('categoryId') ? set_value('categoryId'): (!empty($category_id) ? $category_id: 0) ?>){
                        html.push('<option  value="'+value.id+'" selected>'+value.name+'</option>');
                    }else{
                        html.push('<option  value="'+value.id+'">'+value.name+'</option>');
                    }

                });

                $("#category").html(html);

            }
        });
    }
</script>