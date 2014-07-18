<?php if ( ! defined('BASEPATH')) exit('El acceso directo al script no esta permitido');

class Carrito extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library("cart");
		$this->load->helper("form");
		$this->load->model("carrito_model");
		
	}
	
	public function index(){
		if(!(count($this->cart->contents()) > 0)) redirect('');
		$data['token'] = $this->token();
		$this->load->view('carrito_view',$data);
	}
	
	private function cantidadPara($id){
		foreach($this->cart->contents() as $item){
			if($id == $item['id']) return $item['qty'];
		}
		return 0;
	}
	
	public function agregar(){
		if(!$this->input->is_ajax_request()){
			redirect('carrito');
		}else{
			//Recupero datos del libro
			$libro = $this->carrito_model->libro($this->input->post('id_libro'));
			
			if($libro){
				$min = (int) $libro->stock_minimo;
				$act = (int) $libro->stock_actual;
				if($act >= $min){
					$id = (string) $this->input->post('id_libro');
					$cantidad = (int) 1 + $this->cantidadPara($id);
					$precio = (float) $libro->precio;
					$titulo = (string) $libro->titulo;
					
					$datos = array(
							'id' => $id,
							'qty' => $cantidad,
							'price' => $precio,
							'name' => $titulo,
					);
					
					$this->cart->insert($datos);
					$estado = true;
				}else{
					$estado = false;
				}
							
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(
						array(
								'agregado' => $estado,
								'cantidad' => count($this->cart->contents()),
								'precio' => $this->cart->format_number($this->cart->total())
				)));
			}else{
				$this->session->set_flashdata(
						array(
								'msj_texto' => 'No se ecuentra el libro',
								'msj_tipo' => 'danger'
						));
			}
		}
	}
	
	public function modificar(){
		if(!$this->input->post('id')) redirect('carrito');
		$libro = $this->carrito_model->libro($this->input->post('id'));

		$cantidad = (int) $this->input->post('qty');
		
		$datos = array(
				'rowid' => $this->input->post('rowid'),
				'qty' => $cantidad
		);
		
		$min = (int) $libro->stock_minimo;
		$cant = (int) $libro->stock_actual - $datos['qty'];
		
		$this->cart->update($datos);
		
		if($min <= $cant){
			$this->cart->update($datos);
		}
		redirect('carrito');
	}
	
	public function eliminar(){
		$datos = array(
				'rowid' => $this->input->post('rowid'),
				'qty' => 0,
		);
		$this->cart->update($datos);
		redirect('carrito');
	}
	
	public function vaciar(){
		foreach ($this->cart->contents() as $item){
			$datos['rowid'] = $item['rowid'];
			$datos['qty'] = 0;
			$this->cart->update($datos);
		}
		redirect('carrito');
	}
	
	public function comprar(){
		$this->session->set_flashdata('compra_valida',true);
		if(!$this->session->flashdata('compra_valida')) redirect('');
		if((count($this->cart->contents()) > 0) && ($this->session->userdata('logueo'))){
			$compra = $this->carrito_model->comprar($this->cart->contents(),$this->session->userdata('id_usuario'));
			if($compra){
				$comprobante = $this->comprobante();
				$this->output
					->set_content_type('application/json')
					->set_output(
							json_encode(array('comprobante' => $comprobante,)));
							echo"genero el comprobante";
			}
		}else{
			$this->session->set_flashdata(array(
				'mensaje_texto'=>'El carrito de compras no contiene elementos. Agregue los elementos que desea comprar.',
				'mensaje_typo' => 'warning'));
			//redirect('');
		}
	}
	
	public function comprobante($pdf = false){
		if(!$this->session->flashdata('compra_valida')) redirect('');
		if($pdf == 'pdf'){
			$this->load->helper('dompdf');
			$datos['contenido'] = $this->load->view('comprobante_view','',true);
			$html = $this->load->view('gen_comp_view',$datos,true);
			pdf_create($html,'mi_comprobante');
		}else{
			return $this->load->view('comprobante_view','',true);
		}
	}
	
	public function logueado(){
		if(!$this->input->is_ajax_request()){
			redirect('');
		}else{
			$logueado = ($this->session->userdata('tipo') == 'U')?true:false;
				
			$this->output
			->set_content_type('application/json')
			->set_output(
					json_encode(array('logueado' => $logueado)));
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
                $password = $this->input->post('password');
                $check_user = $this->login_model->login_user($username,$password);
                if($check_user == TRUE) {
                    $data = array('logueo'=>TRUE,
								  'id_usuario'=>$check_user->id_usuario,
								  'tipo'=>$check_user->tipo,
								  'password'=>$check_user->clave,
								  'username'=>$check_user->nom_usuario,
								  'estado'=>$check_user->estado
								  );        
                    $this->session->set_userdata($data);
                    $this->index();
                }
            }
        }else{
			redirect(base_url().'home');
        }
    }
    
    public function token() {
        $token = md5(uniqid(rand(),true));
        $this->session->set_userdata('token',$token);
        return $token;
    }
    
    public function logout_ci() {
        $this->session->sess_destroy();
		redirect(base_url().'home');
    }
    
}
