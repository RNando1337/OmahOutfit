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
        <?php
          $this->load->view('template/header')
        ?>
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
            <button class="btn-checkout" name="checkout" data-toggle="modal" data-target="#exampleModalCenter">Checkout ></button>
            </div>

            </div>
            </div>

         </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Checkout Berhasil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Pemesanan barang akan segera diproses
                    <div class="clearfix"></div>
                    <div class="clearfix"></div>
                    NB : Laporkan jika terjadi penipuan ke kontak di bawah ini
                    <div class="clearfix"></div>
                    projectomahoutfit@gmail.com
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-checkout btn-sm" style="color:white;" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end Of Content -->

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/popper.min.js") ?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/bootstrap.min.js") ?>"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url("assets/dist/js/mdb.min.js") ?>"></script>

</body>

</html>