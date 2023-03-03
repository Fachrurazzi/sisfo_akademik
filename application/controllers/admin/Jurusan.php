<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();
	}
	
	public function index()
	{
        $data['title'] = 'Jurusan';
        $data['subtitle'] = 'Data Jurusan';
		$data['jurusan'] = $this->M_jurusan->getData()->result();
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$data['tahunAjar'] = $this->M_jadwal->getTahun()->result();
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/jurusan/index',$data);
        $this->load->view('admin/templates/footer');
	}

	public function add()
	{
		$data = [
			'id_jurusan' => $this->input->post('id_jurusan'),
			'jurusan' => $this->input->post('jurusan'),
			'singkat' => $this->input->post('singkatan'),
			'jenjang' => $this->input->post('jenjang'),
			'akreditasi' => $this->input->post('akreditasi'),
			'created_at' => date('Y-m-d')
		];

		$this->M_jurusan->insertData('jurusan', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Jurusan berhasil ditambahkan!
      </div>');
        return redirect('admin/Jurusan');
	}


	public function update($id_jurusan)
	{
		$id = ['id_jurusan' => $id_jurusan];
		$data['title'] = 'Jurusan';
        $data['subtitle'] = 'Data Jurusan';

		$data['jurusan'] = $this->M_jurusan->getUpdate('jurusan',$id)->row_array();
		$data['tahunAjar'] = $this->M_jadwal->getTahun()->result();
		//var_dump($data);die();
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/jurusan/update',$data);
        $this->load->view('admin/templates/footer');
	}		

	public function updateAksi($id_jurusan)
	{
		$id = ['id_jurusan' => $id_jurusan];
		$data = [
			'id_jurusan' => $this->input->post('id_jurusan'),
			'jurusan' => $this->input->post('jurusan'),
			'singkat' => $this->input->post('singkatan'),
			'jenjang' => $this->input->post('jenjang'),
			'akreditasi' => $this->input->post('akreditasi'),
			'updated_at' => date('Y-m-d')
		];

		$this->M_jurusan->UpdateData('jurusan', $data, $id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Jurusan berhasil diupdate!
      </div>');
        return redirect('admin/Jurusan');
	}

	public function delete($id_jurusan)
	{
		$id = ['id_jurusan' => $id_jurusan];

		$this->db->delete('jurusan', $id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Jurusan berhasil dihapus!
      </div>');
        return redirect('admin/Jurusan');

	}
	

}