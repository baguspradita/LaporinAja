<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_bagusDashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['notif'] = $this->M_bagusJoin->notif()->result_array();
		$data['user'] = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();
		$data['masyarakat'] = $this->M_bagusDashboard->masyarakat()->result_array();
		$data['pengaduan'] = $this->M_bagusJoin->pengaduan()->result_array();

		$pengaduan = array(
			'status' => '0',

		);
		$this->db->where($pengaduan);
		$pengaduan = $this->db->get('pengaduan')->num_rows();

		$proses = array(
			'status' => 'proses',

		);
		$this->db->where($proses);
		$proses = $this->db->get('pengaduan')->num_rows();

		$selesai = array(
			'status' => 'selesai',

		);
		$this->db->where($selesai);
		$selesai = $this->db->get('pengaduan')->num_rows();

		$notif = array(
			'read_status' => '0',

		);
		$this->db->where($notif);
		$notif = $this->db->get('notif')->num_rows();


		$data['jumlah'] = array(
			'pengaduan' => $pengaduan,
			'proses' => $proses,
			'selesai' => $selesai,
			'notif' => $notif
		);
		
		$data['title'] = 'Dashboard Administrator';
		$this->load->view('templates/topbar', $data);
		$this->load->view('V_bagusDashboard', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/footer', $data);
	}

	public function read($notif_id)
	{
		$update = [
			'read_status' => 'read'
		];

		$this->M_bagusDashboard->statusRead($notif_id, $update);
		$this->session->set_flashdata('read', '<div class="alert alert-success" role="alert">
		Laporan telah dibaca !
		  </div>');
		redirect('C_bagusDashboard');
	}

	// kategori
	public function kategori()
	{
		$data['user'] = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();
		$data['kategori'] = $this->M_bagusDashboard->kategori()->result_array();
		$data['subkategori'] = $this->M_bagusDashboard->subkategori()->result_array();
		$data['joinKategori'] = $this->M_bagusJoin->kategori()->result_array();


		$data['title'] = 'Kategori';
		$this->load->view('templates/topbar', $data);
		$this->load->view('V_bagusKategori', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambahKategori()
	{
		$data['user'] = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();


		$kategori = $this->input->post('kategori');

		$add = [
			'kategori' => $kategori,
		];

		$this->M_bagusDashboard->tambahKategori($add);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Berhasil menambahkan kategori !
		  </div>');
		redirect('C_bagusDashboard/kategori');
	}

	public function editKategori($id)
	{
		$data['user'] = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();

		$kategori = $this->input->post('kategori');

		$update = [
			'kategori' => $kategori,
		];

		$this->db->where('id', $id);
		$this->M_bagusDashboard->editKategori($update);
		$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
		Berhasil mengganti kategori !
		  </div>');
		redirect('C_bagusDashboard/kategori');
	}

	public function deleteKategori($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kategori');
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
		Berhasil menghapus kategori !
		  </div>');
		redirect('C_bagusDashboard/kategori');
	}

	// subkategori
	public function tambahSub()
	{
		$data['user'] = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();

		$subkategori = $this->input->post('subkategori');

		$add = [
			'subkategori' => $subkategori,
			'id_kategori' => $this->input->post('kategori')
		];

		$this->M_bagusDashboard->tambahSub($add);
		$this->session->set_flashdata('subkategori', '<div class="alert alert-success" role="alert">
		Berhasil menambahkan subkategori !
		  </div>');
		redirect('C_bagusDashboard/kategori');
	}

	public function editSub($id)
	{
		$data['user'] = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();

		$subkategori = $this->input->post('subkategori');

		$update = array(
			'subkategori' => $subkategori,
		);

		$this->db->where('subkategori_id', $id);
		$this->M_bagusDashboard->editSub($update, $id);
		$this->session->set_flashdata('subkategori', '<div class="alert alert-warning" role="alert">
		Berhasil mengganti subkategori !
		  </div>');
		redirect('C_bagusDashboard/kategori');
	}

	public function deleteSub($id)
	{
		$this->db->where('subkategori_id', $id);
		$this->db->delete('subkategori');
		$this->session->set_flashdata('subkategori', '<div class="alert alert-danger" role="alert">
		Berhasil menghapus subkategori !
		  </div>');
		redirect('C_bagusDashboard/kategori');
	}



	public function masyarakat()
	{
		$data['user'] = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();
		$data['masyarakat'] = $this->M_bagusDashboard->masyarakat()->result_array();


		$data['title'] = 'Masyarakat';
		$this->load->view('templates/topbar', $data);
		$this->load->view('V_bagusMasyarakat', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/footer', $data);
	}

	public function suspendedMasyarakat($id)
	{
		$Msuspended = [
			'active' => 'suspended',
		];


		$this->db->where('id', $id);
		$this->M_bagusDashboard->suspendedMasyarakat($Msuspended);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
		Akun berhasil di suspended !
		  </div>');
		redirect('C_bagusDashboard/masyarakat');
	}

	public function activeMasyarakat($id)
	{
		$Mactive = [
			'active' => 'active',
		];


		$this->db->where('id', $id);
		$this->M_bagusDashboard->activeMasyarakat($Mactive);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Akun berhasil di aktifkan !
		  </div>');
		redirect('C_bagusDashboard/masyarakat');
	}



	// PETUGAS

	public function petugas()
	{
		$data['user'] = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();
		$data['masyarakat'] = $this->M_bagusDashboard->masyarakat()->result_array();
		$data['petugas'] = $this->M_bagusDashboard->get_petugas()->result_array();
		$data['admin'] = $this->M_bagusDashboard->get_admin()->result_array();

		$data['title'] = 'Admin / Petugas';
		$this->load->view('templates/topbar', $data);
		$this->load->view('V_bagusPetugas', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambahPetugas()
	{
		$this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
		$this->form_validation->set_rules('level', 'Level', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'password dont match !',
			'min_length' => 'password too short !'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		$data = [
			'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
			'username' => htmlspecialchars($this->input->post('username', true)),
			'telepon' => htmlspecialchars($this->input->post('telepon', true)),
			'level' => htmlspecialchars($this->input->post('level', true)),
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
		];

		$this->db->insert('petugas', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil menambahkan petugas !
			  </div>');
		redirect('C_bagusDashboard/petugas');
	}

	public function editPetugas($id)
	{
		$nama_petugas = $this->input->post('nama_petugas');
		$username = $this->input->post('username');
		$telepon = $this->input->post('telepon');
		$level = $this->input->post('level');

		$update = [
			'nama_petugas' => $nama_petugas,
			'username' => $username,
			'telepon' => $telepon,
			'level' => $level,
		];

		$this->db->where('id_petugas', $id);
		$this->M_bagusDashboard->editPetugas($update);
		$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
		Berhasil mengganti data petugas !
		  </div>');
		redirect('C_bagusDashboard/petugas');
	}

	public function editAdmin($id)
	{
		$nama_petugas = $this->input->post('nama_petugas');
		$username = $this->input->post('username');
		$telepon = $this->input->post('telepon');
		$level = $this->input->post('level');

		$update = [
			'nama_petugas' => $nama_petugas,
			'username' => $username,
			'telepon' => $telepon,
			'level' => $level,
		];

		$this->db->where('id_petugas', $id);
		$this->M_bagusDashboard->editPetugas($update);
		$this->session->set_flashdata('admin', '<div class="alert alert-warning" role="alert">
		Berhasil mengganti data admin !
		  </div>');
		redirect('C_bagusDashboard/petugas');
	}

	public function suspendedPetugas($id)
	{
		$suspended = [
			'active' => 'suspended',
		];


		$this->db->where('id_petugas', $id);
		$this->M_bagusDashboard->suspended($suspended);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
		Petugas berhasil di suspended !
		  </div>');
		redirect('C_bagusDashboard/petugas');
	}

	public function activePetugas($id)
	{
		$active = [
			'active' => 'active',
		];


		$this->db->where('id_petugas', $id);
		$this->M_bagusDashboard->active($active);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Petugas berhasil di aktifkan !
		  </div>');
		redirect('C_bagusDashboard/petugas');
	}

	public function suspendedAdmin($id)
	{
		$suspended = [
			'active' => 'suspended',
		];


		$this->db->where('id_petugas', $id);
		$this->M_bagusDashboard->suspended($suspended);
		$this->session->set_flashdata('admin', '<div class="alert alert-danger" role="alert">
		Admin berhasil di suspended !
		  </div>');
		redirect('C_bagusDashboard/petugas');
	}

	public function activeAdmin($id)
	{
		$active = [
			'active' => 'active',
		];


		$this->db->where('id_petugas', $id);
		$this->M_bagusDashboard->active($active);
		$this->session->set_flashdata('admin', '<div class="alert alert-success" role="alert">
		Admin berhasil di aktifkan !
		  </div>');
		redirect('C_bagusDashboard/petugas');
	}

	// pengaduan
	public function pengaduan()
	{

		$data['user'] = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();
		$data['masyarakat'] = $this->M_bagusDashboard->masyarakat()->result_array();
		$data['petugas'] = $this->M_bagusDashboard->petugas()->result_array();
		$data['pengaduan'] = $this->M_bagusJoin->pengaduan()->result_array();

		$data['title'] = 'Pengaduan';
		$this->load->view('templates/topbar', $data);
		$this->load->view('V_bagusDPengaduan', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tindakan($id)
	{
		$data = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();

		$tanggapan = $this->input->post('tanggapan');
		$status = $this->input->post('status');


		$add = [

			'id_pengaduan' => $id,
			'tanggapan' => $tanggapan,
			'tanggal_tanggapan' =>  date('Y-m-d'),
			'id_petugas' => $data['id_petugas'],
			// 'status' => $status,
		];

		$update = [
			'status' => $status
		];

		$this->db->where('id_pengaduan', $id);
		$this->db->update('pengaduan', $update);

		$this->M_bagusDashboard->tambahTindakan($add);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil mengirim tanggapan !
			  </div>');
		redirect('C_bagusDashboard/pengaduan');
	}

	public function tanggapan($id)
	{
		$data['user'] = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();
		$data['masyarakat'] = $this->M_bagusDashboard->masyarakat()->result_array();
		$data['petugas'] = $this->M_bagusDashboard->petugas()->result_array();
		$data['tanggapan'] = $this->M_bagusJoin->tanggapan($id)->row_array();
		$data['tanggapanPetugas'] = $this->M_bagusJoin->tanggapanPetugas($id)->row_array();


		$data['title'] = 'Tanggapan';
		$this->load->view('templates/topbar', $data);
		$this->load->view('V_bagusTanggapan', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/footer', $data);
	}

	public function selesai($id)
	{
		$data['user'] = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();
		$data['masyarakat'] = $this->M_bagusDashboard->masyarakat()->result_array();
		$data['petugas'] = $this->M_bagusDashboard->petugas()->result_array();
		$data['tanggapan'] = $this->M_bagusJoin->tanggapan($id)->row_array();
		$data['tanggapanPetugas'] = $this->M_bagusJoin->tanggapanPetugas($id)->row_array();

		$data['title'] = 'Tanggapan';
		$this->load->view('templates/topbar', $data);
		$this->load->view('V_bagusTSelesai', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/footer', $data);
	}

	public function statusSelesai($id_pengaduan)
	{


		$selesai = [
			'status' => 'selesai',
		];



		$this->M_bagusDashboard->statusSelesai($id_pengaduan, $selesai);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Pengaduan telah diselesaikan !
		  </div>');
		redirect('C_bagusDashboard/pengaduan');
	}


	// Laporan PDF
	public function pengaduanpdf()
	{
		$data['user'] = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();
		$data['masyarakat'] = $this->M_bagusDashboard->masyarakat()->result_array();
		$data['petugas'] = $this->M_bagusDashboard->petugas()->result_array();
		$pengaduan = $this->M_bagusJoin->pengaduan()->result_array();
		// $data['pengaduan']=$this->db->get('pengaduan')->result_array();

		$data = array(
			"dataku" => array(
				"nama" => "Petani Kode",
				"url" => "http://petanikode.com"
			),
			'pengaduan' => $pengaduan,
		);

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "Laporan Pengaduan.pdf";
		$data['title'] = 'Laporan Pengaduan';
		$this->pdf->load_view('V_bagusPengaduanPDF', $data);
	}

	public function masyarakatpdf()
	{
		$data['user'] = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();
		$masyarakat = $this->M_bagusDashboard->masyarakat()->result_array();
		$data['petugas'] = $this->M_bagusDashboard->petugas()->result_array();
		// $data['pengaduan'] = $this->M_bagusJoin->pengaduan()->result_array();


		$data = array(
			"dataku" => array(
				"nama" => "Petani Kode",
				"url" => "http://petanikode.com"
			),

			'masyarakat' => $masyarakat,

		);

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "Laporan Masyarakat.pdf";
		$data['title'] = 'Laporan Masyarakat';
		$this->pdf->load_view('V_bagusMasyarakatPDF', $data);
	}

	public function setting()
	{
		$data['user'] = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();
		$data['kategori'] = $this->M_bagusJoin->kategori()->result_array();
		$data['masyarakat'] = $this->M_bagusDashboard->masyarakat()->result_array();
		$data['petugas'] = $this->M_bagusDashboard->petugas()->result_array();
		$data['pengaduan'] = $this->M_bagusJoin->pengaduan()->result_array();


		$data['title'] = 'Setting';
		$this->load->view('templates/topbar', $data);
		$this->load->view('V_bagusSetting', $data);
		$this->load->view('templates/sidenav', $data);
		$this->load->view('templates/footer', $data);
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
			$data['user'] = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();
			$data['kategori'] = $this->M_bagusJoin->kategori()->result_array();
			$data['masyarakat'] = $this->M_bagusDashboard->masyarakat()->result_array();
			$data['petugas'] = $this->M_bagusDashboard->petugas()->result_array();
			$data['pengaduan'] = $this->M_bagusJoin->pengaduan()->result_array();

			$data['title'] = 'Setting';
			$this->load->view('templates/topbar', $data);
			$this->load->view('V_bagusSetting', $data);
			$this->load->view('templates/sidenav', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$user = $this->M_bagusDashboard->userData($this->session->userdata('username'))->row_array();

			$data = [
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			];

			$this->db->where('id_petugas', $user['id_petugas']);
			$this->db->update('petugas', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Password anda berhasil di reset !
				  </div>');
			redirect('C_bagusAuth');
		}
	}
}
