<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Usuario extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index()	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'usuario') {
			redirect(base_url().'home');
		}
		$data['titulo'] = 'Bienvenido de nuevo ' .$this->session->userdata('perfil');
		$this->load->view('login_view/usuario_view',$data);
	}
}
