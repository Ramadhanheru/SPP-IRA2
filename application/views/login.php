<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Free - Halaman Login</title>
  <link rel="shortcut icon" type="image/ico" href="<?= base_url(''); ?>assets/img/logo-free.png" />

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url(''); ?>assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url(''); ?>assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center justify-content-center">

  <form action="<?= base_url('auth/login'); ?>" method="POST" class="form-signin">
    <img class="mb-4" src="<?= base_url(''); ?>assets/img/logo2.jpg" alt="" width="110 ">
    <img class="mb-4" src="<?= base_url(''); ?>assets/img/logoma.png" alt="" width="110 ">
    <h1 class="h3 mb-3 font-weight-normal">Silahkan Login</h1>
   <!--  messagge here! -->
   <?= $this->session->flashdata('message'); ?>
    <label for="username" class="sr-only">username</label>
    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
     <?= form_error('username','<small class="text-danger pl-3 ">','</small>');?>
    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
     <?= form_error('password','<small class="text-danger pl-3 ">','</small>');?>
    <button class="btn btn-lg btn-block text-light merah" type="submit" name="login">Login</button>
    <p class="mt-5 mb-3 text-muted">&copy; Aplikasi SPP Kejaksaan</p>
  </form>

  <script src="<?= base_url(''); ?>assets/js/font-awesome-mix.js"> </script>
</body>

</html>