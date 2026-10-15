<?php
$judul = "AgendaKampus";
$events = [
    [
        "nama" => "Seminar Teknologi",
        "tanggal" => "2026-11-10",
        "lokasi" => "Aula Kampus",
        "kategori" => "Seminar",
        "deskripsi" => "Kenali perkembangan teknologi terbaru dan peluang karier di dunia digital.",
        "warna" => "blue",
        "ikon" => "💻"
    ],
    [
        "nama" => "Workshop Pemrograman",
        "tanggal" => "2026-11-15",
        "lokasi" => "Laboratorium Komputer",
        "kategori" => "Workshop",
        "deskripsi" => "Belajar dasar pemrograman dan praktik membuat aplikasi bersama.",
        "warna" => "purple",
        "ikon" => "⌨️"
    ],
    [
        "nama" => "Kreativitas Mahasiswa",
        "tanggal" => "2026-11-20",
        "lokasi" => "Gedung Serbaguna",
        "kategori" => "Mahasiswa",
        "deskripsi" => "Temukan inspirasi, berbagi ide, dan kembangkan kreativitas bersama.",
        "warna" => "orange",
        "ikon" => "✨"
    ]
];

function e($teks) {
    return htmlspecialchars($teks, ENT_QUOTES, 'UTF-8');
}

function tanggalIndonesia($tanggal) {
    $bulan = [
        1 => "Januari", "Februari", "Maret", "April",
        "Mei", "Juni", "Juli", "Agustus", "September",
        "Oktober", "November", "Desember"
    ];

    $waktu = strtotime($tanggal);
    return date("d", $waktu) . " " .
        $bulan[(int) date("n", $waktu)] . " " .
        date("Y", $waktu);
}

$totalEvent = count($events);
$kataKunci = trim($_GET["cari"] ?? "");

