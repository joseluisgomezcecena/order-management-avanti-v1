<div class="page-header">
    <h2 class="header-title">Clientes</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
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
        <table style="font-size:12px; width:100%" id="data-tables" class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cliente</th>
                    <th>Direccion</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                    <th>Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client):?>
                <tr>
                    <td><a href="<?php echo base_url('clients/' . $client['client_id']) ?>"><?php echo $client['client_id']; ?></a></td>
                    <td><a href="<?php echo base_url('clients/' . $client['client_id']) ?>"><?php echo $client['client_name']; ?></a></td>
                    <td>
                        <?php echo empty($client['address']) ? 'N/A' : $client['address']; //ternary operator to check if the address is empty.?>
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