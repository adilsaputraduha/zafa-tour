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
                        <a href="<?= base_url('admin/user'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User</p>
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
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active text-white">
                <i class="nav-icon fas fa fa-receipt"></i>
                <p>
                    Transaksi
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview ">
                <li class="nav-item">
                    <a href="<?= base_url('admin/booking'); ?>" class="nav-link active">
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
            <a href="<?= base_url('admin/manifest'); ?>" class="nav-link">
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
            <a href="<?= base_url('admin/report'); ?>" class="btn btn-success btn-sm"><i class="fa fa-print mr-2"></i>Laporan</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nomor</th>
                        <th>Peserta</th>
                        <th>Tanggal</th>
                        <th>Paket</th>
                        <th>Total Item</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($booking as $row) : $no++ ?>
                        <tr>
                            <td> <?= $no; ?></td>
                            <td> <?= $row['booking_nomor']; ?></td>
                            <td> <?= $row['peserta_nama']; ?></td>
                            <td> <?= $row['booking_tanggal']; ?></td>
                            <td> <?= $row['paket_nama']; ?></td>
                            <td> <?= $row['booking_jumlah']; ?> Orang</td>
                            <td>Rp. <?= $row['booking_total']; ?></td>
                            <td>
                                <?php if ($row['booking_status'] == 1) { ?>
                                    <span class="badge bg-danger">Belum Bayar</span>
                                <?php } else if ($row['booking_status'] == 2) { ?>
                                    <span class="badge bg-warning">Sudah Bayar DP (Belum Verifikasi)</span>
                                <?php } else if ($row['booking_status'] == 3) { ?>
                                    <span class="badge bg-info">Sudah Bayar DP (Sudah Verifikasi)</span>
                                <?php } else if ($row['booking_status'] == 4) { ?>
                                    <span class="badge bg-success">Diverifikasi</span>
                                <?php } else if ($row['booking_status'] == 5) { ?>
                                    <span class="badge bg-success">Selesai</span>
                                <?php } else if ($row['booking_status'] == 6) { ?>
                                    <span class="badge bg-info">Batal</span>
                                <?php } else if ($row['booking_status'] == 7) { ?>
                                    <span class="badge bg-info">Cicilan</span>
                                <?php } else if ($row['booking_status'] == 8) { ?>
                                    <span class="badge bg-info">Sudah Bayar Lunas (Belum Verifikasi)</span>
                                <?php } else { ?>
                                    <span class="badge bg-info">Sudah Bayar Lunas (Sudah Verifikasi)</span>
                                <?php } ?>
                            </td>
                            <td style="text-align: center;">
                                <?php if ($row['booking_document'] == 1) { ?>
                                    <a type="button" class="badge bg-info" data-toggle="modal" data-target="#documentModal<?= $row['booking_nomor']; ?>">Lihat Dokumen</a>
                                <?php } ?>
                                <?php if ($row['booking_status'] == 3 || $row['booking_status'] == 4) { ?>
                                    <a type="button" class="badge bg-warning" data-toggle="modal" data-target="#statusModal<?= $row['booking_nomor']; ?>">Status</a>
                                <?php } ?>
                                <a type="button" class="badge bg-success" href="<?= base_url('admin/booking/faktur/' . $row['booking_nomor']); ?>" target="__blank">Faktur</a>
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
    <form action="<?= base_url('admin/booking/status'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal" tabindex="-1" id="statusModal<?= $row['booking_nomor']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah status booking</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" required value="<?= $row['booking_nomor']; ?>" />
                        <div class="row">
                            <div class="col-sm-12">
                                <select name="status" id="status" class="form-control">
                                    <?php if ($row['booking_status'] == 3) { ?>
                                        <option value="4">Diverifikasi</option>
                                        <option value="6">Batal</option>
                                    <?php } else if ($row['booking_status'] == 4) { ?>
                                        <option value="5">Selesai</option>
                                        <option value="6">Batal</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary mt-2 mb-2 mr-2">Yakin</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal" tabindex="-1" id="documentModal<?= $row['booking_nomor']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Dokumen peserta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <?php
                        for ($x = 1; $x <= $row['booking_jumlah']; $x++) { ?>
                            <?php
                            $faktur = (string) $row['booking_nomor'];
                            $db = db_connect();
                            $queryeksekusi = "SELECT document_peserta FROM tb_document WHERE document_booking = '$faktur' AND document_peserta = '$x'";
                            $detail = $db->query($queryeksekusi);
                            ?>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <h6 class="text-dark">Peserta <?= $x; ?></h6>
                                    <?php if ($detail->getResultArray() == null) { ?>
                                        <h6>Belum Input</h6>
                                    <?php } else { ?>
                                        <a type="button" target="__blank" href="<?= base_url('admin/booking/document/' . $row['booking_nomor'] . '/' . $x) ?>" class="btn btn-warning text-white">Lihat</a>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>