<?php

class chat extends CI_Controller {

    private $vet_dados = array();

    public function __construct() {

        parent::__construct();
        //$this->session->set_userdata('nome', 'Andreus');
        /*echo '<pre>';
        print_r($this->session->all_userdata());
        echo date('d/m/Y H:i:s',$this->session->userdata('last_activity'));
        echo '</pre>';*/

    }

    public function chat() {
        $this->__construct();
    }

    public function index() {

        $this->vet_dados["topo"]     = $this->parser->parse("topo_view", $this->vet_dados, TRUE);
        $this->vet_dados["menu"]     = $this->chat_model->get_user();
        $this->vet_dados["conteudo"] = $this->chat_model->mostrar();//tela inicial
        $this->vet_dados["rodape"]   = $this->chat_model->rodape();

        $this->parser->parse("template_view", $this->vet_dados);

    }

    public function login() {

        if ($this->input->post('login_usuario')) {
            $this->session->set_userdata('nome', $this->input->post('login_usuario'));
            redirect(base_url());
        } else {			
            $this->vet_dados["conteudo"] = 'Erro ao se cadastra no sistema!';
            $this->parser->parse("template_view", $this->vet_dados);
        }

    }

    public function enviar() {

        if ($this->chat_model->enviar()) {
        }

    }

    public function get_log() {
        echo $this->chat_model->get_texto();
    }

    public function get_user() {
        echo $this->chat_model->get_user();
    }

    public function logoff() {
        $this->session->sess_destroy();
    }

    public function mostrar_senha() {
        echo $this->encrypt->encode(123);
    }

}

/* End of file chat.php */
/* Location: ./system/application/controllers/chat.php */
