
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>SPP - Berita acara</title>
  </head>
  <body>
    <div class=" card-body">
      <div class="container">
        
      
      <div class="table-">

        <?php 
        $daftar_hari = array(
                 'Sunday' => 'Minggu',
                 'Monday' => 'Senin',
                 'Tuesday' => 'Selasa',
                 'Wednesday' => 'Rabu',
                 'Thursday' => 'Kamis',
                 'Friday' => 'Jumat',
                 'Saturday' => 'Sabtu'
                );
                $date= date('d-m-Y');
                $namahari = date('l', strtotime($date));

         ?>

        <div class="card-header py-3 mt-3">
          <h5 class="m-0 font-weight-bold text-" style="text-align: center">BERITA ACARA REKONSILIASI</h5>
          <h5 class="m-0 font-weight-bold text-" style="text-align: center">KAS KEUANGAN PERKARA</h5>
          <p class="mt-4">Pada hari ini <?= $daftar_hari[$namahari]; ?>, tanggal <?= date('d-m-Y') ?>, telah dilakukan rekonsiliasi dengan kondisi sebagai berikut:</p>
        </div>



      </div>

      <form action="" method="POST" enctype="multipart/form-data">
         <?php
                
                foreach($query->result() as $q) {
              $pengeluaran =  + $q->sisa_panjar + $q->negara_panjar + $q->panggilan_penggugat + $q->panggilan_tergugat + $q->panggilan_pemohon + $q->pemberitahuan_penggugat + $q->pemberitahuan_tergugat + $q->pemeriksaan +  $q->materai +  $q->pnbp +  $q->biaya_proses + $q->redaksi  + $q->delegasi;
                $penerimaan = $q->panjar1 + $q->panjar2 +$q->panjar3 +$q->panjar4 + $q->tambah_panjar;

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

                $jumlah1 = ($query9['saldo'] + $total_penerimaan) - $total_pengeluaran;
                $jumlah2 = ($saldo_konsinyasi + $penerimaan_konsinyasi) - $pengeluaran_konsinyasi;
                $jumlah3 = ($saldo_eksekusi + $penerimaan_eksekusi) - $pengeluaran_eksekusi;
                $jumlah4 = ($saldo_pidana + $penerimaan_pidana) - $pengeluaran_pidana;
                $jumlah5 = ($saldo_proses + $penerimaan_proses) - $pengeluaran_proses;


                $saldo_pembukuan = $jumlah1 + $jumlah2 + $jumlah3 + $jumlah4 +$jumlah5; 

                $uang_tunai = $saldo_pembukuan - $saldo_bank;
                $perkara_tunai = $uang_tunai - $jumlah5;

                $saldo_kas = $uang_tunai + $saldo_bank + $materai;
                
               ?>
        <div class="row margin-0 mt-3">
          <div class="col">
            <!-- I buku keuangan perkara -->
            <div class="form-group">
              <p for="exampleFormControlInput1" class="form-label text-dark "> <strong> Menurut buku :</strong></p>
              <label for="exampleFormControlInput1" class="form-label text-dark "> <strong> I Buku Induk Keungan Perkara</strong></label>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">a. Saldo bulan lalu</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?=  number_format($query9['saldo'],2,',','.'); ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">b. Penerimaan</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?=  number_format($total_penerimaan,2,',','.'); ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">c. Pengeluaran</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?=  number_format($total_pengeluaran,2,',','.'); ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label"> <strong> Jumlah I </strong></label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?=  number_format($jumlah1,2,',','.'); ?>">
                </div>
              </div>
            </div>
            <!-- II buku keungan konsinyasi -->
            <div class="form-group">
              <label for="exampleFormControlInput1" class="form-label text-dark"> <strong> II Buku Keungan Konsinyasi</strong></label>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">a. Saldo bulan lalu</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?=  number_format($saldo_konsinyasi,2,',','.'); ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">b. Penerimaan</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($penerimaan_konsinyasi,2,',','.') ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">c. Pengeluaran</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($pengeluaran_konsinyasi,2,',','.') ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label"> <strong> Jumlah II</strong></label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($jumlah2,2,',','.') ?>">
                </div>
              </div>
            </div>
            <!-- III buku keungan eksekusi -->
            <div class="form-group">
              <label for="exampleFormControlInput1" class="form-label text-dark"> <strong> III Buku Keungan Eksekusi</strong></label>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">a. Saldo bulan lalu</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($saldo_eksekusi,2,',','.') ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">b. Penerimaan</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($penerimaan_eksekusi,2,',','.') ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">c. Pengeluaran</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($pengeluaran_eksekusi,2,',','.') ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label"> <strong> Jumlah III</strong></label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($jumlah3,2,',','.') ?>">
                </div>
              </div>
            </div>
            <!-- IV buku keungan pidana -->
            <div class="form-group">
              <label for="exampleFormControlInput1" class="form-label text-dark"> <strong> IV Buku Keuangan Pidana </strong> </label>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">a. Saldo bulan lalu</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($saldo_pidana,2,',','.') ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">b. Penerimaan</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($penerimaan_pidana,2,',','.') ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">c. Pengeluaran</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($pengeluaran_pidana,2,',','.') ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label"> <strong> Jumlah IV </strong> </label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($jumlah4,2,',','.') ?>">
                </div>
              </div>
            </div>
            <!-- V buku keunangan proses -->
            <div class="form-group">
              <label for="exampleFormControlInput1" class="form-label text-dark"> <strong> V Buku Keuangan Proses </strong> </label>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">a. Saldo bulan lalu</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($saldo_proses,2,',','.') ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">b. Penerimaan</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($penerimaan_proses,2,',','.') ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">c. Pengeluaran</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($pengeluaran_proses,2,',','.') ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label"> <strong> Jumlah V </strong></label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($jumlah5,2,',','.') ?>">
                </div>
              </div>
            </div>
            <!-- jumlah -->
            <div class="form-group">
              <div class="mb row">
                <label for="staticEmail" class="col-sm-2 col-form-label"> <strong> Saldo Pembukuan (I+II+III+IV+V)</strong></label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($saldo_pembukuan,2,',','.'); ?>">
                </div>
              </div>
            </div>
            <!-- pembatas -->
            <div class="form-group">
              <label for="exampleFormControlInput1" class="form-label text-dark"> <strong> Menurut Kas :</strong></label>
              <div class="mb row">
                <label for="staticEmail" class="col-sm-2 col-form-label">1. Uang Tunai *)</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($uang_tunai,2,',','.'); ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class=" row">
                <label for="staticEmail" class="col-sm-2 col-form-label">2. Saldo Bank</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($saldo_bank,2,',','.') ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class=" row">
                <label for="staticEmail" class="col-sm-2 col-form-label">3. Materai</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($materai,2,',','.') ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class=" row">
                <label for="staticEmail" class="col-sm-2 col-form-label"> <strong> Saldo Kas</strong></label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($saldo_kas,2,',','.'); ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class=" row">
                <label for="staticEmail" class="col-sm-2 col-form-label"> <strong> Selisih </strong> </label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="-">
                </div>
              </div>
            </div>
            <!-- akhir -->
            <div class="form-group">
              <label for="exampleFormControlInput1" class="form-label text-dark">Termasuk Dalam Saldo Bank Tersebut :</label>
              <div class="mb row">
                <label for="staticEmail" class="col-sm-2 col-form-label"> - Jasa giro belum ditarik</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($jasa_giro,2,',','.') ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class=" row">
                <label for="staticEmail" class="col-sm-2 col-form-label"> - Uang pihak ke-3 belum dibuku</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($uang_pihak3,2,',','.') ?>">
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <div class=" row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Selisih kurang *)</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="-">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1" class="form-label text-dark">Keterangan :</label>
              <div class="mb row">
                <label for="staticEmail" class="col-sm-2 col-form-label"> *) Keuangan biaya proses tunai </label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($jumlah5,2,',','.') ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class=" row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Keuangan biaya perkara tunai</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= number_format($perkara_tunai,2,',','.'); ?>">
                </div>
              </div>
            </div>

<table style="width: 1100px; margin-top: 100px;">

  <tr>
    <td style="padding-bottom: 100px; "><?= $user['jabatan'] ?></td>
    <td style="padding-bottom: 100px; "><?= $jabatan_panitera; ?> </td>
  </tr>
  <tr style="font-weight: bold;">
    <td><?= $user['nama'] ?></td>
    <td > <?= $panitera; ?></td>
  </tr>
  <tr style="text-align: center;">
    <td colspan="2" style="padding-bottom: 100px; padding-top: 40px;" >Mengetahui</td>
  </tr>
  <tr style="text-align: center;">
    <td colspan="2" ><?= $jabatan_ketua; ?></td>
  </tr>
  <tr style="text-align: center;">
  <td style="font-weight: bold;" colspan="2"><?= $ketua; ?></td>
  </tr>
</table>



          </div>





        </div>

      </form>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>