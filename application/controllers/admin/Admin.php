<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();
	}
    
	public function index()
	{   
        $data['title'] = 'Admin';
        $data['subtitle'] = 'Data Admin';

        $data['semester'] = $this->M_jadwal->getAllSemester()->result();
        $data['admin'] = $this->db->get('admin')->result();
        //var_dump($data);die();
		$this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
        $this->load->view('admin/admin/index', $data);
        $this->load->view('admin/templates/footer');
	}

    public function add()
    {
        $data = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'level' => 'admin',
            'photo' => '',
            'created_at' => date('Y-m-d')
        ];

        $this->db->insert('admin', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Admin berhasil ditambahkan!
      </div>');
        return redirect('admin/Admin');
    }


    public function detil($id_admin)
    {
        $where = ['id_admin' => $id_admin];

        $data['title'] = 'Tambah Admin';
        $data['subtitle'] = 'Detil Data Admin';

        $data['admin'] = $this->db->get_where('admin', $where)->row_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/admin/detil', $data);
        $this->load->view('admin/templates/footer');

    }

    public function updateUser($id_admin)
    {
        $where = ['id_admin' => $id_admin];

        $data = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'updated_at' => date('Y-m-d')
        ];

        $this->db->update('admin', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Admin berhasil Diupdate!
      </div>');
        return redirect('admin/admin');
    }

    public function updatePass($id_admin)
    {
        $where = ['id_admin' => $id_admin];

        $data = [
            'password' => md5($this->input->post('password')),
            'updated_at' => date('Y-m-d')
        ];

        $this->db->update('admin', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Password Admin berhasil Diupdate!
      </div>');
        return redirect('admin/admin');
    }

    public function updatePhoto($id_admin)
    {
        $where = ['id_admin' => $id_admin];

        $photo = $_FILES['photo']['name'];
                if($photo){
                    $config['upload_path'] = './assets/img/uploads';
                    $config['allowed_types'] = 'jpeg|jpg|png';

                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('photo')){
                        $photo = $this->upload->data('file_name');
                        $this->db->set('photo', $photo);
                    }else{
                        echo "Photo gagal diupdate!";
                    }
                }

        $data = array(
            'photo' => $photo,
            'updated_at' => date('Y-m-d')
        );

        //timpa data photo
        $item = $this->db->get_where('admin', $where)->row();

        if($item->photo != NULL){
            $target_file = './assets/img/uploads/'.$item->photo;
            unlink($target_file);
        }

        $this->db->update('admin', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Photo berhasil diUpdate!
        </div>');
        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id_admin)
    {
        $where = ['id_admin' => $id_admin];

        $this->db->delete('admin', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data berhasil Dihapus!
      </div>');
        return redirect('admin/admin');
    }




}