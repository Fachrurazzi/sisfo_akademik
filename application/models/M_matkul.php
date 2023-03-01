<?php

class M_matkul extends CI_Model {

    public function getData()
    {
        $this->db->select('*');
        $this->db->from('matakuliah');
        $this->db->join('jurusan', 'jurusan.id_jurusan = matakuliah.id_jurusan', 'left');
        $this->db->order_by('semester', 'ASC');
        $query = $this->db->get();
        return $query;   
    }

    public function getMatkulByDosen() {
        $this->db->select('matakuliah.id_matkul as id_matkul, matakuliah.matakuliah as mata_kuliah, dosen.id_dosen as id_dosen, dosen.nama_dosen as nama_dosen');
        $this->db->from('matakuliah');
        $this->db->join('jadwal', 'jadwal.id_matkul = matakuliah.id_matkul', 'left');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
        $query = $this->db->get();
        return $query;
    }

    public function getMatkul() {
        $this->db->select('matakuliah.id_matkul as id_matkul, matakuliah.matakuliah as mata_kuliah, dosen.id_dosen as id_dosen, dosen.nama_dosen as nama_dosen');
        $this->db->from('matakuliah');
        $this->db->join('jadwal', 'jadwal.id_matkul = matakuliah.id_matkul', 'left');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
        $this->db->where('dosen.id_dosen', $this->session->userdata('id_dosen'));
        $query = $this->db->get();
        return $query;
    }

    public function getMatkulByJurusan($id_jurusan)
    {
        $this->db->select('*');
        $this->db->from('matakuliah');
        $this->db->join('jurusan', 'jurusan.id_jurusan = matakuliah.id_jurusan', 'left');
        $this->db->where('matakuliah.id_jurusan', $id_jurusan);
        $query = $this->db->get();
        return $query;   
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function getUpdate($table, $where)
    {
        return $this->db->get_where($table, $where);
    }


    public function updateData($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function getTotalMatkul() {
        $this->db->select('count(*) as total');
        $this->db->from('matakuliah');
        $query = $this->db->get();

        return $query;
    }

}