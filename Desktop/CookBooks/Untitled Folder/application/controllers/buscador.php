<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscador extends CI_Controller 
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('buscador_model');
		$this->load->library('form_validation');
	}
	public function index() {
		//pasamos el título y los resultados de la búsqueda a la vista
		//a través del array data
		$data = array('titulo' => 'Buscador con multiples criterios', 
					  'resultados' => $this->busqueda(),
					  'token' => $this->token());
		$this->load->view('buscador_view',$data);
	}
	
	//aquí es donde hacemos toda la búsqueda del buscador
	public function busqueda() {
		
		if($this->input->post('buscar')) {
			//limpiamos los campos del formulario, no necesitamos validar
			$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|max_length[40]|xss_clean');		 
	        $this->form_validation->set_rules('nombre_busqueda', 'nombre_busqueda', 'trim|xss_clean');
	
			//los campos del formulario deben tener el mismo nombre
			//que los de la base de datos a buscar, esto luego lo 
			//recorremos para comprobar como vienen				
			$campos = array('titulo','descripcion');
			//envíamos los datos al modelo para hacer la búsqueda
			$model=$this->input->post('nombre_busqueda');
			if($model==''){
				$alert?><script language="javascript">alert("Ingrese algun dato para buscar");</script><?
				return false;
			}
			else{
				$resultados = $this->buscador_model->$model();
				if($resultados !== FALSE) {
					return $resultados;
				}
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
