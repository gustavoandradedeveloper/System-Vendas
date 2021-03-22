
<?php $this->load->view('layout/siderbar'); ?>

<!-- Main Content -->
<div id="content">

    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

              <!-- DataTales Example -->
              <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Usuário</th>
                      <th>Login</th>
                      <th>Ativo</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                     
                     <!-- a primeira variavel tem que trazer exatamente a informação que está enviando para view dentro de data que no caso aqui é usuarios tipo: 
                        $data = array(
                        'usuarios' => $this->ion_auth->users()->result(), 
                        ); tudo isto está no controller Usuarios
                        o user pode ser qualquer nome ele é um objeto criado
                        -->

                    <?php foreach($usuarios as $user):?>
                    
                    <tr>

                      <!-- mostrando a informação de cada usuarios -->
                      <!-- $user e o objeto -> ponto e o atributo que queremos acessar do objeto-->

                      <td><?php echo $user->id ?></td>
                      <td><?php echo $user->username ?></td>
                      <td><?php echo $user->email ?></td>
                      <td><?php echo $user->active ?></td>
                      <td> 
                            <a title="Editar" href="" class="btn btn-sm btn-primary">Editar</a>

                            <a title="Excluir" href="" class="btn btn-sm btn-danger">Excluir</a>
                      </td>
                    </tr>

                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->