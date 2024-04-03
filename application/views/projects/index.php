<div class="page-header">
    <h2 class="header-title">Proyectos</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
            <a class="breadcrumb-item" href="#">Proyectos</a>
            <span class="breadcrumb-item active">Indexar</span>
        </nav>
    </div>
    <!--button that floats to the right-->
    <div class="float-right">
        <a href="<?php echo base_url('projects/create') ?>" class="btn btn-primary">Nuevo Proyecto</a>
    </div>
</div>
<div class="card mt-5">
    <div class="card-body">

        <!-- echo flash messages -->
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Operación exitosa!</strong> <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <table style="font-size:12px; width:100%" id="data-tables" class="table">
            <thead>
                <tr>
                    <th style="width:40px !important;">Id</th>
                    <th style="width:300px !important;">Proyecto</th>
                    <td style="width:150px !important;">Cliente</td>
                    <td style="width:150px;">Usuario</td>
                    <td style="width:150px;">Fecha</td>
                    <td style="width:150px;">Requiere instalación</td>
                    <td style="width:150px;">Dirección</td>
                    <td style="width:150px;">Area</td>
                    <td style="width:150px;">Cantidad de piezas</td>
                    <td style="width:150px;">Unidades de trabajo</td>
                    <td style="width:150px;">Aprobo</td>
                    <th style="width:150px;">Creado</th>
                    <th style="width:150px;">Actualizado</th>
                    <th style="width:150px;">Registro</th>
                    <th style="width:200px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project):?>
                <tr>
                    <td style="width:50px;"><?php echo $project['project_id'] ?></td>
                    <td><a href="<?php echo base_url('projects/' . $project['project_id']) ?>"><?php echo $project['project_name']; ?></a></td>
                    <td><?php echo date_format(date_create($project['created_at']), "M-d-Y H:i:s"); ?></td>
                    <td><?php echo date_format(date_create($project['updated_at']), "M-d-Y H:i:s"); ?></td>
                    <td><?php echo $project['project_user']; ?></td>
                    <td>
                        <a href="<?php echo base_url('projects/update/' . $project['project_id']) ?>" class="btn btn-dark">Editar</a>
                        <a href="<?php echo base_url('projects/delete/' . $project['project_id']) ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><a style="font-weight:lighter;" href="#">Lista imprimible</a></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>