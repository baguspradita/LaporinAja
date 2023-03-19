<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_bagusAuth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	// login admin
	public function index()
	{
		$check_setup = $this->db->get('petugas')->row_array();
		if ($check_setup == null) {
			redirect('C_bagusAuth/register');
		}
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {

			// gagal validasi login
			$data['title'] = 'Login LaporinAja';
			$this->load->view('V_bagusLogin', $data);
		} else {

			// lolos validasi
			$this->_login();
		}
	}

	private function _login()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('petugas', ['username' => $username])->row_array();

		// jika user ada
		if ($user) {




			// cek password
			if (password_verify($password, $user['password'])) {

				$data = [
					'username' => $user['username'],
					'password' => $user['password'],
				];

				// kondisi
				$this->session->set_userdata($data);

				if ($user['level'] == 'admin') {

					redirect('C_bagusDashboard'); //admin

				} else if ($user['level'] == 'petugas') {

					if ($user['active'] == 'suspended') {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda telah di suspended !</div>');
						redirect('C_bagusAuth');
					} else {

						redirect('C_bagusDashboard'); //petugas
					}
					
				} else {

					redirect('C_bagusAuth');
				}


				// if ($this->form_validation->run() == true) {

				// 	redirect('C_bagusDashboard');
				// } else {

				// 	redirect('C_bagusAuth');
				// }


			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong password !
                  </div>');
				redirect('C_bagusAuth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Username is not registered !
		  	</div>');
			redirect('C_bagusAuth');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'password dont match !',
			'min_length' => 'password too short !'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			// gagal register
			$data['title'] = 'Register LaporinAja';
			$this->load->view('V_bagusRegister', $data);
		} else {
			$data = [
				'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'telepon' => htmlspecialchars($this->input->post('telepon', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			];

			$this->db->insert('petugas', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Berhasil membuat akun !
				  </div>');
			redirect('C_bagusAuth');
		}
	}

	public function loginUser()
	{

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {

			// gagal validasi login
			$data['title'] = 'Login LaporinAja';
			$this->load->view('V_bagusLoginUser', $data);
		} else {

			// lolos validasi
			$this->_loginUser();
		}
	}


	private function _loginUser()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('masyarakat', ['username' => $username])->row_array();

		// jika user ada
		if ($user) {

			// cek password
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'password' => $user['password'],
				];

				// kondisi
				$this->session->set_userdata($data);
				if ($this->form_validation->run() == true) {

					if ($user['active'] == 'suspended') {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda telah di suspended !</div>');
						redirect('C_bagusAuth/loginUser');
					} else {
						redirect('C_bagusUser'); //masyarakat
					}
					
				} else {

					redirect('C_bagusAuth/loginUser');
				}
				
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong password !
                  </div>');
				redirect('C_bagusAuth/loginUser');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Username is not registered !
		  	</div>');
			redirect('C_bagusAuth/loginUser');
		}
	}


	public function registerUser()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'password dont match !',
			'min_length' => 'password too short !'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			// gagal register
			$data['title'] = 'Register LaporinAja';
			$this->load->view('V_bagusRegisterUser', $data);
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'nik' => htmlspecialchars($this->input->post('nik', true)),
				'telepon' => htmlspecialchars($this->input->post('telepon', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			];

			$this->db->insert('masyarakat', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Berhasil membuat akun !
				  </div>');
			redirect('C_bagusAuth/loginUser');
		}
	}

	public function registerPetugas()
	{
		$this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'password dont match !',
			'min_length' => 'password too short !'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			// gagal register
			$data['title'] = 'Register LaporinAja';
			$this->load->view('V_bagusRegisterPetugas', $data);
		} else {
			$data = [
				'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'telepon' => htmlspecialchars($this->input->post('telepon', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			];

			$this->db->insert('petugas', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Berhasil membuat akun !
				  </div>');
			redirect('C_bagusAuth');
		}
	}




	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			You have been logout !
		  	</div>');
		redirect('C_bagusAuth');
	}

	public function logoutUser()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			You have been logout !
		  	</div>');
		redirect('C_bagusAuth/loginUser');
	}
}
