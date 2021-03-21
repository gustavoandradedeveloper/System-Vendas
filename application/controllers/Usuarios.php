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
    
}
