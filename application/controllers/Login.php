<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

    public function getLogin()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username Wajib diisi']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password Wajib diisi']);
        $this->form_validation->set_rules('level', 'Level', 'required', ['required' => 'Level Wajib diisi']);

        if($this->form_validation->run() == FALSE){
            $this->load->view('login');
        }else{
            $level = $this->input->post('level');
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);

            $pass = md5($password);

            if($level == 'admin'){
                //INI SEGMENT LOGIN ADMIN
                $cek_user = $this->M_Users->loginUser($username, $pass);
                if($cek_user){
                    //jika data admin/user cocok dengan database
                    $this->session->set_userdata('level', $level);
                    $this->session->set_userdata('username', $username);

                    return redirect('admin/dashboard');
                }else{
                    //jika gagal atau data tidak cocok
                    $this->session->set_flashdata('pesan', '<h4>Username atau Password Anda Salah!!</h4>');
                    return redirect('Login');
                }
            }elseif($level == 'mahasiswa'){
                //INI SEGEMENT LOGIN MAHASISWA
                $cek_mhs = $this->M_Users->loginMhs($username, $pass);

                if($cek_mhs){
                    //jika cocok datanya

                    $this->session->set_userdata('level', $level);
                    $this->session->set_userdata('username', $cek_mhs->nim);
                    $this->session->set_userdata('nama_mhs', $cek_mhs->nama_mhs);
                    $this->session->set_userdata('nama_panjang', $cek_mhs->nama_kepanjangan);
                    $this->session->set_userdata('photo', $cek_mhs->photo);

                    return redirect('mahasiswa/dashboard');
                }else{
                    //jika gagal
                    $this->session->set_flashdata('pesan', '<h4>Username atau Password Anda Salah!!</h4>');
                    return redirect('Login');
                }
            }elseif($level == 'dosen'){
                //INI SEGEMENT LOGIN DOSEN
                $cek_dosen = $this->M_Users->logindsn($username, $pass);

                if($cek_dosen){
                    //jika cocok datanya

                    $this->session->set_userdata('level', $level);
                    $this->session->set_userdata('id_dosen', $cek_dosen->id_dosen);
                    $this->session->set_userdata('username', $cek_dosen->nik);
                    $this->session->set_userdata('nama_dosen', $cek_dosen->nama_dosen);
                    $this->session->set_userdata('photo', $cek_dosen->photo);

                    return redirect('dosen/dashboard');
                }else{
                    //jika gagal
                    $this->session->set_flashdata('pesan', '<h4>Username atau Password Anda Salah!!</h4>');
                    return redirect('Login');
                }
            }
        
        }
    
    }
    
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }


}
