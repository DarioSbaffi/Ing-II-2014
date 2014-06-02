<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Catalogos extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('catalogos_model');
    }
 
    //con esta función validamos y protegemos el buscador
    public function validar() {
        $this->form_validation->set_rules('buscando', 'buscador', 'required|min_length[2]|max_length[20]|trim|xss_clean');
        $this->form_validation->set_message('required', 'El campo no puede ir vacío!');
        $this->form_validation->set_message('min_length', 'El  campo debe tener al menos %s carácteres');
        $this->form_validation->set_message('max_length', 'El campo no puede tener más de %s carácteres');
        if ($this->form_validation->run() == TRUE) {
            $buscador = $this->input->post('buscando');
            $this->session->set_userdata('buscando', $buscador);
            //todo correcto y pasamos a la función index
            redirect('catalogos/pagina', 'refresh');
        } else {
            //mostramos de nuevo el buscador con los errores
            $this->load->view('view_buscador/buscador_view'); 
        }
    }
 
    public function index() {
        $buscador = $this->session->userdata('buscando');
        $pages = 2; //Número de registros mostrados por páginas
        $this->load->library('pagination'); //Cargamos la librería de paginación
        $config['base_url'] = base_url() . 'catalogos/pagina'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $this->catalogos_model->libros($buscador); //calcula el número de filas
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
        $data["Catalogos"] = $this->catalogos_model->total_posts_paginados($buscador, $config['per_page'], $this->uri->segment(3));
 
        //cargamos la vista y el array data
        $this->load->view('view_buscador/catalogos_view', $data);
    }
}
