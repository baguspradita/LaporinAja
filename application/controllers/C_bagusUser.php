<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_bagusUser extends CI_Controller
{

	public function index()
	{
		$data['user'] = $this->M_bagusUser->userData($this->session->userdata('username'))->row_array();

		$data['title'] = 'LaporinAja';
		$this->load->view('user/headerUser', $data);
		$this->load->view('V_bagusUser', $data);
		$this->load->view('user/footer', $data);
	}

	public function pengaduan()
	{
		$data['user'] = $this->M_bagusUser->userData($this->session->userdata('username'))->row_array();

		$data['kategori'] = $this->M_bagusDashboard->kategori()->result_array();
		$data['subkategori'] = $this->M_bagusDashboard->subkategori()->result_array();

		$data['title'] = 'Pengaduan';
		$this->load->view('user/header', $data);
		$this->load->view('V_bagusPengaduan', $data);
		$this->load->view('user/footer');
	}

	public function tambahPengaduan()
	{
		$data = $this->M_bagusUser->userData($this->session->userdata('username'))->row_array();
		$tgl_pengaduan = $this->input->post('tgl_pengaduan');
		$kategori = $this->input->post('kategori');
		$subkategori = $this->input->post('subkategori');
		$laporan = $this->input->post('laporan');

		// upload file
		$config['upload_path']          = './assets/uploads';
		$config['allowed_types']        = 'gif|jpg|png';
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		$this->upload->do_upload('foto');
		$upload_img = $this->upload->data('file_name');

		$add = array(

			'tanggal_pengaduan' => date('Y-m-d'),
			'nik' => $data['nik'],
			'kategori' => $kategori,
			'subkategori' => $subkategori,
			'isi_laporan' => $laporan,
			'foto' => $upload_img,

		);

		$user = $this->db->get_where('masyarakat', ['nik' => $data['nik']])->row_array();

		$insert_id = $this->M_bagusUser->tambahPengaduan($add);
		$add_notifikasi = array(
			'id_masyarakat' => $user['id'],
			'notif_id_pengaduan' => $insert_id,
			'read_status' => '0',
			'time' => date('Y-m-d H:i:s'),

		);
		$this->db->insert('notif', $add_notifikasi);


		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Laporan Anda Telah Terkirim !
		  </div>');
		redirect('C_bagusUser');
	}

	// public function insertpengaduan()
	// {
	//     $data = [
	//         'nik' => $this->session->userdata('nik'),
	//         'id_subkategori' => $this->input->post('subkategori'),
	//         'tgl_pengaduan' => $this->input->post('tgl_pengaduan'),
	//         'isi_laporan' => $this->input->post('isi'),
	//         'foto' => $this->input->post('foto'),
	//         'status' => 0
	//     ];

	//     $this->M_bagusUser->tambahPengaduan($data);
	//     $this->session->set_flashdata('pengaduan', '<div class="alert alert-success" role="alert"> Berhasil ditambahkan! </div>');
	//     redirect('pengaduan');
	// }

	public function get_sub_kategori()
	{
		$id_kategori = $this->input->post('id');
		$sub_kategori = $this->db->get_where('subkategori', ['id_kategori' => $id_kategori])->result();
		echo json_encode($sub_kategori);
	}

	// Riwayat
	public function riwayat()
	{
		$data['user'] = $this->M_bagusUser->userData($this->session->userdata('username'))->row_array();

		$data['riwayat'] = $this->M_bagusJoin->riwayat_pengaduan()->result_array();

		$data['title'] = 'Riwayat';
		$this->load->view('user/headerUser', $data);
		$this->load->view('V_bagusRiwayat', $data);
		$this->load->view('user/footer');
	}

	// Pofil
	public function profil()
	{
		$data['user'] = $this->M_bagusUser->userData($this->session->userdata('username'))->row_array();

		$data['riwayat'] = $this->M_bagusJoin->riwayat_pengaduan()->result_array();

		$data['title'] = 'Profil';
		$this->load->view('user/headerUser', $data);
		$this->load->view('V_bagusProfil', $data);
		$this->load->view('user/footer');
	}

	public function editProfil()
	{
		$data['user'] = $this->M_bagusUser->userData($this->session->userdata('username'))->row_array();
		$user = $this->M_bagusUser->userData($this->session->userdata('username'))->row_array();
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$telepon = $this->input->post('telepon');
		$nik = $this->input->post('nik');

		$update = [
			'nama' => $nama,
			'username' => $username,
			'telepon' => $telepon,
			'nik' => $nik,
		];

		$this->db->where('id', $user['id']);
		$this->M_bagusUser->editProfil($update);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profil berhasil di update !
		  </div>');
		redirect('C_bagusUser/profil');
	}

	public function resetPassword()
	{
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'password dont match !',
			'min_length' => 'password too short !'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			// gagal reset password
			$data['user'] = $this->M_bagusUser->userData($this->session->userdata('username'))->row_array();

			$data['riwayat'] = $this->M_bagusJoin->riwayat_pengaduan()->result_array();

			$data['title'] = 'Profil';
			$this->load->view('user/headerUser', $data);
			$this->load->view('V_bagusProfil', $data);
			$this->load->view('user/footer');
		} else {
			$user = $this->M_bagusUser->userData($this->session->userdata('username'))->row_array();

			$data = [
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			];

			$this->db->where('id', $user['id']);
			$this->db->update('masyarakat', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Password anda berhasil di reset !
				  </div>');
			redirect('C_bagusAuth/loginUser');
		}
	}
}
