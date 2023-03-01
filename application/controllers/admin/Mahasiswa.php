<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();

        $this->load->helper(['access_control', 'format_hari_tanggal' ]);
	}
    
	public function index()
	{   
        $data['title'] = 'Mahasiswa';
        $data['subtitle'] = 'Data Mahasiswa';

        $data['mahasiswa'] = $this->M_mahasiswa->getData()->result();
        $data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/mahasiswa/index',$data);
        $this->load->view('admin/templates/footer');	
	}

    public function add()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'nama_mhs' => $this->input->post('nama_panggilan'),
            'nama_kepanjangan' => $this->input->post('nama_lengkap'),
            'password' => md5($this->input->post('password')),
            'id_jurusan' => $this->input->post('jurusan'),
            'created_at' => date('Y-m-d')
        );


        $this->M_mahasiswa->insertData('mahasiswa', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data mahasiswa berhasil ditambahkan!
      </div>');
        return redirect('admin/Mahasiswa'); 
    }

    public function detil($id_mahasiswa){

        $data['title'] = 'Mahasiswa';
        $data['subtitle'] = 'Detil Data Mahasiswa';

        $id = ['id_mahasiswa' => $id_mahasiswa];
    

        $data['mahasiswa'] = $this->M_mahasiswa->getDetil('mahasiswa',$id)->row_array();
        //var_dump($data);die();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/mahasiswa/detil',$data);
        $this->load->view('admin/templates/footer');


    }

    public function delete($id_mahasiswa){

        $id = ['id_mahasiswa' => $id_mahasiswa];

        $this->db->delete('mahasiswa',$id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data mahasiswa berhasil dihapus!
      </div>');
        return redirect('admin/Mahasiswa');
    }

    public function print($id_mahasiswa)
	{
		$data['mahasiswa'] = $this->M_mahasiswa->mhsId($id_mahasiswa)->row_array();
		

		//$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/mahasiswa/print', $data);
	}

    public function laporan_data_mahasiswa()
	{   
        $data['title'] = 'Mahasiswa';
        $data['subtitle'] = 'Laporan Data Mahasiswa';

        $data['kelas'] = $this->M_mahasiswa->getAllKelas()->result();
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/mahasiswa/laporan_data_mahasiswa',$data);
        $this->load->view('admin/templates/footer');	
	}

    public function laporan_data_mahasiswa_by_kelas()
    {
        $data['ketua'] = array(
			'nama' => 'Rr. Sri Nuriaty Masdiputri, M.Keb',
			'nik' => '1131059801',
		);
        $kelas = $this->input->post('kelas');

        $data['getAllMhs'] = $this->M_mahasiswa->getAllMhs($kelas)->result();
        $this->load->view('admin/mahasiswa/print_mahasiswa', $data);
    }

}