<div id="layoutSidenav_content">
    <main>
        <header>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item text-blue" aria-current="page">Subkategori</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
        </header>
        <!-- Main page content-->
        <div class="container-fluid mt-4">
            <div class="card mb-4">
                <div class="card-header">
                    Data Subkategori
                </div>
                <div class="card-body">
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-6">
                            <a class="btn btn-primary" href="<?= site_url('subkategori/add') ?>">Tambah</a>
                        </div>
                    </div>
                    <div class="table-responsive pt-2">
                        <div class="datatable">
                            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center min-wd-50">No</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center min-wd-50">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $num = 1; ?>
                                    <?php foreach ($mssubkategori as $subkategori) : ?>
                                        <tr>
                                            <td> <?= $num++; ?> </td>
                                            <td> <?= $subkategori->deskripsi_subkategori; ?> </td>
                                            <td> <?php foreach ($kategori as $row) {
                                                        if ($subkategori->id_kategori == $row->id_kategori) {
                                                            echo $row->deskripsi_kategori;
                                                        }
                                                    } ?> </td>
                                            <td class="text-center min-wd-50">
                                                <a href="<?php echo site_url('subkategori/edit/' . $subkategori->id_subkategori) ?>" data-toggle="tooltip" title="Ubah" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="edit"></i></a>
                                                <a onclick="deleteConfirm('<?= site_url('subkategori/delete/' . $subkategori->id_subkategori) ?>')" data-toggle="tooltip" title="Hapus" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" te><i data-feather="trash-2"></i></a>
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