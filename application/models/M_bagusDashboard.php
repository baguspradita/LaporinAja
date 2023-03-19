<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_bagusDashboard extends CI_Model
{
	public function userData($username)
	{
		return $this->db->get_where('petugas', ['username' => $username]);
	}

	public function statusRead($notif_id, $update)
	{
		$this->db->where('notif_id', $notif_id);
		$this->db->update('notif', $update);
	}

	// kategori
	public function kategori()
	{
		return $this->db->get('kategori');
	}

	public function editKategori($update)
	{
		$this->db->update('kategori', $update);
	}


	public function tambahKategori($add)
	{
		$this->db->insert('kategori', $add);
	}

	public function subkategori()
	{
		return $this->db->get('subkategori');
	}

	public function tambahSub($add)
	{
		$this->db->insert('subkategori', $add);
	}

	public function editSub($update)
	{

		$this->db->update('subkategori', $update);
	}

	// masyarakat
	public function masyarakat()
	{
		return $this->db->get('masyarakat');
	}

	// petugas
	public function petugas()
	{
		return $this->db->get('petugas');
	}
	public function get_petugas()
	{
		return $this->db->get_where('petugas', ['level' => 'petugas']);
	}

	public function get_admin()
	{
		return $this->db->get_where('petugas', ['level' => 'admin']);
	}

	public function editPetugas($update)
	{
		$this->db->update('petugas', $update);
	}

	public function suspended($suspended)
	{
		$this->db->update('petugas', $suspended);
	}

	public function suspendedMasyarakat($Msuspended)
	{
		$this->db->update('masyarakat', $Msuspended);
	}

	public function active($active)
	{
		$this->db->update('petugas', $active);
	}

	public function activeMasyarakat($Mactive)
	{
		$this->db->update('masyarakat', $Mactive);
	}


	// pengaduan
	public function tambahTindakan($add)
	{
		$this->db->insert('tanggapan', $add);
	}

	public function statusSelesai($id, $selesai)
	{
		$this->db->where('id_pengaduan', $id);
		$this->db->update('pengaduan', $selesai);
	}
}