<?php
	class Home extends CI_Controller {
   
    public function __construct() {
        parent::__construct();
			$this->load->model('login_model');
			$this->load->model('catalogos_model');
			$this->load->model('suscripcion_model');
			$this->lang->load('registro','spanish');
			$this->lang->load('form_validation','spanish');
	}
    
    public function index() {    
		$data["resultados"] = $this->catalogos_model->libros_home();
        switch ($this->session->userdata('tipo')) {
            case '':
                $data['token'] = $this->token();
                $this->load->view('Main_View',$data);
                $this->load->view('Main_Footer');
                break;
            case 'a':
                redirect(base_url().'home_abm',$data);
                break;
            case 'A':
                redirect(base_url().'home_abm',$data);
				break;
            case 'U':
				switch ($this->session->userdata('estado')) {
				
					case 'activo':
						redirect(base_url().'usuario',$data);
					break;
					
					case 'baja_pendiente':
						?><script language="javascript">alert("Usted solicito la baja de esta cuenta, por lo tanto, esta cuenta ya no se encuentra disponible para loguearse");
							window.location.href="http://localhost/ci-example/home/logout_ci";</script><?
					break;
					
					case 'baja':
						?><script language="javascript">alert("Esta cuenta no se encuentra disponible para acceder");
							window.location.href="http://localhost/ci-example/home/logout_ci";</script><?
					break;
				}
        }
    }
    
    public function cat() {
        $pages = 4; //Número de registros mostrados por páginas
        $this->load->library('pagination'); //Cargamos la librería de paginación
        $config['base_url'] = base_url().'catalogos/pagina'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $this->catalogos_model->libros(); //calcula el número de filas
        $config['per_page'] = $pages; //Número de registros mostrados por páginas
        $config['num_links'] = 20; //Número de links mostrados en la paginación
        $config['first_link'] = 'Primera'; //primer link
        $config['last_link'] = 'Última'; //último link
        $config['next_link'] = 'Siguiente'; //siguiente link
        $config['prev_link'] = 'Anterior'; //anterior link
        $config['full_tag_open'] = '<div id="paginacion">'; //el div que debemos maquetar
        $config['full_tag_close'] = '</div>'; //el cierre del div de la paginación
        $this->pagination->initialize($config); //inicializamos la paginación
        //el array con los datos a paginar ya preparados
        $data["Catalogos"] = $this->catalogos_model->total_posts_paginados($config['per_page'], $this->uri->segment(3));
        $data['token'] = $this->token();
        //cargamos la vista y el array data
        $this->load->view('catalogo_view', $data);
    }
    
    public function info_libro($id_libro){
		$data['libro'] = $this->catalogos_model->libros_informacion($id_libro);
		$this->load->view('info_libro_view',$data);
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
								  'password'=>$check_user->clave,
								  'username'=>$check_user->nom_usuario,
								  'estado'=>$check_user->estado
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
    
    public function suscripcion(){
		$la=$this->session->userdata('id_usuario');
		$mail=$this->input->post('reg_email');
		if(isset($_POST["submit"])){	
			$result=$this->suscripcion_model->suscribir($mail,$la);
			echo $result;
		}
		else{
			if(isset($_POST["cancel"])){
				$result=$this->suscripcion_model->cancelar_suscribir($mail,$la);
				if($result){	
					$alert?>  <script language='javascript'> alert('Se logro cancelar la suscripcion correctamente');window.location.href='<?base_url()?>home';</script><?
					echo $alert;
				}
				else{
					$alert?>  <script language='javascript'> alert('No se logro cancelar la suscripcion correctamente');window.location.href='<?base_url()?>home';</script><?
					echo $alert;
				}
			}
		}
	}
	
	public function faqs() {
        $this->load->view("faqs_view");
        $this->load->view("Main_Footer");
    }
}
?>
