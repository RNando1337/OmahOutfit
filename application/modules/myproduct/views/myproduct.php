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
     
    <script type="text/javascript" src="<?php echo base_url("assets/dist/config.js") ?>"></script>
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

    <!-- content -->
    <div class="container-fluid p-5">
    <h2>Produk Saya</h2>
    <div class="float right">
            <form class="mt-1" style="display: flex;" method="post">
                    <!-- Kat -->
                    <input class="search-input p-2" id="search_text" type="text" size="50" name="barang" maxlength="10"
                        placeholder="Cari Produk Saya">
                    
                </form>
                </div>

<div id="result"></div>
                
<!-- 
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Gambar</th>
          <th class="w-25" scope="col">Nama</th>
          <th class="w-25" scope="col">Kategori</th>
          <th class="w-25" scope="col">Deskripsi</th>
          <th scope="col">Stok</th>
          <th class="w-25" scope="col">Harga</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>


            

        <?php
        $no = 1;
        foreach($data->result_array() as $row):
            
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><img src="http://localhost/e-Commerce/OmahOutfit/images/product/<?= $row['productImage']; ?>" width="150px" height="150px"></td>
            <td><?= $row['productName']; ?></td>
            <td><?= $row['kategori'] ?></td>
            <td><?= $row['productDesk']; ?></td>
            <td><?= $row['productStok']; ?></td>
            <td><?= $this->mdl_product->rupiah($row['productPrice']); ?></td>
            <td><a href="<?= base_url() ?>myproduct/edit?id=<?= $row['productID']; ?>"><i class='fas fa-edit' style='color: green;'></i>
              </a>&nbsp<a href='<?= base_url() ?>myproduct/hps?id=<?= $row['productID']; ?>'><i class='far fa-times-circle' style='color: red;'></i>
              </a></td>
          </tr>

        <?php
        endforeach;
        ?>
      </tbody>
    </table> -->
  
                        <div class="row">
							<div class="col" >
                            <div id="pagination_link"></div>
							</div>
						</div>

    </div>
    <!-- end Of Content -->

    

    <!-- end Of Footer -->

</body>

</html>