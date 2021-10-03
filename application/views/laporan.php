<!-- Begin Page Content --> 
        <div class="container-fluid">


          <!-- kosong -->
          <!-- Page Heading -->
          <!-- kontent -->
          <h1 class="h3 mb-4 text-gray-800">Pengolahan Data Laporan</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3 mt-3">
                <h5 class="m-0 font-weight-bold text-" style="text-align: center">BUKU KAS BANTU</h5>
              </div>
            <div class="card-header py-3">
              <?= $this->session->flashdata('message') ?>
             
             <!--  <a class="btn btn-success text-white" href="<?= base_url('welcome/export_excel_tanggal') ?>"><em class="fa fa-file-excel"> Eksport Excel </em></a>
              <a class="btn btn-danger text-white" href="pdf.php"><em class="fa fa-file-pdf"> Eksport PDF</em></a> -->
              <!-- <a class="m-0 font-weight-bold text-primary">laporan Kebakaran DPK-PB</a> -->

              <!-- pagination -->
              <!-- navigasi -->
            </div>


            <div class=" card-body">
              <?= $this->session->flashdata('message') ?>
              <div class="table-">
                <!-- filter tanggal -->
                <div class="row pb-12">
                  <div class="col-2">
                    <h6 class="d-inline">Pilih Tanggal</h6>
                  </div>
                  <div class="col-4">
                     <form action="" method="POST">
                      <input type="date" name="tanggal" value="filter"><br><br>
                      <input type="submit" name="submit" class="btn btn-success" value="Tampilkan">
                      <input type="submit" name="excel" class="btn btn-success" value="Excel">
                      <input type="submit" name="pdf" class="btn btn-success" value="PDF">
                      <a href="" class="btn btn-success">Reset</a>
                    </form>
                  </div>
                  <div class="col-4">
                    <form action="" method="post">
                      <select name="bulan" required="">
                        <option disabled="" selected="">--Pilih Bulan--</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
                      <select name="tahun" required="">
                        <option disabled="" selected="">--Pilih Tahun--</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                      </select>
                      <br><br>
                      <!-- <button type="submit" name="caribulan" class="btn btn-success">Tampilkan</button> -->
                       <input type="submit" name="excel" class="btn btn-success" value="Excel">
                      <input type="submit" name="pdf" class="btn btn-success" value="PDF">
                      <a href="admin-transaksi.php" class="btn btn-success">Reset</a>
                      <br><br>
                    </form>
                  </div>
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
                  <th rowspan="2">Aksi</th>
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
                  <td>
                    
                  </td>
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
                  <td>
                    <a href="hapus.php?id_laporan=" onclick="return confirm ('Yakin menghapus?');"> <i class="fa fa-trash" style="color: salmon;"></i></a>
                  </td>
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
                  <td>
                  </td>
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
                  <td>
                  </td>
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
                  <td>
                  </td>
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
                  <td>
                  </td>
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
                  <td>
                  </td>
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
                  <td>
                  </td>
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
                  <td>
                  </td>
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
                  <td>
                  </td>
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
                  <td>
                  </td>
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
                  <td>
                  </td>
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
                  <td>
                  </td>
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
                  <td>
                  </td>
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
                  <td>
                  </td>
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
                  <td>
                  </td>
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
                  <td>
                  </td>
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
                }
                
               ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
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
                  <td>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <th>Saldo</th>
                  <td></td>
                  <td><?= number_format($query6['nominal'],2,',','.'); ?></td>
                  <td></td>
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
                  <td></td>
                </tr>
              </table>
            </div>
          </div>

                <div class="card-header py-3 mt-3">
                  <h5 class="m-0 font-weight-bold text-" style="text-align: center">BERITA ACARA REKONSILIASI</h5>
                  <h5 class="m-0 font-weight-bold text-" style="text-align: center">KAS KEUANGAN PERKARA</h5>
                </div>



              </div>

              <form action="<?= base_url('welcome/print_berita_acara') ?>" method="POST" enctype="multipart/form-data">
                <?php
                
                foreach($query8->result() as $q) {
                $pengeluaran = $q->biaya_daftar+$q->biaya_proses+$q->panggilan_penggugat+$q->panggilan_tergugat+$q->pemberitahuan_penggugat+$q->pemberitahuan_tergugat+$q->pnbp+$q->materai+$q->redaksi+$q->sisa_panjar+$q->delegasi_panggilan+$q->delegasi_pemberitahuan+$q->delegasi_pengiriman;
                $penerimaan = $q->panjar+$q->tambah_panjar;

                $pengeluaran;
                $penerimaan;

                $sum_pengeluaran[] = $pengeluaran;
                $sum_penerimaan[] = $penerimaan;
                }

                if ($query8->result()) {
                  $total_pengeluaran = array_sum($sum_pengeluaran);
                $total_penerimaan = array_sum($sum_penerimaan); 
                } else {
                  $total_pengeluaran = 0.00;
                $total_penerimaan = 0.00; 
                }
                
               ?>
                <div class="row margin-0 mt-3">
                  <div class="col">
                    <!-- I buku keuangan perkara -->
                    <!-- <div class="form-group">
                      <label for="exampleFormControlInput1" class="form-label text-dark">I Buku Induk Keungan Perkara</label>
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">a. Saldo bulan lalu</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($query6['nominal'],2,',','.'); ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">b. Penerimaan</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($total_penerimaan,2,',','.'); ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">c. Pengeluaran</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($total_pengeluaran,2,',','.'); ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah I</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Rp.7.000.000">
                        </div>
                      </div>
                    </div> -->
                    <!-- II buku keungan konsinyasi -->
                    <div class="form-group">
                      <label for="exampleFormControlInput1" class="form-label text-dark">II Buku Keungan Konsinyasi</label>
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">a. Saldo bulan lalu</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" id="staticEmail" name="saldo_konsinyasi" required="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">b. Penerimaan</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" id="staticEmail" name="penerimaan_konsinyasi" required="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">c. Pengeluaran</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" id="staticEmail" name="pengeluaran_konsinyasi" required="">
                        </div>
                      </div>
                    </div><!-- 
                    <div class="form-group">
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah II</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" id="staticEmail" value="Rp.7.000.000">
                        </div>
                      </div>
                    </div> -->
                    <!-- III buku keungan eksekusi -->
                    <div class="form-group">
                      <label for="exampleFormControlInput1" class="form-label text-dark">III Buku Keungan Eksekusi</label>
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">a. Saldo bulan lalu</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" id="staticEmail" name="saldo_eksekusi" required="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">b. Penerimaan</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" id="staticEmail" name="penerimaan_eksekusi" required="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">c. Pengeluaran</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" id="staticEmail" name="pengeluaran_eksekusi" required="">
                        </div>
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah III</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" id="staticEmail" >
                        </div>
                      </div>
                    </div> -->
                    <!-- IV buku keungan pidana -->
                    <div class="form-group">
                      <label for="exampleFormControlInput1" class="form-label text-dark">IV Buku Keuangan Pidana</label>
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">a. Saldo bulan lalu</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" id="staticEmail" name="saldo_pidana" required="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">b. Penerimaan</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" id="staticEmail" name="penerimaan_pidana" required="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">c. Pengeluaran</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" id="staticEmail" name="pengeluaran_pidana" required="">
                        </div>
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah IV</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" id="staticEmail" value="Rp.7.000.000">
                        </div>
                      </div>
                    </div> -->
                    <!-- V buku keunangan proses -->
                    <div class="form-group">
                      <label for="exampleFormControlInput1" class="form-label text-dark">V Buku Keuangan Proses</label>
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">a. Saldo bulan lalu</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" id="staticEmail" name="saldo_proses" required="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">b. Penerimaan</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" id="staticEmail" name="penerimaan_proses" required="" >
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">c. Pengeluaran</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" id="staticEmail" name="pengeluaran_proses" required="" >
                        </div>
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah V</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Rp.7.000.000">
                        </div>
                      </div>
                    </div> -->
                    <!-- jumlah -->
                    <!-- <div class="form-group">
                      <div class="mb row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Saldo Pembukuan (I+II+III+IV+V)</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Rp.7.000.000">
                        </div>
                      </div>
                    </div> -->
                    <!-- pembatas -->
                    <br>
                    <br>
                    <br>
                    <!-- <div class="form-group">
                      <label for="exampleFormControlInput1" class="form-label text-dark">Menurut Kas :</label>
                      <div class="mb row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">1. Uang Tunai *)</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" >
                        </div>
                      </div>
                    </div> -->
                    <div class="form-group">
                      <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">2. Saldo Bank</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control-plaintext" name="saldo_bank" id="staticEmail" required="" >
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">3. Materai</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control-plaintext" name="materai" id="staticEmail" required="" >
                        </div>
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Saldo Kas</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" >
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Selisih</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" >
                        </div>
                      </div>
                    </div> -->
                    <!-- akhir -->
                    <div class="form-group">
                      <label for="exampleFormControlInput1" class="form-label text-dark">Termasuk Dalam Saldo Bank Tersebut :</label>
                      <div class="mb row">
                        <label for="staticEmail" class="col-sm-2 col-form-label"> - Jasa giro belum ditarik</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control-plaintext" name="jasa_giro" id="staticEmail" required="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label"> - Uang pihak ke-3 belum dibuku</label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control-plaintext" name="uang_pihak3" id="staticEmail" required="" >
                        </div>
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Rp.7.000.000">
                        </div>
                      </div>
                    </div> -->
                    <!-- <div class="form-group">
                      <div class=" row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Selisih kurang *)</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" >
                        </div>
                      </div>
                    </div> -->
                    <!-- panitera -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col">
                          
                          <select name="jabatan_panitera" class="custom-select">
                                                        <option>--Jabatan Panitera--</option>

                            <?php
                          foreach($query7->result() as $q) { ?>
                            <option value="<?= $q->jabatan; ?>"><?= $q->jabatan; ?></option>
                                                    <?php } ?>

                          </select>
                          <div class="form-group">
                          
                          <select name="panitera" class="custom-select">
                                                        <option>--Panitera--</option>

                             <?php
                          foreach($query7->result() as $q) { ?>
                            <option value="<?= $q->nama; ?>"><?= $q->nama; ?></option>
                                                    <?php } ?>

                          </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Ketua pengadilan -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col">
                         <select name="jabatan_ketua" class="custom-select">
                                                        <option>--Jabatan Ketua--</option>

                            <?php
                          foreach($query7->result() as $q) { ?>
                            <option value="<?= $q->jabatan; ?>"><?= $q->jabatan; ?></option>
                                                    <?php } ?>

                          </select>
                          <div class="form-group">
                          
                          <select name="ketua" class="custom-select">
                                                        <option>--Ketua--</option>

                             <?php
                          foreach($query7->result() as $q) { ?>
                            <option value="<?= $q->nama; ?>"><?= $q->nama; ?></option>
                                                    <?php } ?>

                          </select>
                          <div class="form-group mt-3">
                            <select name="bulan2" required="" style="">
                        <option disabled="" selected="">--Pilih Bulan--</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
                      <select name="tahun2" required="">
                        <option disabled="" selected="">--Pilih Tahun--</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                      </select>
                            <button type="submit" name="submit" class="btn btn-success mt-2" style="width: 100%">Print Berita Acara</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>





                </div>

              </form>

            </div>




              </div>
              <!-- /.container-fluid