<div class="page-header">
    <h2 class="header-title">Eliminar Usuario</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
            <a class="breadcrumb-item" href="<?php echo base_url("users") ?>">Usuarios</a>
            <span class="breadcrumb-item active">Eliminar Usuario</span>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4>Usuario</h4>
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
            <form action="<?php echo base_url("users/delete/") . $user['user_id'] ?>" method="post" autocomplete="off">
                <input style="opacity:0;" type="text" name="user_name" id="username">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label class="font-weight-semibold" for="userName">Usuario:</label>
                        <input type="text" class="form-control" id="userName" name="username" placeholder="Username" value="<?php echo $user['username'] ?>" disabled>
                        <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-lg-4">
                        <label class="font-weight-semibold" for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user['email'] ?>" disabled>
                        <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-lg-12">
                        <div class="d-flex align-items-center justify-content-between p-t-15">
                            <button type="submit" name="confirm" class="btn btn-danger">Eliminar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Bootstrap 4 Modal -->
<div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="warningModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="warningModalLabel">Advertencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Esta acción no puede deshacerse. ¿Estás seguro de que deseas eliminar este usuario?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark" data-dismiss="modal" aria-label="Close">Confirmar</button>
            </div>
        </div>
    </div>
</div>
