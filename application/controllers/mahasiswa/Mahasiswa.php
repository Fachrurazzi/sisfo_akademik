<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();
	}
    
	public function index()
	{   
        $data['title'] = 'Master';
        $data['subtitle'] = 'Data Mahasiswa';

        $data['mahasiswa'] = $this->M_mahasiswa->getData()->result();
		$data['mahasiswa'] = $this->M_mahasiswa->getSession()->row_array();
		$this->load->view('mahasiswa/templates/header', $data);
        $this->load->view('mahasiswa/templates/sidebar',$data);
		$this->load->view('mahasiswa/nilai/index',$data);
        $this->load->view('mahasiswa/templates/footer');	
	}

    public function add()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'nama_mhs' => $this->input->post('nama'),
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
        return redirect('mahasiswa/Mahasiswa'); 
    }

    public function detil($id_mahasiswa){

        $data['title'] = 'Master';
        $data['subtitle'] = 'Detil Data Mahasiswa';

        $id = ['id_mahasiswa' => $id_mahasiswa];
    

        $data['mahasiswa'] = $this->M_mahasiswa->getDetil('mahasiswa',$id)->row_array();
        //var_dump($data);die();
        $data['mahasiswa'] = $this->M_mahasiswa->getSession()->row_array();
		$this->load->view('mahasiswa/templates/header', $data);
        $this->load->view('mahasiswa/templates/sidebar',$data);
		$this->load->view('mahasiswa/nilai/detil',$data);
        $this->load->view('mahasiswa/templates/footer');


    }

    public function delete($id_mahasiswa){

        $id = ['id_mahasiswa' => $id_mahasiswa];

        $this->db->delete('mahasiswa',$id);
        $this->db->delete('krs',$id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data mahasiswa berhasil dihapus!
      </div>');
        return redirect('mahasiswa/Mahasiswa');
    }

    


}