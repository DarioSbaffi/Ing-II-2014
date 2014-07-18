function before_insert_autor($post_array) {
	alert("nada");

}

function after_insert_autor($post_array) {
    /*$user_logs_insert = array(
        "user_id" => $primary_key,
        "created" => date('Y-m-d H:i:s'),
        "last_update" => date('Y-m-d H:i:s')
    );
 
    $this->db->insert('user_logs',$user_logs_insert);
 
    return true;*/
}

function after_update_autor($post_array) {
	alert("repetido");
    /*$user_logs_insert = array(
        "user_id" => $primary_key,
        "created" => date('Y-m-d H:i:s'),
        "last_update" => date('Y-m-d H:i:s')
    );
 
    $this->db->insert('user_logs',$user_logs_insert);
 
    return true;*/
}
