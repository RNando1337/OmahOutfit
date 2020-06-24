  <a class="navbar-brand" href="<?= base_url() ?>4dm1n/dashboard">Administrator</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url($this->uri->uri_string()); ?>">Home</a>
      </li>
      <li class="nav-item dropdown" id="master">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
          Data Master
        </a>
        <div class="dropdown-menu" id="dropdownMaster" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url()?>4dm1n/kategori">Kategori</a>
          <a class="dropdown-item" href="<?= base_url()?>4dm1n/product">Product List</a>
        </div>
      </li>
      <?php 
      if($this->session->userdata('role') === 'admin'){
      ?>
      <li class="nav-item">
      <a class="nav-link" href="<?= base_url('4dm1n/pengguna'); ?>">Pengguna</a>
      </li>
      <?php
      }
      ?>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('adminpanel/dashboard/logout') ?>">Logout</a>
      </li>
    </ul>

  </div>
