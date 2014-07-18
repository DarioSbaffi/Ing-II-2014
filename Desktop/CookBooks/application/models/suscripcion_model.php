<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Suscripcion_model extends CI_Model {
 
    public function construct() {
        parent::__construct();
    }
 
    function suscribir($email,$la) {
		if($la=='')
			$la=Null;
		$data = array('id_usuario' => $la, 'correo_electronico' => $email);
		$this->db->where($data);
        $consulta = $this->db->get('suscripcion');
        if ($consulta->num_rows() == 0) {
			$this->db->insert('suscripcion',$data);
			$alert?>  <script language='javascript'> alert('Se logro suscribir correctamente');window.location.href='<?base_url()?>home';</script><?
			return $alert;
        }
        else{
			$alert?>  <script language='javascript'> alert('Ya se encuentra suscripto al sitio');window.location.href='<?base_url()?>home';</script><?
			return $alert;
		}
    }
    
    function suscribir_UR($email,$la) {
		$data = array('id_usuario' => $la, 'correo_electronico' => $email);
		$this->db->where('id_usuario',$la);
        $consulta = $this->db->get('suscripcion');
        if ($consulta->num_rows() == 0) {
			$this->db->where('correo_electronico',$email);
			$consul2 = $this->db->get('suscripcion');
			if ($consul2->num_rows() == 0) {
				$this->db->insert('suscripcion',$data);
				$alert?>  <script language='javascript'> alert('Se logro suscribir correctamente');window.location.href='<?base_url()?>usuario';</script><?
				return $alert;
			}
        }
        else{
			$alert?>  <script language='javascript'> alert('Ya se encuentra suscripto al sitio');window.location.href='<?base_url()?>usuario';</script><?
			return $alert;
		}
    }
    
	function cancelar_suscribir($email,$la) {
		if($la=='')
			$la=Null;
		$data = array('id_usuario' => $la, 'correo_electronico' => $email);
		$this->db->where($data);
		return $this->db->delete('suscripcion');
		/*$consul1 = $this->db->get('suscripcion');
		if ($consul1->num_rows() > 0) {
			$this->db->where($data);
			$this->db->delete('suscripcion');
			$this->db->where($data);
			$consul2 = $this->db->get('suscripcion');
			if ($consul2->num_rows() == 0) {
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}  */
	}  
}
/* application/models/catalogos_model
 * el modelo
 */
