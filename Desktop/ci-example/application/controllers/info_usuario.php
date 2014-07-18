<?php
class Info_usuario extends CI_Controller {
   
	public function __construct() {
		parent::__construct();
			$this->load->model('login_model');
			$this->load->model('usuario_model');
			$this->load->library('pagination');	
			$this->load->helper(array('url','form','language'));
			$this->load->model('cookbooks');
			$this->lang->load('registro','spanish');
			$this->lang->load('form_validation','spanish');
	}
    
    public function index(){
		$id=$this->session->userdata('id_usuario'); 
		if($this->validar()){
			$this->cookbooks->actualizarUsuario($this->input->post(),$id);
			$this->session->set_flashdata('mensaje_exito','Usted se ha registrado correctamente.');
			redirect(base_url().'info_usuario/perfil');
		}
		$datos_registro['resultados']=$this->usuario_model->info_perfil($id);
		$datos_registro['reg_form_action'] = 'http://localhost/ci-example/info_usuario';
		$datos_registro['provincias'] = $this->cookbooks->getProvincias();
		$this->load->view('usuario_modificaciones_view',$datos_registro);

	}
    
    public function perfil() { //Ver informacion de un Usuario/Administrador  
		$id=$this->session->userdata('id_usuario'); 
		$data['resultados']=$this->usuario_model->info_perfil($id);
		$this->load->view('infousuario_view',$data);
    } 
    
    public function modificar_perfil() { //Modificar unicamente datos personales  
		$id=$this->session->userdata('id_usuario'); 
		$data['resultados']=$this->usuario_model->info_perfil($id);
		$data['reg_form_action'] = 'http://localhost/ci-example/info_usuario';
		$data['provincias'] = $this->cookbooks->getProvincias();
		$data['provincias_usuario'] = $this->cookbooks->getProvinciaUsuario($id);
		$this->load->view('usuario_modificaciones_view',$data);
    } 
    
    public function estado_pedido() { //Ver los estados de los pedidos que todavia no fueron finalizados  
		$id=$this->session->userdata('id_usuario'); 
		$data['resultados']=$this->usuario_model->pedido($id);
		$this->load->view('infousuario_view2',$data); 
	}
    public function historial_compras() { //Ver unicamente los pedidos que fueron finalizados 
		$id=$this->session->userdata('id_usuario'); 
		$data['resultados']=$this->usuario_model->historial($id);
		$this->load->view('infousuario_view2',$data);
    }
    
    public function cambiar_contrasenia(){
		$id=$this->session->userdata('id_usuario');
		$data['reg_form_action'] = 'http://localhost/ci-example/info_usuario/registrar_nueva_contresenia';
		$this->load->view('infousuario_view3',$data);
	}
	
	public function registrar_nueva_contresenia(){
		$id=$this->session->userdata('id_usuario');
		if($this->validarContrasenia()){
			$this->cookbooks->actualizarContrasenia($this->input->post(),$id);
			$this->session->set_flashdata('mensaje_exito','Se ha actualizado la contrase&ntilde;a correctamente.');
			redirect('home/logout_ci');
		}
		$data['reg_form_action'] = 'http://localhost/ci-example/info_usuario/registrar_nueva_contresenia';
		$this->load->view('infousuario_view3',$data);
		
	}
	
	public function validarContrasenia(){
		
		//Configuro validaciones
		$this->form_validation->set_rules('reg_clave_actual','Contraseña Actual','required|callback_clave');
		$this->form_validation->set_rules('reg_clave','Contraseña','trim|required|min_length[6]|max_length[20]|matches[reg_confirm]');
		$this->form_validation->set_rules('reg_confirm','Confirmación','trim|required');

		//Ejecuto validaciones
		return $this->form_validation->run();

	}
	
	public function clave(){
		$id=$this->session->userdata('id_usuario');
		$pass=$this->session->userdata('password');
		$pass2=$this->input->post('reg_clave_actual');
		if($pass<>$pass2){
			$this->form_validation->set_message('clave', 'Las claves son distintas');
			return false;
		}
	}
    
