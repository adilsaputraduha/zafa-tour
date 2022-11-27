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
</head>

<body>
    <?php
    if (session()->getFlashdata('message')) { ?>
        <div class="alert alert-danger" style="position: fixed; bottom: 0; right: 0; margin: 50px;">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php } ?>
    <?php if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success" style="position: fixed; bottom: 0; right: 0; margin: 50px;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php } ?>
    <header class="foi-header landing-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark foi-navbar">
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
                                <a class="nav-link" href="<?= base_url('booking') ?>">Pesanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('payment') ?>">Pembayaran</a>
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
            <div class="header-content">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Melayani dengan sepenuh hati</h1>
                        <p class="text-dark">Dengan jam terbang kami, kami berikan beberapa alasan kenapa memilih kami sebagai partner perjalanan umroh Anda.</p>
                        <button class="btn btn-secondary mb-4">Get Started</button>
                        <div class="my-2">
                            <p class="header-app-download-title">GET OUR MOBILE APP</p>
                        </div>
                        <div>
                            <button class="btn btn-app-download mr-2"><img src="<?= base_url() ?>/assets-front/images/ios.svg" alt="App store"></button>
                            <button class="btn btn-app-download"><img src="<?= base_url() ?>/assets-front/images/android.svg" alt="play store"></button>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="py-5 mb-5 mt-5">
        <div class="container">
            <h2 class="section-title">Mengapa Zafa Tour</h2>
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h5>Fasilitas Fleksibel</h5>
                    <p class="text-dark">Kami menjamin fleksibilitas fasilita dimana fasilitas yang anda dapatkan adalah fasilitas yang sesuai dengan paket umroh yang Anda pilih pada layanan kami.</p>
                    <br>
                    <h5>All Include</h5>
                    <p class="text-dark">Biaya paket yang telah Anda pilih sudah termasuk seluruh kebutuhan Anda baik akomodasi dan administrasi selama menggunkan jasa kami.</p>
                </div>
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <h5>Pembimbing Berkompeten</h5>
                    <p class="text-dark">Umroh menjadi lebih mudah karena dibimbing oleh muthowif yang berpengalaman dan mempunyai kompetensi sesuai syariah.</p>
                    <br>
                    <br>
                    <h5>1000+ Jamaah</h5>
                    <p class="text-dark">Memberangkatkan lebih dari 1000 jamaah dalam di kuartal pertama 1439 H dan angkanya terus bertambah hingga hari ini.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 mb-5">
        <div class="container">
            <h2>Paket Umroh Zafa Tour</h2>
            <p class="text-muted mb-5">Beberapa pilihan paket ibadah umroh Zafa Tour
                Pilih paketnya dan kami temani Anda menuju rumah Allah </p>
            <div class="row">
                <?php
                foreach ($paket as $row) : ?>
                    <?php $totalTanggal = strtotime(date('Y-m-d', strtotime($row['paket_tgl_mulai']))) - strtotime(date('Y-m-d', strtotime($tanggal))) ?>
                    <?php $days = $totalTanggal / 86400; ?>
                    <?php if ($days > 60) { ?>
                        <div class="col-lg-4 mb-4">
                            <div class="card pricing-card border-primary active">
                                <div class="card-body">
                                    <h3><?= $row['paket_nama'] ?></h3>
                                    <h3 class="text-primary"><?= "Rp. " . number_format($row['paket_harga'], 0, ',', '.') ?></h3>
                                    <p class="payment-period">Kuota <?= $row['paket_kuota'] ?></p>
                                    <p class="mb-4"><?= date('d M Y', strtotime($row['paket_tgl_mulai'])) ?> s/d <?= date('d M Y', strtotime($row['paket_tgl_selesai'])) ?></p>
                                    <button class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#detailPaket<?= $row['paket_id']; ?>">Detail</button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="py-5 mb-5">
        <div class="container">
            <h2>Testimoni Zafa Tour</h2>
            <p class="text-muted mb-5">Pendapat client tentang pelayanan di Zafa Tour</p>
            <div class="row">
                <?php
                foreach ($testi as $row) :  ?>
                    <div class="col-md-4 foi-review mb-5 mb-md-0">
                        <div class="foi-rating">
                            <?php if ($row['testi_star'] == 1) { ?>
                                <span class="fas fa-star checked"></span>
                            <?php } else if ($row['testi_star'] == 2) { ?>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                            <?php } else if ($row['testi_star'] == 3) { ?>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                            <?php } else if ($row['testi_star'] == 4) { ?>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                            <?php } else if ($row['testi_star'] == 5) { ?>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                                <span class="fas fa-star checked"></span>
                            <?php } ?>
                        </div>
                        <h5 class="foi-review-heading"><?= $row['testi_title'] ?></h5>
                        <p class="foi-review-content"><?= $row['testi_message'] ?></p>
                        <div class="media foi-review-user">
                            <!-- <img src="assets-front/images/avatar/avatar_13.jpg" alt="user" class="avatar"> -->
                            <div class="media-body">
                                <h6 class="mb-0"><?= $row['testi_name'] ?></h6>
                                <p><?= $row['testi_jobs'] ?></p>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="py-5 mb-5">
        <div class="container">
            <h2>FAQ</h2>
            <p class="section-subtitle">Frequently Asked Questions</p>
            <div class="row">
                <?php
                foreach ($faq as $row) :  ?>
                    <div class="col-lg-6">
                        <div class="card mb-3 landing-faq-card">
                            <div class="card-header bg-white" id="faq<?= $row['faq_id'] ?>Title">
                                <a href="#faq<?= $row['faq_id'] ?>Collapse" class="d-flex align-items-center" data-toggle="collapse">
                                    <h6 class="mb-0"><?= $row['faq_title'] ?></h6> <i class="far fa-plus-square ml-auto"></i>
                                </a>
                            </div>
                            <div id="faq<?= $row['faq_id'] ?>Collapse" class="collapse" aria-labelledby="faq<?= $row['faq_id'] ?>Title">
                                <div class="card-body">
                                    <p class="mb-0 text-gray"><?= $row['faq_description'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
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

    <?php foreach ($paket as $row) : ?>
        <form action="<?= base_url('booking/save') ?>" method="POST">
            <div id="detailPaket<?= $row['paket_id']; ?>" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="">Detail paket</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <input type="hidden" value="<?= $row['paket_id']; ?>" id="idpaket" name="idpaket">
                                    <h5><?= $row['paket_nama']; ?></h5>
                                    <h6><?= "Rp. " . number_format($row['paket_harga'], 0, ',', '.') ?></h6>
                                    <p class="mt-4"><?= $row['paket_deskripsi']; ?></p>
                                    <span class="badge badge-warning p-2 mb-4"><?= date('d M Y', strtotime($row['paket_tgl_mulai'])) ?></span> s/d <span class="badge badge-warning p-2"><?= date('d M Y', strtotime($row['paket_tgl_selesai'])) ?></span>
                                    <h6>Fasilitas</h6>
                                    <?php
                                    $db = db_connect();
                                    $queryeksekusi = 'SELECT fasilitas_nama FROM tb_detail_fasilitas JOIN tb_fasilitas ON fasilitas_id = detail_fasilitas JOIN tb_paket ON detail_paket = paket_session WHERE detail_paket = ' . $row['paket_session'] . ' GROUP BY detail_id';
                                    $detail = $db->query($queryeksekusi)
                                    ?>
                                    <?php foreach ($detail->getResultArray() as $rowdua) : ?>
                                        <div class="">- <?= $rowdua['fasilitas_nama']; ?></div>
                                    <?php endforeach; ?>
                                    <h6 class="mt-2">Persyaratan</h6>
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

                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    <div class="form-check">
                                        <input class="form-check-input" required type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Saya menyetujui syarat dan ketentuan dan kebijakan privasi yang berlaku
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php endforeach; ?>

    <script src="<?= base_url() ?>/assets-front/vendors/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets-front/vendors/popper.js/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets-front/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>