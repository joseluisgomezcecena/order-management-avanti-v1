<div class="page-header">
    <h2 class="header-title">Nuevo Proceso</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
            <a class="breadcrumb-item" href="<?php echo base_url("operations") ?>">Procesos</a>
            <span class="breadcrumb-item active">Nuevo Proceso</span>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4>Proceso</h4>
        <div class="m-t-25">

             <!-- echo flash messages -->
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>¡Operación exitosa!</strong> <?php echo $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error</strong> <?php echo $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>

            

            <form action="<?php echo base_url("projects/create") ?>" method="post">
                <div class="row">
                    
                    <div class="form-group col-lg-6">
                        <label for="project_name">Proyecto o nombre del proyecto</label>
                        <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Proyecto o nombre del proyecto" value="<?php echo set_value('project_name'); ?>">
                        <?php echo form_error('project_name', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="client_id">Cliente</label>
                        <input type="text" class="form-control" id="client_id" name="client_id" placeholder="Cliente" value="<?php echo set_value('client_id'); ?>">
                        <?php echo form_error('client_id', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="installation_required">Requerimiento de instalacion</label>
                        <input type="text" class="form-control" id="installation_required" name="installation_required" placeholder="Requerimiento de instalacion" value="<?php echo set_value('installation_required'); ?>">
                        <?php echo form_error('installation_required', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="qty">Cantidad</label>
                        <input type="text" class="form-control" id="qty" name="qty" placeholder="Cantidad" value="<?php echo set_value('qty'); ?>">
                        <?php echo form_error('qty', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="date">Fecha</label>
                        <input type="text" class="form-control" id="date" name="date" placeholder="Fecha" value="<?php echo set_value('date'); ?>">
                        <?php echo form_error('date', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="user">Usuario</label>
                        <input type="text" class="form-control" id="user" name="user" placeholder="Usuario" value="<?php echo set_value('user'); ?>">
                        <?php echo form_error('user', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="area">Area</label>
                        <input type="text" class="form-control" id="area" name="area" placeholder="Area" value="<?php echo set_value('area'); ?>">
                        <?php echo form_error('area', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="work_units">Unidades de trabajo a realizar/fabricar</label>
                        <input type="text" class="form-control" id="work_units" name="work_units" placeholder="Unidades de trabajo a realizar/fabricar" value="<?php echo set_value('work_units'); ?>">
                        <?php echo form_error('work_units', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="approved_by">Aprobado por</label>
                        <input type="text" class="form-control" id="approved_by" name="approved_by" placeholder="Aprobado por" value="<?php echo set_value('approved_by'); ?>">
                        <?php echo form_error('approved_by', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>    
            </form>
        </div>
    </div>
</div>