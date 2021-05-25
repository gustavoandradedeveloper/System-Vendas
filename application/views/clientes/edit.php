<?php $this->load->view('layout/siderbar'); ?>

<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('clientes'); ?>">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
            </ol>
        </nav>

        <!-- DataTales Example --> 
        <!-- Esse card tem 12 colunas ou seja, dar pra colocar 3 campos de mb-4  que o total dar mb-12 -->

        <div class="card shadow mb-4">

            <div class="card-header py-3">           
                <!--CARREGA A URL BASE 
                $config'base_url' = 'http://localhost/meus-projetos/system-vendas/usuarios';-->
                <a title="Voltar" 
                   href="<?php echo base_url('clientes'); ?>" class="btn btn-success btn-sm float-right">

                    <!-- icone mostrado -->
                    <i class="fas fa-arrow-left"></i>&nbsp Voltar</a>
            </div>

            <!-- Esse card tem 12 colunas ou seja, dar pra colocar 3 campos de mb-4  que o total dar mb-12 -->
            <div class="card-body">
                <form class="user" method="POST" name="form_edit">
                    <!-- =============================================PRIMEIRA LINHA================================================== -->  
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>Nome</label>
                            <!-- name="first_name" nome da coluna do BD -->    
                            <!-- value="php echo $cliente->first_name "> 
                            informação vinda do banco 
                            -->
                            <input type="text" class="form-control form-control-user" 

                                   name="cliente_nome" placeholder="Nome do cliente" 

                                   value="<?php echo $cliente->cliente_nome; ?>">
                                   <?php echo form_error('cliente_nome', '<small class="form-text text-danger">', ' </small>'); ?>
                        </div>


                        <div class="col-md-4">
                            <label>Sobrenome</label>

                            <input type="text" class="form-control form-control-user" 
                                   name="cliente_sobrenome" placeholder="Sobrenome do cliente" 
                                   value="<?php echo $cliente->cliente_sobrenome; ?>">
                                   <?php echo form_error('cliente_sobrenome', '<small class="form-text text-danger">', ' </small>'); ?>
                            <div id="emailHelp" class="form-text"></div>
                        </div>

                        <!-- col-md-4 tamanho do campo de texto -->
                        <div class="col-md-2">
                            <label>CPF ou CNPJ</label>
                            <input type="text" class="form-control form-control-user cnpj" 
                                   name="cliente_cpf_cnpj" placeholder="CPF ou CNPJ" 
                                   value="<?php echo $cliente->cliente_cpf_cnpj; ?>">
                                   <?php echo form_error('cliente_cpf_cnpj', '<small class="form-text text-danger">', ' </small>'); ?>
                            <div id="emailHelp" class="form-text"></div>
                        </div>

                        <div class="col-md-2">
                            <label>RG ou I.E</label>
                            <input type="text" class="form-control form-control-user" 
                                   name="cliente_rg_ie" placeholder="RG ou I.E" 
                                   value="<?php echo $cliente->cliente_rg_ie; ?>">
                                   <?php echo form_error('cliente_rg_ie', '<small class="form-text text-danger">', ' </small>'); ?>
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                    </div>
                    <!-- =============================================FIM DA PRIMEIRA LINHA================================================== -->  


                    <!-- =============================================SEGUNDA LINHA================================================== -->  
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>E-mail</label>
                            <input type="email" class="form-control form-control-user" 
                                   name="cliente_email" placeholder="E-mail do cliente" 
                                   value="<?php echo $cliente->cliente_email; ?>">
                                   <?php echo form_error('cliente_email', '<small class="form-text text-danger">', ' </small>'); ?>
                        </div>


                        <div class="col-md-2">
                            <label>Telefone fixo</label>

                            <input type="text" class="form-control form-control-user sp_celphones" 
                                   name="cliente_telefone" placeholder="Telefone do cliente" 
                                   value="<?php echo $cliente->cliente_telefone; ?>">
                                   <?php echo form_error('cliente_telefone', '<small class="form-text text-danger">', ' </small>'); ?>
                            <div id="emailHelp" class="form-text"></div>
                        </div>

                        <!-- col-md-4 tamanho do campo de texto -->
                        <div class="col-md-2">
                            <label>Telefone Celular</label>
                            <input type="text" class="form-control form-control-user sp_celphones" 
                                   name="cliente_celular" placeholder="Celular do cliente" 
                                   value="<?php echo $cliente->cliente_celular; ?>">
                                   <?php echo form_error('cliente_celular', '<small class="form-text text-danger">', ' </small>'); ?>
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        
                        <div class="col-md-4">
                            <label>Data nascimento</label>
                            <input type="date" class="form-control form-control-user" 
                                   name="cliente_data_nascimento" 
                                   value="<?php echo $cliente->cliente_data_nascimento; ?>">
                                   <?php echo form_error('cliente_data_nascimento', '<small class="form-text text-danger">', ' </small>'); ?>
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        
                        <div class="col-md-4">
                            <label>CEP</label>
                            <input type="text" class="form-control form-control-user cep" 
                                   name="cliente_cep" placeholder="CEP" 
                                   value="<?php echo $cliente->cliente_cep; ?>">
                                   <?php echo form_error('cliente_cep', '<small class="form-text text-danger">', ' </small>'); ?>
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                    </div>
                    <!-- =============================================FIM DA SEGUNDA LINHA================================================== --> 
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                </form>

            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->