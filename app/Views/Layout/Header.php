<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aplikasi Hotel luki">
    <meta name="author" content="Oya Suryana, M.Kom.">
    <title>Aplikasi Hotel</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <meta name="theme-color" content="#ffff">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* Custom page CSS
-------------------------------------------------- */
        /* Not required for template or sticky footer method. */
        main>.container {
            padding: 60px 15px 0;
            background-color: #fff;
        }

        .footer {
            background-color: #28a745;
        }

        .footer>.container {
            padding-right: 15px;
            padding-left: 15px;
        }

        code {
            font-size: 80%;
        }
    </style>
    <!-- Custom styles for this template -->
    <?= $this->renderSection('css'); ?>
</head>

<body class="d-flex flex-column h-100">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-success" style="background-color: #fff">
            <a class="navbar-brand" href="#">LukiHotel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <?php if (session()->get('level') == 'admin') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/kamar/tampil" id="navbardrop">
                                Kamar
                            </a>
                        </li> <?php } ?>

                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <?php if (session()->get('level') == 'admin') { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/fasilitaskamar" id="navbardrop">
                                        Fasilitas Kamar
                                    </a>
                                </li> <?php } ?>

                            <div class="collapse navbar-collapse" id="navbarCollapse">
                                <ul class="navbar-nav mr-auto">
                                    <?php if (session()->get('level') == 'admin') { ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/fasilitashotel" id="navbardrop">
                                                Fasilitas Hotel
                                            </a>
                                        </li> <?php } ?>

                                    <div class="collapse navbar-collapse" id="navbarCollapse">
                                        <ul class="navbar-nav mr-auto">
                                            <?php if (session()->get('level') == 'resepsionis') { ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/reservasi" id="navbardrop">
                                                        Reservasi
                                                    </a>
                                                </li> <?php } ?>

                                            <li class="nav-item">
                                                <a class="nav-link" href="/petugas/logout" OnClick="return confirm('Anda Yakin ?')">Logout</a>
                                            </li>
                                        </ul>
                                    </div>
        </nav>
    </header>