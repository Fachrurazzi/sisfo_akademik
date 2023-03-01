<?php

class M_mahasiswa extends CI_Model {

    public function getData()
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.id_jurusan', 'left');
        $this->db->order_by('nim','ASC');
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


    //AMBIL SESSION LOGIN DARI MAHASISWA
    public function getSession()
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.id_jurusan', 'left');
        $this->db->where('mahasiswa.nim', $this->session->userdata('username'));
        $query = $this->db->get();
        return $query;
    }

    public function mhsId($id_mahasiswa)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('jurusan', 'mahasiswa.id_jurusan = jurusan.id_jurusan','left');
        $this->db->join('jadwal', 'jadwal.id_jurusan = jurusan.id_jurusan');
        $this->db->join('ta', 'ta.id_ta = jadwal.id_ta');
        $this->db->where('mahasiswa.id_mahasiswa',$id_mahasiswa);
        $query = $this->db->get();
        return $query;
    }

    public function getAllMhs($kelas) {
        $this->db->select('mahasiswa.*, jadwal.*');
        $this->db->from('krs');
        $this->db->join('jadwal', 'jadwal.id_jadwal = krs.id_jadwal', 'left');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
        $this->db->where('jadwal.ruangan', $kelas);
        $this->db->group_by("mahasiswa.id_mahasiswa");
        
        return $this->db->get();
    }

    public function getAllKelas() {
        $this->db->select('ruangan');
        $this->db->from('jadwal');
        $this->db->group_by("ruangan");
;

        return $this->db->get();
    }

    public function getTotalMhs() {
        $this->db->select('count(*) as total');
        $this->db->from('mahasiswa');
        $query = $this->db->get();

        return $query;
    }



}