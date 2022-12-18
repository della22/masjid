<nav class="navbar navbar-expand-lg navbar-light bg-white position-fixed fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo site_url('') ?>">
            <img src="<?= base_url('assets/depan/logomasjid.png'); ?>" class="logo" alt="" /> Masjid Nurul
            Iman</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('') ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('profilmasjid') ?>">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-green text-white mx-3" href="<?php echo site_url('login') ?>">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>