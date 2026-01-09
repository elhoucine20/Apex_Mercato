<?php
require_once 'autoload.php';

use Apex\Transfert\Transfert;
use Apex\DataBase\DataBase;

$conn = DataBase::ConnexionDataBase();
$lesTransferts = Transfert::AffichageDesTransferts($conn);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Transferts</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .content-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            position: relative;
        }

        .content-card h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .content-card button {
            position: absolute;
            top: 30px;
            right: 30px;
            padding: 10px 20px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .content-card button:hover {
            background: #764ba2;
        }

        .content-card button a {
            color: white;
            text-decoration: none;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85em;
            letter-spacing: 0.5px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
        }

        tbody tr {
            transition: background-color 0.3s;
        }

        tbody tr:hover {
            background-color: #f8f9ff;
        }

        .badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.85em;
            font-weight: 600;
        }

        .badge-equipe {
            background: #e3f2fd;
            color: #1976d2;
        }

        .badge-ancien {
            background: #ffebee;
            color: #c62828;
        }

        .badge-nouveau {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .date {
            color: #666;
            font-size: 0.9em;
        }

        .montant {
            color: #4caf50;
            font-weight: 600;
            font-size: 1.05em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content-card">
            <button><a href="dashbordAdmin.php">Dashboard Admin</a></button>
            <h2>🔄 Liste des Transferts</h2>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Joueur</th>
                            <th>Coach </th>
                            <th>Dernier Équipe</th>
                            <th>Nouvelle Équipe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($lesTransferts as $transfert){ ?>
                        <tr>
                            <td><?= $transfert['id'] ?></td>
                            <td><?= $transfert['joueur_name'] ?></td>
                            <td><?= $transfert['coach_name'] ?></td>
                            <td><span class="badge badge-ancien"><?= $transfert['dernier_equipe'] ?></span></td>
                            <td><span class="badge badge-nouveau"><?= $transfert['nouvelle_equipe'] ?></span></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>