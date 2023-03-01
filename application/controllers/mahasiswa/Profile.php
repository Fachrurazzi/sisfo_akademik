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
		$data['subtitle'] = 'Mahasiswa';
        //$data['mahasiswa'] = $this->db->get('mahasiswa')->row_array();
        $data['mahasiswa'] = $this->M_mahasiswa->getSession()->row_array();
		$this->load->view('mahasiswa/templates/header', $data);
		$this->load->view('mahasiswa/templates/sidebar', $data);
		$this->load->view('mahasiswa/profile', $data);
		$this->load->view('mahasiswa/templates/footer');
	}

	public function updateAksi()
	{
		$id = $this->input->post('id_mahasiswa');

		$data = [
			'nama_mhs' => htmlspecialchars($this->input->post('nama_mhs')),
			'nama_kepanjangan' => htmlspecialchars($this->input->post('nama_kepanjangan')),
			'jk' => htmlspecialchars($this->input->post('jk')),
			'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir')),
			'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir')),
			'email' => htmlspecialchars($this->input->post('email')),
			'hp' => htmlspecialchars($this->input->post('hp')),
			'nama_ayah' => htmlspecialchars($this->input->post('nama_ayah')),
			'nama_ibu' => htmlspecialchars($this->input->post('nama_ibu')),
			'hp_ortu' => htmlspecialchars($this->input->post('hp_ortu')),
			'nik_kk' => htmlspecialchars($this->input->post('nik_kk')),
			'alamat' => htmlspecialchars($this->input->post('alamat')),
			'updated_at' => date('Y-m-d')
		];

		$where = ['id_mahasiswa' => $id];

		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Anda Berhasil di Update!
      </div>');
        return redirect($_SERVER['HTTP_REFERER']);
	}

	public function updatePass()
	{
		$id = $this->input->post('id_mahasiswa');

		$data = [
			'password' => md5($this->input->post('password')),
			'updated_at' => date('Y-m-d')
		];

		$where = ['id_mahasiswa' => $id];

		$this->db->update('mahasiswa', $data, $where);
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
		$id = $this->input->post('id_mahasiswa');

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

		$where = ['id_mahasiswa' => $id];

		//timpah file photo lama
		$item = $this->db->get_where('mahasiswa', $where)->row();

		if($item->photo != NULL){
			$target_file = './assets/img/uploads/'.$item->photo;
			unlink($terget_file);
		}

		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Photo Berhasil di Update!
      </div>');
        return redirect($_SERVER['HTTP_REFERER']);
	}
	




}
