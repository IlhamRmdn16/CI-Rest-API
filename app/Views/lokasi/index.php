<h1>Daftar Lokasi</h1>
<a href="/lokasi/create">Tambah Lokasi</a>

<table>
    <thead>
        <tr>
            <th>Nama Lokasi</th>
            <th>Negara</th>
            <th>Provinsi</th>
            <th>Kota</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lokasi as $item): ?>
            <tr>
                <td><?= $item['nama_lokasi'] ?></td>
                <td><?= $item['negara'] ?></td>
                <td><?= $item['provinsi'] ?></td>
                <td><?= $item['kota'] ?></td>
                <td>
                    <a href="/lokasi/edit/<?= $item['id'] ?>">Edit</a> |
                    <a href="/lokasi/delete/<?= $item['id'] ?>">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
