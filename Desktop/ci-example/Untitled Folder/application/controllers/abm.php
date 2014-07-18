<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Abm extends CI_Controller {

	function __construct() {
	parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->model('abm_model');
		$this->load->model('cookbooks');
		$this->load->model('usuario_model');
		$this->load->helper(array('url','form','language'));
		$this->lang->load('registro','spanish');
		$this->lang->load('form_validation','spanish');	
	}

	public function _example_output($output = null) {
		$this->load->view('abm/administrador_abm2',$output);
	}

	public function offices() {
		$output = $this->grocery_crud->render();
		$this->_example_output($output);
	}

	public function index() {
		switch ($this->session->userdata('tipo')) {
			case '':
				redirect(base_url().'home');
				break;
            case 'a':
				$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
				break;
            case 'A':
				$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
				break;
            case 'U':
				redirect(base_url().'home');
				break;
        }
	}

	function Pedido(){
		
		try {
		$crud = new grocery_CRUD();
		$crud->set_table('pedido');
		$crud->set_subject('Pedido');
		$crud->set_language('spanish');
		$crud->display_as('id_usuario','Usuario');
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->set_relation('id_usuario','usuario','{nombre} {apellido}');
		$crud->columns('id_usuario','fecha','estado');
		$output = $crud->render();
		$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
	}
	
	function Stock(){
		
		try {
		$crud = new grocery_CRUD();
		$crud->set_table('libro');
		$crud->set_subject('Libros');
		$crud->set_language('spanish');
		$crud->columns('isbn','titulo','stock_minimo','stock_actual');
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_fields('isbn','titulo','descripcion','precio');
		$output = $crud->render();
		$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
	}
		

    function Usuarios() {
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('usuario');
		$crud->set_subject('Usuario');
		$crud->set_language('spanish');
		$crud->required_fields('dni','nombre','apellido','correo_electronico','nom_usuario','clave','telefono','calle','nro');
		$crud->columns('dni','nombre','apellido','correo_electronico','nom_usuario','clave','telefono','calle','nro','piso','depto','tipo');
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unique_fields('nom_usuario','dni');
		$output = $crud->render();
		$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
	}
	
	function Libros() {
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$this->config->set_item('grocery_crud_file_upload_allow_file_types','gif|jpeg|jpg|png|pdf');
		$crud->set_table('libro');
		$crud->set_subject('Libros');
		$crud->set_language('spanish');
		$crud->required_fields('isbn','titulo','portada','descripcion','precio','stock_minimo','stock_actual');
		$crud->set_field_upload('file_url','assets/uploads/files');
		$crud->set_relation_n_n('categorias','libro_categoria','categoria','id_libro','id_categoria','nombre');
		/*$crud->callback_field('categoria',function(){
        return "<select id='field-categoria' name='categoria[]' multiple='multiple' size='8' class='chosen-multiple-select' data-placeholder='Seleccionar Categorias' style='width:510px;' ><select>"."<input type=button value=nuevo name=nuevo></input>"; 
        });*/
		$crud->set_relation_n_n('autores','libro_autor','autor','id_libro','id_autor','nombre');
		/*$crud->callback_field('autores',function(){
        return "<select id='field-autor' name='autor[]' multiple='multiple' size='8' class='chosen-multiple-select' data-placeholder='Seleccionar Autores' style='width:510px;' ><select>"."<input type=button value=nuevo name=nuevo></input>"; 
        });*/
        $crud->set_relation_n_n('editorial','libro_editorial','editorial','id_libro','id_editorial','nombre');
		/*$crud->callback_field('editorial',function(){
        return "<select id='field-editorial' name='editorial[]' multiple='multiple' size='8' class='chosen-multiple-select' data-placeholder='Seleccionar Editorial' style='width:510px;' ><select>"."<input type=button value=nuevo name=nuevo></input>"; 
        });*/
  
        //Transformo un atributo de la tabla en un boton de carga
        //Agregar un nuevo atributo y realizar validacion de los tipos de archivos en la configuracion de la libreria image_lib
        $crud->set_field_upload('portada','assets/Image');
        
        $crud->unique_fields('isbn','titulo');
		$output = $crud->render();
		$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
	}
	
	function Categorias() {
		try {

/*	Tabla manual, faltan agregar los enlaces de altas,bajas y modificacion pero esto es de ultima
 * 		$data["resultados"] = $this->abm_model->categ();
		$this->load->view('abm/administrador_abm3',$data);		*/

		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('categoria');
		$crud->set_subject('Categoria');
		$crud->set_language('spanish');
		$crud->required_fields('nombre');
		$crud->columns('nombre');
		$crud->unique_fields('nombre');
		//Add_action es la unica manera de tomar las funciones callback sin hacer el unset_jquery();
		$crud->add_action('','','abm/call_delete_categoria','glyphicon glyphicon-remove');
		//$crud->where('id_categoria !=','select id_categoria from libro_categoria');
		$output = $crud->render();

		$state = $crud->getState();
		$state_info = $crud->getStateInfo();
		if($state == 'add') {
			//Do your cool stuff here . You don't need any State info you are in add
		}
		elseif($state == 'edit') {
			//Do your awesome coding here. 
		}
		else {
			if($state == 'delete_file') {
				redirect(base_url().'abm/call_delete_categoria');
			}
		}

		$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
	}
	public function call_delete_categoria($id) {
		$this->db->where('id_categoria',$id);
		$query=$this->db->get('libro_categoria');
		if($query->num_rows()>0) {
			redirect(base_url().'registro_redirect/categoria2');
		}
		else{
			$this->db->where('id_categoria',$id);
			$this->db->delete('categoria');
			$this->db->where('id_categoria',$id);
			$query=$this->db->get('categoria');
			if($query->num_rows()==0) {
				redirect(base_url().'registro_redirect/categoria1');
			}
		
		}
	}

	function Editorial() {
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('editorial');
		$crud->set_subject('Editorial');
		$crud->set_language('spanish');
		$crud->required_fields('nombre');
		$crud->columns('nombre');
		$crud->unique_fields('nombre');
		$crud->add_action('Eliminar','ui-icon-plus','abm/call_delete_editorial');
		$output = $crud->render();
		$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
	}
	
	public function call_delete_editorial($id) {
		$this->db->where('id_editorial',$id);
		$query=$this->db->get('libro_editorial');
		if($query->num_rows()>0) {
			redirect(base_url().'registro_redirect/editorial2');
		}
		else{
			$this->db->where('id_editorial',$id);
			$this->db->delete('editorial');
			$this->db->where('id_editorial',$id);
			$query=$this->db->get('editorial');
			if($query->num_rows()==0) {
				redirect(base_url().'registro_redirect/editorial1');
			}
		
		}
	}
	
	function Autores() {
		$data['resultados']=$this->cookbooks->listarAutores();
		$this->load->view('abm/abm_autor_view',$data);
/*		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('autor');
		$crud->set_subject('Autor');
		$crud->set_language('spanish');
		$crud->required_fields('nombre','apellido');
		$crud->columns('nombre','apellido');

//		$crud->set_rules('nombre','nombre','required|unique');
//		$crud->set_rules('apellido','apellido','required|unique');
		$crud->add_action('Agregar','ui-icon-plus','abm/call_Agregar_autor');
		$crud->add_action('Modificar','ui-icon-plus','abm/call_Modificar_autor');
		$crud->add_action('Eliminar','ui-icon-plus','abm/call_delete_autor');
		$crud->callback_before_insert(array($this,'unique_field'));
 
		$output = $crud->render();
		$state = $crud->getState();
		$state_info = $crud->getStateInfo();
 
		if($state == 'add') {
			?><script language="javascript">alert("No se ha logrado insertar el autor debido a que ya existe");window.location.href='<?base_url()?>abm/Autores';</script><?    
     	}
     	else{ if($state == 'edit') {
			echo $this->input->post('nombre');
		}}
			
		
		$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
	*/
	}	
		
	public function call_Agregar_autor() {
		
		if($this->validar()){
			$alert=$this->cookbooks->agregarAutor($this->input->post());
			echo $alert;
		}
		
		$datos_registro['reg_form_action'] = 'http://localhost/ci-example/abm/call_Agregar_autor';
		$this->load->view('abm/administrador_abm3',$datos_registro);
	}

	public function update_Autor($id){
		if($this->validar()){
			?><script language="javascript">alert("entro");</script><?
			$this->cookbooks->updateAutor($this->input->post(),$id);
			redirect(base_url().'abm/Autores');
		}
			?><script language="javascript">alert("no entro");</script><?

		$data['resultados']=$this->cookbooks->info_autor($id);
		$data['reg_form_action'] = "http://localhost/ci-example/abm/update_Autor/$id";
		$this->load->view('abm/administrador_abm4',$data);
	}
	
	public function call_Modificar_autor($id) {
		
		$data['resultados']=$this->cookbooks->info_autor($id);
		$data['reg_form_action'] = "http://localhost/ci-example/abm/update_Autor/$id";
		$this->load->view('abm/administrador_abm4',$data);
	}
	
	public function call_delete_autor($id) {
		$this->db->where('id_autor',$id);
		$query=$this->db->get('libro_autor');
		if($query->num_rows()>0) {
			redirect(base_url().'registro_redirect/autor2');
		}
		else{
			$this->db->where('id_autor',$id);
			$this->db->delete('autor');
			$this->db->where('id_autor',$id);
			$query=$this->db->get('autor');
			if($query->num_rows()==0) {
				redirect(base_url().'registro_redirect/autor1');
			}
		
		}
	}
	
	
	public function validar(){
		//Configuro validaciones
		$this->form_validation->set_rules('reg_nombre','Nombre/s','trim|required|alpha|min_length[3]|max_length[40]');
		$this->form_validation->set_rules('reg_apellido','Apellido/s','trim|required|alpha|min_length[3]|max_length[40]');
		//Ejecuto validaciones
		return $this->form_validation->run();
	}

}
