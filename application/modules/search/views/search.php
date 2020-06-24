<html>

<head>
    <title>Jual <?= $title ?> | OmahOutfit Indonesia</title>
    <meta charset=utf-8 />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url("assets/css/styles.css") ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="<?php echo base_url("assets/dist/css/bootstrap.min.css") ?>" rel="stylesheet" />
    <link href="<?php echo base_url("assets/css/custom.css") ?>" rel="stylesheet" />
    <script type="module" src="<?php echo base_url("assets/js/src/carousel.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/jquery.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/dist/config.js") ?>"></script>
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

    <div class="container-fluid p-3 pl-5 pr-5">


    <div class="row">
                    <?php
                        if(!empty($products->result_array()) && !empty($title)){
                            foreach($products->result_array() as $row):
                    ?>

        <div class="col-2 mb-3 mr-n2">
                    <div class="w-100 h-75">
                        <a href="<?=base_url()?>Products?prodID=<?= $row['productID']; ?>" class="link">
                            <div class="card">
                                <img class="card-img gambar" src="<?= base_url() ?>images/product/<?= $row['productImage']; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h6 class="card-title title-product"><?= $row['productName']; ?></h6>
                                    <h6 class="card-subtitle subtitle-product">
                                        <div class="harga"><?= $this->mdl_search->rupiah($row['productPrice']); ?></div>
                                        <div class="sisa">Stok <?= $row['productStok']; ?></div>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                    <?
                    endforeach; 

                    ?>
                     </div>
                
                <?php } else {
                        
                        ?>
                        </div>
                        <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Barang Tidak Ditemukan</div>

                    <?php } ?>

                            
                       
                    <div class="row">
							<div class="col">
								<?php echo $pagination; ?>
							</div>
						</div>

    </div>

</html>
