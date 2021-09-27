<!-- Begin Page Content -->
        <div class="container-fluid">



          <!-- Page Heading -->
          <!-- kontent -->
          <h1 class="h3 mb-4 text-gray-800">Halaman Edit Data</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-dark">Edit Data Admin</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="nama_admin">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_admin" name="nama" value="<?= $query['nama']; ?>" required>
                    <?= form_error('nama','<small class="text-danger pl-3 ">','</small>');?>
                  </div>
                  <div class="form-group">
                    <label for="text">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $query['jabatan']; ?>" required>
                    <?= form_error('jabatan','<small class="text-danger pl-3 ">','</small>');?>
                  </div>
                  <div class="form-group">
                    <label for="username_admin">Username</label>
                    <input type="text" class="form-control" id="username_admin" name="username" value="<?= $query['username']; ?>">
                    <small id="username_admin" class="form-text text-muted">Maksinal 8 karakter</small>
                    <?= form_error('username','<small class="text-danger pl-3 ">','</small>');?>
                  </div>
                  <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" class="form-control" id="password" name="password" >
                    <small id="password" class="form-text text-muted">Maksinal 8 karakter</small>
                    <?= form_error('password','<small class="text-danger pl-3 ">','</small>');?>
                  </div>
                  <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                    <small id="password2" class="form-text text-muted">Maksinal 8 karakter</small>
                    <?= form_error('password2','<small class="text-danger pl-3 ">','</small>');?>
                  </div>
                  <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                    <small id="photo" class="form-text text-muted">Ukuran Maksimal 2MB dengan format JPG/PNG</small>
                    <?= form_error('photo','<small class="text-danger pl-3 ">','</small>');?>
                  </div>
                  <button type="submit" class="btn text-white merah" name="submit">Edit Data</button>
                </form>

              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->