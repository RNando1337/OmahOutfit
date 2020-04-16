<html>

<head>
    <title><?= $register ?></title>
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
                <div class="card registerBox float-right" style="margin-top:-50px;">
                    <div class="loginText">Log in/Daftar</div>
                    <div class="loginText-desc">Loving our product is my lifestyle, Let's do it</div>
                    <div class="card-body">
                        <form action="<?php echo base_url() ?>member/register" method="post">
                        <span class="wrongMsg"><?php if($this->input->post('Daftar')){echo "*".validation_errors(); } ?></span>
                        <div class="form-group ">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control w-100" value="<?php echo set_value('name') ?>" placeholder="Nama Lengkap" name="name"/>
                            </div>
                            <div class="form-group ">
                                <label>E-mail</label>
                                <input type="email" class="form-control w-100" value="<?php echo set_value('email') ?>" placeholder="E-mail" name="email"/>
                            </div>
                            <div class="form-group ">
                                <label>No. Handphone</label>
                                <input type="tel" class="form-control w-100" value="<?php echo set_value('telp') ?>" maxlength="13" placeholder="No. Handphone" name="telp"/>
                                <span class="hint">cth: 081225075776</span>
                            </div>
                            <div class="form-group ">
                                <label>Username</label>
                                <input type="text" class="form-control w-100" value="<?php echo set_value('user') ?>" placeholder="Username" name="user"/> 
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control w-100" value="<?php echo set_value('pass') ?>" placeholder="Password" name="pass"/>
                            </div>
                            <div class="submitBox">
                                <input type="submit" class="btn-custom" value="Login" name="Login" onclick="location.href='<?php echo base_url() ?>member'" />
                                <input type="submit" class="btn-custom" value="Daftar" name="Daftar" />
                            </div>
                        </form>
                    </div>
                    <div class="loginText-desc bot-text">Dengan mendaftar kamu menyetujui
                        Kebijakan Privasi dan Syarat & Ketentuan kami.</div>
                </div>
            </div>


        </div>
    </div>




</body>

</html>