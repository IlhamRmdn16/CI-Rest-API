<!-- app/Views/proyek/index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Proyek</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
    <h1>Daftar Proyek</h1>
    <a href="<?= site_url('proyek/create'); ?>">Tambah Proyek</a>
    <table>
        <thead>
            <tr>
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
                <?php foreach ($proyek as $p) : ?>
                    <tr>
                        <td><?= esc($p['nama_proyek']); ?></td>
                        <td><?= esc($p['client']); ?></td>
                        <td><?= esc($p['tgl_mulai']); ?></td>
                        <td><?= esc($p['tgl_selesai']); ?></td>
                        <td><?= esc($p['pimpinan_proyek']); ?></td>
                        <td><?= esc($p['keterangan']); ?></td>
                        <td>
                            <a href="<?= site_url('proyek/edit/' . $p['id']); ?>">Edit</a> |
                            <a href="<?= site_url('proyek/delete/' . $p['id']); ?>" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7">No records found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
