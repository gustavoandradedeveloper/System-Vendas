<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Fornecedores extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou! Por favor realize seu login novamente');
            redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Fornecedores cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'fornecedores' => $this->core_model->get_all('fornecedores'),
        );

//        echo '<pre>';
//        print_r($data['fornecedores']);
//        exit();

        $this->load->view('layout/header', $data);
        $this->load->view('fornecedores/index');
        $this->load->view('layout/footer');
    }

    public function add() {

        $this->form_validation->set_rules('fornecedor_razao', '', 'trim|required|min_length[4]|max_length[200]|is_unique[fornecedores.fornecedor_razao]');

        $this->form_validation->set_rules('fornecedor_nome_fantasia', '', 'trim|required|min_length[4]|max_length[145]|is_unique[fornecedores.fornecedor_nome_fantasia]');
        $this->form_validation->set_rules('fornecedor_cnpj', '', 'trim|required|exact_length[18]|is_unique[fornecedores.fornecedor_cnpj]|callback_valida_cnpj');
        $this->form_validation->set_rules('fornecedor_ie', '', 'trim|required|max_length[20]|is_unique[fornecedores.fornecedor_ie]');
        $this->form_validation->set_rules('fornecedor_email', '', 'trim|required|valid_email|max_length[50]|is_unique[fornecedores.fornecedor_email]');
        $this->form_validation->set_rules('fornecedor_telefone', '', 'trim|required|max_length[14]|is_unique[fornecedores.fornecedor_telefone]');
        $this->form_validation->set_rules('fornecedor_celular', '', 'trim|required|max_length[15]|is_unique[fornecedores.fornecedor_celular]');

        $this->form_validation->set_rules('fornecedor_cep', '', 'trim|required|exact_length[9]');
        $this->form_validation->set_rules('fornecedor_endereco', '', 'trim|required|max_length[155]');
        $this->form_validation->set_rules('fornecedor_numero_endereco', '', 'trim|max_length[20]');
        $this->form_validation->set_rules('fornecedor_bairro', '', 'trim|required|max_length[45]');
        $this->form_validation->set_rules('fornecedor_complemento', '', 'trim|max_length[145]');
        $this->form_validation->set_rules('fornecedor_cidade', '', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('fornecedor_estado', '', 'trim|required|exact_length[2]');
        $this->form_validation->set_rules('fornecedor_obs', '', 'max_length[500]');


        if ($this->form_validation->run()) {

            $data = elements(
                    array(
                'fornecedor_razao',
                'fornecedor_nome_fantasia',
                'fornecedor_cnpj',
                'fornecedor_ie',
                'fornecedor_email',
                'fornecedor_telefone',
                'fornecedor_celular',
                'fornecedor_endereco',
                'fornecedor_numero_endereco',
                'fornecedor_complemento',
                'fornecedor_bairro',
                'fornecedor_cep',
                'fornecedor_cidade',
                'fornecedor_estado',
                'fornecedor_ativo',
                'fornecedor_obs',
                    ), $this->input->post()
            );

            $data['fornecedor_estado'] = strtoupper($this->input->post('fornecedor_estado'));

            $data = html_escape($data);

            $this->core_model->insert('fornecedores', $data);

            redirect('fornecedores');
        } else {


            //Erro de validação

            $data = array(
                'titulo' => 'Cadastrar fornecedor',
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                ),
            );

            $this->load->view('layout/header', $data);
            $this->load->view('fornecedores/add');
            $this->load->view('layout/footer');
        }
    }

}
