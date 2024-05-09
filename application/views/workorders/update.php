<div class="page-header">
    <h2 class="header-title">Ordenes de trabajo</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
            <a class="breadcrumb-item" href="<?php echo base_url("workorders") ?>">Ordenes de trabajo</a>
            <span class="breadcrumb-item active">Orden: WO-<?php echo $project['project_id'] ?></span>
        </nav>
    </div>


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
                <strong>¡Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>


    
    <!--upload files-->
    <form action="<?php echo base_url("workorders/upload_files/" . $project['project_id']) ?>" method="post" enctype="multipart/form-data">
        <div class="custom-file mt-5">
            <input type="file" class="custom-file-input" id="customFile" name="userfile">
            <label class="custom-file-label" for="customFile">Subir Archivos</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3" onclick="this.classList.add('is-loading')"><i class="anticon anticon-cloud"></i> Subir</button>
        
    </form>
</div>
<!--emd header and file upload form-->





<!--display uploaded files-->
<div class="row mb-2">
    <div class="col-lg-12">
        Archivos adjuntos:
    </div>
</div>


<div class="row">
    <?php foreach ($files as $file): ?>
    <div class="col-md-6 col-lg-3">
        <a href="<?php echo base_url("uploads/project_uploads/") . $file['file_name'] ?>" target="_blank">
        <div class="card card-hover">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-orange">
                        <i class="anticon anticon-tool"></i>
                    </div>
                    <div class="m-l-15">
                        <p style="font-size:12px;color:black;" class="m-b-0">
                        <?php 
                        //print only the first 20 characters of the file name
                        echo substr($file['file_name'], 0, 20); 
                        ?>
                        </p>
                        <p style="font-size:12px;" class="m-b-0 text-muted"><i class="anticon anticon-user"></i>: <?php echo $file['file_user'] ?></p>
                        <p style="font-size:12px;" class="m-b-0 text-muted"><i class="anticon anticon-calendar"></i>: <?php echo date_format(date_create($file['created_at']), "m/d/Y H:i")  ?></p>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>
    <?php endforeach; ?>
</div>
<!--end display uploaded files-->







