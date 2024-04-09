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
                <td class=""><b style="font-size:18px;">HOJA DE TALLER</b></td>
                <td>No. <b><?php echo $project['project_id'] ?></b></td>
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

        <?php
            // Fetch saved data for this operation from the database
            $saved_data = $this->Projects_model->get_saved_data($operation['po_operation_id']);
        ?>

        <form action="<?php echo base_url("workorders/create/" . $project['project_id']) ?>" method="post">
        <table style="font-size:12px;" class="table table-bordered mt-5 shadow">
        <thead>
            <tr style="background-color:orange;">
                <th colspan="7"><?php echo $operation['operation_name'] ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="background-color:#c9c9c9" colspan="2">Area de procesos.</td>
                <td style="background-color:rgba(235, 186, 52, .7)" colspan="5">Salida/Entrada de producto.</td>
            </tr>
            
            <!--shared fields form-->
            
                <input type="hidden" name="operation_id" value="<?php echo $operation['po_operation_id'] ?>">
                <tr>
                    <td>Hora de inicio: <input type="datetime-local" class="form-control"  name="hora_inicio" placeholder="Hora de inicio" value="<?php echo isset($saved_data['hora_inicio']) ? $saved_data['hora_inicio'] : "" ?>"></td>
                    <td>Hora de termino:<input type="datetime-local" class="form-control"  name="hora_termino" placeholder="Hora de termino" value="<?php echo isset($saved_data['hora_termino']) ? $saved_data['hora_termino'] : "" ?>" > </td>
                    
                    <!--
                    <td>Fecha: <input type="text" class="form-control datepicker-input" name="fecha"></td>
                    -->
                    <td>Entrego: <input type="text" class="form-control" name="entrego" value="<?php echo isset($saved_data['entrego']) ? $saved_data['entrego'] : "" ; ?>"></td>
                    <td colspan="2">Observaciones: <textarea class="form-control" name="observaciones"><?php echo isset($saved_data['observaciones']) ? $saved_data['observaciones'] : "" ?></textarea></td>
                </tr>
                <tr>
                    <td>Realizo: <input type="text" class="form-control" name="realizo" value="<?php echo isset($saved_data['realizo']) ? $saved_data['realizo'] : "" ?>"></td>
                    <td>Reviso: <input type="text" class="form-control" name="reviso" value="<?php echo isset($saved_data['reviso']) ? $saved_data['reviso'] : "" ?>"></td>

                    <td>Hora de salida: <input type="datetime-local" class="form-control"  name="hora_salida" placeholder="Hora de salida" value="<?php echo isset($saved_data['hora_salida']) ? $saved_data['hora_salida'] : "" ?>"></td>
                    <td>Hora de recibido: <input type="datetime-local" class="form-control"  name="hora_recibido" placeholder="Hora de recibido" value="<?php echo isset($saved_data['hora_recibido']) ? $saved_data['hora_recibido'] : "" ?>"></td>
                    <td>Recibio: <input type="text" class="form-control" name="recibio" value="<?php echo isset($saved_data['recibido']) ? $saved_data['recibido'] : "" ?>"></td>
                </tr>
               
                
            
            <!--shared fields form-->


            <tr style="background-color:rgba(235, 213, 52, .7);">
                <th colspan="7">Campos de operación</th>
            </tr>           
            <tr style="width: 100%">
                <?php foreach ($operation['custom_fields'] as $custom_field): ?>

                            <?php
                                // Fetch saved data for this custom field from the database
                                $saved_custom_field_value = $this->Projects_model->get_saved_custom_field_value($operation['po_operation_id'], $custom_field['customfield_id']);
                            ?>
                        
                            <input type="hidden" name="operation_id" value="<?php echo $operation['po_operation_id'] ?>">
                            <td>
                                <?php echo $custom_field['customfield_label']; ?>
                                <input type="<?php echo $custom_field['customfield_type'] ?>" class="form-control" name="custom_fields[<?php echo $custom_field['customfield_id']; ?>][value]" value="<?php echo isset($saved_custom_field_value['cf_data']) ? $saved_custom_field_value['cf_data'] : ""; ?>">
                            </td>
                               
                <?php endforeach; ?>
            </tr>
            <tr>
                <td colspan="7">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </td>
            </tr>
        </tbody>
    </table>
    </form>
  
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