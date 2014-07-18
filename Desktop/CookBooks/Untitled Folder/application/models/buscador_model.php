<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscador_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function descripcion(){
		$descripcion= $this->input->post('descripcion');
		//la consulta base a la que concatenaremos la búsqueda
		$this->db->like('descripcion', $descripcion);
        $this->db->select('libro.id_libro as id,titulo,portada,descripcion,
						   autor.nombre as nom,apellido,editorial.nombre as nom_editorial,
						   categoria.nombre as nom_categ, precio');
        $this->db->from('libro')
				 ->join('libro_autor','libro.id_libro=libro_autor.id_libro')
				 ->join('autor','libro_autor.id_autor=autor.id_autor')
				 ->join('libro_categoria','libro.id_libro=libro_categoria.id_libro')
				 ->join('categoria','libro_categoria.id_categoria=categoria.id_categoria')
				 ->join('libro_editorial','libro.id_libro=libro_editorial.id_libro')
				 ->join('editorial','libro_editorial.id_editorial=editorial.id_editorial');
        $consulta = $this->db->get();
		
		//con la siguiente línea podéis ver lo que arroja la 
		//consulta escogiendo varios campos, es bueno entenderlo
		//var_dump($sql); exit;
		
		//si se ha encontrado algo 
		if($consulta->num_rows() > 0) {
			return $consulta->result();
		}else{
			return FALSE;
		}
	}
	
	public function titulo(){
		$descripcion= $this->input->post('descripcion');
		//la consulta base a la que concatenaremos la búsqueda
		$this->db->like('titulo', $descripcion);
        $this->db->select('libro.id_libro as id,titulo,portada,descripcion,
						   autor.nombre as nom,apellido,editorial.nombre as nom_editorial,
						   categoria.nombre as nom_categ, precio');
        $this->db->from('libro')
				 ->join('libro_autor','libro.id_libro=libro_autor.id_libro')
				 ->join('autor','libro_autor.id_autor=autor.id_autor')
				 ->join('libro_categoria','libro.id_libro=libro_categoria.id_libro')
				 ->join('categoria','libro_categoria.id_categoria=categoria.id_categoria')
				 ->join('libro_editorial','libro.id_libro=libro_editorial.id_libro')
				 ->join('editorial','libro_editorial.id_editorial=editorial.id_editorial');
        $consulta = $this->db->get('');
		
		//con la siguiente línea podéis ver lo que arroja la 
		//consulta escogiendo varios campos
		//var_dump($sql); exit;
		
		//si se ha encontrado algo 
		if($consulta->num_rows() > 0) {
			return $consulta->result();
		}else{
			return FALSE;
		}
	}

	public function autor(){
		$descripcion= $this->input->post('descripcion');
		//la consulta base a la que concatenaremos la búsqueda
		$this->db->like('autor.nombre', $descripcion);
        $this->db->select('libro.id_libro as id,titulo,portada,descripcion,
						   autor.nombre as nom,apellido,editorial.nombre as nom_editorial,
						   categoria.nombre as nom_categ, precio');
        $this->db->from('libro')
				 ->join('libro_autor','libro.id_libro=libro_autor.id_libro')
				 ->join('autor','libro_autor.id_autor=autor.id_autor')
				 ->join('libro_categoria','libro.id_libro=libro_categoria.id_libro')
				 ->join('categoria','libro_categoria.id_categoria=categoria.id_categoria')
				 ->join('libro_editorial','libro.id_libro=libro_editorial.id_libro')
				 ->join('editorial','libro_editorial.id_editorial=editorial.id_editorial');
        $consulta = $this->db->get();
		
		//con la siguiente línea podéis ver lo que arroja la 
		//consulta escogiendo varios campos, es bueno entenderlo
		//var_dump($sql); exit;
		
		//si se ha encontrado algo 
		if($consulta->num_rows() > 0) {
			return $consulta->result();
		}else{
			return FALSE;
		}
	}
	
		public function categoria(){
		$descripcion= $this->input->post('descripcion');
		//la consulta base a la que concatenaremos la búsqueda
		$this->db->like('categoria.nombre', $descripcion);
        $this->db->select('libro.id_libro as id,titulo,portada,descripcion,
						   autor.nombre as nom,apellido,editorial.nombre as nom_editorial,
						   categoria.nombre as nom_categ, precio');
        $this->db->from('libro')
				 ->join('libro_autor','libro.id_libro=libro_autor.id_libro')
				 ->join('autor','libro_autor.id_autor=autor.id_autor')
				 ->join('libro_categoria','libro.id_libro=libro_categoria.id_libro')
				 ->join('categoria','libro_categoria.id_categoria=categoria.id_categoria')
				 ->join('libro_editorial','libro.id_libro=libro_editorial.id_libro')
				 ->join('editorial','libro_editorial.id_editorial=editorial.id_editorial');
        $consulta = $this->db->get();
		
		//con la siguiente línea podéis ver lo que arroja la 
		//consulta escogiendo varios campos, es bueno entenderlo
		//var_dump($sql); exit;
		
		//si se ha encontrado algo 
		if($consulta->num_rows() > 0) {
			return $consulta->result();
		}else{
			return FALSE;
		}
	}
	
		public function editorial(){
		$descripcion= $this->input->post('descripcion');
		//la consulta base a la que concatenaremos la búsqueda
		$this->db->like('editorial.nombre', $descripcion);
        $this->db->select('libro.id_libro as id,titulo,portada,descripcion,
						   autor.nombre as nom,apellido,editorial.nombre as nom_editorial,
						   categoria.nombre as nom_categ, precio');
        $this->db->from('libro')
				 ->join('libro_autor','libro.id_libro=libro_autor.id_libro')
				 ->join('autor','libro_autor.id_autor=autor.id_autor')
				 ->join('libro_categoria','libro.id_libro=libro_categoria.id_libro')
				 ->join('categoria','libro_categoria.id_categoria=categoria.id_categoria')
				 ->join('libro_editorial','libro.id_libro=libro_editorial.id_libro')
				 ->join('editorial','libro_editorial.id_editorial=editorial.id_editorial');
        $consulta = $this->db->get();
		
		//con la siguiente línea podéis ver lo que arroja la 
		//consulta escogiendo varios campos, es bueno entenderlo
		//var_dump($sql); exit;
		
		//si se ha encontrado algo 
		if($consulta->num_rows() > 0) {
			return $consulta->result();
		}else{
			return FALSE;
		}
	}
	//hacemos la consulta a la base de datos para mostrar los datos de nuestro buscador
/*	public function nueva_busqueda($campos) {
		//definimos si descripción viene vacia o no para utilizar el operador and or
		$and_or = $this->input->post('descripcion') != '' ? ' AND ' : ' OR ';
		$condiciones = array();
		//recorremos los campos del formulario
		foreach($campos as $campo){
			//si llegan las variables y no están vacias
			if($this->input->post($campo) && $this->input->post($campo) != '') {
				//definimos la condición para hacer la búsqueda de los campos y de 
			    //esta forma podemos hacer uso del array condiciones fuera del loop
				$condiciones[] = "$campo LIKE '%" . $this->input->post($campo) . "%'";
			}
		}
			
		//la consulta base a la que concatenaremos la búsqueda
		$sql = "SELECT * FROM libro NATURAL JOIN libro_autor
									NATURAL JOIN libro_categoria
									NATURAL JOIN libro_editorial";
		//si existen condiciones entramos
		if(count($condiciones) > 0) {
			//aquí creamos la condición y la concatenamos a $query
		    $sql .= "WHERE " . implode ($and_or, $condiciones);
		}
		//asignamos a $query la consulta final
		$query = $this->db->query($sql);
		
		//con la siguiente línea podéis ver lo que arroja la 
		//consulta escogiendo varios campos, es bueno entenderlo
		//var_dump($sql); exit;
		
		//si se ha encontrado algo 
		if($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}*/
}
/*
* end application/models/buscador_model.php
*/
