<html>

<head>
    <title><?= $rules ?> | OmahOutfit</title>
    <meta charset=utf-8 />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url("assets/css/styles.css") ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="<?php echo base_url("assets/dist/css/bootstrap.min.css") ?>" rel="stylesheet" />
    <link href="<?php echo base_url("assets/css/custom.css") ?>" rel="stylesheet" />
    <script type="module" src="<?php echo base_url("assets/js/src/carousel.js") ?>"></script>
     <!-- Javascript -->
     <script type="text/javascript" src="<?php echo base_url("assets/dist/js/jquery.min.js") ?>"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/popper.min.js") ?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/bootstrap.min.js") ?>"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/mdb.min.js") ?>"></script>
</head>

<body>

    <!--Navbar -->
        <?php
            $this->load->view('template/header');
        ?>

    <!-- end Of Navbar -->

    <!-- content -->
    <div class="container-fluid p-5">


        
    <h2>Ubah Profil</h2>
    <span class="wrongMsg"><?php if($this->input->post('Simpan')){echo "*".validation_errors(); } ?></span>
    <form action="<?= base_url() ?>myaccount/index" method="post">
      <table class="table w-50">
        <tbody>
        <?php
          foreach($pengguna as $row):
            ?>
          <tr>
            <th scope="row">Nama Pengguna</th>
            <td><input type="text" name="nama" value="<?= $row['name'] ?>" placholder="Masukan Kategori Barang" class="form-control" required></td>
          </tr>
          <tr>
            <th scope="row">Telp</th>
            <td><input type="text" name="telp" value="<?= $row['telp'] ?>" placholder="Masukan Stok Barang" class="form-control" required></td>
          </tr>
          <tr>
            <th scope="row">Alamat</th>
            <td><textarea type="text" name="Alamat" placholder="Masukan Deskripsi Barang" class="form-control" rows="4" required><?= $row['Alamat'] ?></textarea></td>
          </tr>
          <tr>
            <th scope="row">Konfirmasi Password</th>
            <td><input type="password" name="pass" value="" placholder="Masukan Stok Barang" class="form-control" required></td>
          </tr>

          <?php
            endforeach;
          ?>

          <tr>
            <td></td>            
            <td><input type="submit" class="btn submitBox navColor" style="color:white;" value="Simpan" name="Simpan"></td>
          </tr>
        </tbody>
    </form>

                </div>
    <!-- end Of Content -->

    

    <!-- end Of Footer -->

</body>

</html>