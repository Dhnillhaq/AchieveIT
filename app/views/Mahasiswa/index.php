<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Mahasiswa</title>
</head>
<body>
    <h1>Halo Mahasiswa</h1>
    <?php foreach ($data['mhs'] as $row) { ?>
                        <ul>
                            <li><?= $row['nim']; ?></li>
                            <li><?= $row['nama']; ?></li>
                            <li>Rp. <?= $row['tempat_lahir']; ?></li>
                        </ul>
                    <?php } ?>
</body>
</html>