<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Abm_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function Categ(){
		$consulta = $this->db->get('categoria');
		
		//con la siguiente línea podéis ver lo que arroja la 
		//consulta escogiendo varios campos, es bueno entenderlo
		//var_dump($sql); exit;
		
		//si se ha encontrado algo 
		if($consulta->num_rows() > 0) {
			return $consulta->result();
		}else{
			return false;
		}
	}
	
	
}
/*
* end application/models/Abm_model.php
*/
