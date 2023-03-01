<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();
	}
    
	public function index()
	{   
        $data['title'] = 'Dosen';
        $data['subtitle'] = 'Data Dosen';

        $data['dosen'] = $this->M_dosen->getData()->result();
        $data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/dosen/index',$data);
        $this->load->view('admin/templates/footer');	
	}

    public function add()
    {
        $data = array(
            'nik' => $this->input->post('nik'),
            'nama_dosen' => $this->input->post('nama_dosen'),
            'password' => md5($this->input->post('password')),
            'created_at' => date('Y-m-d')
        );


        $this->M_dosen->insertData('dosen', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Dosen berhasil ditambahkan!
      </div>');
        return redirect('admin/Dosen'); 
    }

    public function detil($id_dosen){

        $data['title'] = 'Dosen';
        $data['subtitle'] = 'Detil Data Dosen';

        $id = ['id_dosen' => $id_dosen];
    

        $data['dosen'] = $this->M_dosen->getDetil('dosen',$id)->row_array();
        //var_dump($data);die();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/dosen/detil',$data);
        $this->load->view('admin/templates/footer');


    }

    public function delete($id_dosen){

        $id = ['id_dosen' => $id_dosen];

        $this->db->delete('dosen',$id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Dosen berhasil dihapus!
      </div>');
        return redirect('admin/Dosen');
    }

    public function print($id_dosen)
	{
		$data['dosen'] = $this->M_dosen->mhsId($id_dosen)->row_array();
		

		//$this->load->view('admin/templates/header');
		$this->load->view('admin/dosen/print', $data);
	}

}