<?if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
	
    public function __construct() {
        parent::__construct();
			$this->load->model('login_model');
	}
    
    public function index() {    
        switch ($this->session->userdata('perfil')) {
            case '':
                $data['token'] = $this->token();
                $data['titulo'] = 'Login con roles de usuario en codeigniter';
                $this->load->view('login_view/login_view',$data);
                break;
            case 'administrador':
                redirect(base_url().'login/admin');
                break;
            case 'usuario':
                redirect(base_url().'login/usuario');
                break;    
            default:        
                $data['titulo'] = 'Login con roles de usuario en codeigniter';
                $this->load->view('login_view/login_view',$data);
                break;        
        }
    }
 
public function new_user() {
        if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[4]|max_length[150]|xss_clean');
 
            //lanzamos mensajes de error si es que los hay
            
            if($this->form_validation->run() == FALSE) {
                $this->index();
            }else {
                $username = $this->input->post('username');
                //$password = sha1($this->input->post('password'));
                $password = $this->input->post('password');
                $check_user = $this->login_model->login_user($username,$password);
                if($check_user == TRUE) {
                    $data = array('is_logued_in'=>TRUE,
								  'id_usuario'=>$check_user->id,
								  'perfil'=>$check_user->perfil,
								  'username'=>$check_user->username
								  );        
                    $this->session->set_userdata($data);
                    $this->index();
                }
            }
        }else{
            redirect(base_url().'login');
        }
    }
    
    public function token()
    {
        $token = md5(uniqid(rand(),true));
        $this->session->set_userdata('token',$token);
        return $token;
    }
    
    public function logout_ci()
    {
        $this->session->sess_destroy();
        //$this->index();
		redirect(base_url().'login');
    }
}
?>
