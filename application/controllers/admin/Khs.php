<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Khs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();

		$this->load->helper(['access_control', 'format_hari_tanggal' ]);
	}

	public function index()
	{	
		
		$data['title'] = 'KHS';
		$data['subtitle'] = 'Kartu Hasil Studi';
		//UNTUK MENGAMBIL DATA MAHASISWA LOGIN SESSION
        
		//AMBIL DATA KRS DARI JADWAL MATAKULIAH BERDASARKAN JURUSAN
		$data['getAllKHS'] = $this->M_KHS->getAllKHS()->result_array();
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/khs/khs', $data);
		$this->load->view('admin/templates/footer');		
	}

	public function print($id_mahasiswa)
	{
		$data['ketua'] = array(
			'nama' => 'Rr. Sri Nuriaty Masdiputri, M.Keb',
			'nik' => '1131059801',
		);
		$mahasiswa = $this->M_KHS->printKHS($id_mahasiswa)->result_array();

		//$this->load->view('admin/templates/header', $data);
		$data['khs'] = [];
		$i = 0;
		foreach ($mahasiswa as $mhs) {
			$data['khs'][$i]['nama'] = $mhs['nama'];
			$data['khs'][$i]['nim'] = $mhs['nim'];
			$data['khs'][$i]['jurusan'] = $mhs['jurusan'];
			$data['khs'][$i]['tahun_ajar'] = $mhs['ta'];
			$data['khs'][$i]['kode'] = $mhs['id_matkul'];
			$data['khs'][$i]['mata_kuliah'] = $mhs['matakuliah'];
			$data['khs'][$i]['sks'] = $mhs['sks'];
			$data['khs'][$i]['kelas'] = $mhs['ruangan'];
			$data['khs'][$i]['nilai'] = $mhs['nilai'];
			$data['khs'][$i]['smt'] = $mhs['smt'];
			++$i;
		}

		$this->load->view('admin/khs/print_khs', $data);
	}
}
