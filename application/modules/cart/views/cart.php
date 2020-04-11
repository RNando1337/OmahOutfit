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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function(){
        var totalakhir;
        var nilaibaru;
        var angka,split,sisa,rupiah,ribuan;
        var harga = $('#harga').text();
        var maxvalue = $("#maxvalue").val();
        var totalAkhir = $('#TotalAkhir').text();
         $('#btn-min').click(function(){
            var getqty = $('#qty').val();
            if(getqty == 0) {
                nilaibaru=0;
                totalakhir = parseInt(nilaibaru*convertToAngka(harga));
            }else{
                nilaibaru = parseInt(getqty)-1;
                totalakhir = parseInt(nilaibaru*convertToAngka(harga));
            }
            $('#qty').val(nilaibaru);
            $('#total').text(rupiahformat(totalakhir, 'Rp. '));
            $('#TotalAkhir').text(rupiahformat(totalakhir, 'Rp. '));

         });
         $('#btn-plus').click(function(){
            var getqty = $('#qty').val();
            if(getqty==maxvalue){
                nilaibaru = maxvalue;
                totalakhir = parseInt(nilaibaru*convertToAngka(harga));
            }else{
                nilaibaru = parseInt(getqty)+1;
                totalakhir = parseInt(nilaibaru*convertToAngka(harga));
            }
            $('#qty').val(nilaibaru);
            $('#total').text(rupiahformat(totalakhir, 'Rp. '));
            $('#TotalAkhir').text(rupiahformat(totalakhir, 'Rp. '));
            
         });

         function rupiahformat(value,matauang)
         {
             angka          = value.toString().replace(/[^,\d]/g, '');
             split   		= angka.split('.'),
			 sisa     		= split[0].length % 3,
			 rupiah     	= split[0].substr(0, sisa),
			 ribuan     	= split[0].substr(sisa).match(/\d{3}/gi);

             if(ribuan){
                separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
             }

             rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			 return matauang == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
         }

         function convertToAngka(rupiah)
         {
	        return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
         }
    });
     </script>
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
            <a class="navbar-brand" href="<?= base_url() ?>"><img class="head-img" src="<?= base_url() ?>images/LogoNew.png" width="180px" height="45px" /></a>
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
                            <a class="nav-link" href="<?= base_url() ?>cart">
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
                          <a class="dropdown-item" href="'.base_url().'product/add">Tambah Product</a>
                          <a class="dropdown-item" href="'.base_url().'product">My Product</a>
                          
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
    <div class="container-fluid p-5 mt-3 mb-5">
    <div class="row">
         <div class="col">
         <h4>Keranjang Saya</h4>
         </div>
         <div class="col">
         <button class="btn-lanjutkan" style="color:white; letter-spacing:1px;" onClick="location.href='<?= base_url() ?>'">Lanjutkan Belanja ></button>
         </div>
         </div>
         <div class="garisX"></div>

<!-- loop barang -->
<?php foreach($cart as $row) { ?>
            <div class="row mt-3">

                <div class="col-sm-2">
                <img class="card-img-top" src="<?= base_url() ?>images/product/<?= $row['productImage'] ?>" alt="Card image cap" />
                </div>

                <div class="col-sm-4">
                <span><?= $row['productName'] ?></span>
                </div>

                <div class="col-sm-2 mt-1">
                <span id="harga"><?= $this->mdl_cart->rupiah($row['productPrice']) ?></span>
                </div>

                <div class="col-sm-2">
                <div class="w-responsive p-0">
                            <form style="display: flex;">
                            <input type="hidden" id="maxvalue" value="<?= $row['productStok'] ?>">
                                        <button type="button" class="btn-minplus" id="btn-min"><i class="fas fa-minus"></i></button>
                                        <input class="qty" id="qty" type="text" value="<?= $row['totalBeli'] ?>">
                                        <button type="button" class="btn-minplus" id="btn-plus"><i class="fas fa-plus"></i></button>
                            </form>
                                </div>
                </div>

                <div class="col-sm-2">
                <h6 class="font-weight-bold float-right" id="total" style=""><?= $this->mdl_cart->rupiah($row['totalBeli']*$row['productPrice']) ?></h6>
                </div>

            </div>

<?php } ?>

            <!-- loop -->

            <div class="garisX mt-3"></div>

            <div class="row mt-3">
            <div class="col-8 ">
            </div>

            <div class="col ">

            <div class="row mt-2">
                <div class="col-6 ">
                Total Akhir
                </div>
                <div class="col ">
                <h6 class="font-weight-bold float-right" id="TotalAkhir"> <?= $this->mdl_cart->rupiah($row['totalBeli']*$row['productPrice']) ?> </h6>
                </div>
            </div>

            <div class="row mt-3 float-right">
            <button class="btn-checkout">Checkout ></button>
            </div>

            </div>
            </div>

         </div>
    </div>
    <!-- end Of Content -->

    <!-- Footer -->

    <div class="footer position-relative">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2">
                    <div class="footer-content-title">Kategori</div>
                    <div class="footer-content-list">
                        <ul id="Akun Saya">
                            <li>
                                <a href="#">Baju</a>
                            </li>
                            <li>
                                <a href="#">Celana</a>
                            </li>
                            <li>
                                <a href="#">Headband</a>
                            </li>
                            <li>
                                <a href="#">Gelang</a>
                            </li>
                            <li>
                                <a href="#">Kaos Kaki</a>
                            </li>
                            <li>
                                <a href="#">Sepatu</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-2">
                    <div class="footer-content-title">Bantuan</div>
                    <div class="footer-content-list">
                        <ul id="Akun Saya">
                            <li>
                                <a href="#">Lupa Password?</a>
                            </li>
                            <li>
                                <a href="#">Help</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-2">
                    <div class="footer-content-title">Akun Saya</div>
                    <div class="footer-content-list">
                        <ul id="Akun Saya">
                            <li>
                                <a href="#">Login / Register</a>
                            </li>
                            <li>
                                <a href="#">Keranjang Saya</a>
                            </li>
                            <li>
                                <a href="#">Order Status</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-2">
                    <div class="footer-content-title">Ikuti Kami</div>
                    <div class="footer-content-list">
                        <ul id="Akun Saya">
                            <li>
                                <a href="#"><i class="fab fa-facebook iconSize-content"></i> Facebook</a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-instagram iconSize-content"></i> Instagram</a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-twitter-square iconSize-content"></i> Twitter</a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-youtube iconSize-content"></i> Youtube</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-4">
                    <div class="footer-content-title"><img src="<?= base_url() ?>images/LogoNew.png"></div>
                    <div class="footer-content-list">OmahOutfit merupakan marketplace yang bertujuan untuk
                        memberikan peluang usaha kepada designer pakaian,designer grafis, dan para designer lainnya
                        untuk membuat produk design pakaian/brand pakaiannya sendiri yang kemudian di pasarkan melalui
                        perantara OmahOutfit.</div>
                </div>
            </div>
        </div>
        <div class="garisX"></div>
        <div class="footer-copyright">Copyright &copy 2020 OmahOutfit.com</div>

    </div>

    <!-- end Of Footer -->

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/popper.min.js") ?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/bootstrap.min.js") ?>"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/mdb.min.js") ?>"></script>

</body>

</html>