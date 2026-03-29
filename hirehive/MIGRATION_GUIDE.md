# HireHive Symfony Front-end Migration

Guide complet de migration du projet JavaFX vers Symfony avec Twig et Webpack Encore.

## 📋 Prérequis

- PHP 8.1+
- Node.js 16+
- Composer
- Symfony CLI (optionnel)

## 🚀 Installation Complète

### 1. Installation des dépendances

```bash
# Dépendances PHP
composer install

# Webpack Encore (si non déjà installé)
composer require symfony/webpack-encore-bundle

# Dépendances npm
npm install
```

### 2. Migration des assets JavaFX

Utilisez le script PowerShell pour copier les assets depuis votre projet JavaFX:

```powershell
.\port-to-symfony.ps1 -JavaFxSourcePath "C:\Users\user\Downloads\hirehive-integration 4\hirehive-integration\hirehive-integration" -TargetPath "."
```

Ou manuellement:
```bash
# Copier les images
Copy-Item "C:/chemin/vers/javafx/src/main/resources/assets/*" public/assets -Recurse

# Copier chart.min.js
Copy-Item "C:/chemin/vers/javafx/src/main/resources/chart/chart.min.js" public/chart/
```

### 3. Convertir les CSS JavaFX

```bash
node convert-javafx-css.js "C:/chemin/vers/javafx/src/main/resources/resources/tn/esprit/javafx"
```

Cela générera `assets/styles/javafx.css` avec toutes les propriétés JavaFX converties.

### 4. Builder les assets

```bash
# Mode développement
npm run dev

# Watcher en temps réel
npm run watch

# Production
npm run build
```

## 📁 Structure du Projet

```
hirehive/
├── assets/
│   ├── js/
│   │   └── app.js                 # Entrée JS principale
│   ├── styles/
│   │   └── javafx.css             # Styles convertis du JavaFX
│   └── controllers.json           # Config Stimulus
├── public/
│   ├── assets/                    # Images, icônes du JavaFX
│   ├── chart/                     # Chart.js
│   └── build/                     # Générés par Webpack Encore
├── templates/
│   ├── base.html.twig             # Layout principal
│   ├── dashboard/
│   │   └── admin_dashboard.html.twig
│   ├── candidat/
│   │   └── home.html.twig
│   ├── backoffice/
│   │   └── index.html.twig
│   └── frontoffice/
│       └── index.html.twig
├── src/
│   └── Controller/
│       ├── DashboardController.php
│       ├── CandidatController.php
│       ├── BackofficeController.php
│       └── FrontofficeController.php
├── composer.json
├── package.json
├── webpack.config.js
├── convert-javafx-css.js          # Script de conversion CSS
└── port-to-symfony.ps1            # Script de migration
```

## 🎨 Templates et Contrôleurs

### Dashboard Admin

**Template**: `templates/dashboard/admin_dashboard.html.twig`

```php
// src/Controller/DashboardController.php
#[Route('/dashboard', name: 'app_dashboard')]
public function index(): Response
{
    return $this->render('dashboard/admin_dashboard.html.twig', [
        'totalClaims' => 125,
        'openClaims' => 32,
        'urgentClaims' => 8,
        'resolvedClaims' => 85,
        'chartLabels' => ['Support', 'Plainte', 'Réclamation', 'Retard'],
        'chartData' => [30, 25, 40, 5],
    ]);
}
```

### Candidat Home

**Template**: `templates/candidat/home.html.twig`

```php
// src/Controller/CandidatController.php
#[Route('/', name: 'app_home')]
public function home(): Response
{
    return $this->render('candidat/home.html.twig', [
        'userName' => 'Jean Dupont',
        'courseCount' => 5,
        'badgeCount' => 12,
        'certCount' => 3,
        'progressLabels' => ['Cours 1', 'Cours 2', 'Cours 3'],
        'progressData' => [85, 70, 90],
    ]);
}
```

### Backoffice

**Template**: `templates/backoffice/index.html.twig`

```php
// src/Controller/BackofficeController.php
#[Route('/admin', name: 'app_backoffice')]
public function index(): Response
{
    return $this->render('backoffice/index.html.twig');
}
```

### Frontoffice

**Template**: `templates/frontoffice/index.html.twig`

```php
// src/Controller/FrontofficeController.php
#[Route('/public', name: 'app_frontoffice')]
public function index(): Response
{
    return $this->render('frontoffice/index.html.twig');
}
```

## 🎯 Conversion JavaFX CSS

Le script `convert-javafx-css.js` convertit automatiquement:

| JavaFX | Web CSS |
|--------|---------|
| `-fx-background-color` | `background-color` |
| `-fx-padding` | `padding` |
| `-fx-font-size` | `font-size` |
| `-fx-text-fill` | `color` |
| `-fx-border-color` | `border-color` |
| `-fx-effect: dropshadow(...)` | `box-shadow` |
| et plus... |

### Variables CSS personnalisées

Vous pouvez ajouter des variables CSS dans `assets/styles/_variables.css`:

```css
:root {
  --primary: #60a5fa;
  --success: #34d399;
  --danger: #f87171;
  --warning: #facc15;
  --dark-bg: #0a0a0f;
  --dark-surface: #111827;
}
```

## 🔄 Workflow de Développement

```bash
# Terminal 1: Webpack Watcher
npm run watch

# Terminal 2: Serveur Symfony
php bin/console server:run

# Votre app sera disponible à http://localhost:8000
```

## 📦 Déploiement

```bash
# Build production
npm run build

# Optimiser Symfony
composer install --optimize-autoloader --no-dev

# Symfony compile routes & config
php bin/console cache:clear --env=prod
```

## 🛠 Troubleshooting

### Assets ne s'affichent pas
- Vérifier que `webpack.config.js` configure les bons chemins
- Exécuter: `npm run build`
- Vérifier que les chemins dans Twig utilisent `asset()` helper

### CSS non appliqué
- Vérifier la conversion avec: `node convert-javafx-css.js`
- Ajouter manuellement les règles manquantes dans `assets/styles/javafx.css`
- S'assurer que `chart.min.js` est au bon chemin

### Problèmes de CORS ou assets statiques
- Vérifier la config `public/` dans Symfony
- S'assurer que `.env` a la bonne URL publique

## 📚 Ressources

- [Symfony Webpack Encore](https://symfony.com/doc/current/frontend.html)
- [Twig Documentation](https://twig.symfony.com/)
- [Stimulus JS](https://stimulus.hotwired.dev/)
- [Chart.js](https://www.chartjs.org/)

## 📝 Notes

- Les templates sont responsifs (mobile-first)
- Les couleurs respectent la palette dark mode
- Utilisez les classes utilitaires `.mt-*`, `.mb-*`, `.p-*` pour le spacing
- Les variables Twig sont passées depuis les contrôleurs
