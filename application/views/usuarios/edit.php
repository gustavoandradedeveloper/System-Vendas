<?php $this->load->view('layout/siderbar'); ?>

<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('usuarios');?>">Usuários</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo?></li>
            </ol>
        </nav>

        <!-- DataTales Example --> 
        <!-- Esse card tem 12 colunas ou seja, dar pra colocar 3 campos de mb-4  que o total dar mb-12 -->

        <div class="card shadow mb-4">
            
            <div class="card-header py-3">           
                <!--CARREGA A URL BASE 
                $config'base_url' = 'http://localhost/meus-projetos/system-vendas/usuarios';-->
                <a title="Voltar" 
                href="<?php echo base_url('usuarios');?>" class="btn btn-success btn-sm float-right">
                
                <!-- icone mostrado -->
                <i class="fas fa-arrow-left"></i>&nbsp Voltar</a>
            </div>

            <!-- Esse card tem 12 colunas ou seja, dar pra colocar 3 campos de mb-4  que o total dar mb-12 -->
            <div class="card-body">
                <form>
                    
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Nome</label>
                            <!-- name="first_name" nome da coluna do BD -->    
                            <!-- value="php echo $usuario->first_name "> 
                            informação vinda do banco 
                             -->
                            <input type="text" class="form-control" 
                            
                            name="first_name" phaceholder="Seu Nome" 
                            
                            value="<?php echo $usuario->first_name;?>">

                            <div id="emailHelp" class="form-text"></div>
                        </div>


                        <div class="col-md-4">
                            <label>Sobrenome</label>
                        
                            <input type="text" class="form-control" 
                            
                            name="last_name" phaceholder="Seu sobrenome" 
                            
                            value="<?php echo $usuario->last_name;?>">

                            <div id="emailHelp" class="form-text"></div>
                        </div>

                        <!-- col-md-4 tamanho do campo de texto -->
                        <div class="col-md-4">
                        
                            <label>Email&nbsp;(Login)</label>
                        
                            <input type="email" class="form-control" 
                            
                            name="email" phaceholder="Seu email (login)" 
                            
                            value="<?php echo $usuario->email;?>">

                            <div id="emailHelp" class="form-text"></div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Ativo</label>
                            <select class="form-control" name="active">
                                
                                <!-- <option value="0">  Sim </option> INFORMAÇÃO ESTATICA-->

                                <!-- INFORMAÇÃO VINDA DO BANCO-->
                                
                                <!-- PRINTANDO UM SELECTED DE ACORDO COM O PARAMETRO QUE ESTÁ NO BANCO DE DADOS EXEMPLO SE TIVER 1 NÃO ESTÁ ATIVO SE TIVER 2 ESTÁ ATIVO -->

                                <!-- SE O OBJETO $USUARIO NO PARAMETRO ACTIVE FOR IGUAL == 2 então ele não esta ativo se for igual a 1 ele está ativo **tabela** user --> 

                                <option value="2" <?php echo($usuario->active == 2)? 'selected': ''?>>Não</option>
                                
                                <option value="1" <?php echo($usuario->active == 1)? 'selected': ''?>>Sim</option>
                            
                            </select>
                        </div>


                        <div class="col-md-4">
                            <label>Perfil de acesso</label>
                            <select class="form-control" name="perfil_usuario">
                                
                                <!-- SE O OBJETO $USUARIO NO PARAMETRO na tabela user_group  FOR IGUAL == 2 então a pessoa é vendedor se for igual a 1 ele é administrador **tabela** user_group --> 
                                
                                <option value="2"<?php echo($perfil_usuario->id == 2)? 'selected': ''?>>Vendedor</option>

                                <option value="1"<?php echo($perfil_usuario->id ==1)? 'selected': ''?>>Administrador</option>  
                            </select>
                        </div>


                    </div>
                    
                    <div class="mb-3 row col-md-4">
                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                        
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1"     
                        value="<?php echo $usuario->password;?>">
                    </div>


                    <!--
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    -->
                    
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>

            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->