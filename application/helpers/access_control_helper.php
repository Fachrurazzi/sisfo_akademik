<?php

function is_mahasiswa() {
   $ci =& get_instance();
   $ci->load->library('session');
   $ci->load->database();
   $nim = $ci->session->userdata('mahasiswa');
   $query = $ci->db->query('SELECT * FROM mahasiswa WHERE nim = ? limit 1', $nim);
   

}

?>