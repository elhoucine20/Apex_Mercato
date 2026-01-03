<?php
include "DataBase.php";
include_once "Joueur.php";


if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){

    if(!empty($_POST['name'])){

        $name = htmlspecialchars(trim($_POST['name']));
        $role = htmlspecialchars(trim($_POST['role']));
        $nationalite = isset($_POST['nationalite']);
        $email = isset($_POST['email']);
        $valeurMarcher = isset($_POST['valeur_marche']);
        $IdEquipe = isset($_POST['equipe_id']);
        $IdContra=isset($_POST['id_contra']);

        $NewJoueur = new Joueur($name,$email,$nationalite,$IdEquipe,$role,$valeurMarcher);
        // $NewEquipe->SetName($nom);
        // $NewEquipe->SetManager($manager);
        // $NewEquipe->SetBudget($budget);
        if($NewJoueur->Create($conn)){
            header("Location: dashbordAdmin.php?valide=1");
            exit();
        } else {
            $error = "Erreur en l'ajoute de joueur.";
        }

    } else {
        $error = "Erreur en name de joueur.";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Joueur</title>
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
            padding: 40px 20px;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .form-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .form-header h1 {
            font-size: 32px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .form-header p {
            opacity: 0.9;
            font-size: 15px;
        }

        .form-body {
            padding: 40px 30px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
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
            margin-left: 3px;
        }

        input,
        select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s;
            font-family: inherit;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        select {
            cursor: pointer;
            background-color: white;
        }

        .input-icon {
            position: relative;
        }

        .input-icon input {
            padding-left: 40px;
        }

        .input-icon::before {
            content: attr(data-icon);
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #999;
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: #f5f5f5;
            color: #666;
            border: 2px solid #e0e0e0;
        }

        .btn-secondary:hover {
            background: #ebebeb;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 20px;
            transition: all 0.3s;
        }

        .back-link:hover {
            gap: 12px;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .btn-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h1>⚽ Ajouter un Joueur</h1>
            <p>Remplissez les informations du joueur</p>
        </div>

        <div class="form-body">
            <a href="#" class="back-link">← Retour au tableau de bord</a>

            <form action="" method="POST">
                <div class="form-row">
                   

                    <div class="form-group">
                        <label for="name">Nom complet <span class="required">*</span></label>
                        <input type="text" id="name" name="name" placeholder="Ex: Achraf Hakimi" required>
                    </div>
                     <div class="form-group">
                        <label for="id_contra">ID Contra <span class="required">*</span></label>
                        <input type="number" id="id_contra" name="id_contra" placeholder="id_contra" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="role">Poste/Rôle <span class="required">*</span></label>
                        <select id="role" name="role" required>
                            <option value="">-- Sélectionner un poste --</option>
                            <option value="Gardien">Gardien</option>
                            <option value="Défenseur">Défenseur</option>
                            <option value="Milieu défensif">Milieu défensif</option>
                            <option value="Milieu offensif">Milieu offensif</option>
                            <option value="Ailier">Ailier</option>
                            <option value="Attaquant">Attaquant</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" id="email" name="email" placeholder="Ex: joueur@email.com" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="nationalite">Nationalité <span class="required">*</span></label>
                        <select id="nationalite" name="nationalite" required>
                            <option value="">-- Sélectionner --</option>
                            <option value="Maroc">🇲🇦 Maroc</option>
                            <option value="France">🇫🇷 France</option>
                            <option value="Espagne">🇪🇸 Espagne</option>
                            <option value="Portugal">🇵🇹 Portugal</option>
                            <option value="Brésil">🇧🇷 Brésil</option>
                            <option value="Argentine">🇦🇷 Argentine</option>
                            <option value="Allemagne">🇩🇪 Allemagne</option>
                            <option value="Italie">🇮🇹 Italie</option>
                            <option value="Angleterre">🏴󠁧󠁢󠁥󠁮󠁧󠁿 Angleterre</option>
                            <option value="Belgique">🇧🇪 Belgique</option>
                            <option value="Pays-Bas">🇳🇱 Pays-Bas</option>
                            <option value="Autre">🌍 Autre</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="valeur_marche">Valeur Marché (€) <span class="required">*</span></label>
                        <input type="number" id="valeur_marche" name="valeur_marche" placeholder="Ex: 50000000" step="0.01" required>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label for="equipe_id">Équipe id<span class="required">*</span></label>
                    <input type="number" id="equipe_id" name="equipe_id" required>
                        <!-- <option value="">-- Sélectionner une équipe --</option>
                        <option value="1">Paris Saint-Germain</option>
                        <option value="2">Real Madrid</option>
                        <option value="3">FC Barcelona</option>
                        <option value="4">Manchester City</option>
                        <option value="5">Bayern Munich</option>
                        <option value="6">Liverpool FC</option>
                        <option value="7">Chelsea FC</option>
                        <option value="8">Juventus</option>
                        <option value="9">Inter Milan</option>
                        <option value="10">Raja Club Athletic</option>
                        <option value="11">Wydad AC</option>
                        <option value="12">Al-Hilal</option>
                        <option value="13">Galatasaray</option>
                        <option value="14">Fenerbahçe</option> -->
                    <!-- </select> -->
                </div>

                <div class="btn-group">
                    <button type="reset" class="btn btn-secondary">🔄 Réinitialiser</button>
                    <button type="submit" name="submit"  class="btn btn-primary">✓ Ajouter le joueur</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>