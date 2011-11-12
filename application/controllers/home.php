<?php

class home extends CI_Controller {

    private $vet_dados = array();

    function index() {

        $this->vet_dados["topo"]     = $this->parser->parse("topo_view", $this->vet_dados, TRUE);
        $this->vet_dados["menu"]     = $this->parser->parse("menu_view", $this->vet_dados, TRUE);
        $this->vet_dados["conteudo"] = $this->parser->parse("home_view", $this->vet_dados, TRUE);
        $this->vet_dados["rodape"]   = $this->parser->parse("rodape_view", $this->vet_dados, TRUE);

        $this->parser->parse("template_view", $this->vet_dados);

    }

}

/* End of file home.php */
/* Location: ./system/application/controllers/home.php */