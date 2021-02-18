<div id="layoutSidenav_content">
    <!-- Main page content-->
    <main>
        <header>
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Kurir</li>
                    <li class="breadcrumb-item text-blue" aria-current="page">Konfirmasi Penerimaan</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
        </header>
        <div class="container mt-4">
            <div class="card mb-4">
                <div class="card-header">
                    Form Keterangan Penerimaan
                </div>
                <div class="card-body col-md-6">
                    <form action="<?= site_url('kurir/commit');?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $trans ?>" />
                        <div class="form-group">
                            <label class="control-label">Keterangan<span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="keterangan" placeholder="Nama Penerima" required></input>
                        </div>
                        <input class="btn btn-primary" type="submit" name="btn" value="Simpan" />
                        <a class="btn btn-outline-primary" href="<?= base_url('kurir/konfirmasipengiriman'); ?>">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>