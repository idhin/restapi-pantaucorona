<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/JWT.php';
use \Firebase\JWT\JWT;

class Pantaucorona extends CI_Controller {

	private $secret = 'this is key secret';

	public function __construct()
	{
		parent::__construct();
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


    public function indonesia(){
        return $this->response($this->u->indonesia());
	}
	
	public function hariini(){
        return $this->response($this->u->hariini());
    }

    public function provinsi(){
        return $this->response($this->u->provinsi());
    }

    public function dunia(){
        return $this->response($this->u->dunia());
    }

    public function sembuh(){
        return $this->response($this->u->sembuh());
    }

    public function meninggal(){
        return $this->response($this->u->meninggal());
    }
    
    public function positif (){
        return $this->response($this->u->positif());
    }

	public function register()
	{
		return $this->response($this->u->save());
	}

	public function get_all()
	{
		return $this->response($this->u->get());
	}

	public function get($id)
	{
		return $this->response($this->u->get('id',$id));
	}

	public function login(){
		$date = new DateTime();
		if (!$this->u->is_valid()){
			return $this->response([
				'success' => false,
				'message' => 'email atau password salah'
			]);
	}else{
		$user = $this->u->get('email', $this->input->post('email'));
		$payload['id'] = $user->id;
		$payload['email'] = $user->email;
		$payload['iat'] = $date->getTimestamp();
		$payload['exp'] = $date->getTimestamp() + 60*60*24;

		$output ['id_token'] = JWT::encode($payload, $this->secret);
		$output ['id'] = $user->id; 
		// $output ['email'] = $payload['email'] = $user->email;
		$output ['message'] = "Sukses Bro";
		$this->response($output);
	}
	}

	public function check_token(){

	}


	
}
