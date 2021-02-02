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
            <div class="container mt-4">
                <div class="row">
                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card">
                            <div class="card-header">Foto Profil</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <img class="img-account-profile rounded-circle mb-2" src="<?= base_url('assets/img/upload/') . $user['foto']; ?>" />
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                <!-- Profile picture upload button-->
                                <button class="btn btn-primary" type="button">Upload new image</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Detail Profil</div>
                            <div class="card-body">
                                <form>
                                    <!-- Form Group (Nama)-->
                                    <div class="form-group">
                                        <label class="small mb-1">Nama Lengkap</label>
                                        <input type="text" class="form-control" value="<?= $user['nama_pengguna']; ?>">
                                    </div>
                                    <!-- Form Group (Alamat)-->
                                    <div class="form-group">
                                        <label class="small mb-1">Alamat</label>
                                        <input type="text" class="form-control" value="<?= $user['alamat']; ?>">
                                    </div>
                                    <!-- Form Row -->
                                    <div class="form-row">
                                        <!-- Form Group (Email)-->
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1">Email</label>
                                            <input type="text" class="form-control" value="<?= $user['email']; ?>" readonly>
                                        </div>
                                        <!-- Form Group (Phone Number)-->
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1">Telepon</label>
                                            <input type="text" class="form-control" value="<?= $user['telp']; ?>">
                                        </div>
                                    </div>
                                    <!-- Form Group (Name)-->
                                    <div class="form-group">
                                        <label class="small mb-1">Hak Akses</label>
                                        <input type="text" class="form-control" value="<?= check_role($user['id_role']); ?>" readonly>
                                    </div>
                                    <!-- Save changes button -->
                                    <button class="btn btn-primary" type="button">Simpan</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->
    </main>