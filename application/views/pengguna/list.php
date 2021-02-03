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
                    Data Pengguna
                </div>
                <div class="card-body">
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-6">
                            <a class="btn btn-primary" href="<?= site_url('pengguna/add') ?>">Tambah</a>
                        </div>
                    </div>
                    <div class="table-responsive pt-2">
                        <div class="datatable">
                            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengguna</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Alamat</th>
                                        <th>Jenis Pengguna</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $num = 1; ?>
                                    <?php foreach ($mspengguna as $pengguna) : ?>
                                        <tr>
                                            <td> <?= $num++; ?> </td>
                                            <td> <?= $pengguna->nama_pengguna; ?> </td>
                                            <td> <?= $pengguna->email; ?> </td>
                                            <td> <?= $pengguna->telp; ?> </td>
                                            <td> <?= $pengguna->alamat; ?> </td>
                                            <td>
                                                <?php
                                                if ($pengguna->id_role == "1") {
                                                    echo "Admin";
                                                } else if ($pengguna->id_role == "2") {
                                                    echo "Pelanggan";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo site_url('pengguna/edit/' . $pengguna->id_pengguna) ?>" data-toggle="tooltip" title="Ubah" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="edit"></i></a>
                                                <a onclick="deleteConfirm('<?= site_url('pengguna/delete/' . $pengguna->id_pengguna) ?>')" data-toggle="tooltip" title="Hapus" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="trash-2"></i></a>
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