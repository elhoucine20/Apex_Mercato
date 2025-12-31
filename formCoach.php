<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Coach</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
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
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
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
            border-color: #2ecc71;
            box-shadow: 0 0 0 3px rgba(46, 204, 113, 0.1);
        }

        select {
            cursor: pointer;
            background-color: white;
        }

        .info-box {
            background: #e8f5e9;
            border-left: 4px solid #2ecc71;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            color: #1b5e20;
            font-size: 14px;
        }

        .info-box strong {
            display: block;
            margin-bottom: 5px;
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
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(46, 204, 113, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(46, 204, 113, 0.4);
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
            color: #2ecc71;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 20px;
            transition: all 0.3s;
        }

        .back-link:hover {
            gap: 12px;
        }

        .experience-helper {
            font-size: 12px;
            color: #999;
            margin-top: 5px;
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
            <h1>👔 Ajouter un Coach</h1>
            <p>Remplissez les informations de l'entraîneur</p>
        </div>

        <div class="form-body">
            <a href="#" class="back-link">← Retour au tableau de bord</a>

            <div class="info-box">
                <strong>💡 Information</strong>
                Les coachs sont des personnes clés pour la réussite d'une équipe. Assurez-vous de remplir toutes les informations avec précision.
            </div>

            <form action="" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="id">ID <span class="required">*</span></label>
                        <input type="number" id="id" name="id" placeholder="Ex: 1" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Nom complet <span class="required">*</span></label>
                        <input type="text" id="name" name="name" placeholder="Ex: Walid Regragui" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="role">Rôle/Fonction <span class="required">*</span></label>
                        <select id="role" name="role" required>
                            <option value="">-- Sélectionner un rôle --</option>
                            <option value="Entraîneur principal">Entraîneur principal</option>
                            <option value="Entraîneur adjoint">Entraîneur adjoint</option>
                            <option value="Entraîneur des gardiens">Entraîneur des gardiens</option>
                            <option value="Préparateur physique">Préparateur physique</option>
                            <option value="Entraîneur des jeunes">Entraîneur des jeunes</option>
                            <option value="Directeur technique">Directeur technique</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" id="email" name="email" placeholder="Ex: coach@email.com" required>
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
                        <label for="style_coach">Style de coaching <span class="required">*</span></label>
                        <select id="style_coach" name="style_coach" required>
                            <option value="">-- Sélectionner un style --</option>
                            <option value="Offensif">⚡ Offensif</option>
                            <option value="Défensif">🛡️ Défensif</option>
                            <option value="Équilibré">⚖️ Équilibré</option>
                            <option value="Possession">🔄 Possession</option>
                            <option value="Contre-attaque">🚀 Contre-attaque</option>
                            <option value="Pressing haut">🔥 Pressing haut</option>
                            <option value="Jeu direct">➡️ Jeu direct</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="annee_experience">Années d'expérience <span class="required">*</span></label>
                        <input type="number" id="annee_experience" name="annee_experience" placeholder="Ex: 10" min="0" max="50" required>
                        <div class="experience-helper">Nombre d'années en tant qu'entraîneur professionnel</div>
                    </div>

                    <div class="form-group">
                        <label for="equipe_id">Équipe <span class="required">*</span></label>
                        <select id="equipe_id" name="equipe_id" required>
                            <option value="">-- Sélectionner une équipe --</option>
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
                            <option value="12">Équipe nationale du Maroc</option>
                            <option value="13">Al-Hilal</option>
                            <option value="14">Galatasaray</option>
                            <option value="15">Fenerbahçe</option>
                        </select>
                    </div>
                </div>

                <div class="btn-group">
                    <button type="reset" class="btn btn-secondary">🔄 Réinitialiser</button>
                    <button type="submit" class="btn btn-primary">✓ Ajouter le coach</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>