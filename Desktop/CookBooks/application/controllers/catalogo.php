<?php
	class Catalogo extends CI_Controller {
   
    public function __construct() {
        parent::__construct();
			$this->load->model('login_model');
			  $this->load->model('catalogos_model');
	}
    
    public function index() {    
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
                redirect(base_url().'usuario',$data);
                break;
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
        //cargamos la vista y el array data
        $this->load->view('catalogo_view', $data);
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
?>
