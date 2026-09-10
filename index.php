<?php
// index.php - Գլխավոր էջ
?>
<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BangtanWorld - BTS Lyrics & Games</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mardoto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c96de77452.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div id="head">
            <div class="header-left">
                <h1 class="head">BANGTAN WORLD</h1>
                <nav class="main-nav">
                    <a href="index.php" class="nav-link active">Գլխավոր</a>
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
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-content">
                <h2>Բացահայտիր BTS-ի աշխարհը</h2>
                <p>Երգերի բառեր, թարգմանություններ և հետաքրքիր խաղեր</p>
                <div class="hero-buttons">
                    <a href="songs.php" class="btn-hero primary">Դիտել երգերը</a>
                    <a href="games.php" class="btn-hero secondary">Խաղալ խաղեր</a>
                </div>
            </div>
            <div class="hero-image">
                <i class="fa-solid fa-music" style="font-size: 120px; color: #b88ae8;"></i>
            </div>
        </section>

        <!-- Quick Stats -->
        <section class="stats">
            <div class="stat-item">
                <span class="stat-number">250+</span>
                <span class="stat-label">Երգեր</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">16</span>
                <span class="stat-label">Ալբոմներ</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">3</span>
                <span class="stat-label">Խաղեր</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">7</span>
                <span class="stat-label">Անդամներ</span>
            </div>
        </section>

        <!-- Featured Songs -->
        <section class="featured">
            <h2 class="section-title">Հանրահայտ երգեր</h2>
            <div class="song-grid">
                <div class="song-card">
                    <a href="song.php?id=1"style=" text-decoration: none;"><div class="song-cover" style="background: #d2afff;">🎵</div>
                    <h3>Dynamite</h3>
                    <p class="song-album">BE</p>
                    <a href="song.php?id=1" class="btn-small">Դիտել</a>
                </div></a>
                <div class="song-card">
                    <a href="song.php?id=1"style=" text-decoration: none;"> <div class="song-cover" style="background: #b88ae8;">🎵</div>
                    <h3>Butter</h3>
                    <p class="song-album">Butter</p>
                    <a href="song.php?id=2" class="btn-small">Դիտել</a>
                </div></a>
                <div class="song-card">
                     <a href="song.php?id=1"style=" text-decoration: none;"> <div class="song-cover" style="background: #9b6fd4;">🎵</div>
                    <h3>Spring Day</h3>
                    <p class="song-album">You Never Walk Alone</p>
                    <a href="song.php?id=3" class="btn-small">Դիտել</a>
                </div></a>
                <div class="song-card">
                      <a href="song.php?id=1"style=" text-decoration: none;"><div class="song-cover" style="background: #7a5d8a;">🎵</div>
                    <h3>DNA</h3>
                    <p class="song-album">Love Yourself: Her</p>
                    <a href="song.php?id=4" class="btn-small">Դիտել</a>
                </div></a>
            </div>
        </section>
    </main>

    <footer>
        <img style="width: 1500px;" src="bottom.gif">
        <div class="footer-content">
            <p>&copy; 2026 BangtanWorld - BTS Lyrics & Games</p>
         
        </div>
    </footer>


    <script src="index.js"></script>
</body>
</html>