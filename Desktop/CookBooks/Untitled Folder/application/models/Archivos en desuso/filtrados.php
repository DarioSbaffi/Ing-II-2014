<?

class Filtrados  extends CI_Model  {
	$this->db->query('Usuarios');
	$this->db->query('Libros');
	$this->db->query('Categorias');
	$this->db->query('Editoriales');
	$this->db->query('Autores');
}

?>
