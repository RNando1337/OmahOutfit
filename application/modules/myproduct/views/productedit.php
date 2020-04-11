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

    <div class="header-content navbar-expand-lg">
        <div class="container-fluid pt-1">
            <div class="box float-left pl-4">
                <span>Download the App</span>
            </div>

            <div class="box float-right pr-3">
                <a href="#"><i class="far fa-question-circle pr-1"></i>OmahOutfit Care</a>
            </div>

            <div class="box float-right pr-3">
                <a href="#">Tentang OmahOutfit</a>
            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg pr-4 navColor">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url() ?>images/LogoNew.png " width="180px" height="45px" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent-555" aria-controls="navbarSupportedContent-555"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <form class="form-set ml-3 mt-1" style="display: flex;" method="post">
                    <!-- Kat -->
                    <input class="search-input pl-2" type="text" name="barang" maxlength="50"
                        placeholder="Cari di OmahOutfit">
                    <button type="submit" class="search-button navColor float-right" name="cari"
                        id="basic-addon11"><i class="fas fa-search"></i></button>
                </form>

            <!-- Default form subscription -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
                </ul>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item pt-1 pr-3" id="ex3">
                        <span class="p1 fa-stack" data-count="0">
                            <a class="nav-link" href="#">
                                <i class="fas fa-shopping-cart navColor"></i>
                            </a>
                    </li>
                    <li class="nav-item pt-2 pr-3">
                        <a href="#">
                            <i class="fas fa-bell navColor"></i>
                        </a>
                    </li>
                    <div class="garisY"></div>
                    <!-- Login Function -->
                    <?php 
                    
                    if($this->session->userdata('username')){
                      echo '  <li class="nav-item dropdown ml-4 mr-4" style="cursor:pointer;">
                              <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                              <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" height="25px" width="25px" class="rounded-circle z-depth-0 drop">
                              <span class="drop">'.$this->session->userdata('username').'</span>
                              </a>
                       <div class="dropdown-menu" id="dropdownMaster" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="'.base_url().'product/add">Tambah Produk</a>
                        <a class="dropdown-item" href="'.base_url().'product">Produk Saya</a>
                        <a class="dropdown-item" href="'.base_url().'logout">Logout</a>
                               </div>
                          </li>';
                  }else{
                      echo '<li class="nav-item ml-3 mr-n4">
                          <a class="nav-link" style="color:white; font-size:13px;" href="'. base_url('member') .'">
                          <i class="fas fa-user"></i> Login / Register
                          </a>
                          </li>';
                  }
                    
                    ?>

                

                    <!-- end Of login function -->
                </ul>
            </div>
        </div>
    </nav>

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