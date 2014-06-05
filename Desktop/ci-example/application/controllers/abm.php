<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Abm extends CI_Controller {

	function __construct() {
	parent::__construct();
		$this->load->library('grocery_CRUD');
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
            case 'u':
				redirect(base_url().'home');
				break;
        }
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
		$crud->unset_delete();
		$output = $crud->render();
		$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
	}
	
	function Libros() {
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('libro');
		$crud->set_subject('Libros');
		$crud->set_language('spanish');
		$crud->required_fields('isbn','titulo','descripcion','precio','stock_minimo','stock_actual');
		$crud->set_relation_n_n('categorias','libro_categoria','categoria','id_libro','id_categoria','nombre');
		/*$var=1;
		$crud->callback_field('categoria',function($var){
        	return "<select id='field-categoria' name='categoria[]' multiple='multiple' size='8' class='chosen-multiple-select' data-placeholder='Seleccionar Categorias' style='width:510px;' ><select>"."<input type=button value=nuevo name=nuevo></input>"; 
        });*/
		$crud->set_relation_n_n('autores','libro_autor','autor','id_libro','id_autor','nombre');
		/*$var=2;
		$crud->callback_field('autores',function($var){
        	return "<select id='field-autor' name='autor[]' multiple='multiple' size='8' class='chosen-multiple-select' data-placeholder='Seleccionar Autores' style='width:510px;' ><select>"."<input type=button value=nuevo name=nuevo></input>"; 
        });*/
        $crud->set_relation_n_n('editorial','libro_editorial','editorial','id_libro','id_editorial','nombre');
		/*$var=3;
	 	$crud->callback_field('editorial',function($var){
        	return "<select id='field-editorial' name='editorial[]' multiple='multiple' size='8' class='chosen-multiple-select' data-placeholder='Seleccionar Editorial' style='width:510px;' ><select>"."<input type=button value=nuevo name=nuevo></input>"; 
        });*/
		$output = $crud->render();
		$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
	}
	
	function Categorias() {
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('categoria');
		$crud->set_subject('Categoria');
		$crud->set_language('spanish');
		$crud->required_fields('nombre');
		$crud->columns('nombre');
		$output = $crud->render();
		$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
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
		$output = $crud->render();
		$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
	}
	
	function Autores() {
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('autor');
		$crud->set_subject('Autor');
		$crud->set_language('spanish');
		$crud->required_fields('nombre','apellido');
		$crud->columns('nombre','apellido');
		$output = $crud->render();
		$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
	}
}
