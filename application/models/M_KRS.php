<?php

class M_KRS extends CI_Model {

    public function getDataKRS($id_jurusan)
    {
        $this->db->select('matakuliah.semester as semester, matakuliah.id_matkul as kode, matakuliah.sks as sks, matakuliah.matakuliah as mata_kuliah, jurusan.*, jadwal.*');
        $this->db->from('jadwal');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = jadwal.id_matkul', 'left');
        $this->db->join('jurusan', 'jurusan.id_jurusan = jadwal.id_jurusan', 'left');
        $this->db->where('jadwal.id_jurusan', $id_jurusan);
        $this->db->order_by('semester', 'ASC');
        $query = $this->db->get();
        return $query;   
    }

    public function getAllKRS()
    {
        $this->db->select('mahasiswa.id_mahasiswa as id_mahasiswa, mahasiswa.nama_kepanjangan as nama_mhs, mahasiswa.nim as nim, jurusan.jurusan as jurusan, ta.ta as tahun_ajar, matakuliah.id_matkul as id_matkul, matakuliah.matakuliah as mata_kuliah, matakuliah.sks as sks, jadwal.ruangan as ruangan');
        $this->db->from('krs');
        $this->db->join('jadwal', 'jadwal.id_jadwal = krs.id_jadwal', 'left');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = jadwal.id_matkul', 'left');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.id_jurusan', 'left');
        $this->db->join('ta', 'ta.id_ta = krs.id_ta', 'left');
        $this->db->group_by('mahasiswa.nim');
        $query = $this->db->get();
        return $query;   
    }

    public function printKRS($id_mahasiswa) {
        $this->db->select('mahasiswa.id_mahasiswa, mahasiswa.nama_kepanjangan as nama, mahasiswa.nim, jurusan.jurusan, ta.ta, matakuliah.id_matkul, matakuliah.matakuliah, matakuliah.sks, jadwal.ruangan');
        $this->db->from('krs');
        $this->db->join('jadwal', 'jadwal.id_jadwal = krs.id_jadwal', 'left');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = jadwal.id_matkul', 'left');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.id_jurusan', 'left');
        $this->db->join('ta', 'ta.id_ta = krs.id_ta', 'left');
        $this->db->where('krs.id_mahasiswa', $id_mahasiswa);

        $query = $this->db->get();
        return $query;   

    }

    public function viewKrs($id_mahasiswa)
    {
        $this->db->select('*');
        $this->db->from('krs');
        $this->db->join('jadwal', 'jadwal.id_jadwal = krs.id_jadwal', 'left');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = jadwal.id_matkul', 'left');
        $this->db->join('ta', 'ta.id_ta = jadwal.id_ta');
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $this->db->order_by('sks', 'ASC');
        $this->db->group_by('jadwal.id_matkul');
        $query = $this->db->get();
        return $query;   
}


}