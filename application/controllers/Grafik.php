<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('harian','h');
        $this->load->model('user','u');
    }

    public function response($data)
	{
		$this->output
				->set_content_type('application/json')
				->set_status_header(200)
				->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
				->_display();

		exit;
    }

    
    
    public function index(){
        date_default_timezone_set("Asia/Jakarta");
        
        $tgl = date('d');
        $bln = date ('m');
        $year = date ('y');

        // echo date('d-m-Y');
    }

    public function hariini(){
        return $this->response($this->u->hariini());
    }

	
}
