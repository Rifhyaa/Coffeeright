<div id="layoutSidenav_content">
    <main>
        <header class="bg-white border-bottom">
            <div class="container-fluid">
                <div class="form-group pt-3">
                    <div class="mt-2 mb-2">
                        <h4 class="text-secondary"><?= $title; ?></h4>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-fluid mt-4">
            <div class="card mb-4">
                <div class="card-header">
                    Data Vendor
                </div>
                <div class="card-body">
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-6">
                            <a class="btn btn-primary" href="<?= site_url('vendor/add') ?>">Tambah</a>
                        </div>
                    </div>
                    <div class="table-responsive pt-2">
                        <div class="datatable">
                            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $num = 1; ?>
                                    <?php foreach ($msvendor as $vendor) : ?>
                                        <tr>
                                            <td> <?= $num++; ?> </td>
                                            <td> <?= $vendor->nama_vendor; ?> </td>
                                            <td> <?= $vendor->alamat_vendor; ?> </td>
                                            <td> <?= $vendor->email_vendor; ?> </td>
                                            <td> <?= $vendor->telp_vendor; ?> </td>
                                            <td>
                                                <a href="<?php echo site_url('vendor/edit/' . $vendor->id_vendor) ?>" data-toggle="tooltip" title="Ubah" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="edit"></i></a>
                                                <a onclick="deleteConfirm('<?= site_url('vendor/delete/' . $vendor->id_vendor) ?>')" data-toggle="tooltip" title="Hapus" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="trash-2"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>