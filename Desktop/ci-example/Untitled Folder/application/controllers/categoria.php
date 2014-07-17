<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends CI_Controller {

	function __construct() {
	parent::__construct();
		$this->load->library('grocery_CRUD');
	}

	public function index() {
		?><script language="javascript">
				alert("nada");
				window.location.href="<?base_url()?>abm/Categorias";
			</script><?
		//redirect(base_url().'abm/Categorias');
	}
	
}
