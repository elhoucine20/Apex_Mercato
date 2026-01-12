<?php
session_start();
if (!$_SESSION['role'] == "journaliste") {
    header("location:logout.php");
}





?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Journalist</title>
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
            padding: 20px 40px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 24px;
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

        .nav a:hover,
        .nav a.active {
            color: #667eea;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .welcome-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            border-radius: 12px;
            margin-bottom: 30px;
        }

        .welcome-section h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .welcome-section p {
            opacity: 0.9;
            font-size: 16px;
        }

        /* Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            text-align: center;
        }

        .stat-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .stat-value {
            font-size: 32px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #999;
            font-size: 14px;
        }

        /* Articles Section */
        .section {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .section-header h2 {
            color: #333;
            font-size: 24px;
        }

        .btn-primary {
            padding: 12px 24px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        .article-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .article-card {
            border: 1px solid #e9ecef;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s;
        }

        .article-card:hover {
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transform: translateY(-4px);
        }

        .article-image {
            width: 100%;
            height: 180px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
        }

        .article-content {
            padding: 20px;
        }

        .article-status {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .article-status.published {
            background: #d4edda;
            color: #155724;
        }

        .article-status.draft {
            background: #fff3cd;
            color: #856404;
        }

        .article-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .article-meta {
            color: #999;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .article-actions {
            display: flex;
            gap: 10px;
        }

        .btn-small {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-edit {
            background: #fff3cd;
            color: #856404;
        }

        .btn-delete {
            background: #f8d7da;
            color: #721c24;
        }

        .btn-small:hover {
            opacity: 0.8;
        }

        /* Recent Activity */
        .activity-list {
            list-style: none;
        }

        .activity-item {
            padding: 15px;
            border-left: 3px solid #667eea;
            background: #f8f9fa;
            margin-bottom: 15px;
            border-radius: 6px;
        }

        .activity-time {
            color: #999;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .activity-text {
            color: #555;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 20px;
            }

            .nav {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">
            📰 <span>Journal Portal</span>
        </div>
        
        <nav class="nav">
            <a href="#" class="active">Tableau de bord</a>
            <a href="#">Mes articles</a>
            <a href="#">Créer article</a>
            <a href="#">Archives</a>
        </nav>

        <div class="user-section">
            <div class="avatar">J</div>
            <a href="logout.php" style="color: #666; text-decoration: none; font-weight: 500;">Déconnexion</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Welcome -->
        <div class="welcome-section">
            <h1>👋 Bienvenue, Journalist</h1>
            <p>Gérez vos articles et partagez vos actualités sportives avec le monde</p>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📝</div>
                <div class="stat-value">24</div>
                <div class="stat-label">Articles publiés</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">📄</div>
                <div class="stat-value">5</div>
                <div class="stat-label">Brouillons</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">👁️</div>
                <div class="stat-value">12.5k</div>
                <div class="stat-label">Vues totales</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">❤️</div>
                <div class="stat-value">3.2k</div>
                <div class="stat-label">Réactions</div>
            </div>
        </div>

        <!-- My Articles -->
        <div class="section">
            <div class="section-header">
                <h2>Mes articles récents</h2>
                <a href="#" class="btn-primary">✍️ Nouvel article</a>
            </div>

            <div class="article-grid">
                <div class="article-card">
                    <div class="article-image">⚽</div>
                    <div class="article-content">
                        <span class="article-status published">Publié</span>
                        <div class="article-title">Achraf Hakimi brille au PSG</div>
                        <div class="article-meta">📅 Publié il y a 2 jours • 👁️ 1.2k vues</div>
                        <div class="article-actions">
                            <button class="btn-small btn-edit">✏️ Modifier</button>
                            <button class="btn-small btn-delete">🗑️ Supprimer</button>
                        </div>
                    </div>
                </div>

                <div class="article-card">
                    <div class="article-image">🏆</div>
                    <div class="article-content">
                        <span class="article-status published">Publié</span>
                        <div class="article-title">Le Raja remporte le derby</div>
                        <div class="article-meta">📅 Publié il y a 5 jours • 👁️ 2.8k vues</div>
                        <div class="article-actions">
                            <button class="btn-small btn-edit">✏️ Modifier</button>
                            <button class="btn-small btn-delete">🗑️ Supprimer</button>
                        </div>
                    </div>
                </div>

                <div class="article-card">
                    <div class="article-image">🌍</div>
                    <div class="article-content">
                        <span class="article-status draft">Brouillon</span>
                        <div class="article-title">CAN 2025: Préparation des Lions</div>
                        <div class="article-meta">📅 Créé il y a 1 jour • ✍️ En cours</div>
                        <div class="article-actions">
                            <button class="btn-small btn-edit">✏️ Continuer</button>
                            <button class="btn-small btn-delete">🗑️ Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="section">
            <div class="section-header">
                <h2>Activité récente</h2>
            </div>

            <ul class="activity-list">
                <li class="activity-item">
                    <div class="activity-time">Il y a 2 heures</div>
                    <div class="activity-text">✅ Vous avez publié l'article "Achraf Hakimi brille au PSG"</div>
                </li>
                <li class="activity-item">
                    <div class="activity-time">Hier à 14:30</div>
                    <div class="activity-text">📝 Vous avez créé un nouveau brouillon "CAN 2025"</div>
                </li>
                <li class="activity-item">
                    <div class="activity-time">Il y a 3 jours</div>
                    <div class="activity-text">✏️ Vous avez modifié l'article "Le Raja remporte le derby"</div>
                </li>
                <li class="activity-item">
                    <div class="activity-time">Il y a 5 jours</div>
                    <div class="activity-text">✅ Vous avez publié l'article "Le Raja remporte le derby"</div>
                </li>
            </ul>
        </div>
    </main>
</body>
</html>