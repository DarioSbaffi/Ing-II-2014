<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Catalogos extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('catalogos_model');
    }
 
    public function index() {
        $pages = 2; //Número de registros mostrados por páginas
        $this->load->library('pagination'); //Cargamos la librería de paginación
        $config['base_url'] = base_url().'catalogos/pagina'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $this->catalogos_model->libros(); //calcula el número de filas
        $config['per_page'] = $pages; //Número de registros mostrados por páginas
        $config['num_links'] = 20; //Número de links mostrados en la paginación
        $config['first_link'] = 'Primera'; //primer link
        $config['last_link'] = 'Última'; //último link
        $config['next_link'] = 'Siguiente'; //siguiente link
        $config['prev_link'] = 'Anterior'; //anterior link
        $config['full_tag_open'] = '<div id="paginacion">'; //el div que debemos maquetar
        $config['full_tag_close'] = '</div>'; //el cierre del div de la paginación
        $this->pagination->initialize($config); //inicializamos la paginación
        //el array con los datos a paginar ya preparados
        $data["Catalogos"] = $this->catalogos_model->total_posts_paginados($config['per_page'], $this->uri->segment(3));
        //cargamos la vista y el array data
        $this->load->view('catalogo_view', $data);
    }
}
