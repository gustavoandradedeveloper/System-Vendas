<?php
defined('BASEPATH') OR exit ('Ação não permitida ');

class Usuarios extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        //definir se há sessão
    }
    
    //responsavel por chamar a view que vai apresentar no navegador os usuarios cadastrado -> vai mostrar em uma tabela
    public function index(){
        
        //criando uma variavel do tipo array
        //vai conter uma chaves chamada usuario que vai conter os usuarios cadastrado no banco de dados 
        //para saber atraves do plugin como recurerar os dados do banco -> vai na documentação e procura 
        

        $data = array(

            'titulo'=> 'Usuários cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),

            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
            ),
            'usuarios' => $this->ion_auth->users()->result(), 
        );//dentro do data já se tem informação para ser passada na view porem não ta sendo carregada a view para qual essas informações vai ser passsada 
        
        /*
        verificando se está vindo dados do bd

        echo'<pre>';
        print_r($data['usuarios']);
        exit();
        */

        //carrega a view header com o array data que contem todos os dados que vai ser mostrado na view
        $this->load->view('layout/header',$data);
        
        //carrega a view usuarios
        $this->load->view('usuarios/index');
        
        //carrega o footer do site
        $this->load->view('layout/footer');
    }
    
    public function edit($user_id = NULL){
        

            if(!$user_id || !$this->ion_auth->user($user_id)->row()) {

                exit('Usuário não encontrado');

            } else {

                $data = array(
                'titulo' => 'Editar usuários',
                'usuario' => $this->ion_auth->user($user_id)->row(),
                );
            /*
            echo '<pre>';
            print_r($data['usuario']);
            exit();
            */
            
            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/edit');
            $this->load->view('layout/footer');

        }
    }
}