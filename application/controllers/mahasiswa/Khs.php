<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Khs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();

		$this->load->helper(['access_control', 'format_hari_tanggal', ]);
	}

	public function index()
	{	
		$mhs = $this->M_mahasiswa->getSession()->row_array();
		$data['title'] = 'KHS';
		$data['subtitle'] = 'Kartu Hasil Studi';
		//UNTUK MENGAMBIL DATA MAHASISWA LOGIN SESSION
        $data['mhs'] = $this->M_mahasiswa->getSession()->row_array();
		//AMBIL DATA KRS DARI JADWAL MATAKULIAH BERDASARKAN JURUSAN
		$data['getKHS'] = $this->M_KHS->getDataKHS($mhs['id_jurusan'])->result();
		//AMBIL KRS
		$data['khs'] = $this->M_KHS->viewKhs($mhs['id_mahasiswa'])->result();
		$data['mahasiswa'] = $this->M_mahasiswa->getSession()->row_array();
		$this->load->view('mahasiswa/templates/header', $data);
		$this->load->view('mahasiswa/templates/sidebar', $data);
		$this->load->view('mahasiswa/khs', $data);
		$this->load->view('mahasiswa/templates/footer');		
	}

	public function print($id_mahasiswa)
	{
		$data['ketua'] = array(
			'nama' => 'Rr. Sri Nuriaty Masdiputri, M.Keb',
			'nik' => '1131059801',
		);
		$data['mahasiswa'] = $this->M_mahasiswa->mhsId($id_mahasiswa)->row_array();
		$data['getKhs'] = $this->M_KRS->viewKrs($id_mahasiswa)->result();

		//$this->load->view('admin/templates/header');
		$this->load->view('mahasiswa/print_khs', $data);
	}
}
