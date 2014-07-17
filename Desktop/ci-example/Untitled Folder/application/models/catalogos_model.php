<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Catalogos_model extends CI_Model {
 
    public function construct() {
        parent::__construct();
    }
 
    //obtenemos el total de filas para hacer la paginación del buscador
    function libros() {
        $consulta = $this->db->get('libro');
        return $consulta->num_rows();
    }
 
    //total_posts_paginados pasando lo que buscamos, la cantidad por página y el segmento
    //como parámetros de la misma
    function total_posts_paginados($por_pagina, $segmento) {
        $this->db->select('libro.id_libro as id,titulo,portada,descripcion,precio,
						   autor.nombre as nom,apellido,editorial.nombre as nom_editorial,
						   categoria.nombre as nom_categ');
        $this->db->from('libro')
				 ->join('libro_autor','libro.id_libro=libro_autor.id_libro')
				 ->join('autor','libro_autor.id_autor=autor.id_autor')
				 ->join('libro_categoria','libro.id_libro=libro_categoria.id_libro')
				 ->join('categoria','libro_categoria.id_categoria=categoria.id_categoria')
				 ->join('libro_editorial','libro.id_libro=libro_editorial.id_libro')
				 ->join('editorial','libro_editorial.id_editorial=editorial.id_editorial');
        $consulta = $this->db->get('',$por_pagina, $segmento);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
            $data[] = $fila;
        }
            return $data;
        }
    }
    
    function libros_home() {
        $this->db->select('libro.id_libro as id,titulo,portada,descripcion,precio,
						   autor.nombre as nom,apellido,editorial.nombre as nom_editorial,
						   categoria.nombre as nom_categ');
        $this->db->from('libro')
				 ->join('libro_autor','libro.id_libro=libro_autor.id_libro')
				 ->join('autor','libro_autor.id_autor=autor.id_autor')
				 ->join('libro_categoria','libro.id_libro=libro_categoria.id_libro')
				 ->join('categoria','libro_categoria.id_categoria=categoria.id_categoria')
				 ->join('libro_editorial','libro.id_libro=libro_editorial.id_libro')
				 ->join('editorial','libro_editorial.id_editorial=editorial.id_editorial')
				 ->order_by('libro.id_libro','desc')
				 ->group_by('titulo');
        $consulta = $this->db->get('',8);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
            $data[] = $fila;
        }
            return $data;
        }
    }
    
    
}
/* application/models/catalogos_model
 * el modelo
 */
