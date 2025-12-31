<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités Sportives</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
        }

        /* Header */
        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header-top {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 10px 0;
            text-align: center;
            font-size: 14px;
        }

        .header-main {
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        .nav {
            display: flex;
            gap: 30px;
        }

        .nav a {
            color: #666;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }

        .nav a:hover {
            color: #667eea;
        }

        .login-btn {
            padding: 10px 24px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 40px;
            text-align: center;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 18px;
            opacity: 0.9;
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .section-title {
            font-size: 28px;
            color: #333;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* Featured Articles */
        .featured-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 60px;
        }

        .article-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            transition: all 0.3s;
        }

        .article-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .article-image {
            width: 100%;
            height: 220px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 64px;
        }

        .article-content {
            padding: 25px;
        }

        .article-category {
            display: inline-block;
            padding: 5px 12px;
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .article-title {
            font-size: 22px;
            font-weight: 700;
            color: #333;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .article-excerpt {
            color: #666;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #999;
            font-size: 14px;
        }

        .read-more {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 10px;
        }

        .read-more:hover {
            gap: 10px;
        }

        /* Players Section */
        .players-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 60px;
        }

        .player-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            transition: all 0.3s;
        }

        .player-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.12);
        }

        .player-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
        }

        .player-name {
            font-size: 20px;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }

        .player-role {
            color: #667eea;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .player-team {
            color: #999;
            font-size: 13px;
        }

        /* Footer */
        .footer {
            background: #2c3e50;
            color: white;
            padding: 40px 20px;
            text-align: center;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer p {
            opacity: 0.8;
            margin-bottom: 20px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 20px;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: rgba(255,255,255,0.2);
        }

        @media (max-width: 768px) {
            .header-main {
                flex-direction: column;
                gap: 20px;
            }

            .nav {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }

            .hero h1 {
                font-size: 32px;
            }

            .featured-grid,
            .players-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-top">
            🏆 Suivez toute l'actualité sportive en temps réel
        </div>
        <div class="header-main">
            <div class="logo">
                ⚽ <span>Sport News</span>
            </div>
            
            <nav class="nav">
                <a href="#">Accueil</a>
                <a href="#">Articles</a>
                <a href="#">Joueurs</a>
                <a href="#">Équipes</a>
                <a href="#">Contact</a>
            </nav>

            <a href="#" class="login-btn">🔐 Connexion</a>
        </div>
    </header>

    <!-- Hero -->
    <section class="hero">
        <h1>🌟 Bienvenue sur Sport News</h1>
        <p>Découvrez les dernières actualités, joueurs et équipes du monde sportif</p>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Featured Articles -->
        <h2 class="section-title">📰 Articles à la une</h2>
        <div class="featured-grid">
            <article class="article-card">
                <div class="article-image">⚽</div>
                <div class="article-content">
                    <span class="article-category">FOOTBALL</span>
                    <h3 class="article-title">Achraf Hakimi brille au PSG cette saison</h3>
                    <p class="article-excerpt">
                        Le défenseur marocain continue d'impressionner avec ses performances exceptionnelles au Paris Saint-Germain...
                    </p>
                    <div class="article-meta">
                        <span>📅 Il y a 2 jours</span>
                        <span>👁️ 1.2k vues</span>
                    </div>
                    <a href="#" class="read-more">Lire l'article →</a>
                </div>
            </article>

            <article class="article-card">
                <div class="article-image">🏆</div>
                <div class="article-content">
                    <span class="article-category">BOTOLA</span>
                    <h3 class="article-title">Le Raja remporte le derby casablancais</h3>
                    <p class="article-excerpt">
                        Dans un match intense, le Raja Club Athletic s'impose face au Wydad avec un score de 2-1...
                    </p>
                    <div class="article-meta">
                        <span>📅 Il y a 3 jours</span>
                        <span>👁️ 2.8k vues</span>
                    </div>
                    <a href="#" class="read-more">Lire l'article →</a>
                </div>
            </article>

            <article class="article-card">
                <div class="article-image">🌍</div>
                <div class="article-content">
                    <span class="article-category">ÉQUIPE NATIONALE</span>
                    <h3 class="article-title">CAN 2025: Les Lions de l'Atlas en préparation</h3>
                    <p class="article-excerpt">
                        L'équipe nationale du Maroc intensifie ses entraînements en vue de la prochaine Coupe d'Afrique...
                    </p>
                    <div class="article-meta">
                        <span>📅 Il y a 1 semaine</span>
                        <span>👁️ 3.5k vues</span>
                    </div>
                    <a href="#" class="read-more">Lire l'article →</a>
                </div>
            </article>
        </div>

        <!-- Top Players -->
        <h2 class="section-title">⭐ Joueurs vedettes</h2>
        <div class="players-grid">
            <div class="player-card">
                <div class="player-avatar">⚽</div>
                <div class="player-name">Achraf Hakimi</div>
                <div class="player-role">Défenseur</div>
                <div class="player-team">Paris Saint-Germain</div>
            </div>

            <div class="player-card">
                <div class="player-avatar">🧤</div>
                <div class="player-name">Yassine Bounou</div>
                <div class="player-role">Gardien</div>
                <div class="player-team">Al-Hilal</div>
            </div>

            <div class="player-card">
                <div class="player-avatar">⚡</div>
                <div class="player-name">Hakim Ziyech</div>
                <div class="player-role">Milieu offensif</div>
                <div class="player-team">Galatasaray</div>
            </div>

            <div class="player-card">
                <div class="player-avatar">🎯</div>
                <div class="player-name">Youssef En-Nesyri</div>
                <div class="player-role">Attaquant</div>
                <div class="player-team">Fenerbahçe</div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <h3>⚽ Sport News</h3>
            <p>Votre source d'actualités sportives</p>
            <div class="social-links">
                <a href="#">📘</a>
                <a href="#">🐦</a>
                <a href="#">📷</a>
                <a href="#">▶️</a>
            </div>
            <p style="margin-top: 30px; font-size: 14px;">© 2025 Sport News. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>