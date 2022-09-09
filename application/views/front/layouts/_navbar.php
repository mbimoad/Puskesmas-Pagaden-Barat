<?php
   $this->load->model('category_model', 'category', true);
   $navbar   = $this->category->getCategory();
   $category = $this->uri->segment(3);
?>

<!-- MENU -->
    <nav class="navbar navbar-expand-sm navbar-light" >
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
              <img src="<?= base_url('images/home_page/logo.png') ?>" style="width:50px;">
            PKMPAGBAR</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="<?php echo base_url('berita')?>" class="nav-link"><span data-hover="Berita Harian">Berita Harian</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url()?>sop" class="nav-link"><span data-hover="Tentang Kami">Tentang Kami</span></a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url('auth')?>">Login</a>
                      </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

