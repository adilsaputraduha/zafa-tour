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
            <ul class="nav nav-treeview">
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
            <a href="<?= base_url('admin/report'); ?>" class="nav-link text-white active">
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
                    <li class="breadcrumb-item active">Report</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <?php if (session()->getFlashdata('success')) { ?>
            <div class="alert alert-primary icons-alert m-2">
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
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <label>Laporan Master User</label>
                    <br>
                    <br>
                    <a href="<?= base_url('admin/user/report') ?>" target="__blank" class="btn btn-warning text-white">Cetak Laporan User</a>
                </div>
                <div class="col-lg-4">
                    <label>Laporan Master Peserta</label>
                    <br>
                    <br>
                    <a href="<?= base_url('admin/peserta/report') ?>" target="__blank" class="btn btn-warning text-white">Cetak Laporan Peserta</a>
                </div>
                <div class="col-lg-4">
                    <label>Laporan Master Paket</label>
                    <br>
                    <br>
                    <a href="<?= base_url('admin/paket/report') ?>" target="__blank" class="btn btn-warning text-white">Cetak Laporan Paket</a>
                </div>
            </div>
            <br>
            <hr>
            <div class="row justify-content-center mt-5">
                <div class="col-12">
                    <label>Filter Laporan Transaksi Booking</label>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-6">
                    <label>Tanggal Awal</label>
                    <input type="date" class="form-control" id="tanggalawalbooking" name="tanggalawalbooking" required>
                </div>
                <div class="col-6">
                    <label>Tanggal Akhir</label>
                    <input type="date" class="form-control" id="tanggalakhirbooking" name="tanggalakhirbooking" required>
                </div>
            </div>
            <div class="row justify-content-center mt-4 mb-5">
                <div class="col-12">
                    <button class="btn btn-warning text-white" onclick="cetakLaporanBooking()">Cetak Laporan Booking</button>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<script>
    function onlyNumber(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>

<script>
    function cetakLaporanBooking() {
        let tanggalawalbooking = $('#tanggalawalbooking').val()
        let tanggalakhirbooking = $('#tanggalakhirbooking').val()

        if (tanggalawalbooking.length == 0) {
            alert('Tanggal awal tidak boleh kosong')
        } else if (tanggalakhirbooking.length == 0) {
            alert('Tanggal akhir tidak boleh kosong')
        } else {
            window.open("/admin/report/booking/" + tanggalawalbooking + "/" + tanggalakhirbooking, "_blank");
        }
    }
</script>

<?= $this->endSection(); ?>