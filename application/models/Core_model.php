<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Core_model extends CI_Model {

    //função que vai recuperar todos os dados da tabela que for passsada aqui   
    public function get_all($tabela = NULL, $condicao = NULL) {
        // vai receber um array chamado condição onde:
        //caso a tabela seja passada faz os outros processo 
        //se a tabela não for passada vai retorna Falso
        if ($tabela) {
            //se a condição for passada e a mesma for um array então
            if (is_array($condicao)) {


                //execute where conforme a condição que foi passada no array condição
                $this->db->where($condicao);
            }
            //caso condição seja passsada e não seja um array, vai retornar todos  os dados da tabela 
            return $this->db->get($tabela)->result();
        } else {
            return FALSE;
        }
    }

    //
    public function get_by_id($tabela = NULL, $condicao = NULL) {

        //SE A TABELA FOR PASSADA E for uma array de condição ou seja se o array estiver contendo alguma condição
        if ($tabela && is_array($condicao)) {

            //
            $this->db->where($condicao);

            //pois estou buscando por id e estou retornando uma linha apenas eu deixo o limit como 1
            $this->db->limit(1);

            //
            return $this->db->get($tabela)->row();
        } else {
            //se nada acima for passada retonar falso
            return FALSE;
        }
    }

    //função ou método para inserir dados na tabela
    public function insert($tabela = NULL, $data = NULL, $get_last_id = NULL) {

        //se a tabela for passada e a variavel data = a dados for um array então
        if ($tabela && is_array($data)) {

            //vai inserir os dados
            //insira na tabela os dados desse array data ou (array de dados)
            $this->db->insert($tabela, $data);

            // se foi passado essa informação abaixo como true 
            if ($get_last_id) {

                //vai salvar na sessão usuario por exemplo-> (vai criar uma coluna ou um campo com o valor do ultimo id inserido)  setar no os dados do usuario que está logado
                //um campo last_id com um informação que é do codeigniter
                $this->session->set_userdata($this->db->insert_id());
            }

            /*
             * ou seja se der true quando for usar essa função no controller colocando mais um parametro 
             * colocando a tabela o array de dados que são todos os dados do $_POST[];
             * E tambem se setou como true
             * vai inserir os dados e recuperar na sessão um campo chamado last_id com o valor do ultimo id que foi inserido 
             *             
             */

            // se o numeros de linha afetada for maior que zero 

            if ($this->db->affected_rows() > 0) {

                //então vai ser lançado na sessão a mensagem
            } else {
                $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
            }
        } else {
            $this->session - set_flashdata('erro', 'Erro ao Salvar dados no banco');
        }
    }

    //função ou método para atualizar os dados na tabela
    public function update($tabela = NULL, $data = NULL, $condicao = NULL) {

        if ($tabela && is_array($data) && is_array($condicao)) {
            //se a tabela foi passada a variavel de data/dados for um array assim como a variavel condicao tambem for um array
            //se a atualização ocorreu na tabela com os dados que foram enviado dentro da condição que foi passada
            if ($this->db->update($tabela, $data, $condicao)) {

                // entao ele vai ser atualizado e mostrar a mensagem Dados salvos com sucesso
                $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso');
            } else {
                //se não vai dar um erro a atualizar os dados 
                $this->session->set_flashdata('erro', 'Erro ao atualizar dados no banco');
            }
        } else {
            //se a condição acima não for atendida ele vai retornar falso 
            return FALSE;
        }
    }

    //função para excluir dados da tabela 
    public function delete($tabela = NULL, $condicao = NULL) {

        //desabilitando o db debug do codeigniter antes de começar as verificações
        $this->db->debug = FALSE;

        if ($tabela && is_array($condicao)) {
            //se a tabela foi passada a variavel de condicao for um array ele vai fazer um delete
            //criando uma instrução para não deixar deletar arquivos que esteja sendo usado em outra tabela
            //Criando a variavel status que vai receber o resultado da deleção da ação do delete no banco
            $status = $this->db->delete($tabela, $condicao);

            //essa variavel vai armazema se houve algum erro no banco de dados ao tentar deletar um arquivo que está sendo utilizado por outra tabela
            // exemplo se tentar deletar uma categoria que está sendo utilizada na tabela produto por exemplo categoria gamer -> notebook gamer ele não vai deixar  vai mostra a messagem
            //essa variavel vai armazema se houve algum erro no banco de dados (erro de constrainte erro de chave estrangeira)
            $error = $this->db->error();

            //se a variavel status for falsa de acordo com a negação " ! "que mudar o valor logico de true para false vai abrir o foreach dentro do erro 
            if (!status) {

                //para cada laço do foreach verifica
                foreach ($erro as $code) {

                    //se for igual ao numero do erro sql vai mostrar a mensagem 
                    if ($code == 1451) {
                        $this->session->set_flashdata('erro', 'Esse registro não poderar ser excluido, pois está sendo ultilizado em outra tabela ');
                    }
                }
            } else {
                //se o numero não for igual ao numero, vai mostrar a mesagem que foi excluido com sucesso
                $this->session->set_flashdata('sucesso', 'Registro excluido com sucesso');
            }

            //habilitando 
            $this->db->debug = TRUE;
        } else {
            //se a verificação não for atendida retorne falso
            return FALSE;
        }
    }

}
