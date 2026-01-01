<?php
include "Equipe.php";
include "DataBase.php";

$equipe = new Equipe();
$idEquipe = $_GET['id']; 


// // Traitement de formulaire
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $newBudget = $_POST['budget'];

    if ($equipe->EditBudget($conn, $newBudget, $idEquipe)) {
        header("Location: dashbordAdmin.php");
        exit();
    } else {
        $error = "Erreur lors de la modification du budget";
    }
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Budget</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: #fff;
            width: 400px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #667eea;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #5a67d8;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>💰 Modifier le Budget</h2>

    <form method="POST">
        <label>Nouveau Budget (€)</label>
        <input type="number" name="budget" placeholder="Ex: 8000000" required>

        <button type="submit" name="submit">💾 Enregistrer</button>
    </form>

    <a href="dashbordAdmin.php#equipes" class="back">⬅ Retour</a>
</div>

</body>
</html>
