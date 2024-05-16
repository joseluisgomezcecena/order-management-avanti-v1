<!-- Core css -->
<link href="<?php // echo base_url() ?>assets/css/app.min.css" rel="stylesheet">
<style>
    body{
        font-family: Arial, sans-serif;
        font-size: 7px;
        /*display: none;*/
    }

    #application{
        display:none;
    }

    .btn-screen{
        display: block;
        margin-bottom: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
    }
    
    @media print {

        #application{
            display:block;
        }

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

        .btn-screen{
            display: none;
        }
    }
</style>
<button class="btn btn-primary btn-screen">Imprimir</button>

<div id="application">

    <div style="text-align:center" class="text-center">
        <p style="font-size:9px; padding-top:1px; padding-bottom:1px;">Procedimiento del sistema de calidad</p>
        <p style="font-size:10px; font-weight:800; padding-top:1px;" class="bolder">Proceso de preparación de nuevas ordenes de trabajo</p>
    
    </div>



    <img src="<?php echo base_url() ?>assets/images/logowide.png" alt="logo" style="width: 250px; margin-bottom:10px;">
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

    </table>
        

    <br><br/>


        
        <?php foreach ($operations as $operation): ?>

            <?php
                // Fetch saved data for this operation from the database
                $saved_data = $this->Projects_model->get_saved_data($operation['po_operation_id'], $operation['po_project_id']); //Added po_project_id to the function call
            ?>

            <table class="table" colspan="12">
                
                <tr>
                    <td class="orange-print" colspan="12"><b><?php echo $operation['operation_name'] ?></b></td>
                </tr>
                <tr>
                    <td colspan="12" class="" style="padding-top: 5px; padding-bottom: 5px; text-bolder; background-color:#c9c9c9"><b style="font-size:14px; padding:10px;">Area de procesos</b></td>
                </tr>
                <tr>
                    <td colspan="2">Hora de inicio:<br><?php echo isset($saved_data['hora_inicio']) ? $saved_data['hora_inicio'] : "" ?></td>
                    <td colspan="2">Hora de termino:<br><?php echo isset($saved_data['hora_termino']) ? $saved_data['hora_termino'] : "" ?></td>
                    
                    <td colspan="2">
                        Realizo:<br>
                        <?php echo isset($saved_data['realizo']) ? $saved_data['realizo'] : "" ?>
                        <br>
                        <?php 
                            //get the signature image of the user
                            if (isset($saved_data['realizo'])) {
                                $signature = $this->User_model->get_user_signature($saved_data['realizo']);
                                if ($signature) {
                                    echo "<img src='" . base_url() . $signature['signature'] . "' style='width:70px; height:32px;'>";
                                }
                            }

                        ?>
                </td>
                    
                    <td colspan="2">
                        Reviso:<br>
                        <?php echo isset($saved_data['reviso']) ? $saved_data['reviso'] : "" ?><br>
                        <?php 
                            //get the signature image of the user
                            if (isset($saved_data['reviso'])) {
                                $signature = $this->User_model->get_user_signature($saved_data['reviso']);
                                if ($signature) {
                                    echo "<img src='" . base_url() . $signature['signature'] . "' style='width:70px; height:32px;'>";
                                }
                            }

                        ?>
                    </td>
                    <td colspan="2">Fecha:<br></td>
                    <td colspan="2">
                        Entrego:<br>
                        <?php echo isset($saved_data['entrego']) ? $saved_data['entrego'] : "" ?><br>
                        <?php 
                            //get the signature image of the user
                            if (isset($saved_data['entrego'])) {
                                $signature = $this->User_model->get_user_signature($saved_data['entrego']);
                                if ($signature) {
                                    echo "<img src='" . base_url() . $signature['signature'] . "' style='width:70px; height:32px;'>";
                                }
                            }

                        ?>
                    </td>
                </tr>


                <?php  
                    $contador = 0;
                    foreach ($operation['custom_fields'] as $custom_field):
                        $contador++;
                        if ($contador == 1) {
                            echo "<tr>";
                        } 
                ?>

                    <?php
                        // Fetch saved data for this custom field from the database
                        $saved_custom_field_value = $this->Projects_model->get_saved_custom_field_value($operation['po_operation_id'], $custom_field['customfield_id'], $project['project_id']);
                    ?>
        
            
                    <td colspan="3">
                        <?php echo $custom_field['customfield_label']; ?>

                        

                        <?php 
                        //check if custom field is checkbox.
                        if ($custom_field['customfield_type'] == "checkbox"): ?>
                            <input type="checkbox" name="custom_fields[<?php echo $custom_field['customfield_id']; ?>][value]" value="on" <?php echo isset($saved_custom_field_value['cf_data'])  ? "checked" : ""; ?>>
                        <?php else: ?>
                            <?php echo isset($saved_custom_field_value['cf_data']) ? $saved_custom_field_value['cf_data'] : ""; ?>
                        <?php endif; ?>
                    </td>


                <?php
                    if ($contador == 4) {
                        echo "</tr>";
                        $contador = 0;
                    }
                    endforeach; 
                ?>    


            
                
                <tr>
                    <td colspan="12"  style="padding-top: 5px; padding-bottom: 5px; text-bolder;background-color:rgba(235, 186, 52, .7)"><b style="font-size:14px; padding:10px;">Salida/Entrada de producto</b></td>
                </tr>
                <tr>
                    <td colspan="2">Hora de salida:<br><?php echo isset($saved_data['hora_salida']) ? $saved_data['hora_salida'] : "" ?><br></td>
                    <td colspan="2">
                        Recibio:<br>
                        <?php echo isset($saved_data['recibio']) ? $saved_data['recibio'] : "" ?><br>
                        <?php 
                            //get the signature image of the user
                            if (isset($saved_data['recibio'])) {
                                $signature = $this->User_model->get_user_signature($saved_data['recibio']);
                                if ($signature) {
                                    echo "<img src='" . base_url() . $signature['signature'] . "' style='width:70px; height:32px;'>";
                                }
                            }
                        ?>
                    </td>
                    <td colspan="2">Hora de recibido:<br><?php echo isset($saved_data['hora_recibido']) ? $saved_data['hora_recibido'] : "" ?></td>
                    <td colspan="6">Observaciones</td>
                </tr>
            </table>

            <br><br/>
        <?php endforeach; ?>
</div>


<script>
    //print page
    window.print();

    //on click of the print button
    $(".btn-screen").click(function(){
        window.print();
    });

</script>


           