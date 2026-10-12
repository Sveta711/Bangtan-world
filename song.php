<?php
// song.php - Առանձին երգի էջ
$songId = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$songsData = json_decode(file_get_contents('songs.json'), true);
$albums = $songsData['albums'];

$song = null;
$albumName = '';
$albumYear = '';

// Find the song
foreach ($albums as $album) {
    foreach ($album['songs'] as $s) {
        if ($s['id'] === $songId) {
            $song = $s;
            $albumName = $album['name'];
            $albumYear = $album['year'];
            break 2;
        }
    }
}

if (!$song) {
    // If song not found, redirect to songs list
    header('Location: songs.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($song['title']); ?> - BangtanWorld</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mardoto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c96de77452.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .song-page {
            max-width: 800px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .song-header {
            background: #ffffff;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(128, 0, 255, 0.06);
            margin-bottom: 30px;
            text-align: center;
        }

        .song-header .song-cover-big {
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, #d2afff, #b88ae8);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 64px;
            color: white;
            box-shadow: 0 8px 30px rgba(128, 0, 255, 0.15);
        }

        .song-header h1 {
            font-size: 36px;
            color: #3d2a4a;
            margin: 0 0 8px 0;
        }

        .song-header .song-meta {
            color: #7a5d8a;
            font-size: 16px;
        }

        .song-header .song-meta span {
            margin: 0 8px;
        }

        .song-actions {
            display: flex;
            justify-content: center;
            gap: 16px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .song-actions a {
            padding: 10px 24px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .song-actions .btn-youtube {
            background: #ff0000;
            color: white;
        }

        .song-actions .btn-youtube:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 0, 0, 0.3);
        }

        .song-actions .btn-spotify {
            background: #1DB954;
            color: white;
        }

        .song-actions .btn-spotify:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(29, 185, 84, 0.3);
        }

        .song-actions .btn-back {
            background: #f5edff;
            color: #7a5d8a;
        }

        .song-actions .btn-back:hover {
            background: #ede0ff;
            transform: translateY(-2px);
        }

        .lyrics-section {
            background: #ffffff;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(128, 0, 255, 0.06);
        }

        .lyrics-section h2 {
            font-size: 24px;
            color: #3d2a4a;
            margin: 0 0 24px 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .lyric-line {
            display: flex;
            flex-direction: column;
            padding: 12px 0;
            border-bottom: 1px solid #f5edff;
        }

        .lyric-line:last-child {
            border-bottom: none;
        }

        .lyric-original {
            font-size: 18px;
            color: #3d2a4a;
            font-weight: 500;
        }

        .lyric-translation {
            font-size: 15px;
            color: #7a5d8a;
            margin-top: 4px;
            padding-left: 16px;
            border-left: 3px solid #d2afff;
        }

        .back-to-songs {
            display: inline-block;
            margin-top: 24px;
            color: #7a5d8a;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .back-to-songs:hover {
            color: #9b6fd4;
        }

        @media (max-width: 768px) {
            .song-header {
                padding: 24px;
            }

            .song-header h1 {
                font-size: 28px;
            }

            .lyrics-section {
                padding: 24px;
            }

            .lyric-original {
                font-size: 16px;
            }

            .song-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .song-actions a {
                justify-content: center;
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
                    <a href="songs.php" class="nav-link">Երգեր</a>
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
        <div class="song-page">
            <div class="song-header">
                <div class="song-cover-big">
                   <?php if (!empty($song['image'])): ?>
                        <img src="<?php echo htmlspecialchars($song['image']); ?>" alt="<?php echo htmlspecialchars($song['title']); ?>" style="width:100%; height:100%; border-radius:50%; object-fit:cover;">
                    <?php else: ?>
                                🎵
                            <?php endif; ?>
                </div>
                <h1><?php echo htmlspecialchars($song['title']); ?></h1>
                <div class="song-meta">
                    <span><?php echo htmlspecialchars($albumName); ?></span>
                    <span>•</span>
                    <span><?php echo $albumYear; ?></span>
                </div>
                <div class="song-actions">
                    <?php if (isset($song['youtube'])): ?>
                        <a href="<?php echo htmlspecialchars($song['youtube']); ?>" target="_blank" class="btn-youtube">
                            <i class="fa-brands fa-youtube"></i> Դիտել YouTube-ում
                        </a>
                    <?php endif; ?>
                    <?php if (isset($song['spotify'])): ?>
                        <a href="<?php echo htmlspecialchars($song['spotify']); ?>" target="_blank" class="btn-spotify">
                            <i class="fa-brands fa-spotify"></i> Լսել Spotify-ում
                        </a>
                    <?php endif; ?>
                    <a href="songs.php" class="btn-back">
                        <i class="fa-solid fa-arrow-left"></i> Վերադառնալ
                    </a>
                </div>
            </div>

            <div class="lyrics-section">
                <h2><i class="fa-solid fa-book-open" style="color: #b88ae8;"></i> Բառեր և թարգմանություն</h2>
                <?php if (!empty($song['lyrics'])): ?>
                    <?php foreach ($song['lyrics'] as $line): ?>
                        <div class="lyric-line">
                            <div class="lyric-original"><?php echo htmlspecialchars($line['line']); ?></div>
                            <div class="lyric-translation"><?php echo htmlspecialchars($line['translation']); ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="color: #7a5d8a; text-align: center;">Բառերը դեռ ավելացված չեն</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <footer>
        <img id="gif" style="width: 1500px;" src="bottom.gif">
        <div class="footer-content">
            <p>&copy; 2026 BangtanWorld - BTS Lyrics & Games</p>
        </div>
    </footer>
</body>
</html>