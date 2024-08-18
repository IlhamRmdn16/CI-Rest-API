<!-- app/Views/home.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
    <div class="container mt-4">
        <h1>Data Proyek dan Lokasi</h1>

        <h2>Proyek</h2>
        <a href="<?= site_url('/proyek/create'); ?>" class="btn btn-primary mb-3">Tambah Proyek</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Proyek</th>
                    <th>Client</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Pimpinan Proyek</th>
                    <th>Keterangan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($proyek)) : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($proyek as $p) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= esc($p['nama_proyek']); ?></td>
                            <td><?= esc($p['client']); ?></td>
                            <td><?= esc($p['tgl_mulai']); ?></td>
                            <td><?= esc($p['tgl_selesai']); ?></td>
                            <td><?= esc($p['pimpinan_proyek']); ?></td>
                            <td><?= esc($p['keterangan']); ?></td>
                            <td>
                                <a href="<?= site_url('/proyek/edit/' . $p['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= site_url('/proyek/delete/' . $p['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8">No records found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <h2>Daftar Lokasi</h2>
        <a href="<?= site_url('/lokasi/create'); ?>" class="btn btn-primary mb-3">Tambah Lokasi</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lokasi</th>
                    <th>Negara</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($lokasi as $item): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= esc($item['nama_lokasi']); ?></td>
                        <td><?= esc($item['negara']); ?></td>
                        <td><?= esc($item['provinsi']); ?></td>
                        <td><?= esc($item['kota']); ?></td>
                        <td>
                            <a href="<?= site_url('/lokasi/edit/' . $item['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= site_url('/lokasi/delete/' . $item['id']); ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
