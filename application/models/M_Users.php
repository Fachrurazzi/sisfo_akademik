<?php

class M_Users extends CI_Model {

    public function loginUser($username, $pass)
    {
        $username = set_value('username');
        $password = set_value('password');


        $result = $this->db->where('username', $username)
                            ->where('password', $pass)
                            ->limit(1)
                            ->get('admin');

        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }

    //CEK NIM DAN PASSWORD MAHASISWA
    public function loginMhs($username, $pass)
    {
        $username = set_value('username');
        $password = set_value('password');

        $result  = $this->db->where('nim', $username)
                            ->where('password', $pass)
                            ->limit(1)
                            ->get('mahasiswa');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }

     //CEK NIM DAN PASSWORD DOSEN
     public function loginDsn($username, $pass)
     {
         $username = set_value('username');
         $password = set_value('password');
 
         $result  = $this->db->where('nik', $username)
                             ->where('password', $pass)
                             ->limit(1)
                             ->get('dosen');
         if($result->num_rows() > 0){
             return $result->row();
         }else{
             return array();
         }
     }

}