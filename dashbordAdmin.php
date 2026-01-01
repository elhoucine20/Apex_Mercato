
<?php
include "Equipe.php";
include "DataBase.php";
// $NewEquipe=new Equipe(); 


// include "Equipe.php";

// $nom='';
// $Manager='';
// $Budget='';
// $equipe="equipe";


   $NewEquipe = new Equipe();
   $equipes = $NewEquipe->Affichage("equipe",$conn);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: 260px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px 20px;
            color: white;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 40px;
            font-size: 24px;
            font-weight: bold;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            margin-bottom: 8px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        .logout {
            position: absolute;
            bottom: 30px;
            left: 20px;
            right: 20px;
        }

        .logout a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            background: rgba(255,255,255,0.1);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .logout a:hover {
            background: rgba(255,255,255,0.2);
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 30px;
        }

        .header {
            background: white;
            padding: 20px 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            color: #333;
            font-size: 28px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .stat-icon.blue {
            background: rgba(102, 126, 234, 0.1);
        }

        .stat-icon.green {
            background: rgba(46, 213, 115, 0.1);
        }

        .stat-icon.orange {
            background: rgba(255, 159, 67, 0.1);
        }

        .stat-icon.purple {
            background: rgba(118, 75, 162, 0.1);
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

        /* Tables */
        .content-section {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-header h2 {
            color: #333;
            font-size: 20px;
        }

        .btn {
            padding: 10px 20px;
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

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8f9fa;
            padding: 12px;
            text-align: left;
            font-weight: 600;
            color: #555;
            border-bottom: 2px solid #e9ecef;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #e9ecef;
            color: #666;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .badge {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge.active {
            background: #d4edda;
            color: #155724;
        }

        .badge.inactive {
            background: #f8d7da;
            color: #721c24;
        }

        .action-btn {
            padding: 6px 12px;
            margin: 0 4px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            transition: all 0.3s;
        }

        .action-btn.edit {
            background: #fff3cd;
            color: #856404;
        }

        .action-btn.delete {
            background: #f8d7da;
            color: #721c24;
        }

        .action-btn:hover {
            opacity: 0.8;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }

            .sidebar .menu a span,
            .sidebar .logo span,
            .logout a span {
                display: none;
            }

            .main-content {
                margin-left: 70px;
            }
        }
    </style>

</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <span>📊</span>
            <span>Admin Panel</span>
        </div>

        <ul class="menu">
            <li><a href="#" class="active">📈 <span>Dashboard</span></a></li>
            <li><a href="#joueurs">⚽ <span>Joueurs</span></a></li>
            <li><a href="#coachs">👔 <span>Coachs</span></a></li>
            <li><a href="#equipes">🏆 <span>Équipes</span></a></li>
            <li><a href="#">📰 <span>Articles</span></a></li>
            <li><a href="#">👥 <span>Utilisateurs</span></a></li>
            <li><a href="#">⚙️ <span>Paramètres</span></a></li>
        </ul>

        <div class="logout">
            <a href="#">🚪 <span>Déconnexion</span></a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <div class="header">
            <h1>Tableau de bord</h1>
            <div class="user-info">
                <div>
                    <div style="font-weight: 600; color: #333;">Admin</div>
                    <div style="font-size: 12px; color: #999;">Administrateur</div>
                </div>
                <div class="avatar">A</div>
            </div>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon blue">⚽</div>
                </div>
                <div class="stat-value">248</div>
                <div class="stat-label">Total Joueurs</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon green">👔</div>
                </div>
                <div class="stat-value">32</div>
                <div class="stat-label">Total Coachs</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon orange">🏆</div>
                </div>
                <div class="stat-value">18</div>
                <div class="stat-label">Équipes</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon purple">📰</div>
                </div>
                <div class="stat-value">156</div>
                <div class="stat-label">Articles</div>
            </div>
        </div>

        <!-- Recent Players -->
        <div id="joueurs" class="content-section">
            <div class="section-header">
                <h2>Joueurs récents</h2>
                <a href="formJoueur.php" class="btn">+ Ajouter joueur</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Rôle</th>
                        <th>Équipe</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#001</td>
                        <td>Achraf Hakimi</td>
                        <td>Défenseur</td>
                        <td>PSG</td>
                        <td><span class="badge active">Actif</span></td>
                        <td>
                            <button class="action-btn edit">✏️ Modifier</button>
                            <button class="action-btn delete">🗑️ Supprimer</button>
                        </td>
                    </tr>
                    <tr>
                        <td>#002</td>
                        <td>Yassine Bounou</td>
                        <td>Gardien</td>
                        <td>Al-Hilal</td>
                        <td><span class="badge active">Actif</span></td>
                        <td>
                            <button class="action-btn edit">✏️ Modifier</button>
                            <button class="action-btn delete">🗑️ Supprimer</button>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>#003</td>
                        <td>Hakim Ziyech</td>
                        <td>Milieu</td>
                        <td>Galatasaray</td>
                        <td><span class="badge active">Actif</span></td>
                        <td>
                            <button class="action-btn edit">✏️ Modifier</button>
                            <button class="action-btn delete">🗑️ Supprimer</button>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>

        <!-- Recent Coachs -->
        <div id="coachs" class="content-section">
            <div class="section-header">
                <h2>Coachs récents</h2>
                <a href="formCoach.php" class="btn">+ Ajouter coach</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Style</th>
                        <th>Expérience</th>
                        <th>Équipe</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#C01</td>
                        <td>Walid Regragui</td>
                        <td>Offensif</td>
                        <td>8 ans</td>
                        <td>Maroc</td>
                        <td>
                            <button class="action-btn edit">✏️ Modifier</button>
                            <button class="action-btn delete">🗑️ Supprimer</button>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>#C02</td>
                        <td>Hussein Amotta</td>
                        <td>Équilibré</td>
                        <td>5 ans</td>
                        <td>Raja CA</td>
                        <td>
                            <button class="action-btn edit">✏️ Modifier</button>
                            <button class="action-btn delete">🗑️ Supprimer</button>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>


        <!-- equipes -->
        <div id="equipes" class="content-section">
            <div class="section-header">
                <h2>equipes récents</h2>
                <a href="AddEquipe.php" class="btn">+ Ajouter equipes</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Manager</th>
                        <th>Budget</th>
                        <!-- <th>Statut</th> -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach($equipes as $equipe){ ?>
                    <tr>
                        <td><?= $equipe["id"] ?></td>
                        <td><?= $equipe["Name"] ?></td>
                        <td><?= $equipe['Manager'] ?></td>
                        <td><?= $equipe['Budget'] ?></td>
                        <td>
                            <button class="action-btn edit">✏️ Modifier</button>
                            <button class="action-btn delete">🗑️ Supprimer</button>
                        </td>
                    </tr> 
                    <?php  }?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>