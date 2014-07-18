<?php
class Contacto extends CI_Controller {
    
    public function index() {
        $this->load->view("contacto_view");
        $this->load->view("Main_Footer");
    }
}
?>