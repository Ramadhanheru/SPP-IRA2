<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data extends CI_Model
{

	// transaksi
	public function tampil_transaksi()
	{
		$this->db->select('transaksi.*, biaya_daftar.harga_item as biaya_daftar, panggilan_penggugat.harga_item as panggilan_penggugat,panggilan_tergugat.harga_item as panggilan_tergugat, pemberitahuan_penggugat.harga_item as pemberitahuan_penggugat,pemberitahuan_tergugat.harga_item as pemberitahuan_tergugat,');
		$this->db->from('transaksi');
		$this->db->join('biaya_daftar','biaya_daftar.id_biaya_daftar = transaksi.id_biaya_daftar');
		$this->db->join('panggilan_penggugat','panggilan_penggugat.id_panggilan_penggugat = transaksi.id_panggilan_penggugat');
		$this->db->join('panggilan_tergugat','panggilan_tergugat.id_panggilan_tergugat = transaksi.id_panggilan_tergugat');
		$this->db->join('pemberitahuan_penggugat','pemberitahuan_penggugat.id_pemberitahuan_penggugat = transaksi.id_pemberitahuan_penggugat');
		$this->db->join('pemberitahuan_tergugat','pemberitahuan_tergugat.id_pemberitahuan_tergugat = transaksi.id_pemberitahuan_tergugat');
				$this->db->order_by('id_transaksi','DESC');

		return $this->db->get();

	}
	public function tampil_transaksi_tanggal($tanggal)
	{
		$this->db->select('transaksi.*, biaya_daftar.harga_item as biaya_daftar, panggilan_penggugat.harga_item as panggilan_penggugat,panggilan_tergugat.harga_item as panggilan_tergugat, pemberitahuan_penggugat.harga_item as pemberitahuan_penggugat,pemberitahuan_tergugat.harga_item as pemberitahuan_tergugat,');
		$this->db->from('transaksi');
		$this->db->join('biaya_daftar','biaya_daftar.id_biaya_daftar = transaksi.id_biaya_daftar');
		$this->db->join('panggilan_penggugat','panggilan_penggugat.id_panggilan_penggugat = transaksi.id_panggilan_penggugat');
		$this->db->join('panggilan_tergugat','panggilan_tergugat.id_panggilan_tergugat = transaksi.id_panggilan_tergugat');
		$this->db->join('pemberitahuan_penggugat','pemberitahuan_penggugat.id_pemberitahuan_penggugat = transaksi.id_pemberitahuan_penggugat');
		$this->db->join('pemberitahuan_tergugat','pemberitahuan_tergugat.id_pemberitahuan_tergugat = transaksi.id_pemberitahuan_tergugat');
		$this->db->where('tanggal',$tanggal);
		$this->db->order_by('id_transaksi','DESC');

		return $this->db->get();

	}
	public function tampil_transaksi_bulan($bulan,$tahun)
	{
		$this->db->select('transaksi.*, biaya_daftar.harga_item as biaya_daftar, panggilan_penggugat.harga_item as panggilan_penggugat,panggilan_tergugat.harga_item as panggilan_tergugat, pemberitahuan_penggugat.harga_item as pemberitahuan_penggugat,pemberitahuan_tergugat.harga_item as pemberitahuan_tergugat,');
		$this->db->from('transaksi');
		$this->db->join('biaya_daftar','biaya_daftar.id_biaya_daftar = transaksi.id_biaya_daftar');
		$this->db->join('panggilan_penggugat','panggilan_penggugat.id_panggilan_penggugat = transaksi.id_panggilan_penggugat');
		$this->db->join('panggilan_tergugat','panggilan_tergugat.id_panggilan_tergugat = transaksi.id_panggilan_tergugat');
		$this->db->join('pemberitahuan_penggugat','pemberitahuan_penggugat.id_pemberitahuan_penggugat = transaksi.id_pemberitahuan_penggugat');
		$this->db->join('pemberitahuan_tergugat','pemberitahuan_tergugat.id_pemberitahuan_tergugat = transaksi.id_pemberitahuan_tergugat');
		$this->db->where('MONTH(tanggal)',$bulan);
		$this->db->where('YEAR(tanggal)',$tahun);
		$this->db->order_by('id_transaksi','DESC');

		return $this->db->get();

	}
	public function tampil_transaksi_tanggal_0()
	{
		$this->db->select('transaksi.*, biaya_daftar.harga_item as biaya_daftar, panggilan_penggugat.harga_item as panggilan_penggugat,panggilan_tergugat.harga_item as panggilan_tergugat, pemberitahuan_penggugat.harga_item as pemberitahuan_penggugat,pemberitahuan_tergugat.harga_item as pemberitahuan_tergugat,');
		$this->db->from('transaksi');
		$this->db->join('biaya_daftar','biaya_daftar.id_biaya_daftar = transaksi.id_biaya_daftar');
		$this->db->join('panggilan_penggugat','panggilan_penggugat.id_panggilan_penggugat = transaksi.id_panggilan_penggugat');
		$this->db->join('panggilan_tergugat','panggilan_tergugat.id_panggilan_tergugat = transaksi.id_panggilan_tergugat');
		$this->db->join('pemberitahuan_penggugat','pemberitahuan_penggugat.id_pemberitahuan_penggugat = transaksi.id_pemberitahuan_penggugat');
		$this->db->join('pemberitahuan_tergugat','pemberitahuan_tergugat.id_pemberitahuan_tergugat = transaksi.id_pemberitahuan_tergugat');
		$this->db->where('tanggal','');
		$this->db->order_by('id_transaksi','DESC');

		return $this->db->get();

	}
	public function tampil_rincian_transaksi($id)
	{
		$this->db->select('transaksi.*, biaya_daftar.harga_item as biaya_daftar, panggilan_penggugat.harga_item as panggilan_penggugat,panggilan_tergugat.harga_item as panggilan_tergugat, pemberitahuan_penggugat.harga_item as pemberitahuan_penggugat,pemberitahuan_tergugat.harga_item as pemberitahuan_tergugat,');
		$this->db->from('transaksi');
		$this->db->join('biaya_daftar','biaya_daftar.id_biaya_daftar = transaksi.id_biaya_daftar');
		$this->db->join('panggilan_penggugat','panggilan_penggugat.id_panggilan_penggugat = transaksi.id_panggilan_penggugat');
		$this->db->join('panggilan_tergugat','panggilan_tergugat.id_panggilan_tergugat = transaksi.id_panggilan_tergugat');
		$this->db->join('pemberitahuan_penggugat','pemberitahuan_penggugat.id_pemberitahuan_penggugat = transaksi.id_pemberitahuan_penggugat');
		$this->db->join('pemberitahuan_tergugat','pemberitahuan_tergugat.id_pemberitahuan_tergugat = transaksi.id_pemberitahuan_tergugat');
		$this->db->where('id_transaksi', $id);
		return $this->db->get();

	}
	public function tambah_transaksi($data)
	{
		$this->db->insert('transaksi', $data);

	}

	public function hapus_transaksi($id)
	{
		$this->db->where('id_transaksi', $id);
		$query = $this->db->delete('transaksi');

	}
	// end transaksi

	// user

	public function login($user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $user);
		return $this->db->get()->row_array();
		
		
	}
	
	public function tampil_user()
	{

		$query = $this->db->get('user');

		return $query;
	}
	
	public function tambah_user($data)
	{
		$this->db->insert('user', $data);

	}
	public function edit_user($id)
	{
		$data = [
			
			"nama" => $this->input->post('nama'),
			"jabatan" => $this->input->post('jabatan'),
			"username" => $this->input->post('username')
		];
		
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}
		public function ambil_id_user($id){
		return $this->db->get_where('user',['id_user'=> $id])->row_array();
	}
	public function hapus_user($id)
	{
		$this->db->where('id_user', $id);
		$query = $this->db->delete('user');

	}

	// end user
	// kas
	public function tampil_kas()
	{

		$query = $this->db->get('kas');

		return $query;
	}
	
	public function tambah_kas($data)
	{
		$this->db->insert('kas', $data);

	}
	public function edit_kas($id)
	{
		$data = [
			
			"nominal" => $this->input->post('nominal')
		];
		
		$this->db->where('id_kas', $id);
		$this->db->update('kas', $data);
	}
		public function ambil_id_kas($id){
		return $this->db->get_where('kas',['id_kas'=> $id])->row_array();
	}
	public function hapus_kas($id)
	{
		$this->db->where('id_kas', $id);
		$query = $this->db->delete('kas');

	}

	//end kas
	//biaya daftar

	public function tampil_biaya_daftar()
	{

		$query = $this->db->get('biaya_daftar');

		return $query;
	}
	
	public function tambah_biaya_daftar($data)
	{
		$this->db->insert('biaya_daftar', $data);

	}
	public function edit_biaya_daftar($id)
	{
		$data = [
			 	'nama_item' => $this->input->post('nama_item', true),
			 	'harga_item' => $this->input->post('harga_item', true)
            ];
		
		$this->db->where('id_biaya_daftar', $id);
		$this->db->update('biaya_daftar', $data);
	}
		public function ambil_id_biaya_daftar($id){
		return $this->db->get_where('biaya_daftar',['id_biaya_daftar'=> $id])->row_array();
	}
	public function hapus_biaya_daftar($id)
	{
		$this->db->where('id_biaya_daftar', $id);
		$query = $this->db->delete('biaya_daftar');

	}
	// end biaya daftar
	//panggilan penggugat

	public function tampil_panggilan_penggugat()
	{

		$query = $this->db->get('panggilan_penggugat');

		return $query;
	}
	
	public function tambah_panggilan_penggugat($data)
	{
		$this->db->insert('panggilan_penggugat', $data);

	}
	public function edit_panggilan_penggugat($id)
	{
		$data = [
			
			"nama_item" => $this->input->post('nama_item'),
			"harga_item" => $this->input->post('harga_item')
		];
		
		$this->db->where('id_panggilan_penggugat', $id);
		$this->db->update('panggilan_penggugat', $data);
	}
		public function ambil_id_panggilan_penggugat($id){
		return $this->db->get_where('panggilan_penggugat',['id_panggilan_penggugat'=> $id])->row_array();
	}
	public function hapus_panggilan_penggugat($id)
	{
		$this->db->where('id_panggilan_penggugat', $id);
		$query = $this->db->delete('panggilan_penggugat');

	}
	// end panggilan penggugat
	//panggilan tergugat

	public function tampil_panggilan_tergugat()
	{

		$query = $this->db->get('panggilan_tergugat');

		return $query;
	}
	
	public function tambah_panggilan_tergugat($data)
	{
		$this->db->insert('panggilan_tergugat', $data);

	}
	public function edit_panggilan_tergugat($id)
	{
		$data = [
			
			"nama_item" => $this->input->post('nama_item'),
			"harga_item" => $this->input->post('harga_item')
		];
		
		$this->db->where('id_panggilan_tergugat', $id);
		$this->db->update('panggilan_tergugat', $data);
	}
		public function ambil_id_panggilan_tergugat($id){
		return $this->db->get_where('panggilan_tergugat',['id_panggilan_tergugat'=> $id])->row_array();
	}
	public function hapus_panggilan_tergugat($id)
	{
		$this->db->where('id_panggilan_tergugat', $id);
		$query = $this->db->delete('panggilan_tergugat');

	}
	// end panggilan tergugat
	//pemberitahuan penggugat

	public function tampil_pemberitahuan_penggugat()
	{

		$query = $this->db->get('pemberitahuan_penggugat');

		return $query;
	}
	
	public function tambah_pemberitahuan_penggugat($data)
	{
		$this->db->insert('pemberitahuan_penggugat', $data);

	}
	public function edit_pemberitahuan_penggugat($id)
	{
		$data = [
			
			"nama_item" => $this->input->post('nama_item'),
			"harga_item" => $this->input->post('harga_item')
		];
		
		$this->db->where('id_pemberitahuan_penggugat', $id);
		$this->db->update('pemberitahuan_penggugat', $data);
	}
		public function ambil_id_pemberitahuan_penggugat($id){
		return $this->db->get_where('pemberitahuan_penggugat',['id_pemberitahuan_penggugat'=> $id])->row_array();
	}
	public function hapus_pemberitahuan_penggugat($id)
	{
		$this->db->where('id_pemberitahuan_penggugat', $id);
		$query = $this->db->delete('pemberitahuan_penggugat');

	}
	// end pemberitahuan penggugat
	//pemberitahuan tergugat

	public function tampil_pemberitahuan_tergugat()
	{

		$query = $this->db->get('pemberitahuan_tergugat');

		return $query;
	}
	
	public function tambah_pemberitahuan_tergugat($data)
	{
		$this->db->insert('pemberitahuan_tergugat', $data);

	}
	public function edit_pemberitahuan_tergugat($id)
	{
		$data = [
			
			"nama_item" => $this->input->post('nama_item'),
			"harga_item" => $this->input->post('harga_item')
		];
		
		$this->db->where('id_pemberitahuan_tergugat', $id);
		$this->db->update('pemberitahuan_tergugat', $data);
	}
		public function ambil_id_pemberitahuan_tergugat($id){
		return $this->db->get_where('pemberitahuan_tergugat',['id_pemberitahuan_tergugat'=> $id])->row_array();
	}
	public function hapus_pemberitahuan_tergugat($id)
	{
		$this->db->where('id_pemberitahuan_tergugat', $id);
		$query = $this->db->delete('pemberitahuan_tergugat');

	}
	// end pemberitahuan tergugat
}