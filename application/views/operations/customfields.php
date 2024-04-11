<div class="page-header">
    <h2 class="header-title">Procesos / Operaciones</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
            <a href="<?php echo base_url(); ?>operations" class="breadcrumb-item">Procesos</a>
            <a class="breadcrumb-item" href="<?php echo base_url("operations/update/" . $operation['operation_id']) ?>"><?php echo $operation['operation_name'] ?></a>
            <span class="breadcrumb-item active">Agregar Campos Personalizados</span>
        </nav>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
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
    </div>
</div>


<div class="container-fluid">
    <div class="row">

        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h4>Campos Personalizados</h4>
                    <div class="m-t-25">

                        <div class="row">
                            <div class="col-lg-12">
                                <form action="<?php echo base_url("operations/customfields/" . $operation['operation_id']) ?>" method="post">
                                    <div class="row">
                                        

                                        <div class="form-group col-lg-6">
                                            <label for="customfield_label">Etiqueta del Campo</label>
                                            <input type="text" class="form-control" id="customfield_label" name="customfield_label" placeholder="Etiqueta del Campo" value="<?php echo set_value('customfield_label'); ?>">
                                            <?php echo form_error('customfield_label', '<div class="text-danger">', '</div>'); ?>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label for="customfield_type">Tipo de Campo</label>
                                            <select class="form-control" id="customfield_type" name="customfield_type">
                                                <option value="">Seleccione un tipo de campo</option>
                                                <option value="text" <?php echo set_select('customfield_type', 'text'); ?>>Texto</option>
                                                <option value="number" <?php echo set_select('customfield_type', 'number'); ?>>Número</option>
                                                <option value="date" <?php echo set_select('customfield_type', 'date'); ?>>Fecha</option>
                                                <option value="textarea" <?php echo set_select('customfield_type', 'textarea'); ?>>Área de Texto</option>
                                                <option value="checkbox" <?php echo set_select('customfield_type', 'checkbox'); ?>>Casilla de Verificación</option>
                                            </select>
                                            <?php echo form_error('customfield_type', '<div class="text-danger">', '</div>'); ?>
                                        </div>




                                        <div class="form-group col-lg-12" >
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h4>Campos Personalizados</b></h4>         
                    <div class="m-t-25">
                        <ul class="list-group list-group-flush">
                            <?php foreach ($customfields as $customfield): ?>
                                <li class="list-group-item" id="<?php echo $customfield['customfield_id']; ?>">
                                    <?php echo $customfield['customfield_label']; ?>
                                    <br>
                                    <small class="text-primary">
                                        <?php
                                        switch ($customfield['customfield_type']) {
                                            case 'text':
                                                echo 'Texto';
                                                break;
                                            case 'number':
                                                echo 'Número';
                                                break;
                                            case 'date':
                                                echo 'Fecha';
                                                break;
                                            case 'textarea':
                                                echo 'Área de Texto';
                                                break;
                                            case 'checkbox':
                                                echo 'Casilla de Verificación';
                                                break;
                                        }
                                        ?>
                                    </small>
                                    <form action="<?php echo base_url() ?>operations/delete_customfield/<?php echo $customfield['customfield_id'] ?>/<?php echo $operation['operation_id'] ?>" method="post">
                                        <button type="submit" name="confirm" class="btn btn-sm btn-danger float-right">Eliminar</button>
                                    </form>
                                    
                                </li>
                            <?php endforeach; ?>
                        </ul>                    
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
