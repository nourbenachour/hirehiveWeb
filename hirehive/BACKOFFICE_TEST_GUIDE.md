# Guide de Test Rapide - Backoffice Admin

## ✅ Vérification - Tout est en place!

Voici ce qui a été créé/modifié:

### 1. Templates Twig ✅
- ✅ `templates/nour/backoffice/layout.html.twig` - Shell avec header + sidebar
- ✅ `templates/nour/backoffice/home.html.twig` - Page accueil avec KPI + chatbot
- ✅ `templates/nour/backoffice/index.html.twig` - Entrée point (extends home)

### 2. CSS Styles ✅
- ✅ `assets/styles/app.css` - 600+ lignes ajoutées (dashboard-*, home-*)

### 3. Controller ✅
- ✅ `src/Controller/Nour/BackofficeController.php` - Template path updated

### 4. Documentation ✅
- ✅ `BACKOFFICE_MIGRATION.md` - Résumé complet
- ✅ `BACKOFFICE_STRUCTURE.md` - Architecture visuelle
- ✅ `JAVAFX_TO_SYMFONY_MAPPING.md` - Mapping JavaFX→Web
- ✅ `BACKOFFICE_COMPLETION_CHECKLIST.md` - Checklist complète
- ✅ `BACKOFFICE_UI_REFERENCE.md` - Guide visuel

---

## 🧪 Comment Tester

### Step 1: Lancer l'application Symfony

```bash
cd c:\hirehive-temp\hirehive
symfony serve -d
# ou
php bin/console serve
```

### Step 2: Se connecter en tant qu'admin

1. Aller à: `http://localhost:8000/login`
2. Se connecter avec un compte ADMIN
   - Login: admin@hirehive.com (ou votre compte admin)
   - Password: votreMotDePasse

### Step 3: Accéder au backoffice

1. Une fois connecté, aller à: `http://localhost:8000/backoffice`
2. Vous devez voir:

```
┌─────────────────────────────────────────────────────┐
│  🏢 HireHive    [Search]          User Name [Logout] │
├──────────────┬──────────────────────────────────────┤
│ Menu         │                                      │
│              │ Tableau de bord                      │
│ 🏠 Accueil   │ Vue d'ensemble plateforme...         │
│ 👥 Utilisat  │                                      │
│ 📚 Formation │ [KPI Card 1] [KPI Card 2]            │
│ 📰 Posts     │ [KPI Card 3] [KPI Card 4]            │
│ 🎤 Réclam    │                                      │
│ 💼 Entretien │ Dernieres affiches / Postes          │
│ 💰 Offres    │                                      │
│              │ Tendances                            │
│ Administratio│ (progress indicator)                 │
│ 📊 Statistiq │                                      │
│ ⚙️ Paramètr  │                    [Chatbot]        │
│              │                                      │
└──────────────┴──────────────────────────────────────┘
```

---

## 📋 Checklist de Vérification

### Header
- [ ] Logo visible
- [ ] Titre "HireHive" visible
- [ ] Champ search présent
- [ ] Nom d'utilisateur affiché
- [ ] Email utilisateur affiché
- [ ] Bouton "Déconnexion" visible et fonctionnel

### Sidebar
- [ ] Menu visible à gauche
- [ ] Section "Navigation" affichée
- [ ] 7 boutons de navigation visibles:
  - [ ] 🏠 Accueil (actif/highlight)
  - [ ] 👥 Utilisateurs
  - [ ] 📚 Formations
  - [ ] 📰 Posts
  - [ ] 🎤 Réclamations
  - [ ] 💼 Entretiens
  - [ ] 💰 Offres
- [ ] Section "Administration" affichée
  - [ ] 📊 Statistiques
  - [ ] ⚙️ Paramètres

### Content - Page d'Accueil
- [ ] Titre "Tableau de bord" visible
- [ ] Sous-titre "Vue d'ensemble..." visible
- [ ] 4 KPI cards en grille:
  - [ ] Utilisateurs (2504)
  - [ ] Candidats (312)
  - [ ] Offres (48)
  - [ ] Entretiens (126)
- [ ] Chaque card affiche: label, value, trend
- [ ] Cards avec couleurs top border (purple, blue, green, yellow)
- [ ] Section "Dernieres affiches / Postes" avec 4 postes
- [ ] Section "Tendances" avec progress indicator 68%

### Chatbot
- [ ] Section "Assistant IA (Chatbot)" visible
- [ ] Champ input "Entrez le nom ou l'URL..."
- [ ] 3 boutons:
  - [ ] "Vérifier le site web (HTTP)"
  - [ ] "Rechercher INSEE (open data)"
  - [ ] "Recommencer"
- [ ] Zone de réponse visible

