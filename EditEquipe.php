<?php
// include_once "DataBase.php"; 
// include_once "Equipe.php";

require_once 'autoload.php';

use Apex\Equipe\Equipe;
use Apex\DataBase\DataBase;
$conn = DataBase::ConnexionDataBase();


if (!isset($_GET['id'])) {
    header("Location: dashbordAdmin.php");
    exit;
}

$id = $_GET['id'];
$equipe = new Equipe();

// commande de saql pour select les donnes
$stmt = $conn->prepare("SELECT * FROM equipe WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// verifie submit de edit
if (isset($_POST['update'])) {

    $newName=$_POST['name'];
    $newManager=$_POST['manager'];
    $newBudget = $_POST['budget'];

    $equipe->EditEquipe($conn, $newBudget,$newManager,$newName, $id);

    header("Location: dashbordAdmin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'equipe</title>
    <style>
        body{
            font-family: Arial;
            background:#f4f6f8;
        }
        .box{
            width:400px;
            margin:80px auto;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,.1);
        }
        input,button{
            width:100%;
            padding:10px;
            margin-bottom:15px;
        }
        button{
            background:#28a745;
            color:white;
            border:none;
            border-radius:5px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Modifier Budget</h2>

    <form method="POST">
        <label>Nom</label>
        <input type="text" name="name" value="<?= htmlspecialchars($data['Name']) ?>" required>

        <label>Manager</label>
        <input type="text" name="manager" value="<?= htmlspecialchars($data['Manager']) ?>" required>

        <label>Budget</label>
        <input type="number" name="budget" value="<?= $data['Budget'] ?>" required>

        <button name="update">Modifier</button>
    </form>
</div>

</body>
</html>
