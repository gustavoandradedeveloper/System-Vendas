<?php $this->load->view('layout/siderbar'); ?>

<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('/'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
            </ol>
        </nav>

        <!-- DataTales Example --> 
        <!-- Esse card tem 12 colunas ou seja, dar pra colocar 3 campos de mb-4  que o total dar mb-12 -->

        <div class="card shadow mb-4">

            <!-- Esse card tem 12 colunas ou seja, dar pra colocar 3 campos de mb-4  que o total dar mb-12 -->
            <div class="card-body">
                <form method="POST" name="form_edit">
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>Razão Social</label>
                            <!-- name="first_name" nome da coluna do BD -->    
                            <!-- value="php echo $usuario->first_name "> 
                            informação vinda do banco 
                            -->
                            <input type="text" class="form-control" 

                                   name="sistema_razao_social" phaceholder="razao social" 

                                   value="<?php echo $sistema->sistema_razao_social; ?>">
                                   <?php echo form_error('sistema_razao_social', '<small class="form-text text-danger">', ' </small>'); ?>
                        </div>


                        <div class="col-md-4">
                            <label>Nome Fantasia</label>

                            <input type="text" class="form-control" 
                                   name="sistema_nome_fantasia" phaceholder="nome fantasia" 
                                   value="<?php echo $sistema->sistema_nome_fantasia; ?>">
                                   <?php echo form_error('sistema_nome_fantasia', '<small class="form-text text-danger">', ' </small>'); ?>
                            <div id="emailHelp" class="form-text"></div>
                        </div>

                        <!-- col-md-4 tamanho do campo de texto -->
                        <div class="col-md-4">
                            <label>CNPJ</label>
                                <input type="text" class="form-control" 
                                name="sistema_cnpj" phaceholder="CNPJ" 
                                value="<?php echo $sistema->sistema_cnpj; ?>">
                                <?php echo form_error('sistema_cnpj', '<small class="form-text text-danger">', ' </small>'); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                </form>

            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->