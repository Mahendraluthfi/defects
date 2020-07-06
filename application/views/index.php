<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets/mas_icon.png') ?>">

    <title>Dashboard E-Portal</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><img src="<?php echo base_url() ?>assets/mas_icon.png" height="20" alt="" style="margin-bottom: 5px;"> MAS SUMBIRI</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="<?php echo base_url('login/logout') ?>"><span data-feather="log-out"></span> Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2) == ""){echo "active";} ?>" href="<?php echo base_url('dashboard') ?>">
                  <span data-feather="home"></span>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2) == "line"){echo "active";} ?>" href="<?php echo base_url('dashboard/line') ?>">
                  <span data-feather="git-commit"></span>
                  Line
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2) == "defect"){echo "active";} ?>" href="<?php echo base_url('dashboard/defect') ?>">
                  <span data-feather="x-circle"></span>
                  Defect
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2) == "input" || $this->uri->segment(2) == "input_add"){echo "active";} ?>" href="<?php echo base_url('dashboard/input') ?>">
                  <span data-feather="users"></span>
                  Input Data
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($this->uri->segment(2) == "report"){echo "active";} ?>" href="<?php echo base_url('dashboard/report') ?>">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>              
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <?php $this->load->view($content); ?>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="<?php echo base_url() ?>assets/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>    
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace();
        
            $('#example').DataTable();
            $('#example2').DataTable({
                "pageLength": 50
            });
            $('.select2').select2();


                  
    </script>

    <!-- Graphs -->
  </body>
</html>
