<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro_redirect extends CI_Controller {

	function __construct() {
	parent::__construct();
	}

	public function index() {
	}
	
	public function categoria1(){//Se pudo eliminar
		?><script language="javascript">
			if(confirm("Estas seguro que queres eliminar este registro")){
				alert("La Categoria se eliminino correctamente");
				window.location.href="http://localhost/ci-example/abm/Categorias";
			}
			else{window.location.href="http://localhost/ci-example/abm/Categorias";}
		</script><?
	}
	
	public function categoria2(){//No se pudo eliminar
		$this->load->view('abm/administrador_abm1');
		?><script language="javascript">
			if(confirm("Estas seguro que queres eliminar este registro")){
				alert("La Categoria no puede eliminarse debido a que un libro posee dicha categoria");
				window.location.href="http://localhost/ci-example/abm/Categorias";
			}
			else{
				window.location.href="http://localhost/ci-example/abm/Categorias";
			}
		</script><?
	}
	
	public function autor1(){//Se pudo eliminar
		?><script language="javascript">
			if(confirm("Estas seguro que queres eliminar este registro")){
				alert("El autor se eliminino correctamente");
				window.location.href="http://localhost/ci-example/abm/Autores";
			}
			else{window.location.href="http://localhost/ci-example/abm/Autores";}
		</script><?
	}
	
	public function autor2(){//No se pudo eliminar
		?><script language="javascript">
			if(confirm("Estas seguro que queres eliminar este registro")){
				alert("El autor no se puede eliminarse debido a que un libro posee dicho autor");
				window.location.href="http://localhost/ci-example/abm/Autores";
			}
			else{window.location.href="http://localhost/ci-example/abm/Autores";}
		</script><?
	}
	
	public function editorial1(){//Se pudo eliminar
		?><script language="javascript">
			if(confirm("Estas seguro que queres eliminar este registro")){
				alert("La Editorial se eliminino correctamente");
				window.location.href="http://localhost/ci-example/abm/Editorial";
			}
			else{window.location.href="http://localhost/ci-example/abm/Editorial";}
		</script><?
	}
	
	public function editorial2(){//No se pudo eliminar
		?><script language="javascript">
			if(confirm("Estas seguro que queres eliminar este registro")){
				alert("La Editorial no puede eliminarse debido a que un libro posee dicha Editorial");
				window.location.href="http://localhost/ci-example/abm/Editorial";
			}
			else{window.location.href="http://localhost/ci-example/abm/Editorial";}
			</script><?
	}
}
