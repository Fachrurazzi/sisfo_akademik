<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();
	}

	public function index()
	{
		$data['title'] = '';
		$data['subtitle'] = 'Absensi Mahasiswa';
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$data['dosen'] = $this->M_dosen->getSession()->row_array();
		$this->load->view('dosen/templates/header', $data);
        $this->load->view('dosen/templates/sidebar',$data);
		$this->load->view('dosen/absensi/index',$data);
        $this->load->view('dosen/templates/footer');
	}

	public function create_absen() {
		$data['title'] = '';
		$data['subtitle'] = 'Absensi Harian';
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$data['dosen'] = $this->M_dosen->getSession()->row_array();
		$data['matkul'] = $this->M_matkul->getMatkulByDosen()->result();
		$data['kelas'] = $this->M_absensi->getKelasByDosen($this->session->userdata('id_dosen'))->result();
		$this->load->view('dosen/templates/header', $data);
        $this->load->view('dosen/templates/sidebar',$data);
		$this->load->view('dosen/absensi/create',$data);
        $this->load->view('dosen/templates/footer');		
	}

}