<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();
	}
     
	public function index()
	{
		$data['title'] = 'Mata Kuliah';
		$data['subtitle'] = 'Matakuliah';

        $data['matkul'] = $this->M_matkul->getData()->result();
        $data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/matakuliah/index',$data);
        $this->load->view('admin/templates/footer');		
	}

    public function add()
    {
        $smt = $this->input->post('semester');
        if($smt == 1){
            $s = "Ganjil";
        }elseif ($smt == 3){
            $s = "Ganjil";
        }elseif ($smt == 5){
            $s = "Ganjil";
        }elseif ($smt == 7){
            $s = "Ganjil";
        }else{
            $s = "Genap";
        }

        $semester = $s;


        $data = [
            'id_matkul' => $this->input->post('id_matkul'),
            'matakuliah' => $this->input->post('matakuliah'),
            'sks' => $this->input->post('sks'),
            'semester' => $smt,
            'smt' => $semester,
            'id_jurusan' => $this->input->post('jurusan'),
            'created_at' => date('Y-m-d')
        ];

        $this->M_matkul->insertData('matakuliah', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data matakuliah berhasil ditambahkan!
      </div>');
        return redirect('admin/Matakuliah');


    }

    public function update($id_matkul)
    {
        $where = ['id_matkul' => $id_matkul];

        $data['title'] = 'Mata Kuliah';
		$data['subtitle'] = 'Form update matakuliah';

        $data['matkul'] = $this->M_matkul->getUpdate('matakuliah', $where)->row_array();
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/matakuliah/form_update',$data);
        $this->load->view('admin/templates/footer');	
    }

    public function updateAksi($id_matkul)
    {
        $where = ['id_matkul' => $id_matkul];
        $smt = $this->input->post('semester');
        if($smt == 1){
            $s = "Ganjil";
        }elseif ($smt == 3){
            $s = "Ganjil";
        }elseif ($smt == 5){
            $s = "Ganjil";
        }elseif ($smt == 7){
            $s = "Ganjil";
        }else{
            $s = "Genap";
        }

        $semester = $s;


        $data = [
            'matakuliah' => $this->input->post('matakuliah'),
            'sks' => $this->input->post('sks'),
            'semester' => $smt,
            'smt' => $semester,
            'updated_at' => date('Y-m-d')
        ];

        $this->M_matkul->updateData('matakuliah', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data matakuliah berhasil diupdate!
      </div>');
        return redirect('admin/Matakuliah');
    }


    public function delete($id_matkul)
    {
        $where = ['id_matkul' => $id_matkul];

        $this->db->delete('matakuliah', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data matakuliah berhasil Delete!
      </div>');
        return redirect('admin/Matakuliah');
    }
}
