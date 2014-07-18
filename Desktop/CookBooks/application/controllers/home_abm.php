<?php
class Home_abm extends CI_Controller {
   
    public function __construct() {
        parent::__construct();
			$this->load->model('login_model');
			$this->load->model('catalogos_model');
	}
    
    public function index() {    
		$data["resultados"] = $this->catalogos_model->libros_home();
        switch ($this->session->userdata('tipo')) {
            case '':
                redirect(base_url().'home');
                break;
            case 'a':
                $this->load->view('abm/administrador_abm1',$data);
                $this->load->view('Main_Footer');
                break;
            case 'A':
                $this->load->view('abm/administrador_abm1',$data);
                $this->load->view('Main_Footer');
                break;
            case 'U':
                redirect(base_url().'usuario');
                break;
        }
    }
    
    public function logout_ci() {
        $this->session->sess_destroy();
		redirect(base_url().'home');
    }
}
?>
