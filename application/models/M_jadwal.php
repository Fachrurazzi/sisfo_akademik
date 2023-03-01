<?php

class M_jadwal extends CI_Model {

    public function getData($id_jurusan)
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('ta', 'ta.id_ta = jadwal.id_ta', 'left');
        $this->db->join('jurusan', 'jurusan.id_jurusan = jadwal.id_jurusan');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = jadwal.id_matkul', 'left');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen', 'left');
        $this->db->where('jadwal.id_jurusan', $id_jurusan);
        $this->db->order_by('semester', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function getMatkulByKelas($id_jurusan, $kelas)
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('ta', 'ta.id_ta = jadwal.id_ta', 'left');
        $this->db->join('jurusan', 'jurusan.id_jurusan = jadwal.id_jurusan');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = jadwal.id_matkul', 'left');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen', 'left');
        $this->db->where('jadwal.id_jurusan', $id_jurusan);
        $this->db->where('jadwal.ruangan', $kelas);
        $this->db->order_by('semester', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function getDetil($where)
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('ta', 'ta.id_ta = jadwal.id_ta', 'left');
        $this->db->join('jurusan', 'jurusan.id_jurusan = jadwal.id_jurusan');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = jadwal.id_matkul', 'left');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen', 'left');
        $this->db->where('jadwal.id_jurusan', $where);
        $this->db->order_by('semester', 'ASC');

        $query = $this->db->get();
        return $query;
    }

    public function getAllSemester() {
        $this->db->select('matakuliah.*, jadwal.ruangan as kelas');
        $this->db->from('matakuliah');
        $this->db->join('jadwal', 'jadwal.id_matkul = matakuliah.id_matkul', 'left');
        $this->db->group_by('matakuliah.semester');
        $query = $this->db->get();
        return $query;
    }

    public function getSemester($id_matkul)
    {
        $this->db->select('*');
        $this->db->from('matakuliah');
        $this->db->where('matakuliah.id_matkul', $id_matkul);
        $query = $this->db->get();
        return $query;
    }

    public function getJrsMatkul($id_jurusan)
    {
        $this->db->select('*');
        $this->db->from('matakuliah');
        $this->db->where('matakuliah.id_jurusan', $id_jurusan);
        $query = $this->db->get();
        return $query;
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function getJadwal($id_jurusan, $semester)
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('ta', 'ta.id_ta = jadwal.id_ta', 'left');
        $this->db->join('jurusan', 'jurusan.id_jurusan = jadwal.id_jurusan');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = jadwal.id_matkul', 'left');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen', 'left');
        $this->db->where('jadwal.id_jurusan', $id_jurusan);
        $this->db->where('matakuliah.semester', $semester);
        $query = $this->db->get();
        return $query;
    }




}