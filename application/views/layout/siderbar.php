<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">


    <!-- Sidebar  -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('home/') ?>">
        <div class="sidebar-brand-text mx-3">Tech Manager <sup></sup></div>
    </a>

    <div class="sidebar-heading">
        CAIXA
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!--Inicio do módulo de Vendas -->  
    <li class="nav-item">
        <a title="Vendas" class="nav-link" href="<?php echo base_url('vendas'); ?>">
            <i class="fas fa-shopping-cart"></i>  
            <span>Vendas</span></a>
    </li>
    <hr class="sidebar-divider">
    <!--Fim do módulo de Vendas -->

    <!-- Heading -->
    <div class="sidebar-heading">
        MÓDULOS
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCadastro" aria-expanded="true"
           aria-controls="collapseCadastro">
            <i class="fas fa-database"></i>
            <span>Cadastro</span>
        </a>
        <div id="collapseCadastro" class="collapse" aria-labelledby="headingT" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">ESCOLHA UMA OPÇÃO:</h6>
                <a class="collapse-item" href="<?php echo base_url('clientes') ?>"><i class="fas fa-user"></i>&nbsp;&nbsp;Clientes</a>
                <a class="collapse-item" href="<?php echo base_url('fornecedores') ?>"><i class="fas fa-user-tag">&nbsp;&nbsp;</i>Fornecedores</a>
                <a class="collapse-item" href="<?php echo base_url('vendedores') ?>"><i class="fas fa-user-secret text-gray-900"></i>&nbsp;&nbsp;Vendedores</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-box-open"></i>
            <span>Estoque</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!--<h6 class="collapse-header">Custom Utilities:</h6>-->
                <a class="collapse-item" href="<?php echo base_url('marcas') ?>"><i class="fas fa-cubes"></i>&nbsp;Marcas</a>
                <a class="collapse-item" href="<?php echo base_url('categorias') ?>"><i class="fab fa-buffer"></i>&nbsp;Categorias</a>
                <a class="collapse-item" href="<?php echo base_url('produtos') ?>"><i class="fab fa-product-hunt"></i>&nbsp;Produtos</a>
            </div>
        </div>  
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        CONFIGURAÇÕES
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a title="Gerenciar usuários" class="nav-link" href="<?php echo base_url('usuarios/'); ?>">
            <i class="fas fa-users"></i>
            <span>Usuários</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a title="Gerenciar dados do sistema" class="nav-link" href="<?php echo base_url('sistema/'); ?>">
            <i class="fas fa-cog"></i>
            <span>Sistema</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">