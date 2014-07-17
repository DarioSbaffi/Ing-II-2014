<?php

class Carrito_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	
	public function libro($id){
		$consulta = $this->db->get_where('libro', array('id_libro' => $id));
		return ($consulta->num_rows() > 0)?$consulta->result()[0]:false;
	}
	
	private function registrar_pedido($id_usuario){
		$this->load->helper('date');
		
		/*$formato = "%Y-%m-%d %H:%i:%s";
		$momento = time();*/
		
		$pedido = array(
			'id_usuario' => $id_usuario,
			'fecha' => mdate("%Y-%m-%d %H:%i:%s"),
			'estado' => 'preparando'
		);
		if($this->db->insert('pedido',$pedido)){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
	
	public function comprar($items,$id_usuario){
		//Registro pedido y tomo id
		$id_pedido = $this->registrar_pedido($id_usuario);
		
		if($id_pedido){
			foreach ($items as $it){
				$libros_pedidos[] =	array(
					'id_libro' => $it['id'],
					'id_pedido' => $id_pedido,
					'cantidad' => $it['qty'],
				);
			}
			//Inserto libros comprados
			if($this->db->insert_batch('libro_pedido', $libros_pedidos)){
				$this->actualizar_stock($libros_pedidos);
				return true;
			}
			return false;
		}
	}
	
	private function actualizar_stock($libros){
		foreach($libros as $lib){
			$this->db->select('stock_actual');
			
			$cant = $this->db->get_where('libro',array('id_libro'=>$lib['id_libro']));
			$cant = $cant->row();
			$datos = array(
				'stock_actual' => $cant->stock_actual - $lib['cantidad']
			);
			$this->db->where('id_libro', $lib['id_libro']);
			$this->db->update('libro', $datos);
		}
	}
}
