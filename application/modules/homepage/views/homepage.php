<html>

<head>
    <title>OmahOutfit Indonesia | Jual Beli Pakaian Kekinian</title>
    <link href="<?php echo base_url("assets/css/styles.css") ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="<?php echo base_url("assets/dist/css/bootstrap.min.css") ?>" rel="stylesheet" />
    <link href="<?php echo base_url("assets/css/custom.css") ?>" rel="stylesheet" />
    <script type="module" src="<?php echo base_url("assets/js/src/carousel.js") ?>"></script>
</head>

<body>

    <!--Navbar -->

        <?php
          $this->load->view('template/header')
        ?>

    <!-- end Of Navbar -->

    
    
    <!-- content -->
    <div class="container-fluid p-3 pl-5 pr-5">

    <!-- Slider -->
    <!-- <div class="row">
    <div class="col">
    <div id="carouselExampleIndicators" class="carousel slide slider-size slidenya" data-ride="carousel">
        <ol class="carousel-indicators" id="floatleft">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
            <div class="carousel-inner slider-border">
                    <div class="carousel-item active">
                        <img class="d-block slider-img" src="<?= base_url() ?>images/product/1.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block slider-img" src="<?= base_url() ?>images/product/1.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block slider-img" src="<?= base_url() ?>images/product/1.png" alt="Third slide">
                    </div>
            </div>
        <a class="carousel-control-prev bannerprevious-full" style="width:40px;" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next bannernext-full" style="width:40px;" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
        </a>
    </div>
    </div>

    <div class="col">
            <div class="row"><img class="banner1" src="<?= base_url() ?>images/product/1.png"></div>
            <div class="row"><img class="banner1" src="<?= base_url() ?>images/product/1.png"></div>
    </div>

    </div> -->

    <!-- Slider End -->

    <!-- Product Terbaru -->
    <div class="box-newPRODUCT">
            <div class="box-header" style="border-radius: 5px 5xp 5px 5px;">
                    <div class="box-header-tittle">
                        Product Terbaru
                    </div>
            </div>

            <div class="row">
            <!-- Barang list -->
            <?php 
            
            if($this->session->userdata('username')){
                foreach($products->result_array() as $row) { ?>

                    <div class="col-2 mb-3 mr-n2">
                    <div class="w-100 h-75">
                        <a href="<?=base_url()?>Products?prodID=<?= $row['productID']; ?>" class="link">
                            <div class="card">
                                <img class="card-img gambar" src="<?= base_url() ?>images/product/<?= $row['productImage']; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h6 class="card-title title-product"><?= $row['productName']; ?></h6>
                                    <h6 class="card-subtitle subtitle-product">
                                        <div class="harga"><?= $this->mdl_product->rupiah($row['productPrice']); ?></div>
                                        <div class="sisa">Stok <?= $row['productStok']; ?></div>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            <?php } 
        
                  } else{
                    foreach($product->result_array() as $row) { ?>

<div class="col-2 mb-3 mr-n2">
                    <div class="w-100 h-75">
                        <a href="<?=base_url()?>Products?prodID=<?= $row['productID']; ?>" class="link">
                            <div class="card">
                                <img class="card-img gambar" src="<?= base_url() ?>images/product/<?= $row['productImage']; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h6 class="card-title title-product"><?= $row['productName']; ?></h6>
                                    <h6 class="card-subtitle subtitle-product">
                                        <div class="harga"><?= $this->mdl_product->rupiah($row['productPrice']); ?></div>
                                        <div class="sisa">Stok <?= $row['productStok']; ?></div>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


               <?php } } ?>  
                
           
                
                
                
            

            <!-- Barang list -->

        </div>
            
    </div>

    <!-- Product Terbaru End -->


    </div>
                </div>
    <!-- end Of Content -->



     <!-- Javascript -->
     <script type="text/javascript" src="<?php echo base_url("assets/dist/js/jquery.min.js") ?>"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/popper.min.js") ?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/bootstrap.min.js") ?>"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/mdb.min.js") ?>"></script>

</body>

</html>