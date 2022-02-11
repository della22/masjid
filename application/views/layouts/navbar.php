<nav class="navbar navbar-expand-lg navbar-light bg-transparent">

    <div class="container">
        <a class="navbar-brand" href="#">Masjid Nurul Iman</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('masjid') ?>">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= site_url('profilmasjid') ?>">Profil <span class="sr-only">(current)</span></a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Text
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Text</a>
                        <a class="dropdown-item" href="#">Text</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Text</a>
                    </div>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo site_url('login') ?>"  > <i class="fa fa-lock"></i> Login</a>
                </li>
            </ul>

        </div>
    </div>
</nav>