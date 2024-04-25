<div class="page-header">
    <h2 class="header-title"><?php echo $operation['operation_name'] ?></h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
            <a class="breadcrumb-item" href="<?php echo base_url("operations") ?>">Procesos</a>
            <span class="breadcrumb-item active"><?php echo $operation['operation_name'] ?></span>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4>Proceso</h4>
        <div class="m-t-25">
             <!-- echo flash messages -->
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>¡Operación exitosa!</strong> <?php echo $this->session->flashdata('success'); ?>
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

            

            <form action="<?php echo base_url("operations/update/" . $operation['operation_id']) ?>" method="post">
                <div class="row">
                    
                    <div class="form-group col-lg-12">
                        <label for="operation_name">Nombre del proceso: <b><?php echo $operation['operation_name']?></b></label>
                        <!--
                        <input type="text" class="form-control" id="operation_name" name="operation_name" placeholder="Cliente" value="<?php echo set_value('operation_name') ? set_value('operation_name') : $operation['operation_name']; ?>">
                        -->
                    </div>


                    <div class=" col-lg-6" >
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Campo Personalizado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($customfields as $custom_field) { ?>
                                    <tr>
                                        <td><?php echo $custom_field['customfield_id'] ?></td>
                                        <td><?php echo $custom_field['customfield_label'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>




                    <div class=" col-lg-6" >
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Campo Personalizado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($projects as $project) { ?>
                                    <tr>
                                        <td><?php echo $project['project_id'] ?></td>
                                        <td><?php echo $project['project_name'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>





                </div>    
            </form>
        </div>
    </div>
</div>