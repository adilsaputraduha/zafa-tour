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
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active text-white">
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
                    <a href="<?= base_url('admin/paket'); ?>" class="nav-link active">
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
                    <li class="breadcrumb-item">Master</li>
                    <li class="breadcrumb-item active">Paket</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <?php if (session()->getFlashdata('success')) { ?>
            <div class="alert alert-warning text-white icons-alert m-2">
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
            <form action="<?= base_url('admin/paket/save'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>" required placeholder="Masukan nama">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Harga</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                </div>
                                <input type="text" onkeypress="return onlyNumber(event)" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= old('harga'); ?>" required placeholder="Masukan harga">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" required placeholder="Masukan deskripsi">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="tglmulai" required id="tglmulai" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Tanggal Selesai</label>
                            <input type="date" name="tglselesai" required id="tglselesai" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Kuota</label>
                            <input type="text" name="kuota" required id="kuota" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Fasilitas</label>
                                <div class="input-group mb-3">
                                    <input type="text" placeholder="Click buttton to search!" id="fasilitas" name="fasilitas" required readonly class="form-control fasilitas" />
                                    <button class="btn btn-warning ml-1 text-white" data-toggle="modal" data-target="#searchFasilitas" type="button">Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Persyaratan</label>
                                <div class="input-group mb-3">
                                    <input type="text" placeholder="Click buttton to search!" id="syarat" name="syarat" required readonly class="form-control syarat" />
                                    <button class="btn btn-warning ml-1 text-white" data-toggle="modal" data-target="#searchSyarat" type="button">Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="random" name="random" value="<?= $random ?>" class="random">
                    <div class="col-sm-6">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Fasilitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="cobafasilitas">
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <table id="tabletwo" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Persyaratan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="cobasyarat">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="float-right mt-4">
                    <a href="<?= base_url('admin/paket') ?>" type="button" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-warning text-white">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<div class="modal" tabindex="-1" id="searchFasilitas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Data Fasilitas</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tablethree" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Fasilitas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($fasilitas as $row) : $no++ ?>
                            <tr>
                                <td> <?= $no; ?></td>
                                <td> <?= $row['fasilitas_nama']; ?></td>
                                <td style="text-align: center;">
                                    <a type="button" class="btn-sm btn-warning text-white btn-choose2" onclick="ajaxSave(<?= $row['fasilitas_id']; ?>)" data-id="<?= $row['fasilitas_id']; ?>" data-nama="<?= $row['fasilitas_nama']; ?>"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="searchSyarat">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Data Persyaratan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tablefour" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Persyaratan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($syarat as $row) : $no++ ?>
                            <tr>
                                <td> <?= $no; ?></td>
                                <td> <?= $row['syarat_nama']; ?></td>
                                <td style="text-align: center;">
                                    <a type="button" class="btn-sm btn-warning text-white btn-choose3" onclick="ajaxSaveSyarat(<?= $row['syarat_id']; ?>)" data-id="<?= $row['syarat_id']; ?>" data-nama="<?= $row['syarat_nama']; ?>"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $('.btn-choose2').on('click', function() {
        $('#searchFasilitas').modal('hide');
    });

    $('.btn-choose3').on('click', function() {
        $('#searchSyarat').modal('hide');
    });

    $(function() {
        $("#tablethree").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#tabletwo").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#tablefour").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

    function reload() {
        let random = $('.random').val();

        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/paket/detail-index/fasilitas'); ?>",
            data: {
                random: random
            },
            beforeSend: function(f) {
                $('#cobafasilitas').html(`<div class="text-center">
                Mencari data...
                </div>`);
            },
            success: function(response) {
                $('#cobafasilitas').html(response);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }

    function reloadSyarat() {
        let random = $('.random').val();

        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/paket/detail-index/syarat'); ?>",
            data: {
                random: random
            },
            beforeSend: function(f) {
                $('#cobasyarat').html(`<div class="text-center">
                Mencari data...
                </div>`);
            },
            success: function(response) {
                $('#cobasyarat').html(response);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }

    function ajaxSave(idfasilitas) {
        let random = $('.random').val()

        $.ajax({
            url: "<?= base_url('admin/paket/detail-save/fasilitas'); ?>",
            type: "POST",
            data: {
                random: random,
                idfasilitas: idfasilitas,
            },
            success: function(data) {
                reload();
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }

    function ajaxSaveSyarat(idsyarat) {
        let random = $('.random').val()

        $.ajax({
            url: "<?= base_url('admin/paket/detail-save/syarat'); ?>",
            type: "POST",
            data: {
                random: random,
                idsyarat: idsyarat,
            },
            success: function(data) {
                reloadSyarat();
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }

    function ajaxDelete(id) {
        $.ajax({
            url: "<?= base_url('admin/paket/detail-delete/fasilitas'); ?>",
            type: "POST",
            data: {
                detailid: id,
            },
            success: function(data) {
                reload();
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }

    function ajaxDeleteSyarat(id) {
        $.ajax({
            url: "<?= base_url('admin/paket/detail-delete/syarat'); ?>",
            type: "POST",
            data: {
                detailid: id,
            },
            success: function(data) {
                reloadSyarat();
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }

    function onlyNumber(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>

<?= $this->endSection(); ?>