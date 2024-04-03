<div class="page-header">
    <h2 class="header-title">Nuevo Cliente</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
            <a class="breadcrumb-item" href="#">Forms</a>
            <span class="breadcrumb-item active">Form Layouts</span>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4>Cliente</h4>
        <div class="m-t-25">

            <!-- echo flash messages -->
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>

            

            <form action="<?php echo base_url("clients/create") ?>" method="post">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="client_name">Nombre del cliente</label>
                        <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Cliente">
                        <?php echo form_error('client_name', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-8" >
                        <label for="client_name">Dirección</label>
                        <input type="text" class="form-control" id="client_address" name="address" placeholder="Dirección">
                        <?php echo form_error('address', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-lg-6" >
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>    
            </form>
        </div>
    </div>
</div>