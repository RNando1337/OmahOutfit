
<html>

<head>
  <title>Online Shop</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/bootstrap.min.css") ?>">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/mdb.min.css") ?>">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/style.css") ?>">
    <link href="<?php echo base_url("assets/css/styles.css") ?>" rel="stylesheet" />

  <style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans');

    body {
      margin: 0;
      padding: 0;
      font-family: 'open sans', 'tahoma', sans-serif;
    }

    .garisY {
      width: 1px;
      background: #e0e0e0;
    }

    .garisX {
      height: 1.5px;
      background: #e0e0e0;
    }

    #ex3 .fa-stack[data-count]:after {
      position: absolute;
      right: 0%;
      top: 1%;
      content: attr(data-count);
      font-size: 55%;
      padding: .45em;
      border-radius: 50%;
      border: 1px solid white;
      line-height: .8em;
      color: white;
      background: rgba(255, 0, 0, 0.85);
      text-align: center;
      min-width: 1em;
      font-weight: bold;
    }

    select {
      border: 0;
      margin: 2px;
      border-right: 1px solid grey;
      max-width: 5.5em;
      outline: none;
      color: grey;
    }

    .footer {
      color: #ffffff;
    }

    .list {
      font-size: .9em;
      list-style-type: none;
    }

    .list li a {
      color: #ffffff;
      letter-spacing: 0.8px;
    }

    .list li a:hover {
      color: #eee0e0;
    }

    .box {
      box-model: border-box;
      background-clip: padding-box;
    }
  </style>

</head>

<body>

<nav class="navbar navbar-expand-sm navbar-dark navColor pr-4 sticky-top">
  <a class="navbar-brand" href="<?= base_url() ?>4dm1n/dashboard">Administrator</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url($this->uri->uri_string()); ?>">Home</a>
      </li>
      <li class="nav-item dropdown" id="master">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
          Data Master
        </a>
        <div class="dropdown-menu" id="dropdownMaster" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url()?>4dm1n/kategori">Kategori</a>
          <a class="dropdown-item" href="#">Product List</a>
        </div>
      </li>
      <li class="nav-item dropdown" id="master">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
          Settings
        </a>
        <div class="dropdown-menu" id="dropdownMaster" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Slider</a>
          <a class="dropdown-item" href="#">Pesan</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('adminpanel/dashboard/logout') ?>">Logout</a>
      </li>
    </ul>

  </div>
</nav>
  <div class="container mt-5">
    <h2>Data Kategori</h2>
    <form action="<?= base_url() ?>4dm1n/addKategori" method="post" enctype="multipart/form-data">
      <table class="table w-50">
        <tbody>
          <tr>
            <th scope="row">Kategori</th>
            <td><input type="text" name="kat" placholder="Masukan Kategori Barang" class="form-control" required></td>
          </tr>
            <td></td>
            <td><input type="submit" class="btn btn-sm light-blue darken-3" style="color:white;" value="Simpan" name="Simpan"></td>
          </tr>
        </tbody>
    </form>




    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kategori Kode</th>
          <th class="w-25" scope="col">Kateogri</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $no = 1;
        foreach($data->result_array() as $row) {

        ?>
          <tr>
            <td><?= ++$start; ?></td>
            <td><?= $row['category_id']; ?></td>
            <td><?= $row['kategori']; ?></td>
            <td><a href='<?= base_url() ?>4dm1n/edit?kat=<?= $row['category_id']; ?>'><i class='fas fa-edit' style='color: green;'></i>
              </a>&nbsp<a href='<?= base_url() ?>4dm1n/hapus?kat=<?= $row['category_id']; ?>'><i class='far fa-times-circle' style='color: red;'></i>
              </a></td>
          </tr>

        <?php
        }
        ?>

      </tbody>
    </table>

    <div class="row">
							<div class="col">
								<?php echo $pagination; ?>
							</div>
						</div>

  </div>

    <!-- Javascript -->
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/jquery.min.js") ?>"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/popper.min.js") ?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/bootstrap.min.js") ?>"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/mdb.min.js") ?>"></script>

    <!--/.EndJavascript-->
</body>

</html>