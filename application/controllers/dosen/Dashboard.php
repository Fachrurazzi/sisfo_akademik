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
		$data['subtitle'] = 'Dosen';
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();

		$data['totalMhs'] = $this->M_mahasiswa->getTotalMhs()->row_array();
		$data['totalDosen'] = $this->M_dosen->getTotalDosen()->row_array();
		$data['totalJurusan'] = $this->M_jurusan->getTotalJurusan()->row_array();
		$data['totalMatkul'] = $this->M_matkul->getTotalMatkul()->row_array();
		$data['tahunAjar'] = $this->M_jadwal->getTahun()->result();
		$data['dosen'] = $this->M_dosen->getSession()->row_array();

		$this->load->view('dosen/templates/header', $data);
		$this->load->view('dosen/templates/sidebar', $data);
		$this->load->view('dosen/dashboard');
		$this->load->view('dosen/templates/footer');
		
	}
}