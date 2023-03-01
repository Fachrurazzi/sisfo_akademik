<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();

		$this->load->helper(['access_control', 'format_hari_tanggal', ]);
	}



	public function transkrip()
	{

		$data['title'] = 'Nilai';
		$data['subtitle'] = 'Data Transkrip Nilai Mahasiswa';
        
        $data['mhs'] = $this->M_mahasiswa->getData()->result();
		//var_dump($data['mahasiswa']);die();
		$data['mahasiswa'] = $this->M_mahasiswa->getSession()->row_array();
		$this->load->view('mahasiswa/templates/header', $data);
        $this->load->view('mahasiswa/templates/sidebar',$data);
		$this->load->view('mahasiswa/nilai/transkrip',$data);
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
		$this->load->view('mahasiswa/nilai/print', $data);
	}


}
