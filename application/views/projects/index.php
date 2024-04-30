

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

<div class="">
    <!--inline search form-->
    <form class="form-inline" action="<?php echo base_url('projects') ?>" method="post">
        <div class="form-group m-2">
            <select type="text" class="form-control" name="status" >
                <option value="">Todos los status</option>
                <option value="En proceso">En proceso</option>
                <option value="Pendiente">En Espera</option>
                <option value="Terminado">Completado</option>
            </select>
        </div>
        <div class="form-group m-2">
            <select type="text" class="form-control" name="client" >
                <option value="">Todos los clientes</option>
                <?php foreach ($clients as $client): ?>
                    <option value="<?php echo $client['client_id'] ?>"><?php echo $client['client_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group m-2">
            <input type="text" class="form-control datepicker-input" name="start" placeholder="Fecha Inicial" autocomplete="off">
        </div>
        <div class="form-group m-2">
            hasta
        </div>
        <div class="form-group m-2">
            <input type="text" class="form-control datepicker-input" name="end" placeholder="Fecha Final" autocomplete="off">
        </div>
        <button type="submit" name="search" class="btn btn-primary">Aplicar Filtro</button>
    </form>
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
                    <th>Status</th>
                    <th >Cliente</th>
                    <th >Usuario</th>
                    <th >Fecha</th>
                    <th >Instalación</th>
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
                    <td><a href="<?php echo base_url('projects/' . $project['project_id']) ?>"><?php echo $project['project_name']; ?></a></td>
                    <td><?php echo $project['project_status'] ?></td>
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