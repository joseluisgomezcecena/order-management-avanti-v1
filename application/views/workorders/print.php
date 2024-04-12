<!-- Core css -->
<link href="<?php // echo base_url() ?>assets/css/app.min.css" rel="stylesheet">
<style>
    @media print {
        body {
            width: 8.5in;
            height: 11in;
            padding: 0.2in; /* Adjust as needed */
            box-sizing: border-box;
            font-size:10px;
        }
        .card {
            page-break-inside: avoid;
        }
        .table {
            width: 100%;
            table-layout: fixed;
            border:solid 1px;
        }
        .orange-print{
            background-color:orange;
        }
        td{
            border-right:solid 1px;
        }
    }
</style>

<div class="card mt-5">
    <div class="card-body">

    

        <table class="table table-bordered">
            <tr>
                <td class="orange-print"><b style="font-size:18px;">HOJA DE TALLER</b></td>
            </tr>
        </table>
        <table class="table table-bordered">
            <tr>
                <td >No. <b><?php echo $project['project_id'] ?></b></td>
                <td ><?php echo date_format(date_create($project['date']), "M-d-Y")  ?></td>
                <td colspan="3" class="bold">Cliente: <?php echo $project['client_name'] ?> </td>
                <td colspan="3"><img style="width:150px;" class="img-fluid" src="<?php echo base_url("uploads/projects/") . $project['main_image'] ?>" alt=""></td>
            </tr>
        </table>
        <table class="table table-bordered">
            <tr>
                <td class="bold">Proyecto: <?php echo $project['project_name'] ?> </td>
                <td colspan="1">Requiere instalación: <?php echo ($project['installation_required'] == 1) ? "Si" : "No"; ?></td>
                <td colspan="1">Dirección: <?php echo ($project['address'] != "") ? $project['address'] : "N/A"; ?></td>
                <td class="bold">Usuario: <?php echo $project['user'] ?> </td>
            </tr>
        </table>
            
            <tr>
                <td colspan="1">Area: <?php echo $project['area'] ?></td>
                <td>Cantidad de piezas: <?php echo $project['qty'] ?></td>
                <td>Unidades de trabajo a relizar/fabricar: <?php echo $project['work_units'] ?></td>
                <td>Aprobo: <?php echo $project['approved_by'] ?></td>
            </tr>
        </table>

    
    <?php foreach ($operations as $operation): ?>

        <?php
            // Fetch saved data for this operation from the database
            $saved_data = $this->Projects_model->get_saved_data($operation['po_operation_id'], $operation['po_project_id']); //Added po_project_id to the function call
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
                    <td>Recibio: <input type="text" class="form-control" name="recibio" value="<?php echo isset($saved_data['recibio']) ? $saved_data['recibio'] : "" ?>"></td>
                </tr>
               
                
            
            <!--shared fields form-->


            <tr style="background-color:rgba(235, 213, 52, .7);">
                <th colspan="7">Campos de operación</th>
            </tr>           
            <tr style="width: 100%">
                <?php foreach ($operation['custom_fields'] as $custom_field): ?>

                            <?php
                                // Fetch saved data for this custom field from the database
                                $saved_custom_field_value = $this->Projects_model->get_saved_custom_field_value($operation['po_operation_id'], $custom_field['customfield_id'], $project['project_id']);
                            ?>
                        
                            <input type="hidden" name="operation_id" value="<?php echo $operation['po_operation_id'] ?>">
                            <td>
                                <?php echo $custom_field['customfield_label']; ?>

                                

                                <?php 
                                //check if custom field is checkbox.
                                if ($custom_field['customfield_type'] == "checkbox"): ?>
                                    <input type="checkbox" name="custom_fields[<?php echo $custom_field['customfield_id']; ?>][value]" value="on" <?php echo isset($saved_custom_field_value['cf_data'])  ? "checked" : ""; ?>>
                                <?php else: ?>
                                    <input type="<?php echo $custom_field['customfield_type'] ?>" class="form-control" name="custom_fields[<?php echo $custom_field['customfield_id']; ?>][value]" value="<?php echo isset($saved_custom_field_value['cf_data']) ? $saved_custom_field_value['cf_data'] : ""; ?>">
                                <?php endif; ?>
                            </td>
                               
                <?php endforeach; ?>
            </tr>
           
        </tbody>
    </table>
    </form>
  
    <?php endforeach; ?>



    </div>
</div>




<script>
    //print page
    window.print();
</script>





