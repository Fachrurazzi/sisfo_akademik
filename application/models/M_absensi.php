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

    public function getKelasByDosen($id_dosen) {
        $this->db->select('jadwal.ruangan as kelas');
        $this->db->from('krs');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
        $this->db->join('jadwal', 'jadwal.id_jadwal = krs.id_jadwal', 'left');
        $this->db->where('jadwal.id_dosen', $id_dosen);
        $this->db->group_by('jadwal.ruangan');

        $query = $this->db->get();
        return $query;
    }

    public function save_absensi($data) {
        return $this->db->insert_batch('absensi_mhs', $data);
    }

    public function getAbsensi() {
        $id_dosen = $this->session->userdata('id_dosen');
        $this->db->select('absensi_mhs.tanggal as tanggal, jurusan.jurusan as nama_jurusan, jadwal.ruangan as kelas, matakuliah as mata_kuliah');
        $this->db->from('absensi_mhs');
        $this->db->join('jadwal', 'jadwal.id_matkul = absensi_mhs.id_matkul');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = jadwal.id_matkul');
        $this->db->join('jurusan', 'jurusan.id_jurusan = matakuliah.id_jurusan');
        $this->db->where('jadwal.id_dosen', $id_dosen);
        $this->db->group_by('absensi_mhs.tanggal');

        $query = $this->db->get();

        return $query;
    }

    public function getMahasiswaByKelas($kelas)
    {
        $id_dosen = $this->session->userdata('id_dosen');
        $this->db->select('mahasiswa.id_mahasiswa id, mahasiswa.nama_kepanjangan as nama, jadwal.ruangan as kelas');
        $this->db->from('krs');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
        $this->db->join('jadwal', 'jadwal.id_jadwal = krs.id_jadwal', 'left');
        $this->db->where('jadwal.id_dosen', $id_dosen);
        $this->db->where('jadwal.ruangan', $kelas);
        $this->db->group_by('mahasiswa.id_mahasiswa');

        return $this->db->get()->result();
    }

    public function getAbsensiByKelas() {
        $this->db->select('jadwal.ruangan as kelas, absensi_mhs.tanggal, mahasiswa.nama_kepanjangan as nama, absensi_mhs.absen');
        $this->db->from('absensi_mhs');
        $this->db->join('jadwal', 'jadwal.id_matkul = absensi_mhs.id_matkul');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = jadwal.id_matkul');
        $this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = absensi_mhs.id_mahasiswa');
        $this->db->group_by('mahasiswa.id_mahasiswa');

        return $this->db->get();
    }

    public function getAbsensiDosen() {
        $this->db->select('absensi_dosen.tanggal as tanggal, dosen.nama_dosen as nama, matakuliah.matakuliah as mata_kuliah,
        absensi_dosen.kelas as kelas, absensi_dosen.title as title, absensi_dosen.keterangan as keterangan, 
        absensi_dosen.absen as absensi, absensi_dosen.id as id');
        $this->db->from('absensi_dosen');
        $this->db->join('dosen', 'dosen.id_dosen = absensi_dosen.id_dosen');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = absensi_dosen.id_matkul');
        $this->db->where('absensi_dosen.id_dosen', $this->session->userdata('id_dosen'));
        $this->db->order_by('tanggal', 'ASC');

        return $this->db->get();
    }

    public function insertData($data, $table)
    {
        $this->db->insert($data, $table);
    }

    public function getAbsensiDosenById($id) {
        $this->db->select('absensi_dosen.tanggal as tanggal, dosen.nama_dosen as nama, matakuliah.matakuliah as mata_kuliah,
        absensi_dosen.kelas as kelas, absensi_dosen.title as title, absensi_dosen.keterangan as keterangan, 
        absensi_dosen.absen as absensi, absensi_dosen.id as id');
        $this->db->from('absensi_dosen');
        $this->db->join('dosen', 'dosen.id_dosen = absensi_dosen.id_dosen');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = absensi_dosen.id_matkul');
        $this->db->where('absensi_dosen.id_dosen', $this->session->userdata('id_dosen'));
        $this->db->where('absensi_dosen.id', $id);
        $this->db->order_by('tanggal', 'ASC');

        return $this->db->get();
    }
    
}