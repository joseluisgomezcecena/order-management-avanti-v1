<!-- Core css -->
<link href="<?php // echo base_url() ?>assets/css/app.min.css" rel="stylesheet">
<style>
    body{
        font-family: Arial, sans-serif;
        font-size: 7px;
        display: none;
    }
    
    @media print {
        body {
            display: block;
            width: 8.5in;
            height: 11in;
            padding: 0.2in; /* Adjust as needed */
            box-sizing: border-box;
            font-size:7px !important;
            font-family: Arial, sans-serif;
        }
        .card {
            page-break-inside: avoid;
        }
        .table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
            border: 1px solid black;

        }
        
        .orange-print{
            background-color:orange;
        }

        .orange-print-light{
            background-color:rgba(235, 186, 52, .7);
        }

        td{
            border: 1px solid black;
            padding-top: 6px;
            padding-bottom: 6px;
            font-size:9px;
        }
    }
</style>

<div style="text-align:center" class="text-center">
    <p style="font-size:9px; padding-top:1px; padding-bottom:1px;">Procedimiento del sistema de calidad</p>
    <p style="font-size:10px; font-weight:800; padding-top:1px;" class="bolder">Proceso de preparación de nuevas ordenes de trabajo</p>
</div>



<img src="<?php echo base_url() ?>assets/images/logowide.png" alt="logo" style="width: 300px; margin-bottom:10px;">
<!--
<img style="width:150px; float-right" class="img-fluid" src="<?php echo base_url("uploads/projects/") . $project['main_image'] ?>" alt=""></td>
-->


<table class="table talbe-bordered">
    <tr>
        <td colspan="12" class="orange-print" style="padding-top: 5px; padding-bottom: 5px; text-bolder"><b style="font-size:14px; padding:10px;">HOJA DE TALLER</b></td>
    </tr>
    
    <tr>
        <td colspan="3">No.<b><?php echo $project['project_id'] ?></b></td>
        <td colspan="3" >Fecha: <?php echo date_format(date_create($project['date']), "M/d/Y")  ?></td>
        <td colspan="6" class="bold">Cliente: <?php echo $project['client_name'] ?> </td>
    </tr>

    <tr>
        <td colspan="6">Proyecto: <?php echo $project['project_name'] ?> </td>
        <td colspan="6">Requiere instalación: Si <span style="display: inline-block; width:10px; height:10px; border:solid 1px;"><?php echo ($project['installation_required'] == 1) ? "&nbsp;X" : "&nbsp;"; ?></span>  No <span style="display: inline-block; width:10px; height:10px; border:solid 1px;"><?php echo ($project['installation_required'] != 1) ? "&nbsp;X" : "&nbsp;"; ?></span></td>
    </tr>
    
    <tr>
        <td colspan="6">Dirección: <?php echo ($project['address'] != "") ? $project['address'] : "N/A"; ?></td>
        <td colspan="6">Usuario: <?php echo $project['user'] ?> </td>
    </tr>

    <tr>
        <td colspan="3">Area: <?php echo $project['area'] ?></td>
        <td colspan="3">Cantidad de piezas: <?php echo $project['qty'] ?></td>
        <td colspan="3">Unidades de trabajo: <?php echo $project['work_units'] ?></td>
        <td colspan="3">Aprobo: <?php echo $project['approved_by'] ?></td>
    </tr>
    <tr>
        <td colspan="8" class="" style="padding-top: 5px; padding-bottom: 5px; text-bolder; background-color:#c9c9c9"><b style="font-size:14px; padding:10px;">Area de procesos</b></td>
        <td colspan="4"  style="padding-top: 5px; padding-bottom: 5px; text-bolder;background-color:rgba(235, 186, 52, .7)"><b style="font-size:14px; padding:10px;">Salida/Entrada de producto</b></td>
    </tr>
</table>
    

<br><br/>

<!--
<table class="table" colspan="10">
    
    <tr>
    <td colspan="1">freui</td>
    <td colspan="2">freui</td>
    <td colspan="2">freui</td>
    <td colspan="2">freui</td>
    <td colspan="3">freui</td>
    </tr>
</table>
-->
    
    <?php foreach ($operations as $operation): ?>

        <?php
            // Fetch saved data for this operation from the database
            $saved_data = $this->Projects_model->get_saved_data($operation['po_operation_id'], $operation['po_project_id']); //Added po_project_id to the function call
        ?>

        <table class="table" colspan="12">
            
            <tr class="orange-print-light">
                <td colspan="2"><b><?php echo $operation['operation_name'] ?></b></td>
                <td colspan="2">Hora de inicio:<br><?php echo isset($saved_data['hora_inicio']) ? $saved_data['hora_inicio'] : "" ?></td>
                <td colspan="2">Hora de termino:<br><?php echo isset($saved_data['hora_termino']) ? $saved_data['hora_termino'] : "" ?></td>
                <td colspan="1">Realizo:<br><?php echo isset($saved_data['realizo']) ? $saved_data['realizo'] : "" ?></td>
                <td colspan="1">Reviso:<br><?php echo isset($saved_data['reviso']) ? $saved_data['reviso'] : "" ?></td>

                <td colspan="1">Fecha:<br></td>
                <td colspan="1">Entrego:<br></td>
                <td colspan="2" rowspan="3">Observaciones:<br></td>
            </tr>

            <tr>
                <td colspan="8">
                    <?php foreach ($operation['custom_fields'] as $custom_field): ?>

                            <?php
                                // Fetch saved data for this custom field from the database
                                $saved_custom_field_value = $this->Projects_model->get_saved_custom_field_value($operation['po_operation_id'], $custom_field['customfield_id'], $project['project_id']);
                            ?>
                        
                            
                            <div class="col-lg-5">
                                <?php echo $custom_field['customfield_label']; ?>

                                

                                <?php 
                                //check if custom field is checkbox.
                                if ($custom_field['customfield_type'] == "checkbox"): ?>
                                    <input type="checkbox" name="custom_fields[<?php echo $custom_field['customfield_id']; ?>][value]" value="on" <?php echo isset($saved_custom_field_value['cf_data'])  ? "checked" : ""; ?>>
                                <?php else: ?>
                                    <?php echo isset($saved_custom_field_value['cf_data']) ? $saved_custom_field_value['cf_data'] : ""; ?>
                                <?php endif; ?>
                                </div>
                               

                    <?php endforeach; ?>
                </td>

                <td colspan="1">Hora de salida:</td>
                <td colspan="1" rowspan="2">Recibio:</td>
            </tr>
            <tr>
                <td colspan="8"></td>
                <td colspan="1">Hora de recibido:</td>
            </tr>
        </table>

       
        <table style="font-size:12px;" class="table table-bordered mt-5 shadow">
        <thead>
            <tr style="background-color:orange;">
                <th colspan="8"><?php echo $operation['operation_name'] ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="background-color:#c9c9c9" colspan="3">Area de procesos.</td>
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
  
  
    <?php endforeach; ?>





<script>
    //print page
    window.print();
</script>





