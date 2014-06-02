<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Catalogos_model extends CI_Model {
 
    public function construct() {
        parent::__construct();
    }
 
    //obtenemos el total de filas para hacer la paginación del buscador
    function libros($buscador) {
        $this->db->like('titulo', $buscador);
        $consulta = $this->db->get('Libros');
        return $consulta->num_rows();
    }
 
    //total_posts_paginados pasando lo que buscamos, la cantidad por página y el segmento
    //como parámetros de la misma
    function total_posts_paginados($buscador, $por_pagina, $segmento) {
        $this->db->like('titulo', $buscador);
        $consulta = $this->db->get('Libros', $por_pagina, $segmento);
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
