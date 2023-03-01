<?php

class M_absensi extends CI_Model {
    public function getAllAbsensi() {
        $this->db->select('absensi_mhs.tanggal, jurusan.jurusan as jurusan, jadwal.ruangan as kelas');
        $this->db->from('absensi_mhs');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = absensi_mhs.id_matkul', 'left');
        $this->db->join('jadwal', 'jadwal.id_matkul = matakuliah.id_matkul', 'left');
        $this->db->join('jurusan', 'jurusan.id_jurusan = matakuliah.id_jurusan', 'left');
        $this->db->group_by('jadwal.ruangan');
       
        $query = $this->db->get();
        return $query;
    }

    public function getMhsByKelas($id_dosen) {
        $this->db->select('count(*) as total, mahasiswa.nama_kepanjangan as nama, jadwal.ruangan as kelas');
        $this->db->from('krs');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
        $this->db->join('jadwal', 'jadwal.id_jadwal = krs.id_jadwal', 'left');
        $this->db->where('jadwal.id_dosen', $id_dosen);
        $this->db->group_by('mahasiswa.id_mahasiswa, jadwal.id_matkul');

        $query = $this->db->get();
        return $query;
    }
}