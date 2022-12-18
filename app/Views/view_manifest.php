<?= $this->extend('main'); ?>

<?= $this->section('menu'); ?>

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="<?= base_url('/admin'); ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>
    <?php if (session()->get('userLevel') == 0 || session()->get('userLevel') == 1) { ?>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa fa-table"></i>
                <p>
                    Master
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview ">
                <?php if (session()->get('userLevel') == 0) { ?>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/admin'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="<?= base_url('admin/fasilitas'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fasilitas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/persyaratan'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Persyaratan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/peserta'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Peserta</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/paket'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Paket</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa fa-receipt"></i>
                <p>
                    Transaksi
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview ">
                <li class="nav-item">
                    <a href="<?= base_url('admin/booking'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dokumen Jamaah</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/pembayaran'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pembayaran</p>
                    </a>
                </li>
            </ul>
        </li>
    <?php } ?>
    <?php if (session()->get('userLevel') == 0 || session()->get('userLevel') == 2) { ?>
        <li class="nav-item">
            <a href="<?= base_url('admin/report'); ?>" class="nav-link">
                <i class="nav-icon far fa fa-book"></i>
                <p>
                    Laporan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('admin/manifest'); ?>" class="nav-link active">
                <i class="nav-icon far fa fa-book"></i>
                <p>
                    Manifest
                </p>
            </a>
        </li>
    <?php } ?>
    <?php if (session()->get('userLevel') == 0 || session()->get('userLevel') == 1) { ?>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa fa-pager"></i>
                <p>
                    Landing Page
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview ">
                <li class="nav-item">
                    <a href="<?= base_url('admin/contact'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Contact</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/testimonial'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Testimonial</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/faq'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>FAQ</p>
                    </a>
                </li>
            </ul>
        </li>
    <?php } ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/logout'); ?>">
            <i class="nav-icon fa fa-sign-out-alt"></i>
            <p>
                Keluar
            </p>
        </a>
    </li>
</ul>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                    <li class="breadcrumb-item active">Booking</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <?php if (session()->getFlashdata('success')) { ?>
            <div class="alert alert-success icons-alert m-2">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php } else if (session()->getFlashdata('failed')) { ?>
            <div class="alert alert-danger icons-alert m-2">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo session()->getFlashdata('failed'); ?>
            </div>
        <?php } ?>
        <div class="card-header">
            <div class="row">
                <div class="col-lg-2">
                    <a onclick="cetakLaporanBookingPerPaket()" type="button" class="btn btn-success btn-sm"><i class="fa fa-print mr-2"></i>Laporan</a>
                </div>
                <div class="col-lg-4">
                    <select name="paket" id="paket" class="form-control">
                        <?php
                        foreach ($paket as $row) : ?>
                            <option value="<?= $row['paket_id']; ?>"><?= $row['paket_nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-warning" onclick="pindahRoute()">Terapkan</button>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="table" class="table table-bordered">
                <thead>
                    <tr style="height: 25px;">
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>No Hp</th>
                        <th>Tempat Lahir</th>
                        <th>Tgl Lahir</th>
                        <th>Passpor</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($booking as $row) : $no++ ?>
                        <tr style="height: 20px; text-align: center;">
                            <td> <?= $row['document_nama']; ?></td>
                            <td> <?= $row['document_nik']; ?></td>
                            <td>
                                <?php if ($row['document_kelamin'] == 0) { ?>
                                    Perempuan
                                <?php } else { ?>
                                    Laki-Laki
                                <?php } ?>
                            </td>
                            <td> <?= $row['document_notelp']; ?></td>
                            <td> <?= $row['document_tempat_lahir']; ?></td>
                            <td> <?= $row['document_tgl_lahir']; ?></td>
                            <td> <?= $row['document_no_paspor']; ?></td>
                            <td style="text-align: center;">
                                <a type="button" class="badge bg-warning pointer" data-toggle="modal" data-target="#ubahPaket<?= $row['document_id']; ?>">Ubah Paket</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<?php foreach ($booking as $row) : ?>
    <form action="<?= base_url('admin/manifest/ubah-paket'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal" tabindex="-1" id="ubahPaket<?= $row['document_id']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Paket <?= $row['document_nama']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" required value="<?= $row['document_id']; ?>" />
                        <input type="hidden" name="idnota" required value="<?= $row['document_booking']; ?>" />
                        <input type="hidden" name="peserta" required value="<?= $row['booking_peserta']; ?>" />
                        <input type="hidden" name="jumlahbooking" required value="<?= $row['booking_jumlah']; ?>" />
                        <input type="hidden" name="bookingstatus" required value="<?= $row['booking_status']; ?>" />
                        <input type="hidden" name="bookingmetode" required value="<?= $row['booking_metode']; ?>" />
                        <input type="hidden" name="bookingtenor" required value="<?= $row['booking_tenor']; ?>" />
                        <input type="hidden" name="bookingverif" required value="<?= $row['booking_isverif']; ?>" />
                        <input type="hidden" name="bookingcicilan" required value="<?= $row['booking_cicilanke']; ?>" />
                        <input type="hidden" name="bookingtotal" required value="<?= $row['booking_total']; ?>" />
                        <input type="hidden" name="bookingpaket" required value="<?= $row['booking_paket']; ?>" />
                        <input type="hidden" name="dokumenpeserta" required value="<?= $row['document_peserta']; ?>" />
                        <div class="row">
                            <div class="col-sm-12 mt-4">
                                <label class="text-danger" for="">Peserta akan didaftarkan pada paket yang dipilih</label>
                                <select name="inputUbahPaket" id="inputUbahPaket" class="form-control">
                                    <?php
                                    foreach ($paket as $row) : ?>
                                        <option value="<?= $row['paket_id']; ?>"><?= $row['paket_nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning mt-2 mb-2 mr-2">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>

<script>
    function cetakLaporanBookingPerPaket() {
        let paket = $('#paket').val()

        window.open("/admin/manifest/booking-paket/" + paket, "_blank");
    }

    function pindahRoute() {
        let paket = $('#paket').val()

        window.location.href = "/admin/manifest/" + paket;
    }
</script>

<?= $this->endSection(); ?>