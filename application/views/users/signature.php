<style>
    @media only screen and (max-width: 600px) {
    body {
        overflow: hidden;
        position: fixed;
        width: 100%;
        height: 100%;
    }

    #signature-pad{
        width: 100% !important;
        height: 100% !important;
    }
}
</style>
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
        <h4>Firma Electronica</h4>
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
                <div class="col-lg-6">
                    <h4>Actualizar Firma Electronica</h4>    
                    <input type="hidden" name="userid" id="userid" value="<?php echo $user['user_id']; ?>">
                    <canvas style="border:solid;" id="signature-pad" width="400" height="200"></canvas>
                    <br><br/>
                    <button class="btn btn-primary" id="save-signature-btn">Save Signature</button>
                </div>
                <div id="signature" class="col-lg-6">
                    <h4>Firma Actual</h4>
                    <img src="<?php echo base_url() .  $user['signature']; ?>" alt="Firma" style="width: 200px; height: 100px;">    
                </div>
            </div>
            
        </div>
    </div>
</div>