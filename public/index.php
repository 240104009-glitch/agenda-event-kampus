<?php
$judul = "CampusEvent";
$events = [
    [
        "nama" => "Seminar Teknologi Masa Depan",
        "tanggal" => "2026-11-10",
        "waktu" => "09.00 - 12.00 WIB",
        "lokasi" => "Aula Kampus",
        "kategori" => "Seminar",
        "deskripsi" => "Jelajahi perkembangan teknologi terbaru bersama praktisi dan akademisi.",
        "warna" => "blue",
        "ikon" => "💡"
    ],
    [
        "nama" => "Workshop Web Programming",
        "tanggal" => "2026-11-15",
        "waktu" => "13.00 - 16.00 WIB",
        "lokasi" => "Laboratorium Komputer",
        "kategori" => "Workshop",
        "deskripsi" => "Belajar membangun website modern melalui praktik langsung.",
        "warna" => "purple",
        "ikon" => "💻"
    ],
    [
        "nama" => "Festival Kreativitas Mahasiswa",
        "tanggal" => "2026-11-20",
        "waktu" => "08.00 - 15.00 WIB",
        "lokasi" => "Lapangan Kampus",
        "kategori" => "Festival",
        "deskripsi" => "Wadah untuk menampilkan karya, kreativitas, dan inovasi mahasiswa.",
        "warna" => "orange",
        "ikon" => "🎨"
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($judul) ?> | Agenda Kampus</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

:root {
    --primary: #4f46e5;
    --dark: #172554;
    --muted: #64748b;
    --bg: #f6f8ff;
}

body {
    font-family: "Segoe UI", Arial, sans-serif;
    background: var(--bg);
    color: #1e293b;
    line-height: 1.6;
}

nav {
    background: white;
    padding: 18px 7%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 3px 20px #1725540c;
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

.nav-label {
    color: var(--muted);
    font-size: 14px;
}

.hero {
    margin: 30px auto;
    width: 86%;
    padding: 55px 6%;
    border-radius: 28px;
    color: white;
    background: linear-gradient(120deg, #312e81, #4f46e5 60%, #818cf8);
    position: relative;
    overflow: hidden;
}

.hero::after {
    content: "✦";
    position: absolute;
    right: 7%;
    top: -35px;
    font-size: 230px;
    color: #ffffff18;
}

.hero-content {
    position: relative;
    z-index: 1;
    max-width: 650px;
}

.eyebrow {
    display: inline-block;
    background: #ffffff20;
    border: 1px solid #ffffff35;
    border-radius: 30px;
    padding: 7px 15px;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 18px;
    letter-spacing: 1px;
}

.hero h1 {
    font-size: clamp(30px, 4vw, 48px);
    line-height: 1.2;
    margin-bottom: 18px;
    letter-spacing: -1.5px;
}

.hero p {
    color: #e0e7ff;
    max-width: 520px;
    font-size: 16px;
}

.hero-button {
    display: inline-block;
    margin-top: 25px;
    background: white;
    color: #4338ca;
    padding: 12px 22px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 700;
    transition: .2s;
}

.hero-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 22px #17174a45;
}

.container {
    width: 86%;
    margin: 0 auto 60px;
}

.section-heading {
    display: flex;
    align-items: end;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 22px;
}

.section-heading h2 {
    color: var(--dark);
    font-size: 28px;
    letter-spacing: -.7px;
}

.section-heading p {
    color: var(--muted);
    font-size: 14px;
}

.search-area {
    display: flex;
    gap: 12px;
    margin-bottom: 25px;
}

.search-area input,
.search-area select {
    padding: 13px 15px;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    background: white;
    font-size: 14px;
    outline: none;
}

.search-area input {
    flex: 1;
    min-width: 0;
}

.search-area input:focus,
.search-area select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px #4f46e51c;
}

.event-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 22px;
}

.event-card {
    background: white;
    border: 1px solid #edf0f7;
    border-radius: 20px;
    overflow: hidden;
    transition: .25s;
    box-shadow: 0 8px 28px #17255408;
}

.event-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 35px #17255414;
}

.event-banner {
    height: 145px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 62px;
    position: relative;
}

