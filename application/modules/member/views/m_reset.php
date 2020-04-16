<html>

<head>
    <title><?= $reset ?></title>
    <link href="<?php echo base_url() ?>assets/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <script src="<?php echo base_url() ?>assets/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/src/carousel.js"></script>
</head>

<body>

    <div class="container-fluid">

        <div class="logo">
            <a href="<?php echo base_url() ?>">
                <img src="<?php echo base_url() ?>images/LoginLogo.png" class="imgBox">
            </a>
        </div>

        <div class="row">

            <div class="col-6">
                <div class="bg-illustration"></div>
            </div>

            <div class="col-4">
                <div class="card loginBox float-right">
                    <div class="loginText">Reset Password</div>
                    <div class="loginText-desc">Silahkan untuk mengubah passwordmu disini.</div>
                    <div class="card-body">
                        <form action="<?php echo base_url() ?>member/reset" method="post">
                            <div class="form-group ">
                                <label>Password</label>
                                <input type="password" class="form-control w-100" placeholder="Password" name="password1"/>
                                <?= form_error('password1', '<span class="wrongMsg"> *', '</span>') ?>
                            </div>
                            <div class="form-group ">
                                <label>Ulangi Password</label>
                                <input type="password" class="form-control w-100" placeholder="Masukan Password yang sama" name="password2"/>
                                <?= form_error('password2', '<span class="wrongMsg"> *', '</span>') ?>
                            </div>
                            <div class="submitBox">
                                <input type="submit" class="btn-custom" value="Ubah Password" name="ubah" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>




</body>

</html>