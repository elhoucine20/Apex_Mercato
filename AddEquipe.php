<?php
require_once 'autoload.php';
use Apex\Equipe\Equipe;
use Apex\DataBase\DataBase;
   $conn = DataBase::ConnexionDataBase();

// include "DataBase.php";
// include_once "Equipe.php";



if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){
    if(!empty($_POST['name'])){
        var_dump($_POST['submit']);

        $nom = htmlspecialchars(trim($_POST['name']));
        $manager = htmlspecialchars(trim($_POST['manager']));
        $budget = isset($_POST['budget']) ? $_POST['budget'] : 0;

        // $NewEquipe =Equipe();
        // $NewEquipe->SetName();
        // $NewEquipe->SetManager();
        // $NewEquipe->SetBudget();
        $NewEquipe=Equipe::Create($conn,$nom,$manager,$budget);
        if($NewEquipe){
            // header("Location: dashbordAdmin.php");
            header("Location: dashbordAdmin.php");


        } else {
            $error = "Erreur en l'ajoute de l'equipe.";
        }

    } else {
        $error = "Erreur en name de l'equipe.";
    }
}

// modification de l'equipe
// if (!isset($_GET['id'])) {
//     header("Location: dashbordAdmin.php");
//     exit();
// }

// $id=$_GET['id'];
// $operation=$conn->prepare("SELECT * FROM equipe WHERE id=:id");
// $result = $operation->execute([':id'=> $id]);
//  if($result){

// $nom=$result['Name'];
// $manager=$result['Manager'];
// $budget=$result['Budget'];

// }else{
//   header("location: dashbordAdmin.php");
// }



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Équipe</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 650px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .form-header {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .form-header h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .form-header p {
            opacity: 0.9;
            font-size: 15px;
        }

        .form-body {
            padding: 40px 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }

        label .required {
            color: #e74c3c;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .info-box {
            background: #eaf2fb;
            border-left: 4px solid #3498db;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            color: #1f3a5f;
            font-size: 14px;
        }

        .btn-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #f5f5f5;
            color: #666;
            border: 2px solid #e0e0e0;
        }

        @media (max-width: 768px) {
            .btn-group {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="container">
    <div class="form-header">
        <h1>🏆 Ajouter une Équipe</h1>
        <p>Renseignez les informations de l’équipe</p>
    </div>

    <div class="form-body">

        <div class="info-box">
            <strong>ℹ️ Information</strong><br>
            Une équipe représente un club ou une sélection nationale.
        </div>

        <form action="" method="POST">

            <div class="form-group">
                <label>Nom de l’équipe <span class="required">*</span></label>
                <input type="text"  name="name" placeholder="Ex: Raja Club Athletic" required>
            </div>

            <div class="form-group">
                <label>Manager</label>
                <input type="text" name="manager"  placeholder="Ex: Aziz El Badraoui">
            </div>

            <div class="form-group">
                <label>Budget (€)</label>
                <input type="number" name="budget" min="0" placeholder="Ex: 5000000">
            </div>

            <div class="btn-group">
                <button type="reset" class="btn btn-secondary">🔄 Réinitialiser</button>
                <button type="submit" name="submit" class="btn btn-primary">✓ Ajouter l’équipe</button>
            </div>

        </form>
    </div>
</div>

</body>
</html>
