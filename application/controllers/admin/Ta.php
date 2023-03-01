<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Tahun Akademik';
		$data['subtitle'] = 'Tahun Akademik';
        $data['ta'] = $this->M_ta->getData('ta')->result();
        $data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/ta/index', $data);
        $this->load->view('admin/templates/footer');
	}

    public function add()
    {
        $data = [
            'ta'    => $this->input->post('ta'),
            'smt'   => $this->input->post('smt'),
            'created_at' => date('Y-m-d')
        ];

        $this->db->insert('ta', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Tahun Akademik berhasil ditambahkan!
      </div>');
        return redirect('admin/Ta');
    }

    public function delete($id_ta)
    {
        $where = ['id_ta' => $id_ta];

        $this->db->delete('ta', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil dihapus!
      </div>');
        return redirect('admin/Ta');
    }






}
