
<!DOCTYPE html>
<html>
<head>
	<title>export spp-ira pdf</title>
	 <!-- Custom styles for this template-->
  <link href="<?= base_url(''); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
	<h4 style="text-align: center;">Buku Kas Bantu</h4>
    <p style="text-align: center;">Tanggal: <?= date("d-m-Y", strtotime($tanggal));   ?></p>
    <center>
    	<div style="padding:-35px; margin-top: 50px;">
	<table class="table table-bordered" style="width: 100%;">
								<tr style="text-align: center; " class="table table-success">
									<th rowspan="2">Tgl</th>
									<th rowspan="2">No.<br>Urut</th>
									<th rowspan="2">No. Perkara</th>
									<th rowspan="2">Uraian</th>
									<th colspan="2">Jumlah</th>
									<th rowspan="2" style="width: 100px;">Keterangan</th>
								</tr>
								<tr style="text-align: center;" class="table table-success">
									<th>Penerimaan</th>
									<th>Pengeluaran</th>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>Saldo kas</td>
									<td><?= number_format($query6['nominal'],2,',','.'); ?></td>
									<td></td>
									<td>saldo kas awal</td>
								</tr>
								<?php
								$no=1;
								foreach($query->result() as $q) { ?>
								<tr>
									<td><?= $q->tanggal; ?></td>
									<td><?= $no; ?></td>
									<td><?= $q->no_perkara; ?></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<?php if ($q->biaya_daftar > 0): ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td><?= $q->nama_itemm; ?></td>
									<td></td>
									<td><?= number_format($q->biaya_daftar,2,',','.'); ?></td>
									<td></td>
								</tr>
								<?php endif ?>
								<?php if ($q->biaya_proses > 0): ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>biaya proses</td>
									<td></td>
									<td><?= number_format($q->biaya_proses,2,',','.'); ?></td>
									<td></td>
								</tr>
								<?php endif ?>
								<?php if ($q->panggilan_penggugat > 0): ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>biaya panggilan penggugat</td>
									<td></td>
									<td><?= number_format($q->panggilan_penggugat,2,',','.'); ?></td>
									<td></td>
								</tr>
								<?php endif ?>
								<?php if ($q->panggilan_tergugat > 0): ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>biaya panggilan tergugat</td>
									<td></td>
									<td><?= number_format($q->panggilan_tergugat,2,',','.'); ?></td>
									<td></td>
								</tr>
								<?php endif ?>
								<?php if ($q->pemberitahuan_penggugat > 0): ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>biaya pemberitahuan penggugat</td>
									<td></td>
									<td><?= number_format($q->pemberitahuan_penggugat,2,',','.'); ?></td>
									<td></td>
								</tr>
								<?php endif ?>
								<?php if ($q->pemberitahuan_tergugat > 0): ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>biaya pemberitahuan tergugat</td>
									<td></td>
									<td><?= number_format($q->pemberitahuan_tergugat,2,',','.'); ?></td>
									<td></td>
								</tr>
								<?php endif ?>
								<?php if ($q->pnbp > 0): ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>pnbp</td>
									<td></td>
									<td><?= number_format($q->pnbp,2,',','.'); ?></td>
									<td></td>
								</tr>
								<?php endif ?>
								<?php if ($q->materai > 0): ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>materai</td>
									<td></td>
									<td><?= number_format($q->materai,2,',','.'); ?></td>
									<td></td>
								</tr>
								<?php endif ?>
								<?php if ($q->redaksi > 0): ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>redaksi</td>
									<td></td>
									<td><?= number_format($q->redaksi,2,',','.'); ?></td>
									<td></td>
								</tr>
								<?php endif ?>
								<?php if ($q->panjar > 0): ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>panjar</td>
									<td><?= number_format($q->panjar,2,',','.'); ?></td>
									<td></td>
									<td></td>
								</tr>
								<?php endif ?>
								<?php if ($q->tambah_panjar > 0): ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>tambah panjar</td>
									<td><?= number_format($q->tambah_panjar,2,',','.'); ?></td>
									<td></td>
									<td></td>
								</tr>
								<?php endif ?>
								<?php if ($q->sisa_panjar > 0): ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>sisa panjar</td>
									<td></td>
									<td><?= number_format($q->sisa_panjar,2,',','.'); ?></td>
									<td></td>
								</tr>
								<?php endif ?>
								<?php if ($q->delegasi_panggilan > 0): ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>delegasi panggilan</td>
									<td></td>
									<td><?= number_format($q->delegasi_panggilan,2,',','.'); ?></td>
									<td></td>
								</tr>
								<?php endif ?>
								<?php if ($q->delegasi_pemberitahuan > 0): ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>delegasi pemberitahuan</td>
									<td></td>
									<td><?= number_format($q->delegasi_pemberitahuan,2,',','.') ?></td>
									<td></td>
								</tr>
								<?php endif ?>
								<?php if ($q->delegasi_pengiriman > 0): ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>delegasi pengiriman</td>
									<td></td>
									<td><?= number_format($q->delegasi_pengiriman,2,',','.') ?></td>
									<td></td>
								</tr>
								<?php endif ?>
								
								<?php $no++; } ?>

								<?php
								
								foreach($query->result() as $q) {
								$pengeluaran = $q->biaya_daftar+$q->biaya_proses+$q->panggilan_penggugat+$q->panggilan_tergugat+$q->pemberitahuan_penggugat+$q->pemberitahuan_tergugat+$q->pnbp+$q->materai+$q->redaksi+$q->sisa_panjar+$q->delegasi_panggilan+$q->delegasi_pemberitahuan+$q->delegasi_pengiriman;
								$penerimaan = $q->panjar+$q->tambah_panjar;

								$pengeluaran;
								$penerimaan;

								$sum_pengeluaran[] = $pengeluaran;
								$sum_penerimaan[] = $penerimaan;
								}
								 if ($query->result()) {
                  $total_pengeluaran = array_sum($sum_pengeluaran);
                $total_penerimaan = array_sum($sum_penerimaan); 
                } else {
                  $total_pengeluaran = 0.00;
                $total_penerimaan = 0.00; 
                } ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<th>Saldo</th>
									<td></td>
									<td><?= number_format($query6['nominal'],2,',','.'); ?></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<th>Penerimaan</th>
									<td></td>
									<td><?= number_format($total_penerimaan,2,',','.'); ?></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<th>Pengerluaran</th>
									<td></td>
									<td></td>
									<td><?= number_format($total_pengeluaran,2,',','.'); ?></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<th>Sisa</th>
									<td><?= number_format(($query6['nominal'] + $total_penerimaan) - $total_pengeluaran,2,',','.'); ?></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</table>
						</div>
					</center>

        <script src="<?= base_url(''); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>