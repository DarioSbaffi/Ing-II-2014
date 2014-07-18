<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscador_simple extends CI_Controller 
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('buscador_model');
		$this->load->library('form_validation');
	}
	public function index() {
		$data = array('titulo' => 'Buscador con multiples criterios', 
					  'resultados' => $this->busqueda_simple(),
					  'token' => $this->token());
		$buscar=$this->input->post('descripcion');		
		if($buscar<>""){
			$this->load->view('buscador_view2',$data);
		}
	}
	
	public function busqueda_simple(){
		$buscar=$this->input->post('descripcion');		
		if($buscar==""){
			$alert?>  <script language='javascript'> alert('Por favor ingrese algun dato a buscar');window.location.href='http://localhost/ci-example/home';</script><?
		}
		else{
			$resultados = $this->buscador_model->descripcion();
			if($resultados !== FALSE) {
				return $resultados;
			}
		}
	}
	public function new_user() {
        if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[4]|max_length[150]|xss_clean');
 
            //lanzamos mensajes de error si es que los hay
            
            if($this->form_validation->run() == FALSE) {
                $this->index();
            }else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $check_user = $this->login_model->login_user($username,$password);
                if($check_user == TRUE) {
                    $data = array('logueo'=>TRUE,
								  'id_usuario'=>$check_user->id_usuario,
								  'tipo'=>$check_user->tipo,
								  'username'=>$check_user->nom_usuario
								  );        
                    $this->session->set_userdata($data);
                    $this->index();
                }
            }
        }else{
			redirect(base_url().'home');
        }
    }
    
    public function token() {
        $token = md5(uniqid(rand(),true));
        $this->session->set_userdata('token',$token);
        return $token;
    }
    
    public function logout_ci() {
        $this->session->sess_destroy();
		redirect(base_url().'home');
    }
}
