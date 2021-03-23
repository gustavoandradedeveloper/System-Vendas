<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Login extends CI_Controller {

    public function index() {

        /*
          [email] => gugatavinho066@gmail.com
          [password] => 123
         */

        $identity = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $remember = False; // remember the user
        if ($this->ion_auth->login($identity, $password, $remember)) {
            redirect('home');
        } else {
            echo 'Erro de validação ';
            $this->load->view('layout/header');
            $this->load->view('login/index');
        }

        /*
          echo'<pre>';
          print_r($this->input->post());
          exit();

          printando na tela tudo que está sendo enviado pelo controlador expecificadamente para o metodo index
         */
    }

}
