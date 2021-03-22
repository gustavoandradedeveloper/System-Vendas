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
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a title="Voltar" href="<?php echo base_url('usuarios');?>" class="btn btn-success btn-sm float-right"><i class="fas fa-arrow-left"></i>&nbsp Voltar</a>
            </div>

            <div class="card-body">
                <form>
                    <div class="mb-3 row">
                        <div class="col-md-4">
                        
                            <label>Nome</label>
                            <input type="text" class="form-control" name="first_name" phaceholder="Seu Nome" value="<?php echo $usuario->first_name;?>">

                            <div id="emailHelp" class="form-text"></div>
                        </div>
                    </div>
                    <div class="mb-3 row col-md-4">
                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" value="<?php echo $usuario->password;?>">
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