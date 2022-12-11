<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zafa Tour Padang</title>
    <link rel="stylesheet" href="<?= base_url() ?>/assets-front/vendors/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets-front/css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo.png">
    <script src="<?= base_url() ?>/assets-front/vendors/jquery/jquery.min.js"></script>
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
                        <li class="nav-item">
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
                                <a class="nav-link" href="<?= base_url('payment') ?>" style="color: #F7C114;">Pembayaran</a>
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
                <h2>Daftar Pembayaran</h2>
                <h5>Lakukan upload bukti pembayaran disini</h5>
            </section>
            <section class="contact-form-wrapper">
                <table class="table table-striped" id="example" style="width:100%">
                    <thead style="background-color: #F7C114; color: white;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nomor</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Paket</th>
                            <th scope="col">Total</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($booking as $row) : $no++ ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['booking_nomor']; ?></td>
                                <td><?= date('d M Y', strtotime($row['booking_tanggal'])) ?></td>
                                <td><?= $row['paket_nama']; ?> (<?= "Rp. " . number_format($row['paket_harga'], 0, ',', '.') ?>)</td>
                                <td><?= "Rp. " . number_format($row['booking_total'], 0, ',', '.') ?></td>
                                <td style="text-align: center;">
                                    <?php if ($row['booking_status'] == 1 && $row['booking_metode'] == 0) { ?>
                                        <a type="button" class="badge bg-success pointer text-white" data-toggle="modal" data-target="#dpModal<?= $row['booking_nomor']; ?>">DP</a>
                                    <?php } ?>
                                    <?php if ($row['booking_metode'] == 0 && $row['booking_status'] != 9) { ?>
                                        <a type="button" class="badge bg-warning pointer text-white" data-toggle="modal" data-target="#lunasModal<?= $row['booking_nomor']; ?>">Lunas</a>
                                    <?php } ?>
                                    <?php if ($row['booking_metode'] == 1 && $row['booking_status'] != 9) { ?>
                                        <a type="button" class="badge bg-info pointer text-white" data-toggle="modal" data-target="#documentModal<?= $row['booking_nomor']; ?>">Cicilan</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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

    <?php foreach ($booking as $row) : ?>
        <form action="<?= base_url('pembayaran/save') ?>" method="POST" enctype="multipart/form-data">
            <div id="dpModal<?= $row['booking_nomor']; ?>" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="">Pembayaran DP 10%</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h6 class="text-dark">Nomor Faktur</h6>
                                        <input type="text" class="form-control fakturpemesanan" readonly id="fakturpemesanan" name="fakturpemesanan" value="<?= $row['booking_nomor']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h6 class="text-dark">Jumlah Transfer</h6>
                                        <input type="text" class="form-control jumlahtransfer" value="Rp. <?= number_format($row['booking_total'] * 10 / 100, 0, ',', '.') ?>" readonly id="jumlahtransfer" name="jumlahtransfer">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <h6 class="text-dark">Silahkan transfer ke rekening resmi Zafa Tour Padang:</h6>
                                        <br>
                                        <p class="text-dark">Nama Bank : Bank BRI</p>
                                        <p class="text-dark">Nomor Rekening : 034101000743123</p>
                                        <p class="text-dark">Atas Nama : Zafa Tour Padang</p>
                                        <h6 class="text-danger mt-2">Harap hati-hati penipuan!</h6>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <h6 class="text-dark">Bukti Pembayaran</h6>
                                        <input type="file" class="form-control gambar" id="gambar" required name="gambar">
                                        <input type="hidden" class="status" value="0" id="status" required name="status">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form action="<?= base_url('pembayaran/save') ?>" method="POST" enctype="multipart/form-data">
            <div id="lunasModal<?= $row['booking_nomor']; ?>" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="">Pembayaran Lunas</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h6 class="text-dark">Nomor Faktur</h6>
                                        <input type="text" class="form-control fakturpemesanan" readonly id="fakturpemesanan" name="fakturpemesanan" value="<?= $row['booking_nomor']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <?php if ($row['booking_status'] > 1) { ?>
                                        <?php
                                        $db = db_connect();
                                        $queryeksekusi = 'SELECT pembayaran_nomor, pembayaran_bayar FROM tb_pembayaran WHERE pembayaran_nomor = ' . '"' . $row['booking_nomor'] . '"' . ' AND pembayaran_bayar = 0 AND pembayaran_isverif = 1';
                                        $detail = $db->query($queryeksekusi)
                                        ?>
                                        <?php foreach ($detail->getResultArray() as $rowdua) : ?>
                                            <div class="form-group">
                                                <h6 class="text-dark">Jumlah Transfer</h6>
                                                <input type="text" class="form-control jumlahtransfer" value="Rp. <?= number_format($row['booking_total'] - ($row['booking_total'] * 10 / 100), 0, ',', '.') ?>" readonly id="jumlahtransfer" name="jumlahtransfer">
                                            </div>
                                        <?php endforeach; ?>
                                    <?php } else { ?>
                                        <div class="form-group">
                                            <h6 class="text-dark">Jumlah Transfer</h6>
                                            <input type="text" class="form-control jumlahtransfer" value="Rp. <?= number_format($row['booking_total'], 0, ',', '.') ?>" readonly id="jumlahtransfer" name="jumlahtransfer">
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <h6 class="text-dark">Silahkan transfer ke rekening resmi Zafa Tour Padang:</h6>
                                        <br>
                                        <p class="text-dark">Nama Bank : Bank BRI</p>
                                        <p class="text-dark">Nomor Rekening : 034101000743123</p>
                                        <p class="text-dark">Atas Nama : Zafa Tour Padang</p>
                                        <h6 class="text-danger mt-2">Harap hati-hati penipuan!</h6>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <h6 class="text-dark">Bukti Pembayaran</h6>
                                        <input type="file" class="form-control gambar" id="gambar" required name="gambar">
                                        <input type="hidden" class="status" value="1" id="status" required name="status">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div id="documentModal<?= $row['booking_nomor']; ?>" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="">Upload bukti pembayaran</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <?php
                            for ($x = 1; $x <= $row['booking_cicilanke']; $x++) { ?>
                                <?php
                                $faktur = (string) $row['booking_nomor'];
                                $db = db_connect();
                                $queryeksekusi = "SELECT pembayaran_tenor, pembayaran_isverif FROM tb_pembayaran WHERE pembayaran_nomor = '$faktur' AND pembayaran_tenor = '$x' ORDER BY pembayaran_id DESC LIMIT 1";
                                $detail = $db->query($queryeksekusi);
                                $tes =  $detail->getResultArray();
                                ?>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h6 class="text-dark">Bulan ke - <?= $x; ?></h6>
                                        <?php if ($detail->getResultArray() == null) { ?>
                                            <a type="button" data-dismiss="modal" data-toggle="modal" data-target="#cicilanModal<?= $row['booking_nomor'] ?><?= $x; ?>" class="btn btn-primary text-white">Upload</a>
                                        <?php } else { ?>
                                            <?php
                                            foreach ($tes as $rowdua) :  ?>
                                                <?php if ($rowdua['pembayaran_isverif'] < 2 || $rowdua['pembayaran_isverif'] == null) { ?>
                                                    <button class="btn btn-success text-white" disabled>Sudah Diupload</button>
                                                <?php } else { ?>
                                                    <a type="button" data-dismiss="modal" data-toggle="modal" data-target="#cicilanModal<?= $row['booking_nomor'] ?><?= $x; ?>" class="btn btn-primary text-white">Upload</a>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        for ($x = 1; $x <= $row['booking_tenor']; $x++) { ?>
            <form action="<?= base_url('pembayaran/cicilan') ?>" method="POST" enctype="multipart/form-data">
                <div id="cicilanModal<?= $row['booking_nomor']; ?><?= $x; ?>" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="">Cicilan ke - <?= $x; ?></h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="idtenor" id="idtenor" value="<?= $x; ?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <h6 class="text-dark">Nomor Faktur</h6>
                                            <input type="text" class="form-control fakturpemesanan" readonly id="fakturpemesanan" name="fakturpemesanan" value="<?= $row['booking_nomor']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <h6 class="text-dark">Jumlah Transfer</h6>
                                            <input type="text" class="form-control jumlahtransfer" value="Rp. <?= number_format($row['booking_total'] / $row['booking_tenor'], 0, ',', '.') ?>" readonly id="jumlahtransfer" name="jumlahtransfer">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h6 class="text-dark">Silahkan transfer ke rekening resmi Zafa Tour Padang:</h6>
                                            <br>
                                            <p class="text-dark">Nama Bank : Bank BRI</p>
                                            <p class="text-dark">Nomor Rekening : 034101000743123</p>
                                            <p class="text-dark">Atas Nama : Zafa Tour Padang</p>
                                            <h6 class="text-danger mt-2">Harap hati-hati penipuan!</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h6 class="text-dark">Bukti Pembayaran</h6>
                                            <input type="file" class="form-control gambar" id="gambar" required name="gambar">
                                            <input type="hidden" class="status" value="0" id="status" required name="status">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php }
        ?>
    <?php endforeach; ?>

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

        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
        });
    </script>

    <script src="<?= base_url() ?>/assets-front/vendors/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets-front/vendors/popper.js/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets-front/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</body>

</html>