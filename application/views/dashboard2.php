<!-- Begin Page Content --> 
<div class="container-fluid">
	<!-- Area Chart -->
	<div class="row">
		<div class="col-xl-12 col-lg-8">
			<!-- Area Chart -->
			<!-- Bar Chart -->
			<?= $this->session->flashdata('message') ?>


			<!-- input transaksi lama -->
			<!-- <div class="card shadow mb-4">
				<div class="card-header py-3">
					<h5 class="m-0 font-weight-bold text-" style="text-align: center">INPUT DATA TRANSAKSI</h5>
				</div>
				<div class="card-body">
					<form action="<?= base_url('welcome/tambah_transaksi') ?>" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col">
								<input name="kas" type="text" class="form-control" id="kas" readonly placeholder="" value=" <?= number_format($query6['nominal'], 2, ',', '.'); ?> " readonly>
							</div>
							<div class="col">
								<input name="tanggal" required type="date" class="form-control" id="tanggal" placeholder="Hari/Tanggal" value="filter">
								<br>
							</div>
						</div>

						<div class="row margin-0">
							<div class="col">
								<div class="form-group">
									<input name="no_perkara" type="text" class="form-control" id="formGroupExampleInput" placeholder="Nomor Perkara" required>
								</div>
								<div class="form-group">
									<select name="id_biaya_daftar" class="custom-select mr-sm-2" id="id_biaya_daftar">
										<?php
										foreach ($query1->result() as $q) { ?>
											<option value="<?= $q->id_biaya_daftar; ?>"><?= $q->nama_item; ?> : <?= number_format($q->harga_item, 2, ',', '.'); ?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<input name="biaya_proses" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Biaya Proses">
								</div>
								<div class="form-group">
									<select name="id_panggilan_penggugat" class="custom-select mr-sm-2" id="id_panggilan_penggugat">
										<?php
										foreach ($query2->result() as $q) { ?>
											<option value="<?= $q->id_panggilan_penggugat; ?>"><?= $q->nama_item; ?> : <?= number_format($q->harga_item, 2, ',', '.'); ?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<select name="id_panggilan_tergugat" class="custom-select mr-sm-2" id="id_panggilan_tergugat">
										<?php
										foreach ($query3->result() as $q) { ?>
											<option value="<?= $q->id_panggilan_tergugat; ?>"><?= $q->nama_item; ?> : <?= number_format($q->harga_item, 2, ',', '.'); ?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<select name="id_pemberitahuan_penggugat" class="custom-select mr-sm-2" id="id_pemberitahuan_penggugat">
										<?php
										foreach ($query4->result() as $q) { ?>
											<option value="<?= $q->id_pemberitahuan_penggugat; ?>"><?= $q->nama_item; ?> : <?= number_format($q->harga_item, 2, ',', '.'); ?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<select name="id_pemberitahuan_tergugat" class="custom-select mr-sm-2" id="id_pemberitahuan_tergugat">
										<?php
										foreach ($query5->result() as $q) { ?>
											<option value="<?= $q->id_pemberitahuan_tergugat; ?>"><?= $q->nama_item; ?> : <?= number_format($q->harga_item, 2, ',', '.'); ?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<input name="pnbp" type="text" class="form-control" id="pnbp" placeholder="PNBP">
								</div>
								<div class="form-group">
									<input name="materai" type="text" class="form-control" id="materai" placeholder="Materai">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<input name="redaksi" type="text" class="form-control" id="redaksi" placeholder="Redaksi">
								</div>
								<div class="form-group">
									<input name="panjar" type="text" class="form-control" id="panjar" placeholder="Panjar">
								</div>
								<div class="form-group">
									<input name="tambah_panjar" type="text" class="form-control" id="tambah_panjar" placeholder="Tambah panjar">
								</div>
								<div class="form-group">
									<input name="sisa_panjar" type="text" class="form-control" id="sisa_panjar" placeholder="Sisa panjar">
								</div>
								<div class="form-group">
									<input name="delegasi_panggilan" type="text" class="form-control" id="delegasi_panggilan" placeholder="Delegasi panggilan">
								</div>
								<div class="form-group">
									<input name="delegasi_pemberitahuan" type="text" class="form-control" id="delegasi_pemberitahuan" placeholder="Delegasi pemberitahuan">
								</div>
								<div class="form-group">
									<input name="delegasi_pengiriman" type="text" class="form-control" id="delegasi_pengiriman" placeholder="Delegasi pengiriman">
								</div>
								<div class="form-group">
									<input name="keterangan" type="text" class="form-control" id="keterangan" placeholder="Keterangan">
								</div>
								<button class="btn btn-success text-white tombol" name="submit">Simpan transaksi</button>
							</div>
						</div>
					</form>
					<hr>

					<hr>
				</div>
			</div> -->

		</div>
	</div>
	<div class="row">
		<div class="col-xl-12 col-lg-8">
			<!-- Area Chart -->
			<!-- Bar Chart -->
			<div class="card shadow mb-4">


				<div class="card-header py-3">
					<h5 class="m-0 font-weight-bold text-" style="text-align: center">TABLE DATA TRANSAKSI</h5>
				</div>




				<div class="card-body">
					<div>

						<div class="row">
							<div class="col">
								<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#menuTransaksi">
									Tambah Data Transaksi
								</button>
							</div>
							<div class="col">
								<div class="input-group mb-3">
									<span class="input-group-text text-white bg-success" id="basic-addon31">Saldo Kas</span>
									<input name="kas" type="text" class="form-control" id="kas" readonly placeholder="" value=" <?= number_format($query6['nominal'], 2, ',', '.'); ?> " readonly aria-describedby="basic-addon31">
								</div>

							</div>
						</div>

						<!-- The Modal -->
						<div class="modal" id="menuTransaksi">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">

									<!-- Modal Header -->
									<div class="modal-header">
										<h4 class="modal-title">Modal Input Data Transaksi</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>

									<!-- Modal body -->
									<div class="modal-body">
										<form action="<?= base_url('welcome/tambah_transaksi2') ?>" method="POST" enctype="multipart/form-data">
										<div class="input-group mb-1">
											<span class="input-group-text text-white bg-success" id="basic-addon3">Tgl Transaksi &nbsp;&nbsp;</span>
											<input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="tanggal" required id="tanggal" placeholder="Hari/Tanggal">
											 <?= form_error('tanggal','<small class="text-danger pl-3 ">','</small>');?>
										</div>
										<div class="input-group mb-1">
											<span class="input-group-text text-white bg-success" id="basic-addon3">Nomor Perkara</span>
											<input type="text" class="form-control" id="no_perkara" name="no_perkara" aria-describedby="basic-addon3" required="">
											 <?= form_error('no_perkara','<small class="text-danger pl-3 ">','</small>');?>
										</div>
											<div class="input-group mb-1">
												<span class="input-group-text text-white bg-success" for="sel1">Kategori Biaya&nbsp;</span>
												<select class="form-control" id="kategori_biaya" name="kategori_biaya">
													<option value="" selected>Pilih Katergori Biaya...</option>
													<option value="id_biaya_daftar">Kategori Perkara</option>
													<!-- <option value="Sisa Panjar">Sisa Panjar</option>
													<option value="Panggilan">Panggilan</option>
													<option value="Pemberitahuan">Pemberitahuan</option>
													<option value="Pemeriksaan Setempat">Pemeriksaan Setempat</option>
													<option value="Materai">Materai</option>
													<option value="PNBP">PNBP</option>
													<option value="Alat Tulis Kantor">Alat Tulis Kantor</option>
													<option value="Hak-hak Kepaniteraan">Hak-hak Kepaniteraan</option>
													<option value="Delegasi">Delegasi</option> -->
												</select>
												<br>
												<?= form_error('kategori_biaya','<small class="text-danger pl-3 ">','</small>');?>
											</div>

											<div class="input-group mb-1">
												<span class="input-group-text text-white bg-success" for="sel1">Jenis Biaya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
												<select class="form-control" id="jenis_biaya" name="jenis_biaya">
													<?php
													foreach ($query1->result() as $q) { ?>
													<option value="<?= $q->id_biaya_daftar ?>"><?= $q->nama_item ?></option>
												<?php } ?>
												<option value="5">Tambahan Panjar Biaya Perkara </option>
												</select>
												<br>
											</div>
	
										
										<div class="input-group mb-1">
											<span class="input-group-text text-white bg-success pr-2" id="basic-addon3">Jumlah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
											<input type="text" class="form-control" id="Jumlah" name="jumlah" aria-describedby="basic-addon3">
										</div>
										<div class="input-group mb-1">
											<span class="input-group-text text-white bg-success" id="basic-addon3">Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
											<input type="text" class="form-control" id="keterangan" name="keterangan" aria-describedby="basic-addon3">
										</div>
									</div>
									<!-- Modal footer -->
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-success">Simpan</button>
									</div>
								</form>

								</div>
							</div>
						</div>


						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
								<thead>
									<tr>
										<th>No urut</th>
										<th>Tanggal</th>
										<th>Nomor Perkara</th>
										<th>Rincian </th>
										<th>Opsi </th>

									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No urut</th>
										<th>Tanggal</th>
										<th>Nomor Perkara</th>
										<th>Rincian </th>
										<th>Opsi </th>
									</tr>
								</tfoot>
								<tbody>
									<?php
									$no = 1;
									foreach ($query->result() as $q) { ?>
										<tr>
											<td><?= $no; ?></td>
											<td><?= $q->tanggal; ?></td>
											<td><?= $q->no_perkara; ?></td>
											<td><a href="<?= base_url('welcome/rincian_transaksi/') . $q->id_transaksi; ?>">Rincian</a></td>
											<td>
												<a href="<?= base_url('welcome/hapus_transaksi/') . $q->id_transaksi; ?>" onclick="return confirm ('Yakin menghapus?');"> <i class="fa fa-trash" style="color: salmon;"></i></a> |
												<a href="#"> <i class="fa fa-edit" style="color:#2DB28B "></i></a>
											</td>
											</td>
										</tr>
									<?php $no++;
									} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid