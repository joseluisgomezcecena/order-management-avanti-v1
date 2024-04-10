<div class="page-header">
    <h2 class="header-title">Actualizar Usuario</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
            <a class="breadcrumb-item" href="<?php echo base_url("users") ?>">Usuarios</a>
            <span class="breadcrumb-item active">Actualizar Usuario</span>
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


            <!--autocomplete="off"-->

            <form action="<?php echo base_url("users/update/") . $user['user_id'] ?>" method="post" autocomplete="off">
                <input style="opacity:0;" type="text" name="user_name" id="username">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label class="font-weight-semibold" for="userName">Usuario:</label>
                        <input type="text" class="form-control" id="userName" name="username" placeholder="Username" value="<?php echo $user['username'] ?>">
                        <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-lg-4">
                        <label class="font-weight-semibold" for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user['email'] ?>">
                        <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="font-weight-semibold" for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                        <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="font-weight-semibold" for="confirmPassword">Confirmar Contraseña:</label>
                        <input type="password" class="form-control" id="confirmPassword" name="password2" placeholder="Confirm Password" autocomplete="off">
                        <?php echo form_error('password2', '<div class="text-danger">', '</div>'); ?>
                    </div>


                    <?php if ($this->session->userdata('is_admin') == 1): ?>
                        <div class="form-group col-lg-6">
                            <label class="font-weight-semibold" for="confirmPassword">Rol:</label>
                            <select class="form-control" name="role">
                                <option value="0" <?php echo ($user['is_admin'] == 0) ? 'selected' : ''; ?> >Usuario</option>
                                <option value="1" <?php echo ($user['is_admin'] == 1) ? 'selected' : ''; ?>>Administrador</option>
                            </select>
                        </div>
                    <?php endif; ?>



                    <div class="form-group col-lg-12">
                        <div class="d-flex align-items-center justify-content-between p-t-15">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>