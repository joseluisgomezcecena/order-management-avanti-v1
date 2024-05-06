<div class="page-header">
    <h2 class="header-title"><?php echo $client['client_name'] ?></h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
            <a class="breadcrumb-item" href="<?php echo base_url("clients") ?>">Clientes</a>
            <span class="breadcrumb-item active"><?php echo $client['client_name'] ?></span>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4>Datos Del Cliente</h4>
        <div class="m-t-25">

            <!-- echo flash messages -->
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Operación exitosa!</strong> <?php echo $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error</strong> <?php echo $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>

            

            
            <div class="row">
                
                <div class="form-group col-lg-4">
                    <label for="client_name">Nombre del cliente</label>
                    <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Cliente" value="<?php echo $client['client_name'] ?>" disabled>
                    <?php echo form_error('client_name', '<div class="text-danger">', '</div>'); ?>
                </div>


                <div class="form-group col-lg-8" >
                    <label for="client_name">Dirección</label>
                    <input type="text" class="form-control" id="ddress" name="address" placeholder="Dirección" value="<?php echo $client['address'] ?>" disabled>
                    <?php echo form_error('address', '<div class="text-danger">', '</div>'); ?>
                </div>


                <div class="col-lg-12 mt-5">
                <h4 class="mb-5">Lista De Proyectos Del Cliente</h4>

                <table style="font-size:12px;" id="data-projects-client" class="table ">
                    <thead>
                        <tr>
                            <th> Id</th>
                            <th >Proyecto</th>
                            <th >Usuario</th>
                            <th >Fecha</th>
                            <th >Requiere instalación</th>
                            <th >Area</th>
                            <th >Cantidad de piezas</th>
                            <th >Unidades de trabajo</th>
                            <th >Aprobo</th>
                            <th >Creado</th>
                            <th >Actualizado</th>
                            <th >Registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $project):?>
                        <tr>
                            <td><?php echo $project['project_id'] ?></td>
                            <td><a href="<?php echo base_url('projects/show/' . $project['project_id']) ?>"><?php echo $project['project_name']; ?></a></td>
                            <td><?php echo $project['user'] ?></td>
                            <td><?php echo date_format(date_create($project['date']), "M-d-Y");  ?></td>
                            <td><?php echo ($project['installation_required'] == 1) ? 'Si' : 'No'; ?></td>
                            <td><?php echo $project['area'] ?></td>
                            <td><?php echo $project['qty'] ?></td>
                            <td><?php echo $project['work_units'] ?></td>
                            <td><?php echo $project['approved_by'] ?></td>
                            <td><?php echo date_format(date_create($project['created_at']), "M-d-Y H:i:s"); ?></td>
                            <td><?php echo date_format(date_create($project['updated_at']), "M-d-Y H:i:s"); ?></td>
                            <td><?php echo $project['user_name']; ?></td>
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
            
        </div>
    </div>
</div>