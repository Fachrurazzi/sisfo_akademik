<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();
		$this->load->helper(['access_control', 'format_hari_tanggal', ]);
	}

	public function index()
	{
		$data['title'] = 'Absensi';
		$data['subtitle'] = 'Absensi Mahasiswa';
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$data['absensi'] = $this->M_absensi->getAllAbsensi()->result_array();
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/absensi/index',$data);
        $this->load->view('admin/templates/footer');
	}

	public function create_absen() {
		$data['title'] = 'Absensi Kehadiran';
		$data['subtitle'] = 'Absensi Harian';
		$id_dosen = $this->session->userdata('id_dosen');
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$data['absensi'] = $this->M_Absensi->getAllAbsensi()->result();
		
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/absensi/create',$data);
        $this->load->view('admin/templates/footer');		
	}

}