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
              <!-- modal ubah biaya daftar -->
              <div class="modal fade" id="ubah-data-biaya-daftar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                            <form class="mt-2" action="" method="post">
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="exampleInputPassword2">Ubah Nominal</label>
                                  <input type="text" class="form-control" id="exampleInputPassword2" name="harga_m" required>
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
                        <a href="#" data-toggle="modal" data-target="#ubah-data-biaya-daftar"><i class="fa fa-edit" style="color:#2DB28B "></i></a> 
                      </td>
                    </tr>
                    <?php $no++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- 1# BIAYA DAFTAR -->

            <!-- 1# BIAYA DAFTAR -->
            <div class="card shadow mb-4">
              <div class="card-header py-3 ">
                <!-- button modal biaya daftar-->
                <h4>Form biaya daftar</h4>
                <button type="button" class="btn btn-info merah" data-toggle="modal" data-target="#bs-example-modal-lg1"><em class="fa fa-plus"></em> Tambah Data</button>
                <!--  Modal tambah data biaya daftar-->
                <div class="modal fade" id="bs-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                              <form class="mt-2" action="<?= base_url('welcome/tambah_biaya_daftar'); ?>" method="post">
                                <div class="card-body">

                                  <div class="form-group">
                                    <label for="exampleInputPassword3">Nama Item</label>
                                    <input type="text" class="form-control" id="exampleInputPassword3" name="nama_item" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword4">Harga</label>
                                    <input type="text" class="form-control" id="exampleInputPassword4" name="harga_item" required>
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
                <?= $this->session->flashdata('message1'); ?>
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr class="table-success">
                        <th>No</th>
                        <th>Nama Item</th>
                        <th>Harga Item</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                         $no=1;
                         foreach($query1->result() as $q) { ?>
                        <tr>
                          <td><?= $no; ?></td>
                          <td><?= $q->nama_item; ?></td>
                          <td><?= $q->harga_item; ?></td>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#ubah-data-biaya-daftar<?= $q->id_biaya_daftar; ?>"><i class="fa fa-edit" style="color:#2DB28B "></i></a> |
                            <a href="<?= base_url('welcome/hapus_biaya_daftar/').$q->id_biaya_daftar; ?>" onclick="return confirm ('Yakin menghapus?');"><i class="fa fa-trash" style="color: salmon;"></i></a>
                          </td>
                        </tr>
                        <!-- modal ubah biaya daftar -->
                <div class="modal fade" id="ubah-data-biaya-daftar<?= $q->id_biaya_daftar; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                              <form class="mt-2" action="<?= base_url('welcome/edit_biaya_daftar') ?>" method="post">
                                <div class="card-body">

                                  <div class="form-group">
                                    <input type="hidden" name="id_biaya_daftar" value="<?= $q->id_biaya_daftar;?>">
                                    <label for="exampleInputPassword5">Nama Item</label>
                                    <input type="text" class="form-control" id="exampleInputPassword5" name="nama_item" required value="<?= $q->nama_item ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword6">Harga</label>
                                    <input type="text" class="form-control" id="exampleInputPassword6" name="harga_item" required value="<?= $q->harga_item ?>">
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

              <!-- 2# BIAYA PANGGILANG PENGGUGAT -->
              <hr>
              <div class="card-header py-3 ">
                <!-- button modal biaya daftar-->
                <h4>Form biaya panggilan penggugat</h4>

                <button type="button" class="btn btn-info merah" data-toggle="modal" data-target="#bs-example-modal-lg3"><em class="fa fa-plus"></em> Tambah Data</button>
                <!--  Modal tambah data biaya daftar-->
                <div class="modal fade" id="bs-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                              <form class="mt-2" action="<?= base_url('welcome/tambah_panggilan_penggugat') ?>" method="post">
                                <div class="card-body">

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Item</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="nama_item" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Harga</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="harga_item" required>
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
                <?= $this->session->flashdata('message2') ?>
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr class="table-success">
                        <th>No</th>
                        <th>Nama Item</th>
                        <th>Harga Item</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                         $no=1;
                         foreach($query2->result() as $q) { ?>
                        <tr>
                          <td><?= $no; ?></td>
                          <td><?= $q->nama_item; ?></td>
                          <td><?= $q->harga_item; ?></td>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#ubah-data-panggilan-penggugat<?= $q->id_panggilan_penggugat ?>"><i class="fa fa-edit" style="color:#2DB28B "></i></a> |
                            <a href="<?= base_url('welcome/hapus_panggilan_penggugat/').$q->id_panggilan_penggugat; ?>" onclick="return confirm ('Yakin menghapus?');"><i class="fa fa-trash" style="color: salmon;"></i></a>
                          </td>
                        </tr>
                        <!-- modal ubah biaya daftar -->
                <div class="modal fade" id="ubah-data-panggilan-penggugat<?= $q->id_panggilan_penggugat ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                              <form class="mt-2" action="<?= base_url('welcome/edit_panggilan_penggugat') ?>" method="post">
                                <div class="card-body">

                                  <div class="form-group">
                                    <input type="hidden" class="form-control" id="id_panggilan_penggugat" name="id_panggilan_penggugat" required value="<?= $q->id_panggilan_penggugat ?>" >
                                    <label for="exampleInputPassword7">Nama Item</label>
                                    <input type="text" class="form-control" id="exampleInputPassword7" name="nama_item" required value="<?= $q->nama_item ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword8">Harga</label>
                                    <input type="text" class="form-control" id="exampleInputPassword8" name="harga_item" required value="<?= $q->harga_item ?>">
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
              <!-- 2# PANGGILAN PENGGUGAT -->

              <!-- 3# BIAYA PANGGILANG TERGUGAT -->
              <hr>
              <div class="card-header py-3 ">
                <!-- button modal biaya daftar-->
                <h4>Form biaya panggilan tergugat</h4>
                <button type="button" class="btn btn-info merah" data-toggle="modal" data-target="#bs-example-modal-lg4"><em class="fa fa-plus"></em> Tambah Data</button>
                <!--  Modal tambah data biaya daftar-->
                <div class="modal fade" id="bs-example-modal-lg4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                              <form class="mt-2" action="<?= base_url('welcome/tambah_panggilan_tergugat') ?>" method="post">
                                <div class="card-body">

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Item</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="nama_item" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Harga</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="harga_item" required>
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
                <?= $this->session->flashdata('message3') ?>
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr class="table-success">
                        <th>No</th>
                        <th>Nama Item</th>
                        <th>Harga Item</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                         <?php
                         $no=1;
                         foreach($query3->result() as $q) { ?>
                        <tr>
                          <td><?= $no; ?></td>
                          <td><?= $q->nama_item; ?></td>
                          <td><?= $q->harga_item; ?></td>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#ubah-data-panggilan-terguggat<?=$q->id_panggilan_tergugat ?>"><i class="fa fa-edit" style="color:#2DB28B "></i></a> |
                            <a href="<?= base_url('welcome/hapus_panggilan_tergugat/').$q->id_panggilan_tergugat; ?>" onclick="return confirm ('Yakin menghapus?');"><i class="fa fa-trash" style="color: salmon;"></i></a>
                          </td>
                        </tr>
                        <!-- modal ubah biaya daftar -->
                <div class="modal fade" id="ubah-data-panggilan-terguggat<?=$q->id_panggilan_tergugat ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                              <form class="mt-2" action="<?= base_url('welcome/edit_panggilan_tergugat') ?>" method="post">
                                <div class="card-body">

                                  <div class="form-group">
                                    <input type="hidden" class="form-control" id="id_panggilan_tergugat" name="id_panggilan_tergugat" required value="<?= $q->id_panggilan_tergugat ?>">
                                    <label for="exampleInputPassword1">Nama Item</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="nama_item" required value="<?= $q->nama_item ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Harga</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="harga_item" required value="<?= $q->harga_item ?>">
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
              <!-- 3# BIAYA PANGGILAN TERGUGAT -->

              <!-- 4# PEMBERITAHUAN PENGGUGAT -->
              <hr>
              <div class="card-header py-3 ">
                <!-- button modal biaya daftar-->
                <h4>Form pemberitahuan penggugat</h4>
                <button type="button" class="btn btn-info merah" data-toggle="modal" data-target="#bs-example-modal-lg5"><em class="fa fa-plus"></em> Tambah Data</button>
                <!--  Modal tambah data biaya daftar-->
                <div class="modal fade" id="bs-example-modal-lg5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                              <form class="mt-2" action="<?= base_url('welcome/tambah_pemberitahuan_penggugat') ?>" method="post">
                                <div class="card-body">

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Item</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="nama_item" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Harga</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="harga_item" required>
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
                <?= $this->session->flashdata('message4') ?>
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr class="table-success">
                        <th>No</th>
                        <th>Nama Item</th>
                        <th>Harga Item</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                         <?php
                         $no=1;
                         foreach($query4->result() as $q) { ?>
                        <tr>
                          <td><?= $no; ?></td>
                          <td><?= $q->nama_item; ?></td>
                          <td><?= $q->harga_item; ?></td>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#ubah-data-pemberitahuan-penggugat<?= $q->id_pemberitahuan_penggugat ?>"><i class="fa fa-edit" style="color:#2DB28B "></i></a> |
                            <a href="<?= base_url('welcome/hapus_pemberitahuan_penggugat/').$q->id_pemberitahuan_penggugat; ?>" onclick="return confirm ('Yakin menghapus?');"><i class="fa fa-trash" style="color: salmon;"></i></a>
                          </td>
                        </tr>
                        <!-- modal ubah biaya daftar -->
                <div class="modal fade" id="ubah-data-pemberitahuan-penggugat<?= $q->id_pemberitahuan_penggugat ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                              <form class="mt-2" action="<?= base_url('welcome/edit_pemberitahuan_penggugat') ?>" method="post">
                                <div class="card-body">

                                  <div class="form-group">
                                    <input type="hidden" class="form-control" id="id_pemberitahuan_penggugat" name="id_pemberitahuan_penggugat" required value="<?= $q->id_pemberitahuan_penggugat ?>">
                                    <label for="exampleInputPassword9">Nama Item</label>
                                    <input type="text" class="form-control" id="exampleInputPassword9" name="nama_item" required value="<?= $q->nama_item ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword10">Harga</label>
                                    <input type="text" class="form-control" id="exampleInputPassword10" name="harga_item" required value="<?= $q->harga_item ?>">
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
              <!-- 4# PEMBERITAHUAN PENGGUGAT -->

              <!-- 5# PEMBERITAHUAN TERGUGAT -->
              <hr>
              <div class="card-header py-3 ">
                <!-- button modal biaya daftar-->
                <h4>Form pemberitahuan tergugat</h4>
                <button type="button" class="btn btn-info merah" data-toggle="modal" data-target="#bs-example-modal-lg6"><em class="fa fa-plus"></em> Tambah Data</button>
                <!--  Modal tambah data biaya daftar-->
                <div class="modal fade" id="bs-example-modal-lg6" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                              <form class="mt-2" action="<?= base_url('welcome/tambah_pemberitahuan_tergugat') ?>" method="post">
                                <div class="card-body">

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Item</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="nama_m" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Harga</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="harga_m" required>
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
                <?= $this->session->flashdata('message5') ?>
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr class="table-success">
                        <th>No</th>
                        <th>Nama Item</th>
                        <th>Harga Item</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                         <?php
                         $no=1;
                         foreach($query5->result() as $q) { ?>
                        <tr>
                          <td><?= $no; ?></td>
                          <td><?= $q->nama_item; ?></td>
                          <td><?= $q->harga_item; ?></td>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#ubah-data-pemberitahuan-tergugat<?= $q->id_pemberitahuan_tergugat ?>"><i class="fa fa-edit" style="color:#2DB28B "></i></a> |
                            <a href="<?= base_url('welcome/hapus_pemberitahuan_tergugat/').$q->id_pemberitahuan_tergugat; ?>" onclick="return confirm ('Yakin menghapus?');"><i class="fa fa-trash" style="color: salmon;"></i></a>
                          </td>
                        </tr>
                        <!-- modal ubah biaya daftar -->
                <div class="modal fade" id="ubah-data-pemberitahuan-tergugat<?= $q->id_pemberitahuan_tergugat ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                              <form class="mt-2" action="<?= base_url('welcome/edit_pemberitahuan_tergugat') ?>" method="post">
                                <div class="card-body">

                                  <div class="form-group">
                                    <input type="hidden" class="form-control" id="id_pemberitahuan_tergugat" name="id_pemberitahuan_tergugat" required value="<?= $q->id_pemberitahuan_tergugat ?>">
                                    <label for="exampleInputPassword11">Nama Item</label>
                                    <input type="text" class="form-control" id="exampleInputPassword11" name="nama_item" required value="<?= $q->nama_item ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword12">Harga</label>
                                    <input type="text" class="form-control" id="exampleInputPassword12" name="harga_item" required value="<?= $q->harga_item ?>">
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
              <!-- 5# BIAYA PEMBERITAHUAN TERGUGAT -->

            </div>
            <!-- akhir card -->


          </div>
          <!-- /.container-fluid -->