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
            <a href="<?= base_url('admin/manifest'); ?>" class="nav-link">
                <i class="nav-icon far fa fa-book"></i>
                <p>
                    Manifest
                </p>
            </a>
        </li>
    <?php } ?>
    <?php if (session()->get('userLevel') == 0 || session()->get('userLevel') == 1) { ?>
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active text-white">
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
                    <a href="<?= base_url('admin/faq'); ?>" class="nav-link active">
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
                    <li class="breadcrumb-item">Landing Page</li>
                    <li class="breadcrumb-item active">FAQ</li>
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
        <div class="card-header">
            <button data-toggle="modal" data-target="#addModal" class="btn btn-warning text-white btn-sm"><i class="fa fa-plus mr-2"></i>Tambah</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($faq as $row) : $no++ ?>
                        <tr>
                            <td> <?= $no; ?></td>
                            <td> <?= $row['faq_title']; ?></td>
                            <td> <?= $row['faq_description']; ?></td>
                            <td style="text-align: center;">
                                <a type="button" class="badge bg-warning pointer" data-toggle="modal" data-target="#updateModal<?= $row['faq_id']; ?>">Edit</a>
                                <a type="button" class="badge bg-danger" data-toggle="modal" data-target="#deleteModal<?= $row['faq_id']; ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<div id="addModal" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="">Tambah faq</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/faq/save'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" id="title" name="title" required placeholder="Masukan title">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="description" cols="30" rows="15" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning text-white">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($faq as $row) : ?>
    <div id="updateModal<?= $row['faq_id']; ?>" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="">Update faq</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/faq/edit'); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="<?= $row['faq_id']; ?>">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" value="<?= $row['faq_title']; ?>" class="form-control" id="title" name="title" required placeholder="Masukan title">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="description" cols="30" rows="15" class="form-control"><?= $row['faq_description']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="float-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-warning text-white">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <form action="<?= base_url('admin/faq/delete'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal" tabindex="-1" id="deleteModal<?= $row['faq_id']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus faq</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" required value="<?= $row['faq_id']; ?>" />
                        <h6>Yakin ingin menghapus data ini?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning text-white mt-2 mb-2 mr-2">Yakin</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>

<?= $this->endSection(); ?>