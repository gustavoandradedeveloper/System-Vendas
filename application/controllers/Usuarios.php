<?php

defined('BASEPATH') OR exit('Ação não permitida ');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //definir se há sessão
    }

    //responsavel por chamar a view que vai apresentar no navegador os usuarios cadastrado -> vai mostrar em uma tabela
    public function index() {

        //criando uma variavel do tipo array
        //vai conter uma chaves chamada usuario que vai conter os usuarios cadastrado no banco de dados 
        //para saber atraves do plugin como recurerar os dados do banco -> vai na documentação e procura 


        $data = array(
            'titulo' => 'Usuários cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
            ),
            'usuarios' => $this->ion_auth->users()->result(),
        ); //dentro do data já se tem informação para ser passada na view porem não ta sendo carregada a view para qual essas informações vai ser passsada 

        /*
          verificando se está vindo dados do bd

          echo'<pre>';
          print_r($data['usuarios']);
          exit();
         */

        //carrega a view header com o array data que contem todos os dados que vai ser mostrado na view
        $this->load->view('layout/header', $data);

        //carrega a view usuarios
        $this->load->view('usuarios/index');

        //carrega o footer do site
        $this->load->view('layout/footer');
    }

    //caso o usuario não passe nenhum id, não vai dar erro 
    public function edit($usuario_id = NULL) {

        // se nao for passado o id do usuariou ou se foi passado e ele não existe entao vai dar um exit
        if (!$usuario_id || !$this->ion_auth->user($usuario_id)->row()) {

            exit('Usuário não encontrado');
        } else {

            /*
             * Array
              (
              [first_name] => Admin
              [last_name] => adm
              [email] => admin@admin.com
              [username] => administrator
              [active] => 1
              [perfil_usuario] => 1
              [password] => 123
              [confirm_password] => 123
              [usuario_id] => 1
              )
             */

            //trim tira o espaço do comeco e do fim da string e required esse campo não pode vim em branco!
            $this->form_validation->set_rules('first_name', '', 'trim|required');

            //verificar se o formulario rodou
            if ($this->form_validation->run()) {
                
                exit('');
                
            } else {
                //retorna para view usuario e mostrar a mensagem de erro
                // se existir vai criar um array de dados e vai armazena nessa chave usuarios todos os dados desse usuario que vem do BD 
                $data = array(
                    'titulo' => 'Editar usuários',
                    'usuario' => $this->ion_auth->user($usuario_id)->row(),
                    'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row(),
                );

                /*
                  echo '<pre>';
                  print_r($this->input->post());
                  exit();
                 */

                //carregando as view
                $this->load->view('layout/header', $data);
                $this->load->view('usuarios/edit');
                $this->load->view('layout/footer');
            }
        }
    }

}
