<div class="page-header">
    <h2 class="header-title">Proyecto: <?php echo $project['project_name'] ?></h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
            <a class="breadcrumb-item" href="<?php echo base_url(); ?>projects">Proyectos</a>
            <span class="breadcrumb-item active"><?php echo $project['project_name'] ?></span>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="media align-items-center">
                        <div class="avatar avatar-image rounded">
                            <img src="<?php echo base_url("uploads/projects/") . $project['main_image'] ?>" alt="<?php echo $project['project_name'] ?>">
                        </div>
                        <div class="m-l-10">
                            <h4 class="m-b-0"><?php echo $project['project_name'] ?></h4>
                        </div>
                    </div>
                    <div>
                        <span class="badge badge-pill badge-blue">Status: <?php echo $project['project_status']; ?></span>
                    </div>
                </div>
                <!--
                <div class="m-t-40">
                    <h6>Tipo de Proyecto:</h6>
                    <p><?php echo ($project['project_type']=='m') ? "Mantenimiento" : "Taller/Construcción" ?></p>

                    <h6>Cliente:</h6>
                    <p><?php echo $project['client_name'] ?></p>
                </div>
                <div class="d-md-flex m-t-30 align-items-center justify-content-between">
                    <div class="d-flex align-items-center m-t-10">
                        <span class="text-dark font-weight-semibold m-r-10 m-b-5">Aprobo: </span>
                        <p class="m-r-5 m-b-5"><?php echo $project['approved_by'] ?></p>
                        
                        <a class="m-r-5 m-b-5" href="javascript:void(0);" data-toggle="tooltip" title="Erin Gonzales">
                            <div class="avatar avatar-image" style="width: 30px; height: 30px;">
                                <img src="assets/images/avatars/thumb-1.jpg" alt="">
                            </div>
                        </a>
                        
                    </div>
                    <div class="m-t-10">
                        <span class="font-weight-semibold m-r-10 m-b-5 text-dark">Fecha compromiso: </span>
                        <span><?php echo date('m/d/Y', strtotime($project['date'])) ?></span>
                    </div>
                </div>
                -->
            </div>
            <div class="m-t-30">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#project-details-tasks">Datos Del Proyecto</a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#project-details-comments">Comments</a>
                    </li>
-->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#project-details-attachment">Archivos Adjuntos</a>
                    </li>
                </ul>
                <div class="tab-content m-t-15 p-25">
                    <div class="tab-pane fade show active" id="project-details-tasks">
                    
                        <div class="row">
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
                        <div class="d-md-flex m-t-30 align-items-center justify-content-between">
                            <div class="d-flex align-items-center m-t-10">
                                <span class="text-dark font-weight-semibold m-r-10 m-b-5">Aprobo: </span>
                                <p class="m-r-5 m-b-5"><?php echo $project['approved_by'] ?></p>
                                
                                <a class="m-r-5 m-b-5" href="javascript:void(0);" data-toggle="tooltip" title="Erin Gonzales">
                                    <div class="avatar avatar-image" style="width: 30px; height: 30px;">
                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                    </div>
                                </a>
                                
                            </div>
                            <div class="m-t-10">
                                <span class="font-weight-semibold m-r-10 m-b-5 text-dark">Fecha compromiso: </span>
                                <span><?php echo date('m/d/Y', strtotime($project['date'])) ?></span>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="project-details-comments">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item p-h-0">
                                <div class="media m-b-15">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-8.jpg" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h6 class="m-b-0">
                                            <a href="" class="text-dark">Lillian Stone</a>
                                        </h6>
                                        <span class="font-size-13 text-gray">28th Jul 2018</span>
                                    </div>
                                </div>
                                <p>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</p>
                            </li>
                            <li class="list-group-item p-h-0">
                                <div class="media m-b-15">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-9.jpg" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h6 class="m-b-0">
                                            <a href="" class="text-dark">Victor Terry</a>
                                        </h6>
                                        <span class="font-size-13 text-gray">28th Jul 2018</span>
                                    </div>
                                </div>
                                <p>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</p>
                            </li>
                            <li class="list-group-item p-h-0">
                                <div class="media m-b-15">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-10.jpg" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h6 class="m-b-0">
                                            <a href="" class="text-dark">Wilma Young</a>
                                        </h6>
                                        <span class="font-size-13 text-gray">28th Jul 2018</span>
                                    </div>
                                </div>
                                <p>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="project-details-attachment">
                        <?php foreach ($files as $file): ?>
                            <div class="file" style="min-width: 200px;">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-icon avatar-cyan rounded m-r-15">
                                        <i class="anticon anticon-file-exclamation font-size-20"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0"><?php echo $file['file_name'] ?></h6>
                                        <a href="<?php echo base_url("uploads/project_uploads/" . $file['file_name']) ?>"><span class="font-size-13 text-primary">Descargar</span></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Procesos</h4>
            </div>
            <div class="card-body">
                <ul class="timeline timeline-sm">
                

                    <?php
                    $count = 0; 
                    foreach($operations as $operation):
                        $count++; 
                    ?>

                       
                    <li class="timeline-item">
                        <div class="timeline-item-head">
                            
                                <?php  
                                $saved_data = $this->Projects_model->get_saved_data($operation['po_operation_id'], $operation['po_project_id']);
                                if (isset($saved_data) && $saved_data['hora_termino'] != '0000:00:00 00:00:00') {
                                    echo '<div class="avatar avatar-icon avatar-sm avatar-green">';
                                    echo '<i class="anticon anticon-check"></i>';
                                    $hora_termino = $saved_data['hora_termino'];
                                    $hora_termino = date('M/d/Y H:i:s', strtotime($hora_termino));
                                    $completado = "Completado";
                                } else {
                                    echo '<div class="avatar avatar-icon avatar-sm avatar-red">';
                                    echo '<i class="anticon anticon-close"></i>';
                                    $hora_termino = 'Pendiente';
                                    $completado = "Pendiente";
                                }
                                ?>
                                
                                <!--
                                <i class="anticon anticon-check"></i>
                                -->
                            
                            </div>
                        </div>
                        <div class="timeline-item-content">
                            <div class="m-l-10">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-text bg-primary">
                                        <?php echo $count ?>
                                    </div>
                                    <div class="m-l-10">
                                        <h6 class="m-b-0"><?php echo $operation['operation_name'] ?></h6>
                                        <span class="text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">
                                                <?php echo $hora_termino; ?>
                                             </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="m-t-20">
                                    <p class="m-l-20">
                                        
                                        <span class="text-dark font-weight-semibold"><?php echo $completado; ?> </span> 
                                        <!--
                                        <span class="m-l-5"> Prototype Design</span>
                                        -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
    </div>
</div>
