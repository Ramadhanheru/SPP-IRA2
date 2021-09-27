<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Area Chart -->
	<div class="row">
		<div class="col-xl-12 col-lg-8">
			<!-- Area Chart -->
			<!-- Bar Chart -->
			<?= $this->session->flashdata('message') ?>
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h5 class="m-0 font-weight-bold text-" style="text-align: center">INPUT DATA TRANSAKSI</h5>
				</div>
				<div class="card-body">
					<form action="<?= base_url('welcome/tambah_transaksi') ?>" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col">
								<input name="kas" type="text" class="form-control" id="kas" readonly placeholder="" value=" <?= number_format($query6['nominal'],2,',','.'); ?> " readonly>
							</div>
							<div class="col">
								<input name="tanggal" required type="date" class="form-control" id="tanggal" placeholder="Hari/Tanggal" value="filter">
								<br>
							</div>
						</div>
						
						<div class="row margin-0">
							<div class="col">
								<div class="form-group">
									<input name="no_perkara" type="text" class="form-control" id="formGroupExampleInput" placeholder="Nomor Perkara"required >
								</div>
								<div class="form-group">
									<select name="id_biaya_daftar" class="custom-select mr-sm-2" id="id_biaya_daftar">
										<?php
										foreach($query1->result() as $q) { ?>
										<option value="<?=$q->id_biaya_daftar; ?>"><?=$q->nama_item; ?> : <?= number_format($q->harga_item,2,',','.'); ?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<input name="biaya_proses" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Biaya Proses">
								</div>
								<div class="form-group">
									<select name="id_panggilan_penggugat" class="custom-select mr-sm-2" id="id_panggilan_penggugat">
										<?php
										foreach($query2->result() as $q) { ?>
										<option value="<?=$q->id_panggilan_penggugat; ?>"><?=$q->nama_item; ?> : <?= number_format($q->harga_item,2,',','.'); ?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<select name="id_panggilan_tergugat" class="custom-select mr-sm-2" id="id_panggilan_tergugat">
										<?php
										foreach($query3->result() as $q) { ?>
										<option value="<?=$q->id_panggilan_tergugat; ?>"><?=$q->nama_item; ?> : <?= number_format($q->harga_item,2,',','.'); ?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<select name="id_pemberitahuan_penggugat" class="custom-select mr-sm-2" id="id_pemberitahuan_penggugat">
										<?php
										foreach($query4->result() as $q) { ?>
										<option value="<?=$q->id_pemberitahuan_penggugat; ?>"><?=$q->nama_item; ?> : <?= number_format($q->harga_item,2,',','.'); ?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<select name="id_pemberitahuan_tergugat" class="custom-select mr-sm-2" id="id_pemberitahuan_tergugat">
										<?php
										foreach($query5->result() as $q) { ?>
										<option value="<?=$q->id_pemberitahuan_tergugat; ?>"><?=$q->nama_item; ?> : <?= number_format($q->harga_item,2,',','.'); ?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<input name="pnbp"  type="text" class="form-control" id="pnbp" placeholder="PNBP">
								</div>
								<div class="form-group">
									<input name="materai"  type="text" class="form-control" id="materai" placeholder="Materai">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<input name="redaksi"  type="text" class="form-control" id="redaksi" placeholder="Redaksi">
								</div>
								<div class="form-group">
									<input name="panjar"  type="text" class="form-control" id="panjar" placeholder="Panjar">
								</div>
								<div class="form-group">
									<input name="tambah_panjar"  type="text" class="form-control" id="tambah_panjar" placeholder="Tambah panjar">
								</div>
								<div class="form-group">
									<input name="sisa_panjar"  type="text" class="form-control" id="sisa_panjar" placeholder="Sisa panjar">
								</div>
								<div class="form-group">
									<input name="delegasi_panggilan"  type="text" class="form-control" id="delegasi_panggilan" placeholder="Delegasi panggilan">
								</div>
								<div class="form-group">
									<input name="delegasi_pemberitahuan"  type="text" class="form-control" id="delegasi_pemberitahuan" placeholder="Delegasi pemberitahuan">
								</div>
								<div class="form-group">
									<input name="delegasi_pengiriman"  type="text" class="form-control" id="delegasi_pengiriman" placeholder="Delegasi pengiriman">
								</div>
								<div class="form-group">
									<input name="keterangan"  type="text" class="form-control" id="keterangan" placeholder="Keterangan">
								</div>
								<button class="btn btn-success text-white tombol" name="submit">Simpan transaksi</button>
							</div>
						</div>
					</form>
					<hr>
					
					<hr>
				</div>
			</div>
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
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                  <thead>
                    <tr>
                      <th>No urut</th>
                      <th>Tanggal</th>
                      <th>Nomor Perkara</th>
                      <th>Rincian  </th>
                      <th>Opsi  </th>
                   
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No urut</th>
                      <th>Tanggal</th>
                      <th>Nomor Perkara</th>
                      <th>Rincian  </th>
                      <th>Opsi  </th>
                    </tr>
                  </tfoot>
                  <tbody>
                        <?php
								$no=1;
								foreach($query->result() as $q) { ?>
                        <tr>
                          <td><?= $no; ?></td>
                          <td><?= $q->tanggal; ?></td>
						  <td><?= $q->no_perkara; ?></td>
						  <td><a href="<?= base_url('welcome/rincian_transaksi/').$q->id_transaksi; ?>">Rincian</a></td>
						  <td><a href="<?= base_url('welcome/hapus_transaksi/').$q->id_transaksi; ?>" onclick="return confirm ('Yakin menghapus?');"> <i class="fa fa-trash" style="color: salmon;"></i></a>
									</td></td>
                        </tr>
                  		<?php $no++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->