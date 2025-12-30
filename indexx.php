<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'ajout - Joueur/Coach</title>
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
            max-width: 600px;
            width: 100%;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
            font-size: 28px;
        }

        .type-selector {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            justify-content: center;
        }

        .type-btn {
            flex: 1;
            padding: 15px;
            border: 2px solid #667eea;
            background: white;
            color: #667eea;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .type-btn:hover {
            background: #f0f0f0;
        }

        .type-btn.active {
            background: #667eea;
            color: white;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }

        label .required {
            color: #e74c3c;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            transition: border-color 0.3s;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #667eea;
        }

        .hidden {
            display: none;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
            margin-top: 20px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            display: none;
        }

        .result.show {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🏆 Formulaire d'ajout</h1>
        
        <div class="type-selector">
            <button class="type-btn active" onclick="selectType('joueur')">⚽ Joueur</button>
            <button class="type-btn" onclick="selectType('coach')">👔 Coach</button>
        </div>

        <form id="mainForm" onsubmit="handleSubmit(event)">
            <!-- Champs communs -->
            <div class="form-group">
                <label for="id">ID <span class="required">*</span></label>
                <input type="number" id="id" name="id" required>
            </div>

            <div class="form-group">
                <label for="name">Nom complet <span class="required">*</span></label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="role">Rôle <span class="required">*</span></label>
                <input type="text" id="role" name="role" required>
            </div>

            <div class="form-group">
                <label for="email">Email <span class="required">*</span></label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="nationalite">Nationalité <span class="required">*</span></label>
                <input type="text" id="nationalite" name="nationalite" required>
            </div>

            <!-- Champs spécifiques Joueur -->
            <div id="joueurFields">
                <div class="form-group">
                    <label for="valeur_marche">Valeur Marché (€) <span class="required">*</span></label>
                    <input type="number" id="valeur_marche" name="valeur_marche" step="0.01">
                </div>
            </div>

            <!-- Champs spécifiques Coach -->
            <div id="coachFields" class="hidden">
                <div class="form-group">
                    <label for="style_coach">Style de coaching <span class="required">*</span></label>
                    <select id="style_coach" name="style_coach">
                        <option value="">-- Sélectionner --</option>
                        <option value="Offensif">Offensif</option>
                        <option value="Défensif">Défensif</option>
                        <option value="Équilibré">Équilibré</option>
                        <option value="Possession">Possession</option>
                        <option value="Contre-attaque">Contre-attaque</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="annee_experience">Années d'expérience <span class="required">*</span></label>
                    <input type="number" id="annee_experience" name="annee_experience" min="0">
                </div>
            </div>

            <!-- Champ commun -->
            <div class="form-group">
                <label for="equipe_id">ID de l'équipe <span class="required">*</span></label>
                <input type="number" id="equipe_id" name="equipe_id" required>
            </div>

            <button type="submit" class="submit-btn">✓ Ajouter</button>
        </form>

        <div id="result" class="result"></div>
    </div>
<!-- 
    <script>
        let currentType = 'joueur';

        function selectType(type) {
            currentType = type;
            
            // Mise à jour des boutons
            document.querySelectorAll('.type-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');

            // Affichage des champs appropriés
            const joueurFields = document.getElementById('joueurFields');
            const coachFields = document.getElementById('coachFields');
            
            if (type === 'joueur') {
                joueurFields.classList.remove('hidden');
                coachFields.classList.add('hidden');
                
                // Rendre les champs joueur requis
                document.getElementById('valeur_marche').required = true;
                document.getElementById('style_coach').required = false;
                document.getElementById('annee_experience').required = false;
            } else {
                joueurFields.classList.add('hidden');
                coachFields.classList.remove('hidden');
                
                // Rendre les champs coach requis
                document.getElementById('valeur_marche').required = false;
                document.getElementById('style_coach').required = true;
                document.getElementById('annee_experience').required = true;
            }

            // Cacher le résultat précédent
            document.getElementById('result').classList.remove('show');
        }

        function handleSubmit(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            const data = {
                type: currentType,
                id: formData.get('id'),
                name: formData.get('name'),
                role: formData.get('role'),
                email: formData.get('email'),
                nationalite: formData.get('nationalite'),
                equipe_id: formData.get('equipe_id')
            };

            if (currentType === 'joueur') {
                data.Valeur_Marcher = formData.get('valeur_marche');
            } else {
                data.style_coach = formData.get('style_coach');
                data.annee_experience = formData.get('annee_experience');
            }

            // Affichage des données
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = `
                <h3>✓ ${currentType === 'joueur' ? 'Joueur' : 'Coach'} ajouté avec succès!</h3>
                <pre>${JSON.stringify(data, null, 2)}</pre>
            `;
            resultDiv.classList.add('show');

            // Réinitialiser le formulaire
            event.target.reset();
        }
    </script> -->
</body>
</html>