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

    public function add() {

        //trim tira o espaço do comeco e do fim da string e required esse campo não pode vim em branco!
        $this->form_validation->set_rules('first_name', '', 'trim|required');
        $this->form_validation->set_rules('last_name', '', 'trim|required');
        $this->form_validation->set_rules('email', '', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('username', '', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Senha', 'required|min_length[5]|max_length[255]'); // no minino 5 digito e no maximo 255 na senha 
        $this->form_validation->set_rules('confirm_password', 'confirme', 'matches[password]'); // verifica se o campo confirm_password e igual a password 

        if ($this->form_validation->run()) {
            $username = $this->security->xss_clean($this->input->post('username'));
            $password = $this->security->xss_clean($this->input->post('password'));
            $email = $this->security->xss_clean($this->input->post('email'));

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'username' => $this->input->post('username'),
                'last_name' => $this->input->post('last_name'),
                'active' => $this->input->post('active'),
            );
            $group = array($this->input->post('perfil_usuario')); // Sets user to admin.

            $additional_data = $this->security->xss_clean($additional_data);

            $group = $this->security->xss_clean($group);

            if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {

                $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
            } else {
                $this->session->set_flashdata('erro', 'Erro ao salvar os dados');
            }

            redirect('usuarios');
            //echo '<pre>';
            //print_r($additional_data);
            //exit();


            exit('Validado');
        } else {
            //erro de validação

            $data = array(
                'titulo' => 'Cadastrar usuários',
            );
            //carregando as view
            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/add');
            $this->load->view('layout/footer');
        }
    }

    //caso o usuario não passe nenhum id, não vai dar erro 
    public function edit($usuario_id = NULL) {

        // se nao for passado o id do usuariou ou se foi passado e ele não existe entao vai dar um exit
        if (!$usuario_id || !$this->ion_auth->user($usuario_id)->row()) {

            $this->session->set_flashdata('error', 'Usuário não encontrado');
            redirect('usuarios');
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
            $this->form_validation->set_rules('last_name', '', 'trim|required');
            $this->form_validation->set_rules('email', '', 'trim|required|valid_email|callback_email_check');
            $this->form_validation->set_rules('username', '', 'trim|required|callback_username_check');
            $this->form_validation->set_rules('password', '', 'min_length[5]|max_length[255]required'); // no minino 5 digito e no maximo 255 na senha 
            $this->form_validation->set_rules('confirm_password', 'confirme', 'matches[password]'); // verifica se o campo confirm_password e igual a password 
            //verificar se o formulario rodou
            if ($this->form_validation->run()) {
                $data = elements(
                        array(
                    'first_name',
                    'last_name',
                    'email',
                    'username',
                    'active',
                    'password',
                        ), $this->input->post()
                );

                $data = $this->security->xss_clean($data);

                $password = $this->input->post('password');

                //verificar se foi passado a senha 
                if (!$password) {

                    unset($data['password']);
                }


                if ($this->ion_auth->update($usuario_id, $data)) {
                    //recuperando o grupo que esse id faz parte
                    $perfil_usuario_db = $this->ion_auth->get_users_groups($usuario_id)->row();
                    $perfil_usuario_post = $this->input->post('perfil_usuario');

                    //se for diferente atualizar o grupo
                    if ($perfil_usuario_post != $perfil_usuario_db->id) {
                        $this->ion_auth->remove_from_group($perfil_usuario_db->id, $usuario_id);
                        $this->ion_auth->add_to_group($perfil_usuario_post, $usuario_id);
                    }
                    $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
                } else {
                    $this->session->set_flashdata('error', 'Erro ao salvos os dados');
                }
                redirect('usuarios');
            } else {
                //retorna para view usuario e mostrar a mensagem de erro
                // se existir vai criar um array de dados e vai armazena nessa chave usuarios todos os dados desse usuario que vem do BD 
                $data = array(
                    'titulo' => 'Editar usuários',
                    'usuario' => $this->ion_auth->user($usuario_id)->row(),
                    'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row(),
                );

                //carregando as view
                $this->load->view('layout/header', $data);
                $this->load->view('usuarios/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function del($usuario_id = NULL) {
        if (!$usuario_id || !$this->ion_auth->user($usuario_id)->row()) {
            $this->session->set_flashdata('error', 'Usuário não encontrado');
            redirect('usuarios');
        }

        if ($this->ion_auth->is_admin($usuario_id)) {
            $this->session->set_flashdata('error', 'O administrador não pode ser excluido');
            redirect('usuarios');
        }

        if ($this->ion_auth->delete_user($usuario_id)) {
            
            $this->session->set_flashdata('sucesso', 'Usuário excluido com sucesso');
            redirect('usuarios');
            
        } else {
            $this->session->set_flashdata('error', 'Usúario não pode ser excluido');
            redirect('usuarios');
        }
    }

    public function email_check($email) {
        $usuario_id = $this->input->post('usuario_id');

        if ($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))) {
            $this->form_validation->set_message('email_check', 'Esse e-mail já existe');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function username_check($username) {
        $usuario_id = $this->input->post('usuario_id');

        if ($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))) {
            $this->form_validation->set_message('$username', 'Esse usuário já existe');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
