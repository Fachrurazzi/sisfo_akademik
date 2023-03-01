<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->M_security->getSecurity();

		$this->load->helper(['access_control', 'format_hari_tanggal', ]);
	}

	public function index()
	{	
		$data['title'] = 'KRS';
		$data['subtitle'] = 'Kartu Rencana Studi';
		//UNTUK MENGAMBIL DATA MAHASISWA LOGIN SESSION

		//AMBIL DATA KRS DARI JADWAL MATAKULIAH BERDASARKAN JURUSAN
		$data['getAllKRS'] = $this->M_KRS->getAllKRS()->result_array();
		$data['semester'] = $this->M_jadwal->getAllSemester()->result();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/krs/krs', $data);
		$this->load->view('admin/templates/footer');
		
	}
	public function addKrs($id_jadwal)
	{
		$mhs = $this->M_mahasiswa->getSession()->row_array();

		$ta = $this->M_ta->getData('ta')->row_array();

		// $data = [
		// 	'id_jadwal' => $id_jadwal,
		// 	'id_mahasiswa' => $mhs['id_mahasiswa'],
		// 	'id_ta' => $ta['ta'] == date('Y', strtotime('-1 years')).'/'.date('Y') ? $ta['id_ta'] : 1,

		// 	'created_at' => date('Y-m-d')	
		// ];

		$data = $ta['ta'] == date('Y', strtotime('-1 years')).'/'.date('Y') ? $ta['id_ta'] : 1;
		print_r($data);

		$this->db->insert('krs', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data KRS Berhasil di tambahkan!
      </div>');
        return redirect($_SERVER['HTTP_REFERER']);
	}

	public function detil($id_krs)
	{
        $data['title'] = 'Master';
        $data['subtitle'] = 'Detil KRS';

        $id = ['id_krs' => $id_krs];
    

        $data['krs'] = $this->M_krs->getDetil('krs',$id)->row_array();
        //var_dump($data);die();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/krs/krs',$data);
        $this->load->view('admin/templates/footer');
	}

	public function delete($id_krs)
	{
		$where = ['id_krs' => $id_krs];

		$this->db->delete('krs', $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data KRS Berhasil di hapus!
      </div>');
        return redirect($_SERVER['HTTP_REFERER']);
	}

	public function print($id_mahasiswa)
	{
		$data['ketua'] = array(
			'nama' => 'Rr. Sri Nuriaty Masdiputri, M.Keb',
			'nik' => '1131059801',
		);
		$mahasiswa = $this->M_KRS->printKRS($id_mahasiswa)->result_array();
		//$this->load->view('admin/templates/header', $data);
		$data['krs'] = [];
		$i = 0;
		foreach ($mahasiswa as $mhs) {
			$data['krs'][$i]['nama'] = $mhs['nama'];
			$data['krs'][$i]['nim'] = $mhs['nim'];
			$data['krs'][$i]['jurusan'] = $mhs['jurusan'];
			$data['krs'][$i]['tahun_ajar'] = $mhs['ta'];
			$data['krs'][$i]['kode'] = $mhs['id_matkul'];
			$data['krs'][$i]['mata_kuliah'] = $mhs['matakuliah'];
			$data['krs'][$i]['sks'] = $mhs['sks'];
			$data['krs'][$i]['kelas'] = $mhs['ruangan'];
			++$i;
		}

		$this->load->view('admin/krs/print_krs', $data);
	}



}
