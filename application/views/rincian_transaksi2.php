<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-xl-12 col-lg-8">
      <!-- Area Chart -->
      <!-- Bar Chart -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h5 class="m-0 font-weight-bold text-" style="text-align: center">TABLE DATA TRANSAKSI</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr style="text-align: center; " class="table table-success">
                <th rowspan="2">Tgl</th>
                <th rowspan="2">No.<br>Urut</th>
                <th rowspan="2">No. Perkara</th>
                <th rowspan="2">Uraian</th>
                <th colspan="2">Jumlah</th>
                <th rowspan="2">Keterangan</th>

              </tr>
              <tr style="text-align: center;" class="table table-success">
                <th>Penerimaan</th>
                <th>Pengeluaran</th>
              </tr>
              <?php
              $no = 1;
              foreach ($query->result() as $q) { ?>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Saldo kas</td>
                <td><?= number_format($q->saldo, 2, ',', '.'); ?></td>
                <td></td>
                <td>saldo kas awal</td>


                </td>
              </tr>
                <tr>
                  <td><?= $q->tanggal; ?></td>
                  <td><?= $no; ?></td>
                  <td><?= $q->no_perkara; ?></td>

                  <!-- data tanpa enter -->
                  <?php if ($q->panjar1 > 0) : ?>
                    <td>Panjar Biaya Perkara</td>
                    <td><?= number_format($q->panjar1, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <!-- Panjar Biaya Perkara Banding -->
                  <?php if ($q->panjar2 > 0) : ?>
                    <td>Panjar Biaya Perkara Banding</td>
                    <td><?= number_format($q->panjar2, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <!--Panjar Biaya Perkara Kasasi  -->
                  <?php if ($q->panjar3 > 0) : ?>
                    <td></td>
                    <td>Panjar Biaya Perkara Kasasi</td>
                    <td><?= number_format($q->panjar3, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <!-- Panjar Biaya Perkara Peninjauan Kembali -->
                  <?php if ($q->panjar4 > 0) : ?>
                    <td>Panjar Biaya Perkara Peninjauan Kembali</td>
                    <td><?= number_format($q->panjar4, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <?php if ($q->tambah_panjar > 0) : ?>
                    <td>Tambahan Panjar Biaya Perkara</td>
                    <td><?= number_format($q->tambah_panjar, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <?php if ($q->sisa_panjar > 0) : ?>
                    <td>Pengembalian Sisa Panjar</td>
                    <td></td>
                    <td><?= number_format($q->sisa_panjar, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <?php if ($q->negara_panjar > 0) : ?>
                    <td>Pengembalian Kepada Negara</td>
                    <td></td>
                    <td><?= number_format($q->negara_panjar, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <?php if ($q->panggilan_penggugat > 0) : ?>
                    <td>Biaya Panggilan Penggugat</td>
                    <td></td>
                    <td><?= number_format($q->panggilan_penggugat, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <?php if ($q->panggilan_tergugat > 0) : ?>
                    <td>Biaya Panggilan Tergugat</td>
                    <td></td>
                    <td><?= number_format($q->panggilan_tergugat, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <?php if ($q->panggilan_pemohon > 0) : ?>
                    <td>Biaya Panggilan Pemohon</td>
                    <td></td>
                    <td><?= number_format($q->panggilan_pemohon, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <?php if ($q->pemberitahuan_penggugat > 0) : ?>
                    <td>Biaya Pemberitahuan Kepada Penggugat</td>
                    <td></td>
                    <td><?= number_format($q->pemberitahuan_penggugat, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <?php if ($q->pemberitahuan_tergugat > 0) : ?>
                    <td>Biaya Pemberitahuan Kepada Tergugat</td>
                    <td></td>
                    <td><?= number_format($q->pemberitahuan_tergugat, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <?php if ($q->pemeriksaan > 0) : ?>
                    <td>Pemeriksaan Setempat</td>
                    <td></td>
                    <td><?= number_format($q->pemeriksaan, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <?php if ($q->pnbp > 0) : ?>
                    <td>PNBP</td>
                    <td></td>
                    <td><?= number_format($q->pnbp, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <?php if ($q->materai > 0) : ?>
                    <td>Materai</td>
                    <td></td>
                    <td><?= number_format($q->materai, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <?php if ($q->redaksi > 0) : ?>
                    <td>redaksi</td>
                    <td></td>
                    <td><?= number_format($q->redaksi, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <?php if ($q->biaya_proses > 0) : ?>
                    <td>Biaya Proses</td>
                    <td><?= number_format($q->biaya_proses, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <?php if ($q->delegasi > 0) : ?>
                    <td>Delegasi Pengiriman</td>
                    <td><?= number_format($q->delegasi, 2, ',', '.'); ?></td>
                  <?php endif ?>

                  <td></td>
                  <td></td>
                </tr>
                <!-- akhir tabel -->

              <?php $no++;
              } ?>

              <?php

              foreach ($query->result() as $q) {
                $pengeluaran =  +$q->sisa_panjar + $q->negara_panjar + $q->panggilan_penggugat + $q->panggilan_tergugat + $q->panggilan_pemohon + $q->pemberitahuan_penggugat + $q->pemberitahuan_tergugat + $q->pemeriksaan +  $q->materai +  $q->pnbp +  $q->biaya_proses + $q->redaksi  + $q->delegasi;
                $penerimaan = $q->panjar1 + $q->panjar2 + $q->panjar3 + $q->panjar4 + $q->tambah_panjar;

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

                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <th>Saldo</th>
                <td></td>
                <td><?= number_format($q->saldo, 2, ',', '.'); ?></td>
                <td></td>
                <td></td>

              </tr>
              <tr>
                <td></td>
                <td></td>
                <th>Penerimaan</th>
                <td></td>
                <td><?= number_format($total_penerimaan, 2, ',', '.'); ?></td>
                <td></td>
                <td></td>

              </tr>
              <tr>
                <td></td>
                <td></td>
                <th>Pengerluaran</th>
                <td></td>
                <td></td>
                <td><?= number_format($total_pengeluaran, 2, ',', '.'); ?></td>
                <td></td>

              </tr>
              <tr>
                <td></td>
                <td></td>
                <th>Sisa</th>
                <td><?= number_format(($q->saldo + $total_penerimaan) - $total_pengeluaran, 2, ',', '.'); ?></td>
                <td></td>
                <td></td>
                <td></td>

              </tr>
            </table>
            <a href="<?= base_url('welcome') ?>" class="btn btn-warning" style="width: 100%">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>