    public function logout_ci() {
        $this->session->sess_destroy();
		redirect(base_url().'home');
    }
 
 
		public function validar(){
		//Configuro validaciones
		//$this->form_validation->set_rules('reg_usuario','Nombre de Usuario','trim|required|alpha_numeric|min_length[6]|max_length[40]|callback_usuario_unico');
		//$this->form_validation->set_rules('reg_email','Correo','trim|required|valid_email|max_length[80]|callback_email_unico');
		//$this->form_validation->set_rules('reg_clave','Contraseña','trim|required|min_length[6]|max_length[20]|matches[reg_confirm]');
		//$this->form_validation->set_rules('reg_confirm','Confirmación','trim|required');
		//$this->form_validation->set_rules('reg_dni','DNI','trim|required|integer|min_length[6]|max_length[8]|callback_dni_unico');
		$this->form_validation->set_rules('reg_nombre','Nombre/s','trim|required|alpha|max_length[40]');
		$this->form_validation->set_rules('reg_apellido','Apellido/s','trim|required|alpha|max_length[40]');
		$this->form_validation->set_rules('reg_telefono','Télefono','trim|required|numeric|max_length[15]');
		$this->form_validation->set_rules('reg_ciudad','Ciudad','callback_requerido');
		$this->form_validation->set_rules('reg_calle','Calle','trim|required|alpha_numeric|max_length[50]');
		$this->form_validation->set_rules('reg_numero','Número','trim|required|numeric|max_length[5]');
		$this->form_validation->set_rules('reg_piso','Piso','trim|integer|max_length[2]');
		$this->form_validation->set_rules('reg_depto','Departamento','trim|alpha_numeric|max_length[2]');

		//Ejecuto validaciones
		return $this->form_validation->run();
	}
	/**
	 * @param String $email
	 * @return boolean
	 */
	public function email_unico($email){
		if($this->cookbooks->email_unico($email)) {
			return true;
		}else{
			$this->form_validation->set_message('email_unico','El %s ya se encuentra registrado.');
			return false;
		}
	}
	/**
	 * @param String $usuario
	 * @return boolean
	 */
	public function usuario_unico($usuario){
		if($this->cookbooks->usuario_unico($usuario)) {
			return true;
		}else{
			$this->form_validation->set_message('usuario_unico','El %s ya se encuentra registrado.');
			return false;
		}
	}
	/**
	 * @param integer $dni
	 * @return boolean
	 */
	public function dni_unico($dni){
		if($this->cookbooks->dni_unico($dni)) {
			return true;
		}else{
			$this->form_validation->set_message('dni_unico','El %s ya se encuentra registrado.');
			return false;
		}
	}
	
