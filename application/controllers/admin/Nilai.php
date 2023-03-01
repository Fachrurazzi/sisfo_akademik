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

	public function index($semester, $kelas)
	{
		$data['title'] = 'Input Nilai';
		$data['subtitle'] = 'Input Nilai Sesuai Jurusan';
        $data['jurusan'] = $this->M_jurusan->getAllDataJurusan($semester, $kelas)->result();
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/nilai/index',$data);
        $this->load->view('admin/templates/footer');
	}

    public function getMatkul($id_jurusan, $kelas)
    {   
        $where = ['id_jurusan' => $id_jurusan];

        $data['title'] = 'Input Nilai';
		$data['subtitle'] = 'Input Nilai Matakuliah';
        
        $data['detil'] = $this->M_jadwal->getDetil($id_jurusan)->row_array();
		$data['matkul'] = $this->M_jadwal->getMatkulByKelas($id_jurusan, $kelas)->result();
        // $data['semester'] = $this->M_jadwal->getData($id_jurusan)->row_array();
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();

		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/nilai/view_list_nilai',$data);
        $this->load->view('admin/templates/footer');
    }

	public function input($id_matkul)
	{
		$where = ['id_matkul' => $id_matkul];

        $data['title'] = 'Nilai';
		$data['subtitle'] = 'Input Nilai Mahasiswa';
        
        $data['matkul'] = $this->M_nilai->getMatkul('matakuliah', $where)->row_array();
		$data['mahasiswa'] = $this->M_nilai->getMhs($id_matkul)->result();
		// $data['semester'] = $this->M_jadwal->getSemester($id_matkul)->row_array();
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		//var_dump($data['mahasiswa']);die();
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/nilai/view_input',$data);
        $this->load->view('admin/templates/footer');
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

	public function transkrip()
	{

		$data['title'] = 'Input Nilai';
		$data['subtitle'] = 'Data Transkrip Nilai Mahasiswa';
        
        $data['mahasiswa'] = $this->M_mahasiswa->getData()->result();
		//var_dump($data['mahasiswa']);die();
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/nilai/transkrip',$data);
        $this->load->view('admin/templates/footer');
	}

	public function print($id_mahasiswa)
	{
		$data['ketua'] = array(
			'nama' => 'Rr. Sri Nuriaty Masdiputri, M.Keb',
			'nik' => '1131059801',
		);
		$data['dosen'] = ['nm_dsn' => 'Rr. Sri Nuriaty Masdiputri, M.Keb', 'nik_dsn' => ' 01 31051989 067 010 011'];
		$data['mahasiswa'] = $this->M_mahasiswa->mhsId($id_mahasiswa)->row_array();
		$data['getKhs'] = $this->M_KRS->viewKrs($id_mahasiswa)->result();

		//$this->load->view('admin/templates/header', $data);

		$this->load->view('admin/nilai/print', $data);
	}


}
