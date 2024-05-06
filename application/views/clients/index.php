<div class="page-header">
    <h2 class="header-title">Clientes</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
            <a class="breadcrumb-item" href="#">Clientes</a>
            <span class="breadcrumb-item active">Indexar</span>
        </nav>
    </div>
    <!--button that floats to the right-->
    <div class="float-right">
        <a href="<?php echo base_url('clients/create') ?>" class="btn btn-primary">Nuevo Cliente</a>
    </div>
</div>
<div class="card mt-5">
    <div class="card-body">

        <!-- echo flash messages -->
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Operación exitosa!</strong> <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <table style="font-size:12px;" id="data-clients" class="table">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Direccion</th>
                    <th>Ultimo Proyecto</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                    <th>Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client):?>
                <tr>
                    <td><a href="<?php echo base_url('clients/' . $client['client_id']) ?>"><?php echo $client['client_name']; ?></a></td>
                    <td><?php echo empty($client['address']) ? 'N/A' : $client['address']; //ternary operator to check if the address is empty.?></td>
                    
                    <td>
                        <?php  
                            $last_project = $this->Clients_model->get_last_project_by_client($client['client_id']);
                            if (empty($last_project)) {
                                echo 'N/A';
                            } else{
                            echo '<a href="'. base_url("projects/show/" . $last_project['project_id']) .'">' . $last_project['project_name'] . '</a> <br>Fecha: ' . date_format(date_create($last_project['created_at']), "M-d-Y");
                        }
                        ?>
                    </td>
                    
                    <td><?php echo date_format(date_create($client['created_at']), "M-d-Y H:i:s"); ?></td>
                    <td><?php echo date_format(date_create($client['updated_at']), "M-d-Y H:i:s"); ?></td>
                    <td><?php echo $client['user_name']; ?></td>
                    <td>
                        <a href="<?php echo base_url('clients/update/' . $client['client_id']) ?>" class="btn btn-dark">Editar</a>
                        <a href="<?php echo base_url('clients/delete/' . $client['client_id']) ?>" class="btn btn-danger">Eliminar</a>
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