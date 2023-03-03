<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AbsensiDosen extends CI_Controller {

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
		$data['subtitle'] = 'Absensi Dosen';
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$data['dosen'] = $this->M_dosen->getSession()->row_array();
		$data['absensi'] = $this->M_absensi->getAbsensiDosen()->result();
		$data['tahunAjar'] = $this->M_jadwal->getTahun()->result();
		$this->load->view('dosen/templates/header', $data);
        $this->load->view('dosen/templates/sidebar',$data);
		$this->load->view('dosen/absensi_dosen/index',$data);
        $this->load->view('dosen/templates/footer');
	}

	public function create_absen() {
		$data['title'] = '';
		$data['subtitle'] = 'Absensi Harian';
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$data['dosen'] = $this->M_dosen->getSession()->row_array();
		$data['matkul'] = $this->M_matkul->getMatkul()->result();
		$data['kelas'] = $this->M_absensi->getKelasByDosen($this->session->userdata('id_dosen'))->result();
		$data['tahunAjar'] = $this->M_jadwal->getTahun()->result();
		$this->load->view('dosen/templates/header', $data);
        $this->load->view('dosen/templates/sidebar',$data);
		$this->load->view('dosen/absensi_dosen/create',$data);
        $this->load->view('dosen/templates/footer');		
	}

	public function save() {

		$tgl = $this->input->post('tanggal');

		$data = array(
            'id_dosen' => $this->input->post('id_dosen'),
            'id_matkul' => $this->input->post('id_matkul'),
            'kelas' => $this->input->post('kelas'),
            'title' => $this->input->post('title'),
            'keterangan' => $this->input->post('keterangan'),
			'tanggal' => date('Y-m-d', strtotime($tgl)),
            'absen' => $this->input->post('kehadiran'),
        );

		var_dump($data);


        $this->M_absensi->insertData('absensi_dosen', $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Sukses!</h4>
		Data absensi dosen berhasil ditambahkan!
  </div>');

  	return redirect('dosen/AbsensiDosen'); 
	}

	public function detail($id)
	{
		$data['title'] = '';
		$data['subtitle'] = 'Detail Absensi Dosen';
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$data['dosen'] = $this->M_dosen->getSession()->row_array();
		$data['dataMahasiswa'] = $this->M_absensi->getAbsensiByKelas()->result();
		$data['tahunAjar'] = $this->M_jadwal->getTahun()->result();
		$data['absensi'] = $this->M_absensi->getAbsensiDosenById($id)->row_array();
		$this->load->view('dosen/templates/header', $data);
        $this->load->view('dosen/templates/sidebar',$data);
		$this->load->view('dosen/absensi_dosen/detail',$data);
        $this->load->view('dosen/templates/footer');
	}

	public function delete($id_absensi){

        $id = ['id' => $id_absensi];

        $this->db->delete('absensi_dosen', $id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data absensi dosen berhasil dihapus!
      </div>');
        return redirect('dosen/AbsensiDosen');
    }

}