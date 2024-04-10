<div class="page-header">
    <h2 class="header-title">Generador De Reportes</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
            <a href="#" class="breadcrumb-item">Reportes</a>
        </nav>
    </div>
</div>

<!--
<div class="row">
    <div class="col-md-12">
        <div class="card mt-2">
            <div class="card-body">
    

      

            </div>
        </div>
    </div>
</div>
-->

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">            
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
                            <th>Status</th>
                            <th>Tiempo</th>
                            <th>Procesos</th>
                            <th >Creado</th>
                            <th >Actualizado</th>
                            <th >Registro</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $project):?>
                        <tr>
                            <td><?php echo $project['project_id'] ?></td>
                            <td><?php echo $project['project_name']; ?></td>
                            <td><?php echo $project['client_name'] ?></td>
                            <td><?php echo $project['user'] ?></td>
                            <td><?php echo date_format(date_create($project['date']), "M-d-Y");  ?></td>
                            <td><?php echo ($project['installation_required'] == 1) ? 'Si' : 'No'; ?></td>
                            <td><?php echo ($project['address'] != "") ? $project['address'] : 'N/A';  ?></td>
                            <td><?php echo $project['area'] ?></td>
                            <td><?php echo $project['qty'] ?></td>
                            <td><?php echo $project['work_units'] ?></td>
                            <td><?php echo $project['approved_by'] ?></td>
                            <td><?php echo $project['project_status'];  ?></td>
                            <td>
                            <?php
                                // Convert the dates to DateTime objects
                                $dueDate = new DateTime($project['date']);
                                $createdAt = new DateTime($project['created_at']);

                                // Get the current date
                                $now = new DateTime();

                                // Calculate the difference in days
                                $diff = $now->diff($dueDate)->format("%r%a");

                                if ($diff < 0) {
                                    // The project is late
                                    echo "El proyecto tiene " . abs($diff) . " dias de atraso.";
                                } else {
                                    // The project is not late
                                    echo "El proyecto va en tiempo. Faltan " . $diff . " dias.";
                                }
                            ?>
                            </td>
                            <td>
                                <ul>
                                    <?php foreach ($project['operations'] as $operation): ?>
                                        <li><?php echo $operation['operation_name']; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                            <td><?php echo date_format(date_create($project['created_at']), "M-d-Y H:i:s"); ?></td>
                            <td><?php echo date_format(date_create($project['updated_at']), "M-d-Y H:i:s"); ?></td>
                            <td><?php echo $project['user_name']; ?></td>
                           
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                   
                </table>
            </div>
        </div>
    </div>
</div>
