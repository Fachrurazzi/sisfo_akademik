<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();
	}

	public function index($semester, $kelas)
	{
		$data['title'] = '';
		$data['subtitle'] = 'Input Nilai Sesuai Jurusan';
        $data['jurusan'] = $this->M_jurusan->getAllDataJurusan($semester, $kelas)->result();
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$data['tahunAjar'] = $this->M_jadwal->getTahun()->result();
		$data['dosen'] = $this->M_dosen->getSession()->row_array();
		$this->load->view('dosen/templates/header', $data);
        $this->load->view('dosen/templates/sidebar',$data);
		$this->load->view('dosen/nilai/index',$data);
        $this->load->view('dosen/templates/footer');
	}

    public function getMatkul($id_jurusan, $semester, $kelas)
    {   

        $data['title'] = 'Input Nilai';
		$data['subtitle'] = 'Input Nilai Mat akuliah';
        $data['detil'] = $this->M_jadwal->getDetil($id_jurusan)->row_array();
		$data['matkul'] = $this->M_jadwal->getMatkulByKelas($id_jurusan, $semester, $kelas)->result();
        $data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$data['dosen'] = $this->M_dosen->getSession()->row_array();
		$data['tahunAjar'] = $this->M_jadwal->getTahun()->result();
		$this->load->view('dosen/templates/header', $data);
        $this->load->view('dosen/templates/sidebar',$data);
		$this->load->view('dosen/nilai/view_list_nilai',$data);
        $this->load->view('dosen/templates/footer');
    }

	public function input($id_matkul)
	{
		$where = ['id_matkul' => $id_matkul];

        $data['title'] = 'Nilai';
		$data['subtitle'] = 'Input Nilai Mahasiswa';
    
        $data['matkul'] = $this->M_nilai->getMatkul('matakuliah', $where)->row_array();
		$data['mahasiswa'] = $this->M_nilai->getMhs($id_matkul)->result();
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$data['dosen'] = $this->M_dosen->getSession()->row_array();
		$data['tahunAjar'] = $this->M_jadwal->getTahun()->result();

		$this->load->view('dosen/templates/header', $data);
        $this->load->view('dosen/templates/sidebar',$data);
		$this->load->view('dosen/nilai/view_input',$data);
        $this->load->view('dosen/templates/footer');
	}

	public function input_nilai_aksi($id_matkul)
    {
        $query = [];
        $id_krs = $_POST['id_krs'];
        $nilai = $_POST['nilai'];

		for($i=0; $i<sizeof($id_krs); $i++){
			$this->db->set('nilai', $nilai[$i])->where('id_krs', $id_krs[$i])->update('krs');
		}

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Nilai Berhasil Di Input!
      </div>');

		return redirect($_SERVER['HTTP_REFERER']);      
    }

	


}
