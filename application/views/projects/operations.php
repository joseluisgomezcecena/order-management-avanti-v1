<div class="page-header">
    <h2 class="header-title">Procesos Del Proyecto</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Inicio</a>
            <a href="<?php echo base_url(); ?>projects" class="breadcrumb-item">Proyectos</a>
            <a class="breadcrumb-item" href="<?php echo base_url("projects/update/" . $project['project_id']) ?>"><?php echo $project['project_name'] ?></a>
            <span class="breadcrumb-item active">Agregar Procesos</span>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
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
    </div>
</div>


<div class="container-fluid">
    <div class="row">

    <div class="col-lg-7">
    <div class="card">
        <div class="card-body">
            <h4>Procesos Disponibles</h4>
            <div class="m-t-25">

                <div class="row">
                    <?php foreach ($operations as $operation): ?>
                        <div class="col-lg-4">
                        <div style="box-shadow:none; border:solid gray 1px; border-radius:0" class="card m-b-10 text-center">
                            <div class="card-body">
                                <h6 class=""><?php echo $operation['operation_name']; ?></h6>
                            </div>
                            <div class="card-footer text-center ">
                                <form action="<?php echo base_url("projects/operations/" . $project['project_id']) ?>" method="post">
                                    <input type="hidden" name="operation_id" value="<?php echo $operation['operation_id']; ?>">
                                    <button type="submit" class="btn btn-primary btn-sm">Agregar</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    <?php endforeach; ?>
                
                </div>
            </div>
        </div>
    </div>
    </div>
    

    <div class="col-lg-5">
    <div class="card">
        <div class="card-body">
            <h4>Procesos Del Proyecto</h4>
            <div class="m-t-25">

                <ul class="list-group list-group-flush">
                    <?php foreach ($project_operations as $project_operation): ?>
                        <li class="list-group-item">
                            <?php echo $project_operation['operation_name']; ?>
                            <a href="<?php echo base_url("projects/delete_operation/" . $project_operation['project_operation_id']) ?>" class="btn btn-sm btn-danger float-right">Eliminar</a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                

            </div>
        </div>
    </div>
    </div>


    </div>
</div>
