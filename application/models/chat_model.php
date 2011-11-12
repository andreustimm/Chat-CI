<?php

class chat_model extends CI_Model {

    private $vet_dados = array();

    public function mostrar() {

        if ($this->session->userdata('nome')) {
            return $this->get_texto();
        } else {
            return $this->parser->parse('home_view', $this->vet_dados, TRUE);
        }
        
    }

    public function rodape() {

        if ($this->session->userdata('nome')) {
            return $this->parser->parse("rodape_view", $this->vet_dados, TRUE);
        }

    }

    public function get_user() {

        if ($this->session->userdata('nome')) {

            $sessao = $this->getSessao();

            for ($i = 0; $i < count($sessao); $i++) {

                $nome = '';
                $nome = str_replace('a:1:{s:4:"nome";s:','',$sessao[$i]->user_data);
                $nome = str_replace('";}','',$nome);
                $vet2 = explode(':',$nome);

                $vet[$i]['nome'] = str_replace('"','',$vet2[1]);

            }

            $this->vet_dados['users'] = $vet;
            
            return $this->parser->parse('chat/chat_user_view', $this->vet_dados, TRUE);

        }

    }

    public function get_texto() {

        if ($this->session->userdata('nome')) {

            $this->vet_dados['chat'] = $this->getMsg();
            return $this->parser->parse('chat/chat_view', $this->vet_dados, TRUE);

        } else {

            $this->session->sess_destroy();
            return $this->mostrar();

        }

    }

    public function getMsg($id=null) {
        
        $this->db->from('msg');

        $this->db->order_by('id_msg', 'DESC');

        if ($id != null) {
            $this->db->where('id_msg', $id);
            return $this->db->get()->row();
        } else {
            return $this->db->get()->result();
        }

    }

    public function getSessao($id=null) {

        $this->db->from('sessao');

        $this->db->where("user_data != ''");

        if ($id != null) {
            $this->db->where('session_id', $id);
            return $this->db->get()->row();
        } else {
            return $this->db->get()->result();
        }

    }

    public function enviar() {

        if ($this->session->userdata('nome')) {

            if ($this->input->post('texto_msg')) {
                $this->db->set('texto_msg', $this->input->post('texto_msg', TRUE));
            }

            if ($this->session->userdata('nome')) {
                $this->db->set('nome_msg', $this->session->userdata('nome'));
            }

            $this->db->insert('msg');

            return $this->db->insert_id() > 0 ? TRUE : FALSE;

        } else {

            return false;

        }

    }

}

/* End of file chat_model.php */
/* Location: ./system/application/models/chat_model.php */
