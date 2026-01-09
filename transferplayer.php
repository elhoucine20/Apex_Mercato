<?php 
require_once 'autoload.php';

use Apex\Transfert\Transfert;
use Apex\DataBase\DataBase;
$conn = DataBase::ConnexionDataBase();



if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){

    if(!empty($_POST['id_joueur'])){
        $joueur_id=htmlspecialchars(trim($_POST['id_joueur']));
    }
    
       if(!empty($_POST['id_equipe_A'])){
        $id_equipe_A=htmlspecialchars(trim($_POST['id_equipe_A']));
    }
       if(!empty($_POST['id_equipe_B'])){
        $id_equipe_B=htmlspecialchars(trim($_POST['id_equipe_B']));
    }
    if($id_equipe_A==$id_equipe_B){
        exit();
    }
$Transfert=new Transfert ();
$Transfert->TransfertJoueur($conn,$joueur_id,$id_equipe_A,$id_equipe_B);
header("location:dashbordAdmin.php");


}


?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfert de Joueur</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
            max-width: 500px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
            font-size: 14px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #f9f9f9;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        button {
            flex: 1;
            padding: 14px 25px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .submit-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        .reset-btn {
            background: #e0e0e0;
            color: #555;
        }

        .reset-btn:hover {
            background: #d0d0d0;
            transform: translateY(-2px);
        }

        .icon {
            margin-right: 8px;
        }

        @media (max-width: 500px) {
            .container {
                padding: 25px;
            }

            h1 {
                font-size: 24px;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>⚽ Transfert de Joueur</h1>
        <form action="" method="POST" id="transferForm">
            <div class="form-group">
                <label for="id_joueur">ID Joueur</label>
                <input type="number" id="id_joueur" name="id_joueur" required placeholder="Entrez l'ID du joueur">
            </div>

            <div class="form-group">
                <label for="id_equipe_A">ID Équipe A (Départ)</label>
                <input type="number" id="id_equipe_A" name="id_equipe_A" required placeholder="Équipe de départ">
            </div>

            <div class="form-group">
                <label for="id_equipe_B">ID Équipe B (Arrivée)</label>
                <input type="number" id="id_equipe_B" name="id_equipe_B" required placeholder="Équipe d'arrivée">
            </div>

            <div class="button-group">
                <button type="submit" name="submit" class="submit-btn">
                    <span class="icon">✓</span> Add Transfert
                </button>
                <button type="reset" class="reset-btn">
                    <span class="icon">↺</span> Reset
                </button>
            </div>
        </form>
    </div>

    <!-- <script>
        document.getElementById('transferForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const idJoueur = document.getElementById('id_joueur').value;
            const idEquipeA = document.getElementById('id_equipe_A').value;
            const idEquipeB = document.getElementById('id_equipe_B').value;
            
            console.log('Transfert ajouté:', {
                id_joueur: idJoueur,
                id_equipe_A: idEquipeA,
                id_equipe_B: idEquipeB
            });
            
            alert('Transfert ajouté avec succès!\n\nJoueur: ' + idJoueur + '\nÉquipe A: ' + idEquipeA + '\nÉquipe B: ' + idEquipeB);
        });
    </script> -->
</body>
</html>