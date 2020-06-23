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
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/jquery.min.js") ?>"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
     <script type="text/javascript">
     $(document).ready(function(){
        var value;
        var maxvalue = $("#stok").val();
        

        $("#btn-min").click(function(){
            var getqty = $("#qty").val();
            if(getqty == 0){
                value = 0;
            }else{
                value = parseInt(getqty)-1;
            }
            $("#qty").val(value);
        });

        $("#btn-plus").click(function(){
            var getqty = $("#qty").val();
            if(getqty == maxvalue){
                value = maxvalue;
            }else{
                value = parseInt(getqty)+1;
            }
            $("#qty").val(value);
        });

        $("#qty").change(function(){
            var qty = $("#qty").val();
            if($(this).val() >= maxvalue){
                alert("test")
                $(this).val(maxvalue);
            }
        });

     });
     
     </script>
</head>

<body>

    <!--Navbar -->

        <?php
          $this->load->view('template/header')
        ?>

    <!-- end Of Navbar -->

    
    
    <!-- content -->
    <div class="container">
    <?php foreach($product->result_array() as $row) { 
        $prod_id = $row['productID'];
        $gambar = $row['productImage'];
        $nama = $row['productName'];
        $harga = $row['productPrice'];
        $stok = $row['productStok'];
        $desk = $row['productDesk'];
        
    }
    ?>
                    <!-- product header -->
                <div class="produ">
                <div class="row">

                    <div class="col-sm-6">
                        <img class="card-img-top" src="<?=base_url()?>images/product/<?= $gambar ?>" alt="Card image cap" class="fullwidth" />
                    </div>

                    <div class="col-sm-6">
                            <h3 class="prod-tittle"><?= $nama ?></h3>
                                <div class="garisX mb-3"></div>
                                    <div class="row">
                                        <div class="col-3">
                                        <span>Harga</span>
                                        </div>
                                        <div class="col">
                                        <span class="prod-price"><?= $this->mdl_product->rupiah($harga) ?></span>
                                        </div>
                                    </div>

                                <div class="garisX mb-3 mt-1"></div>
                                        <div class="row">
                                        <div class="col-3">
                                        <span>Jumlah</span>
                                        </div>
                                        <div class="col">
                                        <span>Stok Tersisa</span><span> <?= $stok ?></span>
                                        <div class="clearfix"></div>
                                        <div class="w-responsive p-0 mt-2" style="width:25%;">
                                        <div class="stok">
                                        <input type="hidden" id="stok" value="<?= $stok ?>">
                                        <form action="<?= base_url() ?>Products?prodID=<?= $prod_id ?>" method="POST" style="display:flex;">
                                        <button type="button" class="btn-minplus" id="btn-min"><i class="fas fa-minus"></i></button>
                                        <input class="qty" id="qty" type="text"  value="1">
                                        <button type="button" class="btn-minplus" id="btn-plus"><i class="fas fa-plus"></i></button>
                            </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                
                        <button type="submit" class="produ-btn" name="Simpan"><i class="fas fa-cart-plus"></i>&nbsp Masukan Keranjang</button>
                        </form>
                
                </div>

                </div>
                </div>
                    
                <div class="desk-header">Deskripsi Produk</div>
                <div class="desk">
                    <span class="prod-desk"><?= $desk ?></span>
                </div>
                    <!-- end -->


                    

    </div>
    <!-- end Of Content -->

   

    <!-- end Of Footer -->

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