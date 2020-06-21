<html>

<head>
    <title>OmahOutfit Indonesia | Jual Beli Pakaian Kekinian</title>
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
          $this->load->view('template/header')
        ?>
    <!-- end Of Navbar -->

    <!-- content -->
    <div class="container-fluid p-5">

        
    <h2>Tambah Produk</h2>
    <form action="<?= base_url() ?>addproduct/product/tbh" method="post" enctype="multipart/form-data">
      <table class="table w-50">
        <tbody>
          <tr>
            <th scope="row">Nama Barang</th>
            <td><input type="text" name="nama" placholder="Masukan Kategori Barang" class="form-control" required></td>
          </tr>
          <tr>
            <th scope="row">Kategori Barang</th>
            <td><select class="form-control" name="kat">
                    <?php foreach($semua_kategori->result_array() as $row){ ?>
                    <option value="<?= $row['category_id'] ?>"><?php echo $row['kategori'];?></option>
                    <?php }?> 
            </select></td>
          </tr>
          <tr>
            <th scope="row">Harga Barang</th>
            <td><input type="number" name="harga" placholder="Masukan Harga Barang" class="form-control" required></td>
          </tr>
          <tr>
            <th scope="row">Stok Barang</th>
            <td><input type="number" name="stok" placholder="Masukan Stok Barang" class="form-control" required></td>
          </tr>
          <tr>
            <th scope="row">Deskripsi Barang</th>
            <td><textarea type="text" name="deskripsi" placholder="Masukan Deskripsi Barang" class="form-control" rows="4" required></textarea></td>
          </tr>
          <tr>
            <th scope="row">Gambar</th>
            <td><input type="file" class="form-control-file" name="gambar"></td>
          </tr>
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