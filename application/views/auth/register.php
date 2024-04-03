<div class="row align-items-center w-100">
    <div class="col-md-7 col-lg-5 m-h-auto">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between m-b-30">
                    <img class="img-fluid" alt="" src="assets/images/logo/logo.png">
                    <h2 class="m-b-0">Registrar Usuario</h2>
                </div>
                <form action="<?php echo base_url('auth/register') ?>" method="post">
                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>

                    <?php if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?>

                    <?php echo validation_errors(); ?>


                    <div class="form-group">
                        <label class="font-weight-semibold" for="userName">Usuario:</label>
                        <input type="text" class="form-control" id="userName" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="confirmPassword">Confirmar Contraseña:</label>
                        <input type="password" class="form-control" id="confirmPassword" name="password2" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center justify-content-between p-t-15">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
