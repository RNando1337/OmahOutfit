<html>

<head>
    <title>OmahOutfit Indonesia | Jual Beli Pakaian Kekinian</title>
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


        
    <h2>Edit Produk</h2>
    <form action="<?= base_url() ?>myproduct/edit?id=<?= $this->input->get('id') ?>" method="post" enctype="multipart/form-data">
      <table class="table w-50">
        <tbody>
          <tr>
              <?php foreach($show_data->result_array() as $row) { 
                    $id = $row['productID'];
                    $nama = $row['productName'];
                    $kat =$row['kategori'];
                    $hrg =$row['productPrice'];
                    $stok = $row['productStok'];
                    $desk = $row['productDesk'];
                    $gbr= $row['productImage'];
              }
              ?>

              

            <th scope="row">Nama Barang</th>
            <td><input type="text" name="nama" value="<?= $nama ?>" placholder="Masukan Kategori Barang" class="form-control" required></td>
          </tr>
          <tr>
            <th scope="row">Kategori Barang</th>
            <td><select class="form-control" name="kat">
                    <?php foreach($semua_kategori->result_array() as $row){ ?>
                    <option <?php if($kat == $row['kategori']){echo "selected";}?>><?= $row['kategori'] ?></option>
                    <?php }?> 
            </select></td>
          </tr>
          <tr>
            <th scope="row">Harga Barang</th>
            <td><input type="number" name="harga" value="<?= $hrg ?>" placholder="Masukan Harga Barang" class="form-control" required></td>
          </tr>
          <tr>
            <th scope="row">Stok Barang</th>
            <td><input type="number" name="stok" value="<?= $stok ?>" placholder="Masukan Stok Barang" class="form-control" required></td>
          </tr>
          <tr>
            <th scope="row">Deskripsi Barang</th>
            <td><textarea type="text" name="deskripsi" placholder="Masukan Deskripsi Barang" class="form-control" rows="4" required><?= $desk ?></textarea></td>
          </tr>
          <tr>
            <th scope="row">Gambar</th>
            <td>
            <img src="<?= base_url() ?>images/product/<?= $gbr ?>" style="width:200px; height:200px; padding-bottom: 3px;">
            <input type="file" <?php form_error('gambar') ?'is-invalid':'' ?>class="form-control-file" name="gambar"></td>
            <input type="hidden" name="old_image" value="<?= $gbr ?>">
            <div class="invalid-feedback">
                <?php echo form_error('gambar') ?>
            </div>
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