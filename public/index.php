<?php
$judul = "Sistem Informasi Agenda & Event Kampus";

$events = [
    [
        "nama" => "Seminar Teknologi",
        "tanggal" => "2026-11-10",
        "lokasi" => "Aula Kampus"
    ],
    [
        "nama" => "Workshop Pemrograman",
        "tanggal" => "2026-11-15",
        "lokasi" => "Laboratorium Komputer"
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($judul) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($judul) ?></h1>
    <p>Informasi agenda kegiatan kampus.</p>

    <h2>Daftar Event</h2>

    <?php foreach ($events as $event): ?>
        <article>
            <h3><?= htmlspecialchars($event["nama"]) ?></h3>
            <p>Tanggal: <?= htmlspecialchars($event["tanggal"]) ?></p>
            <p>Lokasi: <?= htmlspecialchars($event["lokasi"]) ?></p>
        </article>
    <?php endforeach; ?>
</body>
</html>