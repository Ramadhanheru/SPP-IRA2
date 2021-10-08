<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- kosong -->
          <!-- Page Heading -->
          <!-- kontent -->
          <h1 class="h3 mb-4 text-gray-800">Pengolahan Data Master</h1>

          <!-- KAS SALDO AWAL -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 ">
              <!-- button modal biaya daftar-->
              <h4>Form kas awal</h4>
              <!-- <button type="button" class="btn btn-info merah" data-toggle="modal" data-target="#bs-example-modal-lg"><em class="fa fa-plus"></em> Tambah Data</button> -->
              <!--  Modal tambah data biaya daftar-->
              <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myLargeModalLabel">Form Tambah Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-12">
                          <div class="card">
                            <form class="mt-2" action="" method="post">
                              <div class="card-body">

                                <div class="form-group">
                                  <label for="exampleInputPassword1">Nominal</label>
                                  <input type="text" class="form-control" id="exampleInputPassword1" name="nama_m" required>
                                </div>
                                <input type="submit" class="btn btn-info mb-3 merah" name="simpan" value="Simpan">
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              
            </div>
            <div class=" card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="table-success">

                      <th>Nominal</th>

                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                         $no=1;
                         foreach($query->result() as $q) { ?>
                    <tr>
                      <td><?= $q->nominal; ?></td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#ubah-data-biaya-kas<?= $q->id_kas; ?>"><i class="fa fa-edit" style="color:#2DB28B "></i></a> 
                      </td>
                    </tr>
                    <!-- modal ubah biaya daftar -->
              <div class="modal fade" id="ubah-data-biaya-kas<?= $q->id_kas; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myLargeModalLabel">Form Ubah Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-12">
                          <div class="card">
                            <form class="mt-2" action="<?= base_url('welcome/edit_kas') ?>" method="post">
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="exampleInputPassword2">Ubah Nominal</label>
                                   <input type="hidden" class="form-control" id="exampleInputPassword2" name="id_kas" value="<?= $q->id_kas ?>"required>
                                  <input type="text" class="form-control" id="exampleInputPassword2" name="nominal" value="<?= $q->nominal ?>"required>
                                </div>
                                <input type="submit" class="btn btn-info mb-3 merah" name="simpan" value="Simpan">
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
                    <?php $no++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- 1# BIAYA DAFTAR -->

           <!--  -->

              <!-- 2# BIAYA PANGGILANG PENGGUGAT -->
              <hr>
              
              <!-- 5# BIAYA PEMBERITAHUAN TERGUGAT -->

            </div>
            <!-- akhir card -->


          </div>
          <!-- /.container-fluid -->