<?php

class M_dosen extends CI_Model {

    public function getData()
    {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->order_by('nik','ASC');
        $query = $this->db->get();
        return $query;   
    }

    public function insertData($data, $table)
    {
        $this->db->insert($data, $table);
    }

    public function getDetil($table, $id)
    {
        return $this->db->get_where($table, $id);
    }


    public function getDataDosen() {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('dosen.id_dosen', $this->session->userdata('id_dosen'));

        $query = $this->db->get();
        return $query;
    }
    //AMBIL SESSION LOGIN DARI DOSEN
    public function getSession()
    {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('dosen.nik', $this->session->userdata('username'));
        $query = $this->db->get();
        return $query;
    }

    public function mhsId($id_dosen)
    {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('dosen.id_dosen',$id_dosen);
        $query = $this->db->get();
        return $query;
    }

    public function getTotalDosen() {
        $this->db->select('count(*) as total');
        $this->db->from('dosen');
        $query = $this->db->get();

        return $query;
    }



}