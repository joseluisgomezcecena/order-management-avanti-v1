<div class="page-header">
    <h2 class="header-title">Actualizar Proyecto</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
            <a class="breadcrumb-item" href="<?php echo base_url("projects") ?>">Proyectos</a>
            <span class="breadcrumb-item active">Actualizar Proyecto</span>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4>Proyecto</h4>
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



            <form action="<?php echo base_url("projects/update/" . $project['project_id']) ?>" method="post" enctype="multipart/form-data">
                <div class="row">

                    <div class="form-group col-lg-6">
                        <label for="project_name">Proyecto o nombre del proyecto</label>
                        <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Proyecto o nombre del proyecto" value="<?php echo set_value('project_name', $project['project_name']); ?>">
                        <?php echo form_error('project_name', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="client_id">Cliente</label>
                        <select class="select2" id="client_id" name="client_id">
                            <?php foreach ($clients as $client): ?>
                                <option value="<?php echo $client['client_id']; ?>" <?php echo set_select('client_id', $client['client_id'], $client['client_id'] == $project['client_id']); ?>><?php echo $client['client_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('client_id', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-3">
                        <!-- this should be a select-->
                        <label for="installation_required">Requerimiento de instalacion</label>
                        <select class="form-control" id="installation_required" name="installation_required" required>
                            <option value="">Seleccione una opción</option>
                            <option value="1" <?php echo set_select('installation_required', '1', $project['installation_required'] == '1'); ?>>Si</option>
                            <option value="0" <?php echo set_select('installation_required', '0', $project['installation_required'] == '0'); ?>>No</option>
                        </select>
                        <?php echo form_error('installation_required', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="qty">Cantidad</label>
                        <input type="text" class="form-control" id="qty" name="qty" placeholder="Cantidad" value="<?php echo set_value('qty', $project['qty']); ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        <?php echo form_error('qty', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-2">
                        <label for="date">Fecha</label>
                        <div class="input-affix m-b-10">
                            <i class="prefix-icon anticon anticon-calendar"></i>
                            <input type="text" class="form-control datepicker-input" id="date" name="date" placeholder="Fecha" value="<?php echo set_value('date', $project['date']); ?>">
                        </div>
                        <?php echo form_error('date', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="user">Usuario</label>
                        <input type="text" class="form-control" id="user" name="user" placeholder="Usuario" value="<?php echo set_value('user', $project['user']); ?>">
                        <?php echo form_error('user', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="area">Area</label>
                        <input type="text" class="form-control" id="area" name="area" placeholder="Area" value="<?php echo set_value('area', $project['area']); ?>">
                        <?php echo form_error('area', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="work_units">Unidades de trabajo a realizar/fabricar</label>
                        <input type="text" class="form-control" id="work_units" name="work_units" placeholder="Unidades de trabajo a realizar/fabricar" value="<?php echo set_value('work_units', $project['work_units']); ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        <?php echo form_error('work_units', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="approved_by">Aprobado por</label>
                        <input type="text" class="form-control" id="approved_by" name="approved_by" placeholder="Aprobado por" value="<?php echo set_value('approved_by', $project['approved_by']); ?>">
                        <?php echo form_error('approved_by', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="col-lg-12 mb-5">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="main_image">
                            <label class="custom-file-label" for="customFile">Elige una fotografia</label>
                        </div>
                        <small>Solo imagenes JPG, JPEG, GIF O PNG.</small>
                    </div>

                    <div class="form-group col-lg-12 mt-5">
                        <button type="submit" class="btn btn-primary">Guardar y continuar</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>