<?php
	class Home extends CI_Controller {
   
		function __construct() {
			parent::__construct();
			$this->load->model('page_model');
		}
   
		function index() {
			//como hemos creado el grupo registro podemos utilizarlo
			$this->template->set_template('registro');
			//añadimos los archivos css que necesitemoa
			$this->template->add_css('css/style.css');
			//añadimos los archivos js que necesitemoa
			$this->template->add_js('js/jquery.min.js');
			$this->template->add_js('js/validate.jquery.js');
			//la sección header será el archivo views/index_principal/header_template
			$this->template->write_view('header', 'indexPrincipal/header_template');
			//desde aquí también podemos setear el título
			$this->template->write('title', 'CookBooks', TRUE);
			//obtenemos los usuarios
			$data['users'] = $this->page_model->get_users();    
					//el contenido de nuestro formulario estará en views/registro/formulario_registro,
					//de esta forma también podemos pasar el array data a registro/formulario_registro
					//$this->template->write_view('content', 'indexPrincipal/registro', $data, TRUE);   
			//la sección footer será el archivo views/registro/footer_template
			$this->template->write_view('footer', 'indexPrincipal/footer_template');   
			//con el método render podemos renderizar y hacer que se visualice la template
			$this->template->render();
			
			
		}
		
 
	}
