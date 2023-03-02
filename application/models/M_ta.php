<?php

class M_ta extends CI_Model {

    public function getData($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by('id_ta', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function getDataTa($ta) {
        $this->db->select("*");
        $this->db->from('ta');
        $this->db->where('ta', $ta);
        $query = $this->db->get();

        return $query;
    }





}