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
                    Data Subkategori
                </div>
                <div class="card-body">
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-6">
                            <a class="btn btn-primary" href="<?= site_url('subkategori/add') ?>">Tambah</a>
                        </div>
                    </div>
                    <div class="datatable">
                        <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Deskripsi</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1; ?>
                                <?php foreach ($mssubkategori as $subkategori) : ?>
                                    <tr>
                                        <td> <?= $num++; ?> </td>
                                        <td> <?= $subkategori->deskripsi_subkategori; ?> </td>
                                        <td> <?php foreach ($kategori as $row){
													if ($subkategori->id_kategori == $row->id_kategori){
														echo $row->deskripsi_kategori;
													}
												}?> </td>
                                        <td>
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
    </main>
