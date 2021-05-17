<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Sistema extends CI_Controller{

    public function __construct() {
        parent: : __construct();

        //serve para fazer o redirecionamento da pagina AMD caso o usuario tente acessar a parte ADM sem está logado na plataforma
        if (!$this->ion_auth->logged_in())
        {
            $this->session->set_flashdata('info','Sua sessão expirou!');
            redirect('login');
        }
      
    }
}