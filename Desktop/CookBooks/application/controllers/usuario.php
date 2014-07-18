<?php
class Usuario extends CI_Controller {
   
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
		$this->load->view('usuario_view',$data); 
		$this->load->view('Main_Footer');
    }
    
    public function logout_ci() {
        $this->session->sess_destroy();
		redirect(base_url().'home');
    }
    
	public function suscripcion(){
		$la=$this->session->userdata('id_usuario');
		$mail=$this->input->post('reg_email');
		if(isset($_POST["submit"])){	
			$result=$this->suscripcion_model->suscribir_UR($mail,$la);
			echo $result;
		}
		else{
			if(isset($_POST["cancel"])){
				$result=$this->suscripcion_model->cancelar_suscribir($mail,$la);
				if($result){	
					$alert?>  <script language='javascript'> alert('Se logro cancelar la suscripcion correctamente');window.location.href='<?base_url()?>usuario';</script><?
					echo $alert;
				}
				else{
					$alert?>  <script language='javascript'> alert('No se logro cancelar la suscripcion correctamente');window.location.href='<?base_url()?>usuario';</script><?
					echo $alert;
				}
			}
		}
	}
 
}
?>
