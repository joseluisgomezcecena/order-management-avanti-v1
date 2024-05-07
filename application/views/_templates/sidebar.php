<!-- Side Nav START -->
<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown" <?php echo ($active == 'home') ? "style='background-color: rgba(252, 186, 3, .15); border-right: 2px solid; border-color: #fc8c03;'" : "" ?> >
                <a class="dropdown-toggle" href="<?php echo base_url(); ?>">
                    <span class="icon-holder">
                        <i class="anticon anticon-home"></i>
                    </span>
                    <span class="title">Inicio</span>
                </a>
            </li>
            <li <?php echo ($active == 'workorders') ? "style='background-color: rgba(252, 186, 3, .15); border-right: 2px solid; border-color: #fc8c03;'" : "" ?> class="nav-item active ">
                <a class="dropdown-toggle" href="<?php echo base_url(); ?>workorders">
                    <span class="icon-holder">
                        <i class="anticon anticon-file"></i>
                    </span>
                    <span class="title">Ordenes De Trabajo</span>
                </a>
            </li>
            <li <?php echo ($active == 'projects') ? "style='background-color: rgba(252, 186, 3, .15); border-right: 2px solid; border-color: #fc8c03;'" : "" ?> class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-tool"></i>
                    </span>
                    <span class="title">Proyectos</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url() ?>projects/create">Nuevo Proyecto</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>projects/">Lista</a>
                    </li>
                </ul>
            </li>
            <li <?php echo ($active == 'clients') ? "style='background-color: rgba(252, 186, 3, .15); border-right: 2px solid; border-color: #fc8c03;'" : "" ?> class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-solution"></i>
                    </span>
                    <span class="title">Clientes</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url() ?>clients/create">Registrar Cliente</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>clients/">Ver Lista</a>
                    </li>
                </ul>
            </li>
            <li <?php echo ($active == 'operations') ? "style='background-color: rgba(252, 186, 3, .15); border-right: 2px solid; border-color: #fc8c03;'" : "" ?> class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-setting"></i>
                    </span>
                    <span class="title">Operaciones o Procesos</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url() ?>operations/create">Registrar Proceso</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>operations/">Ver Lista</a>
                    </li>
                </ul>
            </li>
            <li <?php echo ($active == 'users') ? "style='background-color: rgba(252, 186, 3, .15); border-right: 2px solid; border-color: #fc8c03;'" : "" ?> class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-user-add"></i>
                    </span>
                    <span class="title">Usuarios</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url() ?>users/create">Registrar Usuario</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>users/">Ver Lista</a>
                    </li>
                </ul>
            </li>
            <!--
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-form"></i>
                    </span>
                    <span class="title">Forms</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="form-elements.html">Form Elements</a>
                    </li>
                    <li>
                        <a href="form-layouts.html">Form Layouts</a>
                    </li>
                    <li>
                        <a href="form-validation.html">Form Validation</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown open">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-table"></i>
                    </span>
                    <span class="title">Tables</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="basic-table.html">Basic Table</a>
                    </li>
                    <li class="active">
                        <a href="data-table.html">Data Table</a>
                    </li>
                </ul>
            </li>
-->
            <li <?php echo ($active == 'reports') ? "style='background-color: rgba(252, 186, 3, .15); border-right: 2px solid; border-color: #fc8c03;'" : "" ?> class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-pie-chart"></i>
                    </span>
                    <span class="title">Reportes</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url() ?>reports">Generador De Reportes</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- Side Nav END -->
    <!-- Page Container START -->
    <div class="page-container">
            <!-- Content Wrapper START -->
            <div class="main-content">