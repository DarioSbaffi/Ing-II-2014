<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Usuario_model extends CI_Model {
 
    public function construct() {
        parent::__construct();
    }
 
    function info_perfil($id) {
		$consulta=$this->db->select('id_usuario,dni, usuario.nombre as nom, apellido, correo_electronico,
									nom_usuario,clave,telefono,calle,numero,piso,departamento,
									ciudad.nombre as nom_ciudad')
							->from('usuario')
							->join('ciudad','usuario.id_ciudad=ciudad.id')
							->where('usuario.id_usuario',$id);
        $consulta = $this->db->get();
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        }
    }
    
    function pedido($id) {
		$consulta=$this->db->select('pedido.id_pedido as id,libro.titulo as titulol,fecha,pedido.estado')
							->from('pedido')
							->join('usuario','usuario.id_usuario=pedido.id_usuario')
							->join('libro_pedido','libro_pedido.id_pedido=pedido.id_pedido')
							->join('libro','libro.id_libro=libro_pedido.id_libro')
							->where('usuario.id_usuario',$id)
							->where_not_in('pedido.estado','finalizado');
        $consulta = $this->db->get();
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        }
    }
    
    function pedido2() {
		$this->db->where_not_in('estado','finalizado');
        $consulta = $this->db->get('pedido');
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        }
    }
    
    function ver_estado_pedido($id) {
		$this->db->where('id_pedido',$id);
		$query=$this->db->get('pedido');
		if($query->num_rows()>0){
			return $query->result();
		}
		
    }
    
    function solicitar_baja($id){
		$datos = array('estado'=>'baja_pendiente');
		$this->db->where('id_usuario',$id);
		$this->db->update('usuario', $datos);
	}
	
	function solicitar_baja_logica($id){
		$datos = array('estado'=>'baja');
		$this->db->where('id_usuario',$id);
		$this->db->update('usuario', $datos);
	}
    
    function preparando($id){
		$datos = array('estado'=>'enviando');
		$this->db->where('id_pedido',$id);
		$this->db->update('pedido', $datos);
	}
	
	function enviando($id){
		$datos = array('estado'=>'finalizado');
		$this->db->where('id_pedido',$id);
		$this->db->update('pedido', $datos);
	}

    function historial($id) {
		$consulta=$this->db->select('pedido.id_pedido as id,libro.titulo as titulol,fecha,pedido.estado')
							->from('pedido')
							->join('usuario','usuario.id_usuario=pedido.id_usuario')
							->join('libro_pedido','libro_pedido.id_pedido=pedido.id_pedido')
							->join('libro','libro.id_libro=libro_pedido.id_libro')
							->where('usuario.id_usuario',$id)
							->where('pedido.estado','finalizado');
        $consulta = $this->db->get();
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        }
    }
    
    function usuarios_baja(){
		$this->db->where('estado','baja_pendiente');
		$query=$this->db->get('usuario');
		if ($query->num_rows() > 0) {
            return $query->result();
        }					
	}
    
}
/* application/models/catalogos_model
 * el modelo
 */
