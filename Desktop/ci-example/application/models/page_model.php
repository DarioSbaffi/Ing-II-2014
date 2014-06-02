<?php

	class Page_model extends CI_Model {

		public function __construct() {
			parent::__construct();
		}
    
		public function get_users() {
			return $this->db->get('Usuarios')->result();
		}

	}
