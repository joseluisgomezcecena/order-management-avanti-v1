<div class="page-header">
    <h2 class="header-title">Usuarios</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
            <a class="breadcrumb-item" href="#">Usuarios</a>
            <span class="breadcrumb-item active">Indexar</span>
        </nav>
    </div>
    <!--button that floats to the right-->
    <div class="float-right">
        <a href="<?php echo base_url('users/create') ?>" class="btn btn-primary">Nuevo Usuario</a>
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

        <table style="font-size:12px; width:100%" id="data-tables" class="table">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Administrador</th>
                    <th>Fecha de Registro</th>
                    <th>Actualizado</th>
                    <th style="width:200px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user):?>
                    <tr>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['is_admin'] ? 'Si' : 'No'; ?></td>
                        <td><?php echo $user['created_at']; ?></td>
                        <td><?php echo $user['updated_at']; ?></td>
                        <td>
                            <a href="<?php echo base_url('users/update/'.$user['user_id']); ?>" class="btn btn-sm btn-primary"  >Editar</a>
                            <a href="<?php echo base_url('users/delete/'.$user['user_id']); ?>" class="btn btn-sm btn-danger <?php echo ($user['username'] == 'administrator') ? 'disabled' : ' ';  ?>"  >Eliminar</a>
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