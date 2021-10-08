<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();

			if($this->session->userdata('role')!= '1')
				redirect ('auth');
	}

	public function index()
	{
		$data['query'] = $this->Model_data->tampil_transaksi();
		$data['query6'] = $this->db->get_where('kas',['id_kas'=>'1'])->row_array();
		$data['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row_array();
		$data['query7'] = $this->Model_data->update_saldo();
		
		$this->load->view('template/header',$data);
		$this->load->view('dashboard2',$data);
		$this->load->view('template/footer');
	}
	public function print_berita_acara(){

		if ($this->input->post('bulan2') && $this->input->post('tahun2')  > date('Y-m')) {
				$this->session->set_flashdata('messagee','<div class ="alert alert-danger" roles="alert"> Harap pilih bulan dan tahun yang tidak melebihi hari ini! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/laporan');
			}else{

				$bulan = $this->input->post('bulan2');
			$tahun = $this->input->post('tahun2');

			$saldo_konsinyasi = $this->input->post('saldo_konsinyasi');
			$penerimaan_konsinyasi = $this->input->post('penerimaan_konsinyasi');
			$pengeluaran_konsinyasi = $this->input->post('pengeluaran_konsinyasi');

			$data['jumlah2'] = ($saldo_konsinyasi + $penerimaan_konsinyasi) - $pengeluaran_konsinyasi;

			$saldo_eksekusi = $this->input->post('saldo_eksekusi');
			$penerimaan_eksekusi = $this->input->post('penerimaan_eksekusi');
			$pengeluaran_eksekusi = $this->input->post('pengeluaran_eksekusi');
			$data['jumlah3'] = ($saldo_eksekusi + $penerimaan_eksekusi) - $pengeluaran_eksekusi;

			$saldo_pidana = $this->input->post('saldo_pidana');
			$penerimaan_pidana = $this->input->post('penerimaan_pidana');
			$pengeluaran_pidana = $this->input->post('pengeluaran_pidana');
			$data['jumlah4'] = ($saldo_pidana + $penerimaan_pidana) - $pengeluaran_pidana;

			$saldo_proses = $this->input->post('saldo_proses');
			$penerimaan_proses = $this->input->post('penerimaan_proses');
			$pengeluaran_proses = $this->input->post('pengeluaran_proses');
			$data['jumlah5'] = ($saldo_proses + $penerimaan_proses) - $pengeluaran_proses;

			$data = array(
				'saldo_konsinyasi' => $this->input->post('saldo_konsinyasi'),
				'penerimaan_konsinyasi' => $this->input->post('penerimaan_konsinyasi'),
				'pengeluaran_konsinyasi' => $this->input->post('pengeluaran_konsinyasi'),
				'saldo_eksekusi' => $this->input->post('saldo_eksekusi'),
				'penerimaan_eksekusi' => $this->input->post('penerimaan_eksekusi'),
				'pengeluaran_eksekusi' => $this->input->post('pengeluaran_eksekusi'),
				'saldo_pidana' => $this->input->post('saldo_pidana'),
				'penerimaan_pidana' => $this->input->post('penerimaan_pidana'),
				'pengeluaran_pidana' => $this->input->post('pengeluaran_pidana'),
				'saldo_proses' => $this->input->post('saldo_proses'),
				'penerimaan_proses' => $this->input->post('penerimaan_proses'),
				'pengeluaran_proses' => $this->input->post('pengeluaran_proses'),
				'saldo_bank' => $this->input->post('saldo_bank'),
				'materai' => $this->input->post('materai'),
				'uang_pihak3' => $this->input->post('uang_pihak3'),
				'jasa_giro' => $this->input->post('jasa_giro'),
				'jabatan_panitera' => $this->input->post('jabatan_panitera'),
				'panitera' => $this->input->post('panitera'),
				'jabatan_ketua' => $this->input->post('jabatan_ketua'),
				'ketua' => $this->input->post('ketua')


			);
			$data['query6'] = $this->db->get_where('kas',['id_kas'=>'1'])->row_array();
			$data['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row_array();
			$data['query'] = $this->Model_data->tampil_transaksi_bulan($bulan,$tahun);
			$data['query9'] = $this->Model_data->tampil_saldo_awal_bulan($bulan,$tahun);
		
		$this->load->library('pdf');
		$this->load->view('laporan-berita-acara',$data);
		 $paper_size='A4';
	    $orientation='potrait';
	    $data_header= array('title' => 'Convert to Pdf');
	    $html = $this->output->get_output();
	    $this->pdf->set_paper($paper_size, $orientation, $data_header);

	    $this->pdf->load_html($html);
	    $this->pdf->render();
	    $this->pdf->stream('SPP-IRA berita acara.pdf', array('Attachment' =>0));

			}
		
	}
	public function tambah_transaksi3(){
		$kas = $this->input->post('kas');

		$kategori_biaya = $this->input->post('select1');
		$jenis_biaya = $this->input->post('select2');
		$this->form_validation->set_rules('no_perkara','no_perkara','required|trim');
		$this->form_validation->set_rules('tanggal','tanggal','required|trim');

		if( $this->form_validation->run()==false){
			$this->index();
		}else{

			if ($kategori_biaya == 'panjar' && $jenis_biaya == 'tambah_panjar' ) {
				$update = $kas + $this->input->post('jumlah', true);
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	'tambah_panjar' => $this->input->post('jumlah', true),
			 	'keterangan' => $this->input->post('keterangan'),
			 	'saldo' => $kas,
			 	'update_saldo' => $update
			 	
            ];
			}
			else if ($kategori_biaya == 'panjar' && $jenis_biaya == 'panjar1' ) {
				$update = $kas + 30000;
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	$jenis_biaya => 30000,
			 	'keterangan' => $this->input->post('keterangan'),
			 	'saldo' => $kas,
			 	'update_saldo' => $update
			 	
            ];
			}
			else if ($kategori_biaya == 'panjar' && $jenis_biaya == 'panjar2' ) {
				$update = $kas + 50000;
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	$jenis_biaya => 50000,
			 	'keterangan' => $this->input->post('keterangan'),
			 	'saldo' => $kas,
			 	'update_saldo' => $update
			 	
            ];
			}
			else if ($kategori_biaya == 'panjar' && $jenis_biaya == 'panjar3' ) {
				$update = $kas + 50000;
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	$jenis_biaya => 50000,
			 	'keterangan' => $this->input->post('keterangan'),
			 	'saldo' => $kas,
			 	'update_saldo' => $update
			 	
            ];
			}
			else if ($kategori_biaya == 'panjar' && $jenis_biaya == 'panjar4' ) {
				$update = $kas + 50000;
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	$jenis_biaya => 50000,
			 	'keterangan' => $this->input->post('keterangan'),
			 	'saldo' => $kas,
			 	'update_saldo' => $update
			 	
            ];
			}
			else if ($kategori_biaya == 'sisa_panjar' || $kategori_biaya == 'panggilan' || $kategori_biaya == 'pemberitahuan' || $kategori_biaya == 'pemeriksaan' || $kategori_biaya == 'delegasi' ) {
				var_dump($kategori_biaya,$jenis_biaya);
				die();
				$update = $kas - $this->input->post('jumlah', true);
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	$jenis_biaya => $this->input->post('jumlah', true),
			 	'keterangan' => $this->input->post('keterangan'),
			 	'saldo' => $kas,
			 	'update_saldo' => $update
            ];
			}else{

				$update = $kas - $jenis_biaya;
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	$kategori_biaya => $jenis_biaya,
			 	'keterangan' => $this->input->post('keterangan'),
			 	'saldo' => $kas,
			 	'update_saldo' => $update
            ];
			}

			$proses = $this->Model_data->tambah_transaksi($data);
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome');

		}

	}
	public function tambah_transaksi2()
	{
		$kategori_biaya = $this->input->post('kategori_biaya');
		$jenis_biaya = $this->input->post('jenis_biaya');
		$this->form_validation->set_rules('no_perkara','no_perkara','required|trim');
		$this->form_validation->set_rules('tanggal','tanggal','required|trim');
		$this->form_validation->set_rules('kategori_biaya','kategori_biaya','required|trim');

		if( $this->form_validation->run()==false){
			$this->index();

		}else{

			if ($kategori_biaya == 'id_biaya_daftar' && $jenis_biaya == 'tambah_panjar' ) {
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	'tambah_panjar' => $this->input->post('jumlah', true),
			 	'keterangan' => $this->input->post('keterangan')
			 	
            ];
			}
			else if ($kategori_biaya == 'sisa_panjar' && $jenis_biaya == 'sisa_panjar' ) {
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	'sisa_panjar' => $this->input->post('jumlah', true),
			 	'keterangan' => $this->input->post('keterangan')
			 	
            ];
			}
			else if ($kategori_biaya == 'sisa_panjar' && $jenis_biaya == 'negara_panjar' ) {
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	'negara_panjar' => $this->input->post('jumlah', true),
			 	'keterangan' => $this->input->post('keterangan')
			 	
            ];
			}
			else if ($kategori_biaya == 'panggilan' && $jenis_biaya == 'panggilan_penggugat' ) {
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	'panggilan_penggugat' => $this->input->post('jumlah', true),
			 	'keterangan' => $this->input->post('keterangan')
			 	
            ];
			}
			else if ($kategori_biaya == 'panggilan' && $jenis_biaya == 'panggilan_tergugat' ) {
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	'panggilan_tergugat' => $this->input->post('jumlah', true),
			 	'keterangan' => $this->input->post('keterangan')
			 	
            ];
			}
			else if ($kategori_biaya == 'panggilan' && $jenis_biaya == 'panggilan_pemohon' ) {
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	'panggilan_pemohon' => $this->input->post('jumlah', true),
			 	'keterangan' => $this->input->post('keterangan')
			 	
            ];
			}
			else if ($kategori_biaya == 'pemberitahuan' && $jenis_biaya == 'pemberitahuan_penggugat' ) {
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	'pemberitahuan_penggugat' => $this->input->post('jumlah', true),
			 	'keterangan' => $this->input->post('keterangan')
			 	
            ];
			}
			else if ($kategori_biaya == 'pemberitahuan' && $jenis_biaya == 'pemberitahuan_tergugat' ) {
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	'pemberitahuan_tergugat' => $this->input->post('jumlah', true),
			 	'keterangan' => $this->input->post('keterangan')
			 	
            ];
			}
			else if ($kategori_biaya == 'pemeriksaan' && $jenis_biaya == 'pemeriksaan' ) {
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	'pemeriksaan' => $this->input->post('jumlah', true),
			 	'keterangan' => $this->input->post('keterangan')
			 	
            ];
			}
			else if ($kategori_biaya == 'materai' && $jenis_biaya == 'materai' ) {
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	'materai' => 10000,
			 	'keterangan' => $this->input->post('keterangan')
			 	
            ];
			}
			else if ($kategori_biaya == 'pnbp' && $jenis_biaya == 'pnbp' ) {
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	'pnbp' => 10000,
			 	'keterangan' => $this->input->post('keterangan')
			 	
            ];
			}
			else if ($kategori_biaya == 'biaya_proses' && $jenis_biaya == 'biaya_proses' ) {
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	'biaya_proses' => 50000,
			 	'keterangan' => $this->input->post('keterangan')
			 	
            ];
			}
			else if ($kategori_biaya == 'redaksi' && $jenis_biaya == 'redaksi' ) {
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	'redaksi' => 10000,
			 	'keterangan' => $this->input->post('keterangan')
			 	
            ];
			}
			else if ($kategori_biaya == 'delegasi' && $jenis_biaya == 'delegasi' ) {
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	'delegasi' => $this->input->post('jumlah', true),
			 	'keterangan' => $this->input->post('keterangan')
			 	
            ];
			}else{
				
				$data = [
				'tanggal' => $this->input->post('tanggal',true),
				'no_perkara' => $this->input->post('no_perkara',true),
			 	$kategori_biaya => $jenis_biaya,
			 	'keterangan' => $this->input->post('keterangan')
			 	
            ];
			
			}


			

				$proses = $this->Model_data->tambah_transaksi($data);
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome');

		}

	}
	public function tambah_transaksi()
	{


		$id_biaya_daftar = $this->input->post('id_biaya_daftar');
		$biaya_proses = $this->input->post('biaya_proses');
		$id_panggilan_penggugat = $this->input->post('id_panggilan_penggugat');
		$id_panggilan_tergugat = $this->input->post('id_panggilan_tergugat');
		$id_pemberitahuan_penggugat = $this->input->post('id_pemberitahuan_penggugat');
		$id_pemberitahuan_tergugat = $this->input->post('id_pemberitahuan_tergugat');
		$pnbp = $this->input->post('pnbp');
		$materai = $this->input->post('materai');
		$redaksi = $this->input->post('redaksi');
		$panjar = $this->input->post('panjar');
		$tambah_panjar = $this->input->post('tambah_panjar');
		$sisa_panjar = $this->input->post('sisa_panjar');
		$delegasi_panggilan = $this->input->post('delegasi_panggilan');
		$delegasi_pemberitahuan = $this->input->post('delegasi_pemberitahuan');
		$delegasi_pengiriman = $this->input->post('delegasi_pengiriman');
		$keterangan = $this->input->post('keterangan');

		$this->form_validation->set_rules('no_perkara','no_perkara','required|trim');
		$this->form_validation->set_rules('tanggal','tanggal','required|trim');
		
		if( $this->form_validation->run()==false){
			$this->index();

		}else{
			if (!$id_biaya_daftar && !$biaya_proses && !$id_panggilan_penggugat && !$id_panggilan_tergugat && !$id_pemberitahuan_penggugat && !$id_pemberitahuan_tergugat && !$pnbp && !$materai && !$redaksi && !$panjar && !$tambah_panjar && !$sisa_panjar && !$delegasi_panggilan && !$delegasi_pemberitahuan && !$delegasi_pengiriman) {
				
				$this->session->set_flashdata('message','<div class ="alert alert-danger" roles="alert"> Harap pilih minimal satu transaksi ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome');
			} else {
				$data = [
			 	'no_perkara' => $this->input->post('no_perkara', true),
			 	'tanggal' => $this->input->post('tanggal', true),
			 		'id_biaya_daftar' => $this->input->post('id_biaya_daftar', true),
			 		'biaya_proses' => $this->input->post('biaya_proses', true),
			 		'id_panggilan_penggugat' => $this->input->post('id_panggilan_penggugat', true),
			 		'id_panggilan_tergugat' => $this->input->post('id_panggilan_tergugat', true),
			 		'id_pemberitahuan_penggugat' => $this->input->post('id_pemberitahuan_penggugat', true),
			 		'id_pemberitahuan_tergugat' => $this->input->post('id_pemberitahuan_tergugat', true),
			 		'pnbp' => $this->input->post('pnbp', true),
			 		'materai' => $this->input->post('materai', true),
			 		'redaksi' => $this->input->post('redaksi', true),
			 		'panjar' => $this->input->post('panjar', true),
			 		'tambah_panjar' => $this->input->post('tambah_panjar', true),
			 		'sisa_panjar' => $this->input->post('sisa_panjar', true),
			 		'id_biaya_daftar' => $this->input->post('id_biaya_daftar', true),
			 		'delegasi_panggilan' => $this->input->post('delegasi_panggilan', true),
			 		'delegasi_pemberitahuan' => $this->input->post('delegasi_pemberitahuan', true),
			 		'delegasi_pengiriman' => $this->input->post('delegasi_pengiriman', true),
			 		'keterangan' => $this->input->post('keterangan', true)
			 	
            ];

				$proses = $this->Model_data->tambah_transaksi($data);
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome');
			}

		}
	}

	public function hapus_transaksi()
	{
		$id = $this->uri->segment(3);
		$data = $this->Model_data->hapus_transaksi($id);
		if (!$data) {
			$this->session->set_flashdata('message','<div class ="alert alert-success " roles="alert"> Data berhasil dihapus ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect(base_url('welcome'));
		} else {
			$this->session->set_flashdata('message','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			$this->index();
			
		}
	}

	public function rincian_transaksi($id)
	{
		$id = $this->uri->segment(3);
		$data['query'] = $this->Model_data->tampil_rincian_transaksi($id);
		$data['query6'] = $this->db->get_where('kas',['id_kas'=>'1'])->row_array();
		$data['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row_array();
		$this->load->view('template/header',$data);
		$this->load->view('rincian_transaksi2',$data);
		$this->load->view('template/footer');
	}


	public function uploadfoto()
    {
        //$config['file_name'] = '';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|HEIC';
        $config['max_size']      = '200000';
        $config['upload_path']   = FCPATH .'./assets/img/';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('photo')) {
            return  $this->upload->data('file_name');
        } else{
            echo $this->upload->display_errors();
        }
    }
	//user
	public function user()
	{
		$data['query'] = $this->Model_data->tampil_user();
		$data['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row_array();
		$this->load->view('template/header',$data);
		$this->load->view('user',$data);
		$this->load->view('template/footer');
	}
	public function v_tambah_user()
	{
		$data['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row_array();
		$this->load->view('template/header',$data);
		$this->load->view('tambah_user');
		$this->load->view('template/footer');
	}
	public function tambah_user()
	{
		$this->form_validation->set_rules('nama','nama','required|trim');
		$this->form_validation->set_rules('jabatan','jabatan','required|trim');
		$this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', ['is_unique' => 'This username has already registered!']);
       $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Kata sandi tidak cocok!',
            'min_length' => 'Kata sandi terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password]');
        $cekgambar1 = $_FILES['photo']['name'];
		if ($cekgambar1==null) {
			$this->form_validation->set_rules('photo','photo','trim|required');
		}
		if( $this->form_validation->run()==false){
			$this->v_tambah_user();

		}else{

			 $data = [
			 	'nama' => htmlspecialchars($this->input->post('nama', true)),
			 	'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'photo' => $this->uploadfoto(),
                'role' => 2
            ];

				$proses = $this->Model_data->tambah_user($data);
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/user');
		}

	}

	public function edit_user($id)
		{
			$data['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row_array();
		$data ['query']= $this->Model_data->ambil_id_user($id);
		$this->form_validation->set_rules('nama','nama','required|trim');
		$this->form_validation->set_rules('jabatan','jabatan','required|trim');

		 $cekgambar1 = $this->input->post('password');
		if ($cekgambar1!=null) {
			$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Kata sandi tidak cocok!',
            'min_length' => 'Kata sandi terlalu pendek!'
        ]);
		}

		$cekgambar2 = $this->input->post('password2');
		if ($cekgambar2!=null) {
			$this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password]');
		}


        if($this->form_validation->run()==false){
		$this->load->view('template/header',$data);
		$this->load->view('edit_user',$data);
		$this->load->view('template/footer');

		}else{

			$cekgambar3 = $_FILES['photo']['name'];
			if($cekgambar3){

		$config['allowed_types'] = 'gif|jpg|png|jpeg|HEIC';
        $config['max_size']      = '2000000';
        $config['upload_path']   = FCPATH .'./assets/img/';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('photo')) {

        	$old_image = $data['query']['photo'];
        	if($old_image != 'logo-free.png'){
        		unlink(FCPATH . 'assets/img/' . $old_image);
        	}

            $new_image =  $this->upload->data('file_name');
            $this->db->set('photo',$new_image);
            $this->db->where('id_user', $id);
			$this->db->update('user');

        } else{
            return "logo-free.png";
        }
			}

		        if ($cekgambar1) {
		        	 $this->db->set('password',password_hash($this->input->post('password'), PASSWORD_DEFAULT));
		            $this->db->where('id_user', $id);
					$this->db->update('user');
		        }
			$this->Model_data->edit_user($id);
			$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil diubah ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
			redirect('welcome/user');
		
		}
	}

	// public function hapus_user()
	// {
	// 	$id = $this->uri->segment(3);
	// 	$data = $this->Model_data->hapus_user($id);
	// 	if (!$data) {
	// 		$this->session->set_flashdata('message','<div class ="alert alert-success " roles="alert"> Data berhasil dihapus ! 
	// 			<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
	// 		redirect(base_url('welcome'));
	// 	} else {
	// 		$this->session->set_flashdata('message','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus ! 
	// 			<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
	// 		$this->index();
			
	// 	}
	// }

		
	//end_user
	public function laporan()
	{
		$data = array(
				'tanggal' => $this->input->post('tanggal'),
				'bulan' => $this->input->post('bulan'),
				'tahun' => $this->input->post('tahun')

			);
		
		$data['query6'] = $this->db->get_where('kas',['id_kas'=>'1'])->row_array();
		$data['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row_array();

		
		if($this->input->post('excel')&&$this->input->post('tanggal')){
			if ($this->input->post('tanggal') > date('Y-m-d')) {
				$this->session->set_flashdata('messagee','<div class ="alert alert-danger" roles="alert"> Harap pilih tanggal yang tidak melebihi hari ini! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/laporan');
			} else {
				$tanggal = $this->input->post('tanggal');
				$data['query9'] = $this->Model_data->tampil_saldo_awal_tanggal($tanggal);
			$data['query'] = $this->Model_data->tampil_transaksi_tanggal($tanggal);
			$this->load->view('excel_tanggal',$data);
			}
			
				
			
			
		}else{
			$tanggal = "";
		}
		if($this->input->post('pdf')&&$this->input->post('tanggal')){

			if ($this->input->post('tanggal') > date('Y-m-d')) {
				$this->session->set_flashdata('messagee','<div class ="alert alert-danger" roles="alert"> Harap pilih tanggal yang tidak melebihi hari ini! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/laporan');
			}else{
				$tanggal = $this->input->post('tanggal');
				$data['query9'] = $this->Model_data->tampil_saldo_awal_tanggal($tanggal);
			$data['query'] = $this->Model_data->tampil_transaksi_tanggal($tanggal);
		$this->load->library('pdf');
		$this->load->view('pdf_tanggal',$data);
		 $paper_size='A4';
	    $orientation='potrait';
	    $data_header= array('title' => 'Convert to Pdf');
	    $html = $this->output->get_output();
	    $this->pdf->set_paper($paper_size, $orientation, $data_header);

	    $this->pdf->load_html($html);
	    $this->pdf->render();
	    $this->pdf->stream('SPP-IRA harian.pdf', array('Attachment' =>0));
			}

			
		}else{
			$tanggal = "";
		}

		if($this->input->post('excel')&&$this->input->post('bulan')&&$this->input->post('tahun')){
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$data['query9'] = $this->Model_data->tampil_saldo_awal_bulan($bulan,$tahun);
			$data['query'] = $this->Model_data->tampil_transaksi_bulan($bulan,$tahun);
			$this->load->view('excel_bulan',$data);
		}else{
			$tanggal = "";
		}

		if($this->input->post('pdf')&&$this->input->post('bulan')&&$this->input->post('tahun')){
			if ($this->input->post('bulan') && $this->input->post('tahun')  > date('Y-m')) {
				$this->session->set_flashdata('messagee','<div class ="alert alert-danger" roles="alert"> Harap pilih bulan dan tahun yang tidak melebihi hari ini! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/laporan');
			} else {
				$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$data['query9'] = $this->Model_data->tampil_saldo_awal_bulan($bulan,$tahun);
			$data['query'] = $this->Model_data->tampil_transaksi_bulan($bulan,$tahun);
			$this->load->library('pdf');
		$this->load->view('pdf_bulanan',$data);
		 $paper_size='A4';
	    $orientation='potrait';
	    $data_header= array('title' => 'Convert to Pdf');
	    $html = $this->output->get_output();
	    $this->pdf->set_paper($paper_size, $orientation, $data_header);

	    $this->pdf->load_html($html);
	    $this->pdf->render();
	    $this->pdf->stream('SPP-IRA bulanan.pdf', array('Attachment' =>0));
			}
			
			
		}else{
			$tanggal = "";
		}

		if($this->input->post('submit')&&$this->input->post('tanggal')){
			$tanggal = $this->input->post('tanggal');
		} else{
			$tanggal = "";
		}

			
			$data['query'] = $this->Model_data->tampil_transaksi_tanggal($tanggal);
			$data['query7'] = $this->Model_data->tampil_user();
			$data['query8'] = $this->Model_data->tampil_transaksi();
		$data['query9'] = $this->Model_data->tampil_saldo_awal_tanggal($tanggal);
		$this->load->view('template/header',$data);
		$this->load->view('laporan',$data);
		$this->load->view('template/footer');
	}
	public function export_excel_tanggal()
	{
		$data['query6'] = $this->db->get_where('kas',['id_kas'=>'1'])->row_array();
		$data['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row_array();

		$tanggal = $this->input->post('tanggal');
		if ($tanggal) {
			$data['query'] = $this->Model_data->tampil_transaksi_tanggal($tanggal);
		$this->load->view('excel_tanggal',$data);
		} else {
			$this->session->set_flashdata('message','<div class ="alert alert-danger" roles="alert"> Harap pilih tanggal ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/laporan');
		}
		
		
	}
	public function export_pdf_tanggal()
	{

		$data['query6'] = $this->db->get_where('kas',['id_kas'=>'1'])->row_array();
		$data['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row_array();

		
		$tanggal = $this->input->post('tanggal');

		if ($tanggal) {
			$data['query'] = $this->Model_data->tampil_transaksi_tanggal($tanggal);
			/* Create PDF File*/
      	$this->load->library('pdf');
		$this->load->view('pdf_tanggal',$data);
		 $paper_size='Legal';
	    $orientation='potrait';
	    $data_header= array('title' => 'Convert to Pdf');
	    $html = $this->output->get_output();
	    $this->pdf->set_paper($paper_size, $orientation, $data_header);

	    $this->pdf->load_html($html);
	    $this->pdf->render();
	    $this->pdf->stream('SPP-IRA harian.pdf', array('Attachment' =>0));
		} else {
			$this->session->set_flashdata('message','<div class ="alert alert-danger" roles="alert"> Harap pilih tanggal ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/laporan');
		}
		
		
	}
	public function tampil_transaksi_tanggal()
	{
		
		$data['query6'] = $this->db->get_where('kas',['id_kas'=>'1'])->row_array();
		$data['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row_array();

			$tanggal = $this->input->post('tanggal');
			$data['query'] = $this->Model_data->tampil_transaksi_tanggal($tanggal);

		$this->load->view('template/header',$data);
		$this->load->view('laporan',$data);
		$this->load->view('template/footer');
	}

	//pengolahan Data
	public function data()
	{
		$data['user'] = $this->db->get_where('user',['username'=> $this->session->userdata('username')])->row_array();
		$data['query'] = $this->Model_data->tampil_kas();

		$this->load->view('template/header',$data);
		$this->load->view('data',$data);
		$this->load->view('template/footer');
	}
	public function edit_kas(){
		$id = $this->input->post('id_kas');

		$this->form_validation->set_rules('nominal','nominal','required|trim');
		if( $this->form_validation->run()==false){
			$this->data();

		}else{


				$proses = $this->Model_data->edit_kas($id);
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/data');
		}
	}
	public function tambah_biaya_daftar()
	{
		$this->form_validation->set_rules('nama_item','nama_item','required|trim');
		$this->form_validation->set_rules('harga_item','harga_item','required|trim');
		if( $this->form_validation->run()==false){
			$this->data();

		}else{

			 $data = [
			 	'nama_item' => $this->input->post('nama_item', true),
			 	'harga_item' => $this->input->post('harga_item', true)
            ];

				$proses = $this->Model_data->tambah_biaya_daftar($data);
				$this->session->set_flashdata('message1','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/data');
		}

	}

	public function edit_biaya_daftar(){
		$id = $this->input->post('id_biaya_daftar');

		$this->form_validation->set_rules('nama_item','nama_item','required|trim');
		$this->form_validation->set_rules('harga_item','harga_item','required|trim');
		if( $this->form_validation->run()==false){
			$this->data();

		}else{


				$proses = $this->Model_data->edit_biaya_daftar($id);
				$this->session->set_flashdata('message1','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/data');
		}
	}

	public function hapus_biaya_daftar()
	{
		$id = $this->uri->segment(3);
		$cekdata = $this->db->get_where('transaksi', ['id_biaya_daftar' => $id])->row_array();
		if (!$cekdata) {
			$data = $this->Model_data->hapus_biaya_daftar($id);
			if (!$data) {
				$this->session->set_flashdata('message1','<div class ="alert alert-success " roles="alert"> Data berhasil dihapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect(base_url('welcome/data'));
			} else {
				$this->session->set_flashdata('message1','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				$this->index();
				
			}
		} else {
			$this->session->set_flashdata('message1','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus, Karena data sedang dipakai ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect(base_url('welcome/data'));
		}
		
		
	}

	public function tambah_panggilan_penggugat()
	{
		$this->form_validation->set_rules('nama_item','nama_item','required|trim');
		$this->form_validation->set_rules('harga_item','harga_item','required|trim');
		if( $this->form_validation->run()==false){
			$this->data();

		}else{

			 $data = [
			 	'nama_item' => $this->input->post('nama_item', true),
			 	'harga_item' => $this->input->post('harga_item', true)
            ];

				$proses = $this->Model_data->tambah_panggilan_penggugat($data);
				$this->session->set_flashdata('message2','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/data');
		}

	}

	public function edit_panggilan_penggugat(){
		$id = $this->input->post('id_panggilan_penggugat');

		$this->form_validation->set_rules('nama_item','nama_item','required|trim');
		$this->form_validation->set_rules('harga_item','harga_item','required|trim');
		if( $this->form_validation->run()==false){
			$this->data();

		}else{


				$proses = $this->Model_data->edit_panggilan_penggugat($id);
				$this->session->set_flashdata('message2','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/data');
		}
	}

	public function hapus_panggilan_penggugat()
	{
		$id = $this->uri->segment(3);
		$cekdata = $this->db->get_where('transaksi', ['id_panggilan_penggugat' => $id])->row_array();
		if (!$cekdata) {
			$data = $this->Model_data->hapus_panggilan_penggugat($id);
			if (!$data) {
				$this->session->set_flashdata('message2','<div class ="alert alert-success " roles="alert"> Data berhasil dihapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect(base_url('welcome/data'));
			} else {
				$this->session->set_flashdata('message2','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				$this->index();
				
			}
		} else {
			$this->session->set_flashdata('message2','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus, Karena data sedang dipakai ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect(base_url('welcome/data'));
		}
		
		
	}
	public function tambah_panggilan_tergugat()
	{
		$this->form_validation->set_rules('nama_item','nama_item','required|trim');
		$this->form_validation->set_rules('harga_item','harga_item','required|trim');
		if( $this->form_validation->run()==false){
			$this->data();

		}else{

			 $data = [
			 	'nama_item' => $this->input->post('nama_item', true),
			 	'harga_item' => $this->input->post('harga_item', true)
            ];

				$proses = $this->Model_data->tambah_panggilan_tergugat($data);
				$this->session->set_flashdata('message3','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/data');
		}

	}

	public function edit_panggilan_tergugat(){
		$id = $this->input->post('id_panggilan_tergugat');

		$this->form_validation->set_rules('nama_item','nama_item','required|trim');
		$this->form_validation->set_rules('harga_item','harga_item','required|trim');
		if( $this->form_validation->run()==false){
			$this->data();

		}else{


				$proses = $this->Model_data->edit_panggilan_tergugat($id);
				$this->session->set_flashdata('message3','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/data');
		}
	}
	public function hapus_panggilan_tergugat()
	{
		$id = $this->uri->segment(3);
		$cekdata = $this->db->get_where('transaksi', ['id_panggilan_tergugat' => $id])->row_array();
		if (!$cekdata) {
			$data = $this->Model_data->hapus_panggilan_tergugat($id);
			if (!$data) {
				$this->session->set_flashdata('message3','<div class ="alert alert-success " roles="alert"> Data berhasil dihapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect(base_url('welcome/data'));
			} else {
				$this->session->set_flashdata('message3','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				$this->index();
				
			}
		} else {
			$this->session->set_flashdata('message3','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus, Karena data sedang dipakai ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect(base_url('welcome/data'));
		}
		
		
	}

	public function tambah_pemberitahuan_penggugat()
	{
		$this->form_validation->set_rules('nama_item','nama_item','required|trim');
		$this->form_validation->set_rules('harga_item','harga_item','required|trim');
		if( $this->form_validation->run()==false){
			$this->data();

		}else{

			 $data = [
			 	'nama_item' => $this->input->post('nama_item', true),
			 	'harga_item' => $this->input->post('harga_item', true)
            ];

				$proses = $this->Model_data->tambah_pemberitahuan_penggugat($data);
				$this->session->set_flashdata('message4','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/data');
		}

	}

	public function edit_pemberitahuan_penggugat(){
		$id = $this->input->post('id_pemberitahuan_penggugat');

		$this->form_validation->set_rules('nama_item','nama_item','required|trim');
		$this->form_validation->set_rules('harga_item','harga_item','required|trim');
		if( $this->form_validation->run()==false){
			$this->data();

		}else{


				$proses = $this->Model_data->edit_pemberitahuan_penggugat($id);
				$this->session->set_flashdata('message4','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/data');
		}
	}

	public function hapus_pemberitahuan_penggugat()
	{
		$id = $this->uri->segment(3);
		$cekdata = $this->db->get_where('transaksi', ['id_pemberitahuan_penggugat' => $id])->row_array();
		if (!$cekdata) {
			$data = $this->Model_data->hapus_pemberitahuan_penggugat($id);
			if (!$data) {
				$this->session->set_flashdata('message4','<div class ="alert alert-success " roles="alert"> Data berhasil dihapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect(base_url('welcome/data'));
			} else {
				$this->session->set_flashdata('message4','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				$this->index();
				
			}
		} else {
			$this->session->set_flashdata('message4','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus, Karena data sedang dipakai ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect(base_url('welcome/data'));
		}
		
		
	}

	public function tambah_pemberitahuan_tergugat()
	{
		$this->form_validation->set_rules('nama_item','nama_item','required|trim');
		$this->form_validation->set_rules('harga_item','harga_item','required|trim');
		if( $this->form_validation->run()==false){
			$this->data();

		}else{

			 $data = [
			 	'nama_item' => $this->input->post('nama_item', true),
			 	'harga_item' => $this->input->post('harga_item', true)
            ];

				$proses = $this->Model_data->tambah_pemberitahuan_tergugat($data);
				$this->session->set_flashdata('message5','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/data');
		}

	}

	public function edit_pemberitahuan_tergugat(){
		$id = $this->input->post('id_pemberitahuan_tergugat');

		$this->form_validation->set_rules('nama_item','nama_item','required|trim');
		$this->form_validation->set_rules('harga_item','harga_item','required|trim');
		if( $this->form_validation->run()==false){
			$this->data();

		}else{


				$proses = $this->Model_data->edit_pemberitahuan_tergugat($id);
				$this->session->set_flashdata('message5','<div class ="alert alert-success" roles="alert"> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect('welcome/data');
		}
	}

	public function hapus_pemberitahuan_tergugat()
	{
		$id = $this->uri->segment(3);
		$cekdata = $this->db->get_where('transaksi', ['id_pemberitahuan_tergugat' => $id])->row_array();
		if (!$cekdata) {
			$data = $this->Model_data->hapus_pemberitahuan_tergugat($id);
			if (!$data) {
				$this->session->set_flashdata('message5','<div class ="alert alert-success " roles="alert"> Data berhasil dihapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect(base_url('welcome/data'));
			} else {
				$this->session->set_flashdata('message5','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				$this->index();
				
			}
		} else {
			$this->session->set_flashdata('message5','<div class ="alert alert-danger  " roles="alert"> Data gagal dihapus, Karena data sedang dipakai ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
				redirect(base_url('welcome/data'));
		}
		
		
	}
	//end pengolahan Data
}
