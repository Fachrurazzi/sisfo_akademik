<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['subtitle'] = 'Dashboard';

		$data['totalMhs'] = $this->M_mahasiswa->getTotalMhs()->row_array();
		$data['totalDosen'] = $this->M_dosen->getTotalDosen()->row_array();
		$data['totalJurusan'] = $this->M_jurusan->getTotalJurusan()->row_array();
		$data['totalMatkul'] = $this->M_matkul->getTotalMatkul()->row_array();

		$data['semester'] = $this->M_jadwal->getAllSemester()->result();

		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/dashboard');
        $this->load->view('admin/templates/footer');
		
	}
}
