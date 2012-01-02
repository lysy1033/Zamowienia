<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Sklepy extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sklepy_model');
    }
    
    public function index()
    {
        $this->lista();    
    }

    public function lista()
    {
        $lista_sklepow = null;
        $lista_sklepow['lista_sklepow'] = $this->model->Sklepy_model->pobierz_sklepy();
        $this->load->view('sklepy/lista',$lista_sklepow);
    }
}

/* End of file sklepy.php */
/* Location: ./application/controllers/sklepy.php */