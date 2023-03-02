<?php 

class M_nilai extends CI_Model {

    public function getMatkul($table, $where){
        return $this->db->get_where($table, $where);
    }

    public function getMhs($id_matkul)
    {
        $this->db->select('krs.*, jadwal.*, mahasiswa.*, matakuliah.*');
        $this->db->from('krs');
        $this->db->join('jadwal', 'jadwal.id_jadwal = krs.id_jadwal','left');
        $this->db->join('matakuliah', 'matakuliah.id_matkul = jadwal.id_matkul','left');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa','left');
        $this->db->where('jadwal.id_matkul', $id_matkul);
        $this->db->order_by('nim', 'ASC');
        $query = $this->db->get();
        return $query;
    }




}