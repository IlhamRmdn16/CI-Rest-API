<!DOCTYPE html>
<html>
<head>
    <title>Tambah Lokasi</title>
    <!-- Menggunakan Bootstrap dari CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
    <div class="container mt-4">
        <h1>Tambah Lokasi</h1>
        <form action="<?= site_url('/lokasi/store'); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="form-group">
                <label for="nama_lokasi">Nama Lokasi:</label>
                <input type="text" id="nama_lokasi" name="nama_lokasi" class="form-control" value="<?= old('nama_lokasi'); ?>" required>
                <small class="form-text text-danger"><?= session()->getFlashdata('errors')['nama_lokasi'] ?? '' ?></small>
            </div>
            <div class="form-group">
                <label for="negara">Negara:</label>
                <input type="text" id="negara" name="negara" class="form-control" value="<?= old('negara'); ?>" required>
                <small class="form-text text-danger"><?= session()->getFlashdata('errors')['negara'] ?? '' ?></small>
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi:</label>
                <input type="text" id="provinsi" name="provinsi" class="form-control" value="<?= old('provinsi'); ?>" required>
                <small class="form-text text-danger"><?= session()->getFlashdata('errors')['provinsi'] ?? '' ?></small>
            </div>
            <div class="form-group">
                <label for="kota">Kota:</label>
                <input type="text" id="kota" name="kota" class="form-control" value="<?= old('kota'); ?>" required>
                <small class="form-text text-danger"><?= session()->getFlashdata('errors')['kota'] ?? '' ?></small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= site_url('home'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- Menggunakan JavaScript dari CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