<div class="card mt-5">
    <div class="card-body">
        
        <h4 class="mb-5">
            Hoja de taller electrónica 
            <a href="<?php echo base_url() ?>workorders/print/<?php echo $project['project_id'] ?>" class="btn btn-dark float-right mr-2 ml-2" target="_blank">
                <i class="anticon anticon-edit"></i>&nbsp;Imprimir Plantilla
            </a>
            <a href="<?php echo base_url() ?>workorders/print/<?php echo $project['project_id'] ?>" class="btn btn-primary float-right" target="_blank">
                <i class="anticon anticon-printer"></i>&nbsp;Imprimir
            </a>
        </h4>

        
      



        <div class="row">
            <div class="col-lg-4">
                <h6>Orden:</h6>
                <p><?php echo $project['project_id'] ?></p>
            </div>

            <div class="col-lg-4">
                <h6>Tipo de Proyecto:</h6>
                <p><?php echo ($project['project_type']=='m') ? "Mantenimiento" : "Taller/Construcción" ?></p>
            </div>
            <div class="col-lg-4">
                <h6>Cliente:</h6>
                <p><?php echo $project['client_name'] ?></p>
            </div>
            <div class="col-lg-4">
                <h6>Require Instalación:</h6>
                <p><?php echo ($project['installation_required']== 1) ? "Si" : "No" ?></p>
            </div>

            

            <div class="col-lg-4">
                <h6>Area:</h6>
                <p><?php echo $project['area'] ?></p>
            </div>
            <div class="col-lg-4">
                <h6>Cantidad:</h6>
                <p><?php echo $project['qty'] ?></p>
            </div>
            <div class="col-lg-4">
                <h6>Unidades de trabajo a realizar:</h6>
                <p><?php echo $project['work_units'] ?></p>
            </div>


            <div class="col-lg-4">
                <h6>Aprobado Por:</h6>
                <p><?php echo $project['approved_by'] ?></p>
            </div>
            <div class="col-lg-4">
                <h6>Usuario:</h6>
                <p><?php echo $project['user_name'] ?></p>
            </div>
            <div class="col-lg-4">
                <h6>Registro Creado:</h6>
                <p><?php echo date('M/d/Y H:i:s', strtotime($project['created_at'])); ?></p>
            </div>

            <div class="col-lg-4">
                <h6>Ultima Actualización:</h6>
                <p><?php echo date('M/d/Y H:i:s', strtotime($project['updated_at'])); ?></p>
            </div>
        </div>
      

        









        <div class="m-t-30">
            <ul class="nav nav-tabs">
                <?php foreach ($operations as $operation): ?>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#<?php echo str_replace(' ', '-', $operation['operation_name']);  ?>"><?php echo $operation['operation_name'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>


          
                <div class="tab-content m-t-15 p-25">
                <?php foreach ($operations as $operation): ?>
                    <div class="tab-pane fade show " id="<?php echo str_replace(' ', '-', $operation['operation_name']);  ?>">

                        <?php $saved_data = $this->Projects_model->get_saved_data($operation['po_operation_id'], $operation['po_project_id']); //Added po_project_id to the function call. ?>


                        <form action="<?php echo base_url("workorders/create/" . $project['project_id']) ?>" method="post">
                            <input type="hidden" name="operation_id" value="<?php echo $operation['po_operation_id'] ?>">
                            <h5 style="font-weight: bolder;" class="mb-5">Area de procesos</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group
                                    <?php echo form_error('hora_inicio') ? 'has-error' : '' ?>">
                                        <label for="hora_inicio">Hora de inicio</label>
                                        <input type="datetime-local" class="form-control" id="hora_inicio" name="hora_inicio" placeholder="Hora de inicio" value="<?php echo isset($saved_data['hora_inicio']) ? $saved_data['hora_inicio'] : "" ?>">
                                        <span class="text-danger"><?php echo form_error('hora_inicio'); ?></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group
                                    <?php echo form_error('hora_termino') ? 'has-error' : '' ?>">
                                        <label for="hora_termino">Hora de termino</label>
                                        <input type="datetime-local" class="form-control" id="hora_termino" name="hora_termino" placeholder="Hora de termino" value="<?php echo isset($saved_data['hora_termino']) ? $saved_data['hora_termino'] : "" ?>">
                                        <span class="text-danger"><?php echo form_error('hora_termino'); ?></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group
                                    <?php echo form_error('realizo') ? 'has-error' : '' ?>">
                                        <label for="realizo">Realizo</label>
                                        <!--
                                        <input type="text" class="form-control" id="realizo" name="realizo" value="<?php echo isset($saved_data['realizo']) ? $saved_data['realizo'] : "" ?>">
                                        -->
                                        <select class="form-control" id="realizo" name="realizo">
                                            <option value="">Seleccione</option>
                                            <?php foreach ($users as $user): ?>
                                                <option value="<?php echo $user['username'] ?>" <?php echo isset($saved_data['realizo']) && $saved_data['realizo'] == $user['username'] ? "selected" : "" ?>><?php echo $user['username'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <input type="password" class="form-control mt-3" id="password" name="password" placeholder="Firma con tu contraseña">
                                        <small>* Ingresa tu contraseña para firmar.</small>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group
                                    <?php echo form_error('reviso') ? 'has-error' : '' ?>">
                                        <label for="reviso">Reviso</label>
                                        <select class="form-control" id="reviso" name="reviso">
                                            <option value="">Seleccione</option>
                                            <?php foreach ($users as $user): ?>
                                                <option value="<?php echo $user['username'] ?>" <?php echo isset($saved_data['reviso']) && $saved_data['reviso'] == $user['username'] ? "selected" : "" ?>><?php echo $user['username'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <input type="password" class="form-control mt-3" id="password" name="password" placeholder="Firma con tu contraseña">
                                        <small>* Ingresa tu contraseña para firmar.</small>
                                    </div>
                                </div>
                            </div>


                            <hr>
                            <h5 style="font-weight: bolder;" class="mb-5 bold mt-5">Salida/Entrada de producto</h5>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group
                                    <?php echo form_error('entrego') ? 'has-error' : '' ?>">
                                        <label for="entrego">Entrego</label>
                                        <select class="form-control" id="entrego" name="entrego">
                                            <option value="">Seleccione</option>
                                            <?php foreach ($users as $user): ?>
                                                <option value="<?php echo $user['username'] ?>" <?php echo isset($saved_data['entrego']) && $saved_data['entrego'] == $user['username'] ? "selected" : "" ?>><?php echo $user['username'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <input type="password" class="form-control mt-3" id="password" name="password" placeholder="Firma con tu contraseña">
                                        <small>* Ingresa tu contraseña para firmar.</small>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group
                                    <?php echo form_error('observaciones') ? 'has-error' : '' ?>">
                                        <label for="observaciones">Observaciones</label>
                                        <textarea class="form-control" id="observaciones" name="observaciones"><?php echo isset($saved_data['observaciones']) ? $saved_data['observaciones'] : "" ?></textarea>
                                        <span class="text-danger"><?php echo form_error('observaciones'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group
                                    <?php echo form_error('hora_salida') ? 'has-error' : '' ?>">
                                        <label for="realizo">Hora de Salida</label>
                                        <input type="datetime-local" class="form-control"  name="hora_salida" placeholder="Hora de salida" value="<?php echo isset($saved_data['hora_salida']) ? $saved_data['hora_salida'] : "" ?>">
                                        <span class="text-danger"><?php echo form_error('rhora_salida'); ?></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group
                                    <?php echo form_error('hora_recibido') ? 'has-error' : '' ?>">
                                        <label for="reviso">Hora de Recepción</label>
                                        <input type="datetime-local" class="form-control"  name="hora_recibido" placeholder="Hora de recibido" value="<?php echo isset($saved_data['hora_recibido']) ? $saved_data['hora_recibido'] : "" ?>">
                                        <span class="text-danger"><?php echo form_error('hora_recibido'); ?></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group
                                    <?php echo form_error('recibio') ? 'has-error' : '' ?>">
                                        <label for="recibio">Recibio</label>
                                        <select class="form-control" id="recibio" name="recibio">
                                            <option value="">Seleccione</option>
                                            <?php foreach ($users as $user): ?>
                                                <option value="<?php echo $user['username'] ?>" <?php echo isset($saved_data['recibio']) && $saved_data['recibio'] == $user['username'] ? "selected" : "" ?>><?php echo $user['username'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <input type="password" class="form-control mt-3" id="password" name="password" placeholder="Firma con tu contraseña">
                                        <small>* Ingresa tu contraseña para firmar.</small>
                                    </div>
                                </div>
                            </div>

                            


                        <!--custom fields form-->
                        <hr>
                        <h5 style="color:orange; font-weight: bolder;" class="mb-5 bold mt-5">Campos de operación</h5>
                        <div class="row">
                        <?php $counter = 0; ?>
                        <?php foreach ($operation['custom_fields'] as $custom_field): ?>

                                    <?php
                                        $counter++;
                                        // Fetch saved data for this custom field from the database
                                        $saved_custom_field_value = $this->Projects_model->get_saved_custom_field_value($operation['po_operation_id'], $custom_field['customfield_id'], $project['project_id']);

                                        if ($counter == 1) {
                                            echo "";
                                        }

                                    ?>
                                    
                                
                                    <input type="hidden" name="operation_id" value="<?php echo $operation['po_operation_id'] ?>">
                                    <div class="col-lg-4 mt-2 mb-3">
                                        <?php echo $custom_field['customfield_label']; ?>

                                        

                                        <?php 
                                        //check if custom field is checkbox.
                                        if ($custom_field['customfield_type'] == "checkbox"): ?>
                                            <input type="checkbox" name="custom_fields[<?php echo $custom_field['customfield_id']; ?>][value]" value="on" <?php echo isset($saved_custom_field_value['cf_data'])  ? "checked" : ""; ?>>
                                        <?php elseif($custom_field['customfield_type'] == "number"): ?>
                                            <input type="<?php echo $custom_field['customfield_type'] ?>" step="any" class="form-control" name="custom_fields[<?php echo $custom_field['customfield_id']; ?>][value]" value="<?php echo isset($saved_custom_field_value['cf_data']) ? $saved_custom_field_value['cf_data'] : ""; ?>">
                                        <?php else: ?>
                                            <input type="<?php echo $custom_field['customfield_type'] ?>" class="form-control" name="custom_fields[<?php echo $custom_field['customfield_id']; ?>][value]" value="<?php echo isset($saved_custom_field_value['cf_data']) ? $saved_custom_field_value['cf_data'] : ""; ?>">
                                        <?php endif; ?>
                                    </div>

                                    <?php
                                        if ($counter ==3) {
                                            echo "";
                                            $counter = 0;
                                        }
                                    ?>
                                    
                        <?php endforeach; ?>
                        </div>
                        <!--end custom fields form-->
                        </form>
                        
                    </div>
                <?php endforeach; ?>
                </div>
            

        </div>
    </div>
   





       






      

    
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
            <tr >
                <td style="background-color:#c9c9c9" colspan="2">Area de procesos.</td>
                <td style="background-color:rgba(235, 186, 52, .7)" colspan="5">Salida/Entrada de producto.</td>
            </tr>
            
            <!--shared fields form-->
            
                <input type="hidden" name="operation_id" value="<?php echo $operation['po_operation_id'] ?>">
                <tr>
                    <td>Hora de inicio: <input type="datetime-local" class="form-control"  name="hora_inicio" placeholder="Hora de inicio" value="<?php echo isset($saved_data['hora_inicio']) ? $saved_data['hora_inicio'] : "" ?>"></td>
                    <td>Hora de termino:<input type="datetime-local" class="form-control"  name="hora_termino" placeholder="Hora de termino" value="<?php echo isset($saved_data['hora_termino']) ? $saved_data['hora_termino'] : "" ?>" > </td>
                    
                   
                    <td colspan="1">Entrego: <input type="text" class="form-control" name="entrego" value="<?php echo isset($saved_data['entrego']) ? $saved_data['entrego'] : "" ; ?>"></td>
                    <td colspan="2">Observaciones: <textarea class="form-control" name="observaciones"><?php echo isset($saved_data['observaciones']) ? $saved_data['observaciones'] : "" ?></textarea></td>
                </tr>
                <tr>
                    <td>
                        Realizo: <input type="text" class="form-control" name="realizo" value="<?php echo isset($saved_data['realizo']) ? $saved_data['realizo'] : "" ?>">
                        <a class="btn btn-primary" href="<?php echo base_url('sign/' . $project['project_id'] . '/' . $operation['po_operation_id']) ?>">Firmar</a>
                    </td>
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
                <?php 
                $counter = 0;
                ?>
                <?php foreach ($operation['custom_fields'] as $custom_field): ?>

                            <?php
                                $counter++;
                                // Fetch saved data for this custom field from the database
                                $saved_custom_field_value = $this->Projects_model->get_saved_custom_field_value($operation['po_operation_id'], $custom_field['customfield_id'], $project['project_id']);

                                if ($counter == 1) {
                                    echo "<tr>";
                                }

                            ?>
                            
                        
                            <input type="hidden" name="operation_id" value="<?php echo $operation['po_operation_id'] ?>">
                            <td>
                                <?php echo $custom_field['customfield_label']; ?>

                                

                                <?php 
                                //check if custom field is checkbox.
                                if ($custom_field['customfield_type'] == "checkbox"): ?>
                                    <input type="checkbox" name="custom_fields[<?php echo $custom_field['customfield_id']; ?>][value]" value="on" <?php echo isset($saved_custom_field_value['cf_data'])  ? "checked" : ""; ?>>
                                <?php elseif($custom_field['customfield_type'] == "number"): ?>
                                    <input type="<?php echo $custom_field['customfield_type'] ?>" step="any" class="form-control" name="custom_fields[<?php echo $custom_field['customfield_id']; ?>][value]" value="<?php echo isset($saved_custom_field_value['cf_data']) ? $saved_custom_field_value['cf_data'] : ""; ?>">
                                <?php else: ?>
                                    <input type="<?php echo $custom_field['customfield_type'] ?>" class="form-control" name="custom_fields[<?php echo $custom_field['customfield_id']; ?>][value]" value="<?php echo isset($saved_custom_field_value['cf_data']) ? $saved_custom_field_value['cf_data'] : ""; ?>">
                                <?php endif; ?>
                            </td>

                            <?php
                                if ($counter == 4) {
                                    echo "</tr>";
                                    $counter = 0;
                                }
                            ?>
                               
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


       
    
    
    
        <div class="mt-5">
            <form action="<?php echo base_url("workorders/update_status/" . $project['project_id']) ?>" method="post">
                
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                    <option value="">Seleccione una opción</option>    
                    <option value="Registrado" <?php echo ($project['project_status'] == "Registrado") ? "selected" : ""; ?> >Registrado</option>                        
                    <option value="En Espera" <?php echo ($project['project_status'] == "En Espera") ? "selected" : ""; ?> >En Espera</option>
                    <option value="En Proceso" <?php echo ($project['project_status'] == "En Proceso") ? "selected" : ""; ?> >En Proceso</option>
                    <option value="Terminado" <?php echo ($project['project_status'] == "Terminado") ? "selected" : ""; ?> >Terminado</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary right float-right">Actualizar Status</button>
            </form>
        </div>
    </div>
</div>










