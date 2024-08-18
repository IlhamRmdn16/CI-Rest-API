<!DOCTYPE html>
<html>
<head>
    <title>Edit Proyek</title>
    <!-- Menggunakan Bootstrap dari CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Proyek</h1>
        <form action="<?= site_url('proyek/update/' . $proyek['id']); ?>" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label for="nama_proyek">Nama Proyek:</label>
                <input type="text" id="nama_proyek" name="nama_proyek" value="<?= esc($proyek['nama_proyek']); ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="client">Client:</label>
                <input type="text" id="client" name="client" value="<?= esc($proyek['client']); ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai:</label>
                <input type="datetime-local" id="tgl_mulai" name="tgl_mulai" value="<?= esc($proyek['tgl_mulai']); ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tgl_selesai">Tanggal Selesai:</label>
                <input type="datetime-local" id="tgl_selesai" name="tgl_selesai" value="<?= esc($proyek['tgl_selesai']); ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pimpinan_proyek">Pimpinan Proyek:</label>
                <input type="text" id="pimpinan_proyek" name="pimpinan_proyek" value="<?= esc($proyek['pimpinan_proyek']); ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <textarea id="keterangan" name="keterangan" class="form-control"><?= esc($proyek['keterangan']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <select id="lokasi" name="lokasi[]" class="form-control" multiple>
                    <?php foreach ($lokasi as $l) : ?>
                        <option value="<?= esc($l['id']); ?>" <?= in_array($l['id'], explode(',', $proyek['lokasiList'])) ? 'selected' : ''; ?>>
                            <?= esc($l['nama_lokasi']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= site_url('proyek'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- Menggunakan JavaScript dari CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>