<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller 

{
	public function index()
	{
		$this->load->view('start/logowanie');
	}
	
	public function glowny()
	{
		$this->load->view('start/glowny');
	}
        
        public function test_1()
        {
            echo "test_1kjhgfghjkjhgf";
        }
}

/* End of file start.php */
/* Location: ./application/controllers/start.php */
