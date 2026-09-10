<?php
// songs.php - Երգերի ցանկ
$songsData = json_decode(file_get_contents('songs.json'), true);
$albums = $songsData['albums'];
?>
<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Երգեր - BangtanWorld</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mardoto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c96de77452.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .songs-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 40px;
        }

        .album-section {
            margin-bottom: 50px;
        }

        .album-header {
            display: flex;
            align-items: center;
            gap: 24px;
            margin-bottom: 24px;
            padding: 20px;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(128, 0, 255, 0.06);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .album-header:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(128, 0, 255, 0.1);
        }

      /*  .album-cover {
            width: 80px;
            height: 80px;
            border-radius: 12px;
            background: linear-gradient(135deg, #d2afff, #b88ae8);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: white;
            flex-shrink: 0;
        }*/
            .album-cover {
    width: 80px;
    height: 80px;
    border-radius: 12px;
    overflow: hidden; /* Ապահովում է, որ նկարը դուրս չգա անկյուններից */
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Ալբոմի նկարի ֆայլ */
.album-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Հավասարաչափ լրացնում է բլոկը առանց նկարը ձգելու */
    display: block;
}

        .album-info h3 {
            font-size: 22px;
            color: #3d2a4a;
            margin: 0 0 4px 0;
        }

        .album-info p {
            color: #7a5d8a;
            font-size: 14px;
            margin: 0;
        }

        .album-toggle {
            margin-left: auto;
            color: #b88ae8;
            font-size: 18px;
            transition: transform 0.3s ease;
        }

        .album-toggle.open {
            transform: rotate(180deg);
        }

        .songs-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            padding-left: 20px;
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.5s ease, opacity 0.3s ease;
            opacity: 0;
        }

        .songs-list.open {
            max-height: 2000px;
            opacity: 1;
            padding: 10px 0 20px 20px;
        }

        .song-item {
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(128, 0, 255, 0.06);
            transition: all 0.3s ease;
        }

        .song-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(128, 0, 255, 0.12);
        }

        .song-item .song-image {
            width: 100%;
            height: 160px;
            background: linear-gradient(135deg, #d2afff, #b88ae8);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            color: white;
        }

        .song-item .song-info {
            padding: 14px;
        }

        .song-item .song-info h4 {
            font-size: 16px;
            color: #3d2a4a;
            margin: 0 0 4px 0;
        }

        .song-item .song-info .song-album-name {
            font-size: 12px;
            color: #7a5d8a;
            margin: 0 0 10px 0;
        }

        .song-item .song-info .btn-view {
            display: inline-block;
            padding: 6px 18px;
            background: #f5edff;
            color: #7a5d8a;
            border-radius: 50px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .song-item .song-info .btn-view:hover {
            background: #ede0ff;
            transform: scale(1.05);
        }

        .search-filter {
            display: flex;
            gap: 16px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .search-filter input {
            flex: 1;
            min-width: 200px;
            padding: 12px 20px;
            border: 2px solid #e8d5f5;
            border-radius: 50px;
            font-family: 'Mardoto', sans-serif;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #ffffff;
        }

        .search-filter input:focus {
            outline: none;
            border-color: #b88ae8;
            box-shadow: 0 0 0 4px rgba(184, 138, 232, 0.1);
        }

        .search-filter select {
            padding: 12px 20px;
            border: 2px solid #e8d5f5;
            border-radius: 50px;
            font-family: 'Mardoto', sans-serif;
            font-size: 14px;
            background: #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-filter select:focus {
            outline: none;
            border-color: #b88ae8;
        }

        .songs-counter {
            text-align: center;
            color: #7a5d8a;
            font-size: 14px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .songs-container {
                padding: 0 20px;
            }

            .album-header {
                flex-wrap: wrap;
                padding: 16px;
            }

            .album-toggle {
                margin-left: 0;
                width: 100%;
                text-align: center;
            }

            .songs-list {
                grid-template-columns: repeat(2, 1fr);
                padding-left: 0;
            }

            .songs-list.open {
                padding-left: 0;
            }

            .search-filter {
                flex-direction: column;
            }

            .search-filter input,
            .search-filter select {
                width: 100%;
            }
        }

        @media (max-width: 500px) {
            .songs-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div id="head">
            <div class="header-left">
                <h1 class="head">BANGTAN WORLD</h1>
                <nav class="main-nav">
                    <a href="index.php" class="nav-link">Գլխավոր</a>
                    <a href="songs.php" class="nav-link active">Երգեր</a>
                    <a href="games.php" class="nav-link">Խաղեր</a>
                    <a href="about.php" class="nav-link">Մեր մասին</a>
                </nav>
            </div>
            <div class="header-right">
                <div class="account-menu">
                    <div class="user-icon">
                        <a href="#" class="icon-link">
                            <i class="fa-regular fa-user"></i>
                        </a>
                    </div>
                    <div class="account-dropdown">
                        <h3 class="dropdown-title">Account</h3>
                        <a href="signin.php"><button class="btn btn-primary">ՄՈՒՏՔ</button></a>
                        <a href="account.php"><button class="btn btn-secondary">ԳՐԱՆՑՎԵԼ</button></a>
                    </div>
                </div>
                <a href="#" class="icon-link">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
            </div>
        </div>
    </header>

    <main>
        <div class="songs-container">
            <h2 style="font-size: 32px; color: #3d2a4a; margin-bottom: 10px;">🎵 Երգեր</h2>
            <p style="color: #7a5d8a; margin-bottom: 24px;">Բոլոր BTS-ի երգերը մեկ տեղում</p>

            <!-- Search & Filter -->
            <div class="search-filter">
                <input type="text" id="searchInput" placeholder="Փնտրել երգ...">
                <select id="albumFilter">
                    <option value="">Բոլոր ալբոմները</option>
                    <?php foreach ($albums as $album): ?>
                        <option value="<?php echo htmlspecialchars($album['name']); ?>">
                            <?php echo htmlspecialchars($album['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="songs-counter" id="songCounter"></div>

            <!-- Albums -->
            <?php foreach ($albums as $albumIndex => $album): ?>
                <div class="album-section" data-album="<?php echo htmlspecialchars($album['name']); ?>">
                    <div class="album-header" onclick="toggleAlbum(this)">
                        <div class="album-cover">
                    <?php if (!empty($album['cover'])): ?>
                       <img src="<?php echo htmlspecialchars($album['cover']); ?>" alt="<?php echo htmlspecialchars($album['name']); ?>" style="width:100%; height:80px; object-fit:cover; border-radius:12px;">
                            <?php else: ?>
                                      💿
                                 <?php endif; ?>
                        </div>
                        <div class="album-info">
                            <h3><?php echo htmlspecialchars($album['name']); ?></h3>
                            <p><?php echo $album['year']; ?> • <?php echo count($album['songs']); ?> երգ</p>
                        </div>
                        <div class="album-toggle">
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="songs-list">
                        <?php foreach ($album['songs'] as $song): ?>
                            <div class="song-item" data-title="<?php echo htmlspecialchars($song['title']); ?>" data-album="<?php echo htmlspecialchars($album['name']); ?>">
                               <a href="song.php?id=<?php echo $song['id']; ?>" style="text-decoration: none;"><div class="song-image">
                                    <?php if (!empty($song['image'])): ?>
                                       <img src="<?php echo htmlspecialchars($song['image']); ?>" alt="<?php echo htmlspecialchars($song['title']); ?>" style="width:100%; height:100%; object-fit:cover;">
                                                <?php else: ?>
                                                     🎵
                                          <?php endif; ?>     
                                </div>
                                <div class="song-info">
                                    <h4><?php echo htmlspecialchars($song['title']); ?></h4>
                                    <p class="song-album-name"><?php echo htmlspecialchars($album['name']); ?></p>
                                    <a href="song.php?id=<?php echo $song['id']; ?>" class="btn-view">Դիտել</a>
                                </div></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <img style="width: 1500px;" src="bottom.gif">
        <div class="footer-content">
            <p>&copy; 2026 BangtanWorld - BTS Lyrics & Games</p>
        </div>
    </footer>

    <script>
        // Toggle album
        function toggleAlbum(header) {
            const list = header.nextElementSibling;
            const toggle = header.querySelector('.album-toggle');
            list.classList.toggle('open');
            toggle.classList.toggle('open');
        }

        // Open first album by default
        document.addEventListener('DOMContentLoaded', function() {
            const firstAlbum = document.querySelector('.songs-list');
            if (firstAlbum) {
                firstAlbum.classList.add('open');
                const firstToggle = document.querySelector('.album-toggle');
                if (firstToggle) firstToggle.classList.add('open');
            }
            updateCounter();
        });

        // Search and filter
        const searchInput = document.getElementById('searchInput');
        const albumFilter = document.getElementById('albumFilter');

        function filterSongs() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedAlbum = albumFilter.value.toLowerCase();

            const songItems = document.querySelectorAll('.song-item');
            let visibleCount = 0;

            songItems.forEach(item => {
                const title = item.dataset.title.toLowerCase();
                const album = item.dataset.album.toLowerCase();
                const matchSearch = title.includes(searchTerm);
                const matchAlbum = selectedAlbum === '' || album === selectedAlbum;
                const isVisible = matchSearch && matchAlbum;

                if (isVisible) {
                    item.style.display = '';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }

                // Show/hide album sections
                const section = item.closest('.album-section');
                const songsInSection = section.querySelectorAll('.song-item');
                let hasVisible = false;
                songsInSection.forEach(s => {
                    if (s.style.display !== 'none') hasVisible = true;
                });

                if (hasVisible) {
                    section.style.display = '';
                    // Auto-open if has visible songs
                    const list = section.querySelector('.songs-list');
                    if (list && !list.classList.contains('open')) {
                        list.classList.add('open');
                        const toggle = section.querySelector('.album-toggle');
                        if (toggle) toggle.classList.add('open');
                    }
                } else {
                    section.style.display = 'none';
                }
            });

            document.getElementById('songCounter').textContent = 
                `Ցուցադրվում է ${visibleCount} երգ`;
        }

        searchInput.addEventListener('input', filterSongs);
        albumFilter.addEventListener('change', filterSongs);

        function updateCounter() {
            const total = document.querySelectorAll('.song-item').length;
            document.getElementById('songCounter').textContent = 
                `Ընդհանուր ${total} երգ`;
        }
    </script>
</body>
</html>