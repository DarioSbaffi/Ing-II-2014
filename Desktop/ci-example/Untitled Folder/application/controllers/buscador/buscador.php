<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Buscador extends CI_Controller {
 
    public function __construct(){  
        parent::__construct();
    }
    public function index() {
        $this->load->view('view_buscador/buscador_view');
    }
}
/*application/controllers/buscador.php
 *  el controlador
 */
