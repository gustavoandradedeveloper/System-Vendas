<?php

//definindo o caminho base caso não exista ele mostra a mensagem ação não permitida.
defined('BASEPATH') OR exit('Ação não permitida');

class Login extends CI_Controller {

    public function index() {

        /*
          [email] => gugatavinho066@gmail.com
          [password] => 123
         */
        
        //A identidade é chave para login, nesse caso aqui é o email 
        $identity = $this->security->xss_clean($this->input->post('email')); 
        //aqui é a senha (security->xss_clean faz a limpeza)
        $password = $this->security->xss_clean($this->input->post('password'));
        $remember = False; // lembrar usuário
        
        //se o usuário logar, redireciona para home da parte adm 
        if ($this->ion_auth->login($identity, $password, $remember)) {
            redirect('home');
        } else {
            //se não carregar as views de login 
            $this->session->set_flashdata('error','Verifique seu email ou senha');
            $this->load->view('layout/header');
            $this->load->view('login/index');
            $this->load->view('layout/footer');
        }
        /*
          printando na tela tudo que está sendo enviado pelo controlador expecificadamente para o metodo index
         */
    }

}