.blue { background: linear-gradient(135deg, #dbeafe, #bfdbfe); }
.purple { background: linear-gradient(135deg, #ede9fe, #ddd6fe); }
.orange { background: linear-gradient(135deg, #ffedd5, #fed7aa); }

.category {
    position: absolute;
    left: 16px;
    top: 15px;
    background: white;
    color: #4338ca;
    border-radius: 20px;
    padding: 5px 11px;
    font-size: 11px;
    font-weight: 800;
}

.event-body {
    padding: 21px;
}

.event-body h3 {
    font-size: 19px;
    line-height: 1.4;
    color: var(--dark);
    margin-bottom: 10px;
}

.description {
    font-size: 13px;
    color: var(--muted);
    min-height: 63px;
    margin-bottom: 18px;
}

.event-info {
    border-top: 1px solid #eef2f7;
    padding-top: 15px;
    display: grid;
    gap: 8px;
    font-size: 13px;
    color: #475569;
}

.event-date {
    color: var(--primary);
    font-weight: 700;
}

.event-link {
    display: block;
    text-align: center;
    background: #eef2ff;
    color: #4338ca;
    padding: 11px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
    margin-top: 18px;
}

.event-link:hover {
    background: #e0e7ff;
}

.empty {
    display: none;
    text-align: center;
    padding: 35px;
    background: white;
    border-radius: 16px;
    color: var(--muted);
}

footer {
    text-align: center;
    padding: 28px 15px;
    background: white;
    border-top: 1px solid #e2e8f0;
    color: var(--muted);
    font-size: 13px;
}

footer strong {
    color: var(--primary);
}

@media (max-width: 900px) {
    .event-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .hero, .container {
        width: 92%;
    }
}

@media (max-width: 600px) {
    nav {
        padding: 16px 5%;
    }

    .nav-label {
        font-size: 11px;
    }

    .hero {
        padding: 38px 25px;
        border-radius: 20px;
    }

    .container {
        width: 92%;
    }

    .section-heading {
        align-items: start;
        flex-direction: column;
    }

    .search-area {
        flex-direction: column;
    }

    .event-grid {
        grid-template-columns: 1fr;
    }

    .description {
        min-height: auto;
    }
}
</style>
</head>

<body>
<nav>
    <div class="logo">Campus<span>Event.</span></div>
    <div class="nav-label">🎓 Portal Agenda Kampus</div>
</nav>

<header class="hero">
    <div class="hero-content">
        <div class="eyebrow">✨ TEMUKAN PENGALAMAN BARU</div>
        <h1>Setiap Acara Punya Cerita. Mulai Ceritamu di Sini.</h1>
        <p>
            Temukan seminar, workshop, dan berbagai kegiatan kampus
            dalam satu tempat. Jangan lewatkan kesempatan untuk belajar,
            berkembang, dan terhubung dengan komunitas kampus.
        </p>
        <a href="#agenda" class="hero-button">Jelajahi Agenda &nbsp; →</a>
    </div>
</header>

<main class="container" id="agenda">
    <div class="section-heading">
        <div>
            <h2>Agenda Mendatang 📅</h2>
            <p>Temukan kegiatan menarik dan rencanakan partisipasimu.</p>
        </div>
        <p><?= count($events) ?> agenda tersedia</p>
    </div>

    <div class="search-area">
        <input type="search" id="search"
               placeholder="🔍 Cari nama event atau lokasi...">

        <select id="category">
            <option value="">Semua kategori</option>
            <option value="seminar">Seminar</option>
            <option value="workshop">Workshop</option>
            <option value="festival">Festival</option>
        </select>
    </div>

    <div class="event-grid" id="eventGrid">
        <?php foreach ($events as $event): ?>
        <article class="event-card"
            data-name="<?= htmlspecialchars(strtolower($event['nama'])) ?>"
            data-location="<?= htmlspecialchars(strtolower($event['lokasi'])) ?>"
            data-category="<?= htmlspecialchars(strtolower($event['kategori'])) ?>">

            <div class="event-banner <?= htmlspecialchars($event['warna']) ?>">
                <span class="category">
                    <?= htmlspecialchars($event['kategori']) ?>
                </span>
                <?= htmlspecialchars($event['ikon']) ?>
            </div>

            <div class="event-body">
                <h3><?= htmlspecialchars($event['nama']) ?></h3>

                <p class="description">
                    <?= htmlspecialchars($event['deskripsi']) ?>
                </p>

                <div class="event-info">
                    <div class="event-date">
                        📅
                        <?= htmlspecialchars(date(
                            'd M Y',
                            strtotime($event['tanggal'])
                        )) ?>
                    </div>
                    <div>🕒 <?= htmlspecialchars($event['waktu']) ?></div>
                    <div>📍 <?= htmlspecialchars($event['lokasi']) ?></div>
                </div>

                <a class="event-link"
                   href="mailto:panitia@kampus.ac.id?subject=Informasi%20<?= rawurlencode($event['nama']) ?>">
                    Minta Informasi Event ↗
                </a>
            </div>
        </article>
        <?php endforeach; ?>
    </div>

    <div class="empty" id="empty">
        <h3>Agenda tidak ditemukan 😕</h3>
        <p>Coba gunakan kata kunci atau kategori yang berbeda.</p>
    </div>
</main>

<footer>
    <p>© <?= date('Y') ?> <strong>CampusEvent.</strong></p>
    <p>Sistem Informasi Agenda & Event Kampus · Proyek UTS RPL</p>
</footer>

<script>
const search = document.getElementById("search");
const category = document.getElementById("category");
const cards = document.querySelectorAll(".event-card");
const empty = document.getElementById("empty");

function filterEvents() {
    const keyword = search.value.toLowerCase().trim();
    const selectedCategory = category.value.toLowerCase();
    let visible = 0;

    cards.forEach(card => {
        const name = card.dataset.name;
        const location = card.dataset.location;
        const eventCategory = card.dataset.category;

        const matchKeyword =
            name.includes(keyword) || location.includes(keyword);
        const matchCategory =
            selectedCategory === "" ||
            eventCategory === selectedCategory;

        if (matchKeyword && matchCategory) {
            card.style.display = "";
            visible++;
        } else {
            card.style.display = "none";
        }
    });

    empty.style.display = visible === 0 ? "block" : "none";
}

search.addEventListener("input", filterEvents);
category.addEventListener("change", filterEvents);
</script>
</body>
</html>