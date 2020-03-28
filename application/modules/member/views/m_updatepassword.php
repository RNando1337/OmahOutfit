<html>

<head>
    <title>Log In</title>
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
                    <div class="loginText">Log in/Daftar</div>
                    <div class="loginText-desc">Loving our product is my lifestyle, Let's do it</div>
                    <div class="card-body">
                        <form action="<?php echo base_url() ?>member/reset" method="post">
                            <div class="form-group ">
                                <label>Username/E-Mail</label>
                                <input type="text" class="form-control w-100" placeholder="Username/E-Mail" name="user"
                                    />
                            </div>
                            <div class="submitBox">
                                <input type="submit" class="btn-custom" value="Reset" name="Reset" />
                            </div>
                        </form>
                        <a href="#" class="forgotLink">Lupa Password?</a>
                    </div>
                </div>
            </div>


        </div>
    </div>




</body>

</html>