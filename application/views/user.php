<!-- Begin Page Content -->
        <div class="container-fluid">


          <!-- kosong -->
          <!-- Page Heading -->
          <!-- kontent -->
          <h1 class="h4 mb-4 text-gray-800">Pengolahan Data User</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <a class="m-0 font-weight-bold text-primary"></a> -->
              <a class="btn text-white merah" href="<?= base_url('welcome/v_tambah_user'); ?>"><em class="fa fa-plus"> Tambah Data </em> </a>
            </div>

            <div class=" card-body">
              <?= $this->session->flashdata('message'); ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="table table-success">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Photo</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                         $no=1;
                         foreach($query->result() as $q) { ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $q->nama; ?></td>
                        <td><?= $q->jabatan; ?></td>
                        <td><?= $q->username; ?></td>
                        <td><?= $q->password; ?></td>
                        <td><img src="<?= base_url('assets/img/').$q->photo; ?> " width="70"></td>
                        <td>
                          <a href="<?= base_url('welcome/edit_user/').$q->id_user; ?>"><i class="fa fa-edit" style="color:#2DB28B "></i></a> 
                        </td>
                      </tr>
                       <?php $no++; } ?> 

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->