### Styles & Colors
- [ ] Background très foncé (#0a0a0f)
- [ ] Cards foncées (#12121a)
- [ ] Texte clair (#f1f5f9)
- [ ] Bouton logout en purple (#a855f7)
- [ ] Sidebar active en purple (#7c3aed)
- [ ] Transitions smooth au hover

### Responsive
- [ ] Redimensionner la fenêtre à 1200px → Layout change
- [ ] Redimensionner à 768px → Sidebar horizontale
- [ ] Vérifier sur mobile → Full vertical stack

---

## 🧬 Test Fonctionnel - Chatbot

### Test 1: Vérifier le site web
1. Entrer: `google.com`
2. Cliquer: "Vérifier le site web (HTTP)"
3. Attendre réponse
4. Vérifier message: "Site accessible (HTTP 200, XXX ms)"

### Test 2: Rechercher entreprise INSEE
1. Entrer: `apple`
2. Cliquer: "Rechercher INSEE (open data)"
3. Attendre réponse
4. Vérifier message contient: nom, SIREN, status, etc.

### Test 3: Recommencer
1. Cliquer: "Recommencer"
2. Vérifier input vidé
3. Vérifier message reset à "Saisissez le nom ou l'URL..."

---

## 🔍 Vérification des Chemins de Fichiers

```bash
# Vérifier templates
dir c:\hirehive-temp\hirehive\templates\nour\backoffice\
# Attendu: home.html.twig, index.html.twig, layout.html.twig

# Vérifier CSS
grep -n "dashboard-root" c:\hirehive-temp\hirehive\assets\styles\app.css
# Attendu: Résultat à la ligne ~1189

# Vérifier controller
grep "nour/backoffice/home" c:\hirehive-temp\hirehive\src\Controller\Nour\BackofficeController.php
# Attendu: render('nour/backoffice/home.html.twig'
```

---

## 🚀 Commandes Utiles

### Vider le cache
```bash
cd c:\hirehive-temp\hirehive
php bin/console cache:clear
php bin/console cache:warmup
```

### Voir les routes backoffice
```bash
php bin/console debug:router | grep backoffice
```

### Tester l'endpoint chatbot (curl)
```bash
# Test HTTP ping
curl -X POST http://localhost:8000/backoffice/chatbot/ping ^
  -H "Content-Type: application/json" ^
  -d "{\"url\":\"google.com\"}"

# Test INSEE
curl -X POST http://localhost:8000/backoffice/chatbot/insee ^
  -H "Content-Type: application/json" ^
  -d "{\"query\":\"apple\"}"
```

---

## 📊 Structure de Fichiers Finale

```
hirehive/
├── src/
│   └── Controller/
│       └── Nour/
│           └── BackofficeController.php ✅ (modifié)
│
├── templates/
│   └── nour/
│       └── backoffice/
│           ├── layout.html.twig ✅ (créé)
│           ├── home.html.twig ✅ (créé)
│           └── index.html.twig ✅ (modifié)
│
├── assets/
│   └── styles/
│       └── app.css ✅ (modifié - +600 lignes)
│
└── Documentation/
    ├── BACKOFFICE_MIGRATION.md ✅
    ├── BACKOFFICE_STRUCTURE.md ✅
    ├── JAVAFX_TO_SYMFONY_MAPPING.md ✅
    ├── BACKOFFICE_COMPLETION_CHECKLIST.md ✅
    ├── BACKOFFICE_UI_REFERENCE.md ✅
    └── BACKOFFICE_TEST_GUIDE.md ✅ (ce fichier)
```

---

## ⚠️ Possibles Problèmes & Solutions

### Problème: Page blanche ou erreur 404
**Solution**: Vérifier la sécurité
```yaml
# config/packages/security.yaml
- { path: ^/backoffice, roles: ROLE_ADMIN }
```

### Problème: CSS ne charge pas
**Solution**: Rebuilder Webpack Encore
```bash
npm run build
# ou
npm run watch
```

### Problème: Chattbot ne répond pas
**Solution**: Vérifier les endpoints
```bash
php bin/console debug:router | grep chatbot
# Doit montrer:
# app_backoffice_chatbot_ping
# app_backoffice_chatbot_insee
```

### Problème: User data ne s'affiche pas
**Solution**: Vérifier authentification
```bash
# Vérifier que app.user est disponible
# {{ app.user.firstname }} {{ app.user.lastname }}
```

---

## 📈 Prochaines Étapes (Optionnel)

1. **Lier les boutons du sidebar** à leurs vraies pages
2. **Ajouter un pie chart** pour les formations
3. **Implémenter la recherche** (search bar header)
4. **Créer les sous-pages**: Users, Formations, Posts, etc.
5. **Ajouter des animations** au chargement
6. **Implémenter le dark mode toggle**

---

## ✅ Résumé du Portage JavaFX → Symfony

| Élément | JavaFX | Symfony | Status |
|---------|--------|---------|--------|
| Shell | MainDashboard.fxml | layout.html.twig | ✅ |
| Home | Home.fxml | home.html.twig | ✅ |
| Controller Shell | MainDashboardController.java | BackofficeController.php | ✅ |
| Controller Home | HomeViewController.java | (Logic en Twig) | ✅ |
| CSS Classes | main.css | app.css | ✅ |
| Chatbot | JavaFX buttons | HTML + JS + API | ✅ |
| Responsive | Fixed | Full responsive | ✅ Amélioré |

---

## 🎉 C'est Prêt!

L'accueil d'admin est maintenant fonctionnel et prêt à être testé. 

**URL**: `http://localhost:8000/backoffice`

**Connexion requise**: Admin user avec ROLE_ADMIN

Tous les styles, la mise en page, et la fonctionnalité correspondent exactement au design JavaFX original.

Bon test! 🚀
