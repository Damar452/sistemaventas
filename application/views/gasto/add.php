<!-- Header -->
<div class="header bg-secondary pb-6">
    <div class="container-fluid">
    <div class="header-body">
        <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <h6 class="h2 text-black d-inline-block mb-0">Nuevo Gasto</h6>
            <!-- <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>clientes">Clientes</a></li>
                <li class="breadcrumb-item active">Nuevo</li>
            </ol>
            </nav> -->
        </div>
        <div class="col-lg-6 col-5 text-right">
            <a href="javascript:history.back()" class="btn btn-secondary">Volver</a>
        </div>
        </div>
    </div>
    </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">
    

<div class="row">
        
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Ingrese los datos </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                
                <form action="<?php echo base_url();?>nuevo-gasto/save" method="POST">


                    <div class="row">

                    <div class="col-lg-6">
                        
                            <div class="form-group">
                                <label class="form-control-label">Descripción del gasto</label>
                                <textarea rows="2" name="descripcion" class="form-control <?php echo form_error('descripcion') ? 'is-invalid':''?>" placeholder="Descripción del gasto"><?php echo set_value('descripcion'); ?></textarea>
                                <div class="invalid-feedback"><?php echo form_error('descripcion'); ?></div>
                            </div>


                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Valor del gasto</label>
                                <input type="text" name="valor" class="form-control <?php echo form_error('valor') ? 'is-invalid':''?>" placeholder="Valor del gasto"  value="<?php echo set_value('valor'); ?>">
                                <div class="invalid-feedback"><?php echo form_error('valor'); ?></div>
                            </div>
                        </div>

                        

                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Guardar</button>
                    </div>

                </form>
                </div>
            </div>

        </div>


    </div>
