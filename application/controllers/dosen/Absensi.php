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
		$data['title'] = '';
		$data['subtitle'] = 'Absensi Mahasiswa';
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$data['dosen'] = $this->M_dosen->getSession()->row_array();
		$data['absensi'] = $this->M_absensi->getAbsensi()->result();
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
		$data['matkul'] = $this->M_matkul->getMatkul()->result();
		$data['kelas'] = $this->M_absensi->getKelasByDosen($this->session->userdata('id_dosen'))->result();
		$this->load->view('dosen/templates/header', $data);
        $this->load->view('dosen/templates/sidebar',$data);
		$this->load->view('dosen/absensi/create',$data);
        $this->load->view('dosen/templates/footer');		
	}

	public function save() {
		$id_dosen = $this->session->userdata('id_dosen');
		$tanggal = date('Y-m-d');
		$data = array();
		$mahasiswa = $this->input->post('mahasiswa');
		$id_mahasiswa = $this->input->post('id');
		$kehadiran = $this->input->post('kehadiran');
		$id_matkul = $this->input->post('id_matkul');
		for($i = 0; $i < sizeof($mahasiswa); $i++) {
			array_push($data, [
				'id_matkul' => $id_matkul,
				'id_dosen' => $id_dosen,
				'id_mahasiswa' => $id_mahasiswa[$i],
				'tanggal' => $tanggal,
				'absen' => $kehadiran[$i]
			]);
		}
		$this->M_absensi->save_absensi($data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Sukses!</h4>
		Data absensi mahasiswa berhasil ditambahkan!
  </div>');

  	return redirect('dosen/Absensi'); 
	}

	public function detail()
	{
		$data['title'] = '';
		$data['subtitle'] = 'Absensi Mahasiswa';
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$data['dosen'] = $this->M_dosen->getSession()->row_array();
		$data['absensi'] = $this->M_absensi->getAbsensi()->result();
		$this->load->view('dosen/templates/header', $data);
        $this->load->view('dosen/templates/sidebar',$data);
		$this->load->view('dosen/absensi/index',$data);
        $this->load->view('dosen/templates/footer');
	}

}