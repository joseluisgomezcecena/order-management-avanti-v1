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
        <h4>Orden: WO-<?php echo $project['project_id'] ?></h4>

        <!-- echo flash messages -->
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Operación exitosa!</strong> <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>


        <div class="row mb-5">
            <div class="col-lg-3">
                <?php echo $project['client_name'] ?>
            </div>
            <div class="col-lg-3">
                <?php echo $project['project_name'] ?>
            </div>
        </div>


        <table class="table table-bordered">
            <tr>
                <td class="bold">HOJA DE TALLER</td>
                <td>No. <?php echo $project['project_id'] ?></td>
                <td><?php echo date_format(date_create($project['date']), "M-d-Y")  ?></td>
                <td><img style="width:150px;" class="img-fluid" src="<?php echo base_url("uploads/") . $project['main_image'] ?>" alt=""></td>
            </tr>
            <tr>
                <td class="bold">Cliente: <?php echo $project['client_name'] ?> </td>
                <td colspan="3">Requiere instalación: <?php echo ($project['installation_required'] == 1) ? "Si" : "No"; ?></td>
            </tr>
            <tr>
                <td class="bold">Usuario: <?php echo $project['user'] ?> </td>
                <td colspan="3">Dirección: <?php echo ($project['address'] != "") ? $project['address'] : "N/A"; ?></td>
            </tr>
            <tr>
                <td class="bold">Proyecto: <?php echo $project['project_name'] ?> </td>
                <td colspan="3">Area: <?php echo $project['area'] ?></td>
                
            </tr>
            <tr>
                <td>Cantidad de piezas: <?php echo $project['qty'] ?></td>
                <td>Unidades de trabajo a relizar/fabricar: <?php echo $project['work_units'] ?></td>
                <td>Aprobo: <?php echo $project['approved_by'] ?></td>
            </tr>
        </table>

    
    <?php foreach ($operations as $operation): ?>
    <table style="font-size:12px;" class="table table-bordered mt-5 shadow">
        <thead>
            <tr style="background-color:orange;">
                <th colspan="7"><?php echo $operation['operation_name'] ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="background-color:#c9c9c9" colspan="4">Area de procesos.</td>
                <td style="background-color:rgba(235, 186, 52, .7)" colspan="3">Salida/Entrada de producto.</td>
            </tr>
            
            <!--shared fields form-->
            <form action="<?php echo base_url("workorders/update/" . $project['project_id']) ?>" method="post">
                <input type="hidden" name="operation_id" value="<?php echo $operation['po_operation_id'] ?>">
                <tr>
                    <td>Hora de inicio: <input type="text" class="form-control datepicker-input" id="date_<?php echo rand(1,100) ?>" name="hora_inicio" placeholder="Fecha"></td>
                    <td>Hora de termino: <input type="text" class="form-control datepicker-input" id="date_<?php echo rand(1,100) ?>" name="hora_termino" placeholder="Fecha"> </td>
                    <td>Realizo: <input type="text" class="form-control" name="realizo"> </td>
                    <td>Reviso: <input type="text" class="form-control" name="reviso"></td>

                    <td>Fecha: <input type="text" class="form-control" name="fecha"></td>
                    <td>Entrego: <input type="text" class="form-control" name="entrego"></td>
                    <td colspan="3">Observaciones: <textarea class="form-control" name="observaciones"></textarea></td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td>Hora de salida: <input type="text" class="form-control datepicker-input" id="date_<?php echo rand(1,100) ?>" name="hora_salida" placeholder="Fecha"></td>
                    <td>Hora de recibido: <input type="text" class="form-control datepicker-input" id="date_<?php echo rand(1,100) ?>" name="hora_recibido" placeholder="Fecha"></td>
                    <td>Recibio: <input type="text" class="form-control" name="recibio"></td>
                </tr>
            </form>
            <!--shared fields form-->


            <tr style="background-color:rgba(235, 213, 52, .7);">
                <th colspan="7">Campos de operación</th>
            </tr>           
            <tr style="width: 100%">
                <?php foreach ($operation['custom_fields'] as $custom_field): ?>
                        <form action="<?php echo base_url("workorders/update/" . $project['project_id']) ?>" method="post">
                            <input type="hidden" name="operation_id" value="<?php echo $operation['po_operation_id'] ?>">
                            <td>
                                <?php echo $custom_field['customfield_label']; ?>
                                <input type="<?php echo $custom_field['customfield_type'] ?>" class="form-control" name="custom_fields[<?php echo $custom_field['customfield_id']; ?>][value]">
                            </td>
                        </form>
                        <!--    
                        <td>
                            <?php echo $custom_field['customfield_label']; ?>
                            <input type="<?php echo $custom_field['customfield_type'] ?>" class="form-control" name="custom_fields[<?php echo $custom_field['customfield_id']; ?>][value]">
                        </td>
                        -->               
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table>
  
    <?php endforeach; ?>



    </div>
</div>













<!--
<?php // foreach ($sharedfields as $sharedfield): ?>
                            <?php // if ($sharedfield['shared_operation_id'] == $operation['operation_id']): ?>
                                <td><?php // echo $sharedfield['shared_id'] ?></td>
                                <td><?php // echo $sharedfield['shared_id'] ?></td>
                                <td><?php // echo $sharedfield['shared_id'] ?></td>
                            <?php // endif; ?>
                            -->