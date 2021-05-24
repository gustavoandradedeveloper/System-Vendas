<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Sistema extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        //serve para fazer o redirecionamento da pagina AMD caso o usuario tente acessar a parte ADM sem está logado na plataforma
        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou!');
            redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Editar informações do sistema',
            'sistema' => $this->core_model->get_by_id('sistema', array('sistema_id' => 1)),
        );
        $this->form_validation->set_rules('sistema_razao_social', 'Razão social', 'required|min_length[10] |max_length[145]');
        $this->form_validation->set_rules('sistema_nome_fantasia', 'Nome fantasia', 'required|min_length[10] |max_length[145]');
        $this->form_validation->set_rules('sistema_cnpj', 'CNPJ', 'required|max_length[25]');
        $this->form_validation->set_rules('sistema_ie', '', 'required|exact_length[18]');
        $this->form_validation->set_rules('sistema_telefone_fixo', '', 'required|max_length[25]');
        $this->form_validation->set_rules('sistema_telefone_movel', '', 'required|max_length[25]');
        $this->form_validation->set_rules('sistema_email', '', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('sistema_site_url', 'URL do site', 'required|valid_url|max_length[100]');
        $this->form_validation->set_rules('sistema_cep', 'CEP', 'required|exact_length[9]');
        $this->form_validation->set_rules('sistema_endereco', 'Endereço', 'required|max_length[145]');
        $this->form_validation->set_rules('sistema_numero', 'Número', 'required|max_length[25]');
        $this->form_validation->set_rules('sistema_cidade', 'Cidade', 'required|max_length[45]');
        $this->form_validation->set_rules('sistema_estado', 'UF', 'required|exact_length[2]');
        $this->form_validation->set_rules('sistema_txt_ordem_servico', 'Texto da ordem de serviços e vendas', 'max_length[500]');

        // "exact_length" O campo {field} deve conter exatamente {param} caractere(s)
        //regras para validação -> vinda do arquivo form_validation_lang.php
        if ($this->form_validation->run()) {
            /*

              echo '<pre>';
              print_r($this->input->post());
              exit();

              stdClass Object
              (
              [sistema_id] => 1
              [sistema_razao_social] => Tech Manager
              [sistema_nome_fantasia] => Tech Manager
              [sistema_cnpj] => 17.184.837/0001-30
              [sistema_ie] =>
              [sistema_telefone_fixo] =>
              [sistema_telefone_movel] =>
              [sistema_email] => techmanager@contato.com.br
              [sistema_site_url] => http://localhost/meus-projetos/tech-manager/site/
              [sistema_cep] => 55730000
              [sistema_endereco] => Derby
              [sistema_numero] => 114
              [sistema_cidade] => Vitoria de Santo Antão
              [sistema_estado] => PE
              [sistema_txt_ordem_servico] =>
              [sistema_data_alteracao] => 2021-05-17 21:04:10
              )

              /*
              echo'<pre>';
              print_r($data['sistema']);
              exit();
             */
            //criando um array para pegar os dados vindo da view  e salvar no banco de dados
            $data = elements(
                    array(
                'sistema_razao_social',
                'sistema_nome_fantasia',
                'sistema_cnpj',
                'sistema_ie',
                'sistema_telefone_fixo',
                'sistema_telefone_movel',
                'sistema_email',
                'sistema_site_url',
                'sistema_cep',
                'sistema_endereco',
                'sistema_numero',
                'sistema_cidade',
                'sistema_estado',
                'sistema_txt_ordem_servico',
                    ), $this->input->post()
            );

            $this->core_model->update('sistema', $data, array('sistema_id' => 1));
            // vai ser igual '=> 1 ' porque só vai ter um registro desse nesse meu sistema e ele vai ser apenas atualizado
            redirect('sistema');
        } else {
            $this->load->view('layout/header', $data);
            $this->load->view('sistema/index');
            $this->load->view('layout/footer');
        }
    }

}
