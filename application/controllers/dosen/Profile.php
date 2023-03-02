<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Profile';
		$data['subtitle'] = 'Dosen';
        //$data['dosen'] = $this->db->get('dosen')->row_array();
        $data['dosen'] = $this->M_dosen->getSession()->row_array();
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$data['tahunAjar'] = $this->M_jadwal->getTahun()->result();
		$this->load->view('dosen/templates/header', $data);
		$this->load->view('dosen/templates/sidebar', $data);
		
		$this->load->view('dosen/profile', $data);
		$this->load->view('dosen/templates/footer');
	}

	public function updateAksi()
	{
		$id = $this->input->post('id_dosen');

		$data = [
			'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen')),
			'jk' => htmlspecialchars($this->input->post('jk')),
			'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir')),
			'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir')),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
			'hp' => htmlspecialchars($this->input->post('hp')),
			'pendidikan_terakhir' => htmlspecialchars($this->input->post('pendidikan_terakhir')),
			'updated_at' => date('Y-m-d')
		];

		$where = ['id_dosen' => $id];

		$this->db->update('dosen', $data, $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Anda Berhasil di Update!
      </div>');
        return redirect($_SERVER['HTTP_REFERER']);
	}

	public function updatePass()
	{
		$id = $this->input->post('id_dosen');

		$data = [
			'password' => md5($this->input->post('password')),
			'updated_at' => date('Y-m-d')
		];

		$where = ['id_dosen' => $id];

		$this->db->update('dosen', $data, $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Password Berhasil di Update!
      </div>');
        return redirect($_SERVER['HTTP_REFERER']);
	}

	//update photo
	public function updatePhoto()
	{
		$id = $this->input->post('id_dosen');

		$photo = $_FILES['photo']['name'];
			if($photo){
				$config ['upload_path'] = './assets/img/uploads';
				$config ['allowed_types'] = 'jpeg|jpg|png';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('photo')){
					$photo = $this->upload->data('file_name');
					$this->db->set('photo', $photo);
				}else{
					echo "Gagal Upload";
				}
			}
		$data = [
			'photo' => $photo,
			'updated_at' => date('Y-m-d')
		];

		$where = ['id_dosen' => $id];

		//timpah file photo lama
		$item = $this->db->get_where('dosen', $where)->row();

		if($item->photo != NULL){
			$target_file = './assets/img/uploads/'.$item->photo;
			unlink($terget_file);
		}

		$this->db->update('dosen', $data, $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Photo Berhasil di Update!
      </div>');
        return redirect($_SERVER['HTTP_REFERER']);
	}
	




}