	public function requerido($id){
		$valido = !($id == '-1');
		if($valido){
			return true;
		}else{
			$this->form_validation->set_message('requerido','El campo %s es requerido.');
			return false;
		}
	}
	public function ciudades(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}else{
			$ciudades = $this->cookbooks->getCiudades($this->input->post('id_provincia'));
			$sel = ($this->input->post('ciu') == '-1')?'selected="selected"':'';
			$html = '<option value="-1" '. $sel .'>--------------</option>';
			foreach ($ciudades as $ciudad){
				$sel = ("$ciudad->id" == $this->input->post('ciu'))?'selected="selected"':'';
				$html .= '<option value="'.$ciudad->id.'" '. $sel .'>'.$ciudad->nombre.'</option>';
			}
			echo $this->input->post('ciu') . $html;
		}
		return false;
	}
	
	//Métodos temporal. Pasar al controlador abm
	public function agregar_elemento(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}else{
			$datos['error'] = true;
			$datos['mensaje'] = 'Mensaje por defecto';
			
			$this->form_validation->set_rules('elemento',$this->input->post('nombre'),'trim|required|regex_match[/([a-zA-Z0-9.-]+\s?)+/u]|max_length[80]|callback_elemento_unico['.$this->input->post('nombre').']');
			if($this->form_validation->run()){
				$id = $this->cookbooks->agregar_elemento($this->input->post('elemento'),$this->input->post('nombre'));
				if($id){
					$datos['error'] = false;
					$datos['mensaje'] = '';
					$datos['elemento']['id'] = $id;
					$datos['elemento']['nombre'] = $this->input->post('elemento');
				}else{
					$datos['error'] = true;
					$datos['mensaje'] = 'Error de insersión del dato en la base de datos.';
				}				
			}else{
				$datos['error'] = true;
				$datos['mensaje'] = form_error('elemento',' ',' ');
			}
			echo json_encode($datos);
		}
	}
	
	public function elemento_unico($elemento,$tabla){
		if($this->cookbooks->elemento_unico($elemento,$tabla)) {
			return true;
		}else{
			$this->form_validation->set_message('elemento_unico','La %s ya se encuentra registrada.');
			return false;
		}
	}
	
	public function agregar_autor(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}else{
			$datos['error'] = true;
			$datos['mensaje'] = 'Mensaje por defecto';
			
			$this->form_validation->set_rules('nombre','Nombre','trim|required|regex_match[/([a-zA-Z]+\s?)+/u]|max_length[40]');
			$this->form_validation->set_rules('apellido','Apellido','trim|required|regex_match[/([a-zA-Z]+\s?)+/u]|max_length[40]|callback_autor_unico['.$this->input->post('nombre').']');
				
			
			if($this->form_validation->run()){
				$id = $this->cookbooks->agregar_autor($this->input->post('apellido'),$this->input->post('nombre'));
				if($id){
					$datos['error'] = false;
					$datos['mensaje'] = '';
					$datos['elemento']['id'] = $id;
					$datos['elemento']['nombre'] = $this->input->post('apellido');
				}else{
					$datos['error'] = true;
					$datos['mensaje'] = 'Error de insersión del dato en la base de datos.';
				}
			}else{
				$datos['error'] = true;
				$datos['mensaje'] = form_error('apellido',' ',' ') .' '. form_error('nombre',' ',' ');
			}
			echo json_encode($datos);
		}
	}
	
	public function autor_unico($apellido,$nombre){
		if($this->cookbooks->autor_unico($apellido,$nombre)) {
			return true;
		}else{
			$this->form_validation->set_message('autor_unico','El Autor ya se encuentra registrado.');
			return false;
		}
	}
	
	public function cambiar_estados(){
		$data['resultados']=$this->usuario_model->pedido2();
		$this->load->view('info_pedido_view',$data);
	}
	
	public function cambiar($id){//Cambia el estado en la base de datos
		$resultado=$this->usuario_model->ver_estado_pedido($id);
		foreach ($resultado as $row){
			$estado=$row->estado;
		}
		//Llamo al metodo del modelo correspondiente al metodo para modificarlo
		$resultado=$this->usuario_model->$estado($id);
		redirect(base_url().'info_usuario/cambiar_estados', 'refresh');
	}
	
	public function realizar_baja($id){
		?><script language="javascript">
			alert("La cuenta a sido dada de baja.");
			<?$this->usuario_model->solicitar_baja($id);?>		
			window.location.href="http://localhost/ci-example/home/logout_ci";
		</script><?
	}
	
	public function baja(){
		$id=$this->session->userdata('id_usuario'); 
		?><script language="javascript">
			if(confirm("Estas seguro que quieresdar de baja tu cuenta, no podras volver a usarla")){
				if(confirm("Confirme por ultima vez que quiere dar de baja la cueta")){
					window.location.href="http://localhost/ci-example/info_usuario/realizar_baja/<?=$id?>";
				}
				else{
					window.location.href="http://localhost/ci-example/home";
				}
			}
			else{
				window.location.href="http://localhost/ci-example/home";
			}
		</script><?
	}
	
	public function baja_adm(){
		$data['resultados']=$this->usuario_model->usuarios_baja();
		$this->load->view('infousuario_view4',$data);
	}
 
	public function baja_logica($id){
		$this->usuario_model->solicitar_baja_logica($id);
		redirect(base_url().'info_usuario/baja_adm');
	}
	
}
?>
