<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Abm extends CI_Controller {

	function __construct() {
	parent::__construct();
		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null) {
		$this->load->view('abm/administrador_abm',$output);
	}

	public function offices() {
		$crud->unset_jquery();
		$crud->unset_jquery_ui();
		$output = $this->grocery_crud->render();
		$this->_example_output($output);
	}

	public function index() {
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

    function Usuarios() {
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('Usuarios');
		$crud->set_subject('Usuario');
		$crud->set_language('spanish');
		$crud->required_fields('dni','nombre','apellido','correo_electronico','telefono','calle','nro','piso','depto','tipo');
		$crud->columns('dni','nombre','apellido','correo_electronico','telefono','calle','nro','piso','depto','tipo');
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
		$crud->set_table('Libros');
		$crud->set_subject('Libros');
		$crud->set_language('spanish');
		$crud->required_fields('isbn','titulo','autor','categoria','editorial','descripcion','stock_minimo','stock_actual');
		$crud->set_relation('autor','Autores','{nom_autor} {ape_autor}');
		$crud->set_relation('categoria','Categorias','nom_categoria');
		$crud->set_relation('editorial','Editoriales','nom_editorial');
		$crud->columns('isbn','titulo','autor','categoria','editorial','descripcion','stock_minimo','stock_actual');
		$output = $crud->render();
		$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
	}
	
	function Categorias() {
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('Categorias');
		$crud->set_subject('Categoria');
		$crud->required_fields('nom_categoria');
		$crud->columns('nom_categoria');
		$output = $crud->render();
		$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
	}
	
	function Editorial() {
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('Editoriales');
		$crud->set_subject('Editorial');
		$crud->set_language('spanish');
		$crud->required_fields('nom_editorial');
		$crud->columns('nom_editorial');
		$output = $crud->render();
		$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
	}
	
	function Autores() {
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('Autores');
		$crud->set_subject('Autor');
		$crud->set_language('spanish');
		$crud->required_fields('nom_autor','ape_autor');
		$crud->columns('nom_autor','ape_autor');
		$output = $crud->render();
		$this->_example_output($output);
		}
		catch(Exception $e){show_error($e->getMessage().' --- '.$e->getTraceAsString());}
	}
}
