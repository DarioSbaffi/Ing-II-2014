<?php 
/**
 * Clase Cookbooks. Representa al sitio en general.
 * @author RSG
 */
class Cookbooks extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	/**
	 * @param String $email
	 * @return Usuario si existe. Si no FALSE.
	 */
	public function getUsuario($email){
		$email = (String) $email;
		$consulta = $this->db->get_where('usuario', array('correo_electronico' => $email));
		return ($consulta->num_rows() == 1) ? $consulta->row() : false;
	}
	/**
	 * Valida que el dni no exista en la base de datos
	 * @return boolean
	 */
	public function dni_unico($dni){
		$dni = (Integer) $dni;
		$consulta = $this->db->get_where('usuario',array('dni' => $dni));
		return ($consulta->num_rows() == 0);
	}
	/**
	 * Valida que el email no exista en la base de datos
	 * @return boolean
	 */
	public function email_unico($email){
		$email = (String) $email;
		$consulta = $this->db->get_where('usuario',array('correo_electronico' => $email));
		return ($consulta->num_rows() == 0);
	}
	/**
	 * Valida que el usuario no exista en la base de datos
	 * @return boolean
	 */
	public function usuario_unico($usuario){
		$usuario = (String) $usuario;
		$consulta = $this->db->get_where('usuario',array('nom_usuario' => $usuario));
		return ($consulta->num_rows() == 0);
	}
	/**
	 * @return Provincias
	 */
	public function getProvincias(){
		$consulta =$this->db->get('provincia');
		return $consulta->result();
	}
	public function getCiudades($idp){
		$this->db->order_by("nombre", "asc");
		$consulta =$this->db->get_where('ciudad',array('id_provincia' => $idp));
		return $consulta->result();
	}
	public function agregarUsuario($dat){
		$datos = array(
				'dni' => $dat['reg_dni'],
				'nombre' => $dat['reg_nombre'],
				'apellido' => $dat['reg_apellido'],
				'correo_electronico' => $dat['reg_email'],
				'clave' => $dat['reg_clave'],
				'telefono' => $dat['reg_telefono'],
				'id_ciudad' => $dat['reg_ciudad'],
				'calle' => $dat['reg_calle'],
				'numero' => $dat['reg_numero'],
				'piso' => $dat['reg_piso'],
				'departamento' => $dat['reg_depto'],
				'nom_usuario' => $dat['reg_usuario'],
				'tipo' => 'U',
				'estado' => 'activo'
		);
		$this->db->insert('usuario', $datos);
	}
	
	public function agregarAutor($dat){
		$datos = array(
				'nombre' => $dat['reg_nombre'],
				'apellido' => $dat['reg_apellido'],
		);
		$this->db->where('nombre',$dat['reg_nombre'])->where('apellido',$dat['reg_apellido']);
		$query=$this->db->get('autor');
		if($query->num_rows()==0){
			$this->db->insert('autor', $datos);
			$alert?><script language="javascript">alert("Se ha logrado insertar el autor correctamente");window.location.href="http://localhost/ci-example/abm/Autores/";</script><?
			return $alert;
		}
		else{
			$alert?><script language="javascript">alert("No se ha logrado insertar el autor debido a que ya existe");window.location.href="http://localhost/ci-example/abm/Autores/";</script><?
			return $alert;
		}
		
	}
	
	public function updateAutor($dat,$id){
		$datos = array(
				'nombre' => $dat['reg_nombre'],
				'apellido' => $dat['reg_apellido'],
		);
		$this->db->where('id_autor',$id);
		$this->db->update('autor', $datos);
		
	}
	
	public function listarAutores(){
		$query=$this->db->get('autor');
		if($query->num_rows() >0){
			return $query->result();
		}
	}
	
	public function info_autor($id){
		$this->db->where('id_autor',$id);
		$query=$this->db->get('autor');
		if($query->num_rows() >0){
			return $query->result();
		}
	}
	
	public function actualizarUsuario($dat,$id){
		$datos = array(
		
		//Falta los campos del input del formulario
		
				'nombre' => $dat['reg_nombre'],
				'apellido' => $dat['reg_apellido'],
				'telefono' => $dat['reg_telefono'],
				'id_ciudad' => $dat['reg_ciudad'],
				'calle' => $dat['reg_calle'],
				'numero' => $dat['reg_numero'],
				'piso' => $dat['reg_piso'],
				'departamento' => $dat['reg_depto'],
		);
		$this->db->where('id_usuario',$id);
		$this->db->update('usuario', $datos);
	}
	
	public function actualizarContrasenia($dat,$id){
		$datos = array('clave' => $dat['reg_clave']);
		$this->db->where('id_usuario',$id);
		$this->db->update('usuario', $datos);
	}
	
	public function agregar_elemento($elemento,$tabla){
		$datos = array('nombre' => $elemento);
		if($this->db->insert($tabla,$datos)){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
	
	public function elemento_unico($elemento,$tabla){
		$elemento = (String) $elemento;
		$consulta = $this->db->get_where($tabla,array('nombre' => $elemento));
		return ($consulta->num_rows() == 0);
	}
	
	public function autor_unico($apellido,$nombre){
		$consulta = $this->db->get_where('autor', array('apellido'=>$apellido,'nombre'=>$nombre));
		return ($consulta->num_rows() == 0);
	}
	
	public function agregar_autor($apellido,$nombre){
		$datos = array('apellido'=>$apellido, 'nombre' => $nombre);
		if($this->db->insert('autor',$datos)){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
}
