<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets/mas_icon.png') ?>">

    <title>E-Portal</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <?php echo form_open('login/submit', array('class' => 'form-signin')); ?>
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal"><img src="<?php echo base_url('assets/mas_icon.png') ?>" alt=""></h1>
      <h2 class="h3 mb-3 font-weight-normal">E-Portal Defect</h2>
      <?php echo $this->session->flashdata('msg'); ?>
      <label for="inputEmail" class="sr-only">EPF</label>
      <input type="text" name="epf" id="inputEmail" class="form-control" placeholder="EPF Number" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; Autonomation</p>
    <?php echo form_close(); ?>
  </body>
</html>
