<?php

class M_jurusan extends CI_Model {

    public function getData()
    {
        $this->db->order_by('id_jurusan','ASC');
        $query = $this->db->get('jurusan');
        return $query;   
    }

    public function getDataJurusanBySemester($semester)
    {
        $this->db->select('jurusan.id_jurusan as kode, jurusan.jurusan as nama_jurusan, jurusan.jenjang as nama_jenjang, jurusan.akreditasi as nama_akreditasi');
        $this->db->from('jadwal');
        $this->db->join('jurusan', 'jurusan.id_jurusan = jadwal.id_jurusan', 'left');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = jadwal.id_matkul', 'left');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen', 'left');
        $this->db->where('matakuliah.semester', $semester);
        $this->db->where('dosen.nik', $this->session->userdata('username'));
        $this->db->group_by('jurusan.id_jurusan');


        $query = $this->db->get();
        return $query;   
    }

    public function getAllDataJurusan($semester, $kelas)
    {
        $this->db->select('jurusan.id_jurusan as kode, jurusan.jurusan as nama_jurusan, jurusan.jenjang as nama_jenjang, jurusan.akreditasi as nama_akreditasi');
        $this->db->from('jadwal');
        $this->db->join('jurusan', 'jurusan.id_jurusan = jadwal.id_jurusan', 'left');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = jadwal.id_matkul', 'left');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen', 'left');
        $this->db->where('matakuliah.semester', $semester);
        $this->db->where('jadwal.ruangan', $kelas);
        $this->db->group_by('jurusan.id_jurusan');


        $query = $this->db->get();
        return $query;   
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function getUpdate($table, $id)
    {
        return $this->db->get_where($table, $id);
    }


    public function updateData($table, $data, $id)
    {
        $this->db->update($table, $data, $id);
    }


    public function getDetil($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function getTotalJurusan() {
        $this->db->select('count(*) as total');
        $this->db->from('jurusan');
        $query = $this->db->get();

        return $query;
    }



}