$hasilEvent = array_filter($events, function ($event) use ($kataKunci) {
    return $kataKunci === "" ||
        stripos($event["nama"], $kataKunci) !== false ||
        stripos($event["kategori"], $kataKunci) !== false ||
        stripos($event["lokasi"], $kataKunci) !== false;
});
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($judul) ?> | Informasi Event Kampus</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary: #5145cd;
            --dark: #202044;
            --muted: #74758b;
            --background: #f7f8ff;
            --white: #ffffff;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--background);
            color: var(--dark);
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .navbar {
            background: var(--white);
            border-bottom: 1px solid #ececf5;
            padding: 17px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .logo {
            font-size: 23px;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: -1px;
        }

        .logo span {
            color: var(--dark);
        }

        .nav-link {
            color: #55566d;
            font-weight: 600;
            font-size: 14px;
        }

        .hero {
            margin: 30px auto;
            width: 86%;
            padding: 55px 48px;
            border-radius: 26px;
            color: white;
            background:
                radial-gradient(circle at 85% 15%, #9a8bff 0, transparent 28%),
                linear-gradient(120deg, #3730a3, #6559e8 70%, #8278f4);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
            overflow: hidden;
        }

        .hero-content {
            max-width: 620px;
        }

        .eyebrow {
            display: inline-block;
            background: #ffffff25;
            border: 1px solid #ffffff35;
            padding: 6px 13px;
            border-radius: 30px;
            font-size: 12px;
            margin-bottom: 18px;
        }

        .hero h1 {
            font-size: clamp(30px, 4vw, 46px);
            line-height: 1.2;
            margin-bottom: 16px;
            letter-spacing: -1px;
        }

        .hero p {
            color: #e5e4ff;
            max-width: 540px;
            font-size: 15px;
        }

        .hero-icon {
            font-size: 100px;
            background: #ffffff1c;
            border: 1px solid #ffffff30;
            width: 150px;
            height: 150px;
            border-radius: 35px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            transform: rotate(5deg);
        }

        .container {
            width: 86%;
            margin: 0 auto 55px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 42px;
        }

        .stat-card {
            background: white;
            padding: 22px;
            border: 1px solid #ececf5;
            border-radius: 17px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            background: #efedff;
            font-size: 22px;
        }

        .stat-card strong {
            display: block;
            font-size: 23px;
        }

        .stat-card small {
            color: var(--muted);
        }

        .section-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 22px;
        }

        .section-heading h2 {
            font-size: 27px;
            letter-spacing: -.6px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 14px;
        }

        .search-form {
            display: flex;
            gap: 8px;
            margin: 18px 0 25px;
        }

        .search-form input {
            width: 100%;
            min-width: 0;
            border: 1px solid #e3e3f0;
            border-radius: 12px;
            padding: 13px 15px;
            font-size: 14px;
            outline: none;
            background: white;
        }

        .search-form input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px #5145cd15;
        }

        .search-form button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0 22px;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .event-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .event-card {
            background: white;
            border: 1px solid #eaeaf4;
            border-radius: 19px;
            padding: 23px;
            transition: transform .2s, box-shadow .2s;
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px #27235c10;
        }

        .event-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .event-icon {
            width: 57px;
            height: 57px;
            display: grid;
            place-items: center;
            border-radius: 16px;
            font-size: 27px;
        }

        .blue .event-icon { background: #e8efff; }
        .purple .event-icon { background: #f0eaff; }
        .orange .event-icon { background: #fff0df; }

        .category {
            background: #f1f0ff;
            color: var(--primary);
            padding: 5px 10px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
        }

        .event-card h3 {
            font-size: 19px;
            margin-bottom: 9px;
        }

        .description {
            color: var(--muted);
            font-size: 13px;
            min-height: 63px;
            margin-bottom: 20px;
        }

        .event-info {
            border-top: 1px solid #eeeeF5;
            padding-top: 16px;
            display: grid;
            gap: 9px;
            font-size: 13px;
            color: #55566d;
        }

        .event-info span {
            margin-right: 7px;
        }

        .detail {
            display: block;
            text-align: center;
            background: #f0efff;
            color: var(--primary);
            border-radius: 11px;
            padding: 11px;
            font-size: 13px;
            font-weight: 700;
            margin-top: 19px;
        }

        .detail:hover {
            background: var(--primary);
            color: white;
        }

        .empty {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            color: var(--muted);
            grid-column: 1 / -1;
        }

        footer {
            text-align: center;
            padding: 25px;
            color: var(--muted);
            background: white;
            border-top: 1px solid #ececf5;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .event-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .hero, .container { width: 92%; }
            .hero { padding: 38px 30px; }
            .hero-icon { width: 110px; height: 110px; font-size: 70px; }
        }

        @media (max-width: 600px) {
            .navbar { padding: 15px 5%; }
            .hero { padding: 30px 23px; margin: 20px auto; }
            .hero-icon { display: none; }
            .container { width: 92%; }
            .stats { grid-template-columns: 1fr; gap: 10px; }
            .event-grid { grid-template-columns: 1fr; }
            .section-heading { align-items: start; flex-direction: column; }
            .section-heading h2 { font-size: 24px; }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="index.php" class="logo">Agenda<span>Kampus.</span></a>
    <a href="#event" class="nav-link">Jelajahi Event ↓</a>
</nav>

<header class="hero">
    <div class="hero-content">
        <span class="eyebrow">✦ PUSAT INFORMASI KEGIATAN KAMPUS</span>
        <h1>Temukan Event Seru,<br>Tambah Pengalaman Baru!</h1>
        <p>
            Satu tempat untuk menemukan informasi seminar, workshop,
            dan kegiatan mahasiswa. Jangan lewatkan kesempatan untuk berkembang!
        </p>
    </div>
    <div class="hero-icon">🎓</div>
</header>

<main class="container">
    <section class="stats">
        <div class="stat-card">
            <div class="stat-icon">📅</div>
            <div>
                <strong><?= $totalEvent ?></strong>
                <small>Event tersedia</small>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">📍</div>
            <div>
                <strong>Kampus</strong>
                <small>Lokasi kegiatan</small>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">✨</div>
            <div>
                <strong>Terbuka</strong>
                <small>Informasi untuk mahasiswa</small>
            </div>
        </div>
    </section>

    <section id="event">
        <div class="section-heading">
            <div>
                <h2>Agenda Mendatang</h2>
                <p>Pilih kegiatan yang sesuai dengan minatmu.</p>
            </div>
        </div>

        <form class="search-form" method="GET" action="index.php">
            <input
                type="text"
                name="cari"
                placeholder="Cari nama event, kategori, atau lokasi..."
                value="<?= e($kataKunci) ?>"
            >
            <button type="submit">Cari</button>
        </form>

        <div class="event-grid">
            <?php if (count($hasilEvent) > 0): ?>
                <?php foreach ($hasilEvent as $event): ?>
                    <article class="event-card <?= e($event["warna"]) ?>">
                        <div class="event-top">
                            <div class="event-icon">
                                <?= e($event["ikon"]) ?>
                            </div>
                            <span class="category">
                                <?= e($event["kategori"]) ?>
                            </span>
                        </div>

                        <h3><?= e($event["nama"]) ?></h3>
                        <p class="description">
                            <?= e($event["deskripsi"]) ?>
                        </p>

                        <div class="event-info">
                            <div>
                                <span>📅</span>
                                <?= e(tanggalIndonesia($event["tanggal"])) ?>
                            </div>
                            <div>
                                <span>📍</span>
                                <?= e($event["lokasi"]) ?>
                            </div>
                        </div>

                        <a class="detail"
                           href="mailto:admin@agendakampus.local?subject=Informasi%20<?= rawurlencode($event["nama"]) ?>">
                            Minta Informasi Event →
                        </a>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="empty">
                    <h3>Event tidak ditemukan 🔎</h3>
                    <p>Coba gunakan kata kunci yang berbeda.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<footer>
    © <?= date("Y") ?> AgendaKampus · Sistem Informasi Agenda & Event Kampus
</footer>

</body>
</html>