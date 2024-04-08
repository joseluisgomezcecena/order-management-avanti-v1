<div class="page-header">
    <h2 class="header-title">Ordenes de trabajo</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
            <a class="breadcrumb-item" href="#">Ordenes de trabajo</a>
            <span class="breadcrumb-item active">Indexar</span>
        </nav>
    </div>
    <!--button that floats to the right-->
    <div class="float-right">
        <a href="<?php echo base_url('projects/create') ?>" class="btn btn-primary">Actualizar información</a>
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

        <table style="font-size:12px;" id="data-projects" class="table ">
            <thead>
                <tr>
                    <th >Id</th>
                    <th >Proyecto</th>
                    <th >Cliente</th>
                    <th >Usuario</th>
                    <th >Fecha</th>
                    <th >Requiere instalación</th>
                    <th >Dirección</th>
                    <th >Area</th>
                    <th >Cantidad de piezas</th>
                    <th >Unidades de trabajo</th>
                    <th >Aprobo</th>
                    <th >Creado</th>
                    <th >Actualizado</th>
                    <th >Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project):?>
                <tr>
                    <td><?php echo $project['project_id'] ?></td>
                    <td><a href="<?php echo base_url('workorders/' . $project['project_id']) ?>"><?php echo $project['project_name']; ?></a></td>
                    <td><?php echo $project['client_name'] ?></td>
                    <td><?php echo $project['user'] ?></td>
                    <td><?php echo date_format(date_create($project['date']), "M-d-Y");  ?></td>
                    <td><?php echo ($project['installation_required'] == 1) ? 'Si' : 'No'; ?></td>
                    <td><?php echo ($project['address'] != "") ? $project['address'] : 'N/A';  ?></td>
                    <td><?php echo $project['area'] ?></td>
                    <td><?php echo $project['qty'] ?></td>
                    <td><?php echo $project['work_units'] ?></td>
                    <td><?php echo $project['approved_by'] ?></td>
                    <td><?php echo date_format(date_create($project['created_at']), "M-d-Y H:i:s"); ?></td>
                    <td><?php echo date_format(date_create($project['updated_at']), "M-d-Y H:i:s"); ?></td>
                    <td><?php echo $project['user_name']; ?></td>
                    <td>
                        <a href="<?php echo base_url('workorders/update/' . $project['project_id']) ?>" class="btn btn-dark">Actualizar</a>
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