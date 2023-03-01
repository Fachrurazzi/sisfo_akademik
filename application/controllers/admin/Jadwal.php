<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();

		$this->load->helper(['access_control', 'format_hari_tanggal' ]);
	}

	public function index()
	{
		$data['title'] = 'Jadwal Kuliah';
		$data['subtitle'] = 'Pilih Jadwal Sesuai Jurusan';
        $data['jurusan'] = $this->M_jurusan->getData()->result();
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/jadwal/index',$data);
        $this->load->view('admin/templates/footer');
	}

    public function index_jadwal($id_jurusan)
    {   
        $where = ['id_jurusan' => $id_jurusan];

        $data['title'] = 'Tambah Jadwal Mata Kuliah';
		$data['subtitle'] = 'Jadwal Matakuliah';
        
        $data['detil'] = $this->M_jurusan->getDetil('jurusan', $where)->row_array();
		$data['matkul'] = $this->M_jadwal->getData($id_jurusan)->result();
		$data['jrsMatkul'] = $this->M_jadwal->getJrsMatkul($id_jurusan)->result();
		$data['ta'] = $this->M_ta->getData('ta')->result();
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/jadwal/jadwal',$data);
        $this->load->view('admin/templates/footer');
    }

	public function insert($id_jurusan)
	{

		$data = [
			'id_jurusan' => $id_jurusan,
			'id_ta' => $this->input->post('ta'),
			'id_matkul' => $this->input->post('matakuliah'),
			'id_dosen' => $this->input->post('dosen'),
			'hari' => $this->input->post('hari'),
			'jam' => $this->input->post('jam'),
			'ruangan' => $this->input->post('ruangan'),
			'created_at' => date('Y-m-d')
		];

		$this->M_jadwal->insertData('jadwal', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Matakuliah berhasil ditambahkan!
      </div>');
        return redirect($_SERVER['HTTP_REFERER']);
	}

	public function softDelete($id_jadwal)
	{
		$where = ['id_jadwal' => $id_jadwal];


		$this->db->delete('jadwal', $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Matakuliah Berhasiil Dihapus!
      </div>');
        return redirect($_SERVER['HTTP_REFERER']);
	}

	public function laporan_jadwal()
	{   
        $data['title'] = 'Laporan';
        $data['subtitle'] = 'Laporan Data Jadwal Mata Kuliah';

        $data['jurusan'] = $this->M_jurusan->getData()->result();
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/jadwal/laporan_jadwal',$data);
        $this->load->view('admin/templates/footer');	
	}

    // public function laporan_data_mahasiswa_by_kelas()
    // {
    //     $kelas = $this->input->post('kelas');

    //     $data['getAllMhs'] = $this->M_mahasiswa->getAllMhs($kelas)->result();
    //     $this->load->view('admin/mahasiswa/print_mahasiswa', $data);
    // }

	public function print_jadwal() {
		$semester = $this->input->post('semester');
		$id_jurusan = $this->input->post('jurusan');
		$where = ['id_jurusan' => $id_jurusan];

		$data['ketua'] = array(
			'nama' => 'Rr. Sri Nuriaty Masdiputri, M.Keb',
			'nik' => '1131059801',
		);
        
        $data['detil'] = $this->M_jurusan->getDetil('jurusan', $where)->row_array();
		$data['matkul'] = $this->M_jadwal->getJadwal($id_jurusan, $semester)->result();
		$data['jrsMatkul'] = $this->M_jadwal->getJrsMatkul($id_jurusan)->result();

		$this->load->view('admin/jadwal/print', $data);
    }





}
