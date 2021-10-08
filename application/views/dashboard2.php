<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Area Chart -->
	<div class="row">
		<div class="col-xl-12 col-lg-8">
			<!-- Area Chart -->
			<!-- Bar Chart -->
			<?= $this->session->flashdata('message') ?>
			
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
								<?php

											 if($query7['update_saldo']){ ?>
								<div class="input-group mb-3">
									<span class="input-group-text text-white bg-success" id="basic-addon31">Saldo Kas</span>
									<input name="kas" type="text" class="form-control" id="kas" readonly placeholder="" value=" <?= number_format($query7['update_saldo'], 2, ',', '.'); ?> " readonly aria-describedby="basic-addon31">
								</div>
								<?php }else{ ?>
									<div class="input-group mb-3">
									<span class="input-group-text text-white bg-success" id="basic-addon31">Saldo Kas</span>
									<input name="kas" type="text" class="form-control" id="kas" readonly placeholder="" value=" <?= number_format($query6['nominal'], 2, ',', '.'); ?> " readonly aria-describedby="basic-addon31">
								</div>
							<?php } ?>
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
										<form action="<?= base_url('welcome/tambah_transaksi3') ?>" method="POST" enctype="multipart/form-data">
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
												<select class="form-control" id="first-choice" required name="select1">
													<option selected value="base">Please kategori biaya...</option>
													<option value="panjar">Panjar Perkara</option>
													<option value="sisa_panjar">Sisa Panjar</option>
													<option value="panggilan">Panggilan</option>
													<option value="pemberitahuan">Pemberitahuan</option>
													<option value="pemeriksaan">Pemeriksaan Setempat</option>
													<option value="materai">Materai</option>
													<option value="pnbp">PNBP</option>
													<option value="biaya_proses">Alat Tulis Kantor</option>
													<option value="redaksi">Hak-hak Kepaniteraan</option>
													<option value="delegasi">Delegasi</option>
												</select>
												<br>
												<?= form_error('kategori_biaya','<small class="text-danger pl-3 ">','</small>');?>
											</div>
											<div class="input-group mb-1">
												<span class="input-group-text text-white bg-success" for="sel1">Jenis Biaya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
												<select class="form-control" id="second-choice" name="select2" required>
													<option value="">Please choose from above</option>
												</select>
												<script type="text/javascript">
													$("#first-choice").change(function() {
												$("#second-choice").load("textdata/" + $(this).val() + ".php");
												});
												</script>
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
											<?php

											 if($query7['update_saldo']){ ?>
												<input name="kas" type="hidden" class="form-control" id="kas" readonly value=" <?= $query7['update_saldo']; ?> " readonly aria-describedby="basic-addon31">
											<?php }else{ ?>
											<input name="kas" type="hidden" class="form-control" id="kas" readonly value=" <?= $query6['nominal']; ?> " readonly aria-describedby="basic-addon31">
										<?php } ?>
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
											<a href="<?= base_url('welcome/hapus_transaksi/') . $q->id_transaksi; ?>" onclick="return confirm ('Yakin menghapus?');"> <i class="fa fa-trash" style="color: salmon;"></i></a> <!-- |
											<a href="#"> <i class="fa fa-edit" style="color:#2DB28B "></i></a> -->
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