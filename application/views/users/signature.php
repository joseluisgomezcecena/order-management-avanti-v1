<div class="page-header">
    <h2 class="header-title">Firma De Usuario</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
            <a class="breadcrumb-item" href="<?php echo base_url("users") ?>">Usuarios</a>
            <span class="breadcrumb-item active">Firma Electronica</span>
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

            
                <input type="text" name="user_id" id="userid" value="<?php echo $user['user_id']; ?>">
                <canvas style="border:solid;" id="signature-pad" width="400" height="200"></canvas>
                <button id="save-signature-btn">Save Signature</button>
            
        </div>
    </div>
</div>