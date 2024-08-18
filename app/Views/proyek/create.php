<!DOCTYPE html>
<html>
<head>
    <title>Tambah Proyek</title>
    <!-- Menggunakan Bootstrap dari CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
    <div class="container mt-4">
        <h1>Tambah Proyek</h1>
        <form action="<?= site_url('/proyek/store'); ?>" method="post">
            <?= csrf_field(); ?>
            
            <div class="form-group">
                <label for="nama_proyek">Nama Proyek:</label>
                <input type="text" id="nama_proyek" name="nama_proyek" class="form-control" required>
                <small class="form-text text-danger"><?= session()->getFlashdata('errors')['nama_proyek'] ?? '' ?></small>
            </div>
            <div class="form-group">
                <label for="client">Client:</label>
                <input type="text" id="client" name="client" class="form-control" required>
                <small class="form-text text-danger"><?= session()->getFlashdata('errors')['client'] ?? '' ?></small>
            </div>
            <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai:</label>
                <input type="datetime-local" id="tgl_mulai" name="tgl_mulai" class="form-control" required>
                <small class="form-text text-danger"><?= session()->getFlashdata('errors')['tgl_mulai'] ?? '' ?></small>
            </div>
            <div class="form-group">
                <label for="tgl_selesai">Tanggal Selesai:</label>
                <input type="datetime-local" id="tgl_selesai" name="tgl_selesai" class="form-control" required>
                <small class="form-text text-danger"><?= session()->getFlashdata('errors')['tgl_selesai'] ?? '' ?></small>
            </div>
            <div class="form-group">
                <label for="pimpinan_proyek">Pimpinan Proyek:</label>
                <input type="text" id="pimpinan_proyek" name="pimpinan_proyek" class="form-control" required>
                <small class="form-text text-danger"><?= session()->getFlashdata('errors')['pimpinan_proyek'] ?? '' ?></small>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <textarea id="keterangan" name="keterangan" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <select id="lokasi" name="lokasi[]" class="form-control" multiple>
                    <?php foreach ($lokasi as $l) : ?>
                        <option value="<?= esc($l['id']); ?>"><?= esc($l['nama_lokasi']); ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= session()->getFlashdata('errors')['lokasi'] ?? '' ?></small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= site_url('/proyek'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- Menggunakan JavaScript dari CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
