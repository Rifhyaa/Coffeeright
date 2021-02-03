<div id="layoutSidenav_content">
    <main>
        <header>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item text-blue" aria-current="page">Pengguna</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
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
                                        <th class="text-center min-wd-50">No</th>
                                        <th class="text-center">Nama Pengguna</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Telepon</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Jenis Pengguna</th>
                                        <th class="text-center min-wd-50">Aksi</th>
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
                                                } else {
                                                    echo "Kurir";
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center min-wd-50">
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