<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zafa Tour Padang</title>
    <link rel="stylesheet" href="<?= base_url() ?>/assets-front/vendors/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets-front/css/style.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo.png">
    <script src="<?= base_url() ?>/assets-front/vendors/jquery/jquery.min.js"></script>
</head>

<body>
    <header class="foi-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light foi-navbar">
                <a class="navbar-brand" href="<?= base_url('/') ?>">
                    <img src="<?= base_url() ?>/assets/images/logo.png" width="50px" height="50px" alt="FOI">
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url('/') ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('about') ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('paket') ?>">Paket</a>
                        </li>
                        <?php if (session()->get('pesertaId')) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('booking') ?>" style="color: #F7C114;">Pesanan</a>
                            </li>
                        <?php } ?>
                    </ul>
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        <?php if (session()->get('pesertaId')) { ?>
                            <li class="nav-item">
                                <a class="btn btn-secondary" href="<?= base_url('logout') ?>">Logout</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item mr-2 mb-3 mb-lg-0">
                                <a class="btn btn-secondary" href="<?= base_url('register') ?>">Sign up</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-secondary" href="<?= base_url('login') ?>">Login</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <section class="page-header">
                <h2>Form Pemesanan</h2>
                <h5>Silahkan isi beberapa data dibawah ini</h5>
            </section>
            <section class="contact-form-wrapper">
                <form action="<?= base_url('booking/edit') ?>" method="POST">
                    <?php foreach ($booking as $row) : ?>
                        <div class="row">
                            <div class="col-sm-8">
                                <h3><?= $row['paket_nama'] ?></h3>
                                <h3 class="text-primary"><?= "Rp. " . number_format($row['paket_harga'], 0, ',', '.') ?></h3>
                                <p class="payment-period">Kuota <?= $row['paket_kuota'] ?></p>
                                <p class="payment-period">Kuota <?= $row['paket_deskripsi'] ?></p>
                                <p class="mb-4"><?= date('d M Y', strtotime($row['paket_tgl_mulai'])) ?> s/d <?= date('d M Y', strtotime($row['paket_tgl_selesai'])) ?></p>
                                <h5>Fasilitas</h5>
                                <?php
                                $db = db_connect();
                                $queryeksekusi = 'SELECT fasilitas_nama FROM tb_detail_fasilitas JOIN tb_fasilitas ON fasilitas_id = detail_fasilitas JOIN tb_paket ON detail_paket = paket_session WHERE detail_paket = ' . $row['paket_session'] . ' GROUP BY detail_id';
                                $detail = $db->query($queryeksekusi)
                                ?>
                                <?php foreach ($detail->getResultArray() as $rowdua) : ?>
                                    <div class="">- <?= $rowdua['fasilitas_nama']; ?></div>
                                <?php endforeach; ?>
                                <h5 class="mt-2">Persyaratan</h5>
                                <?php
                                $db = db_connect();
                                $queryeksekusi = 'SELECT syarat_nama FROM tb_detail_syarat JOIN tb_syarat ON syarat_id = detail_syarat JOIN tb_paket ON detail_paket = paket_session WHERE detail_paket = ' . $row['paket_session'] . ' GROUP BY detail_id';
                                $detail = $db->query($queryeksekusi)
                                ?>
                                <?php foreach ($detail->getResultArray() as $rowdua) : ?>
                                    <div class="">- <?= $rowdua['syarat_nama']; ?></div>
                                <?php endforeach; ?>
                            </div>
                            <div class="col-sm-4">
                                <h5>Jenis Pemesanan</h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="0" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Perorangan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="1">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Kelompok
                                    </label>
                                </div>
                                <div class="input-jumlah mt-4">
                                    <h6>Jumlah Peserta</h6>
                                    <div class="form-group">
                                        <input type="text" onkeypress="return onlyNumber(event)" required class="form-control jumlah" onkeyup="myFunction()" id="jumlah" name="jumlah" value="1">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <div class="list-group">
                                            <a class="list-group-item">Sub Total</a>
                                            <a class="list-group-item">Jumlah Peserta</a>
                                            <a class="list-group-item">Total (IDR)</a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="list-group">
                                            <a class="list-group-item"><?= "Rp. " . number_format($row['paket_harga'], 0, ',', '.') ?></a>
                                            <a class="list-group-item" id="jumlahtampil">1 Orang</a>
                                            <p class="list-group-item"><strong id="totaltampil"><?= "Rp. " . number_format($row['paket_harga'], 0, ',', '.') ?></strong></p>
                                            <input type="hidden" name="total" id="total">
                                            <input type="hidden" name="invoice" id="invoice" value="<?= $row['booking_nomor'] ?>">
                                            <input type="hidden" name="harga" id="harga" value="<?= $row['paket_harga'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mb-4 mt-4">Pesan Sekarang</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </form>
            </section>
        </div>
    </main>


    <footer class="foi-footer text-white">
        <div class="container">
            <div class="row footer-content">
                <div class="col-xl-6 col-lg-7 col-md-8">
                    <h2 class="mb-0">Do you want to know more or just have a question? write to us.</h2>
                </div>
                <div class="col-md-4 col-lg-5 col-xl-6 py-3 py-md-0 d-md-flex align-items-center justify-content-end">
                    <a href="<?= base_url('contact') ?>" class="btn btn-secondary btn-lg">Contact form</a>
                </div>
            </div>
            <div class="row footer-widget-area">
                <div class="col-md-3">
                    <div class="py-3">
                        <img src="<?= base_url() ?>/assets/images/logo.png" width="50px" height="50px" alt="FOI">
                    </div>
                    <p class="font-os font-weight-semibold mb3">Get our mobile app</p>
                    <div>
                        <button class="btn btn-app-download mr-2"><img src="<?= base_url() ?>/assets-front/images/ios.svg" alt="App store"></button>
                        <button class="btn btn-app-download"><img src="<?= base_url() ?>/assets-front/images/android.svg" alt="play store"></button>
                    </div>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <nav>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Account</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">My tasks</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Projects</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Edit profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Activity</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <nav>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#!" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Services</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Careers <span class="badge badge-pill badge-secondary ml-3">Hiring</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link">Shop with us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <p>
                        &copy; Zafa Tour. 2022 <a href="https://www.zafatourpadang.com" target="_blank" rel="noopener noreferrer" class="text-reset">Zafa Tour</a>.
                    </p>
                    <p>All rights reserved.</p>
                    <nav class="social-menu">
                        <a href="#!"><img src="<?= base_url() ?>/assets-front/images/facebook.svg" alt="facebook"></a>
                        <a href="#!"><img src="<?= base_url() ?>/assets-front/images/instagram.svg" alt="instagram"></a>
                        <a href="#!"><img src="<?= base_url() ?>/assets-front/images/twitter.svg" alt="twitter"></a>
                        <a href="#!"><img src="<?= base_url() ?>/assets-front/images/youtube.svg" alt="youtube"></a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>

    <script>
        let totalharga = 0;

        function myFunction() {
            let jumlah = $('#jumlah').val()
            let harga = $('#harga').val()

            totalharga = parseInt(jumlah) * parseInt(harga)

            $('#total').val(totalharga);

            document.getElementById('totaltampil').innerHTML = 'Rp. ' + totalharga;
            document.getElementById('jumlahtampil').innerHTML = jumlah + ' Orang';
        }

        function onlyNumber(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
    </script>

    <script src="<?= base_url() ?>/assets-front/vendors/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets-front/vendors/popper.js/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets-front/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>