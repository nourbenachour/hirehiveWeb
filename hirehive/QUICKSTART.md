# Quick Start Guide - HireHive Symfony

**Time estimate**: 5-10 minutes

## 🎯 TL;DR - The 3 Essential Steps

### Step 1: Install Dependencies (3 min)
```bash
cd c:\hirehive-temp\hirehive
composer install
npm install
```

### Step 2: Copy Your JavaFX Assets (2 min)
```powershell
# From PowerShell in the project root:
.\port-to-symfony.ps1 -JavaFxSourcePath "C:\Users\user\Downloads\hirehive-integration 4\hirehive-integration\hirehive-integration"
```

Or manually copy:
- JavaFX images → `public/assets/`
- `chart.min.js` → `public/chart/`

### Step 3: Build & Run (2 min)
```bash
# Start asset watcher (keep running)
npm run watch

# In another terminal, start Symfony:
php bin/console server:run

# Open http://localhost:8000
```

---

## 📍 What You Get

✅ **Admin Dashboard** - http://localhost:8000/dashboard
- 4-column stats grid
- Chart.js integration
- Dark theme

✅ **Candidate Home** - http://localhost:8000/
- KPI cards with gradients
- Progress charts
- Responsive design

✅ **Backoffice** - http://localhost:8000/backoffice
- Sidebar navigation
- Ready for admin features

✅ **Frontoffice** - http://localhost:8000/frontoffice
- Public landing page
- Hero section

---

## 🎨 Customizing in Real-Time

1. Edit `assets/styles/javafx.css` → Changes auto-reload in browser (thanks npm watch)
2. Edit `templates/` files → Symfony auto-reloads templates
3. Both are instant - no rebuilds needed!

---

## 📁 Key Files You'll Work With

| File | What It Controls |
|------|------------------|
| `templates/dashboard/admin_dashboard.html.twig` | Admin dashboard look & layout |
| `templates/candidat/home.html.twig` | Candidate home page |
| `assets/styles/javafx.css` | All CSS styling |
| `src/Controller/*Controller.php` | Routes & data for pages |
| `package.json` | npm dependencies |

---

## ⚡ Common Tasks

### Add a new page
```php
// 1. Create template: templates/mynewpage/index.html.twig
// 2. Create controller:
#[Route('/mynewpage', name: 'app_mynewpage')]
public function index(): Response
{
    return $this->render('mynewpage/index.html.twig', [
        'myVar' => 'Hello'
    ]);
}
// 3. Done! Visit http://localhost:8000/mynewpage
```

### Change colors
Edit `assets/styles/javafx.css` - lines with color codes like `#60a5fa`, `#f87171`, etc.

### Add more data to dashboard
Edit `src/Controller/DashboardController.php`:
```php
return $this->render('dashboard/admin_dashboard.html.twig', [
    'totalClaims' => 999,  // Change these numbers
    'yourNewVar' => 'value'
]);
```

Then use in template: `{{ yourNewVar }}`

---

## 🆘 Quick Fixes

| Problem | Solution |
|---------|----------|
| Webpack won't start | `npm install` then `npm run watch` |
| Port 8000 in use | `php bin/console server:run --port=8001` |
| Styles not changing | Stop `npm watch`, run `npm run build`, restart `npm run watch` |
| Template not found | Check filename spelling, clear cache: `php bin/console cache:clear` |

---

## ✅ Verify Installation

```bash
# Check if everything is set up:
ls assets/        # Should see: js/, styles/, controllers.json
ls public/        # Should see: assets/, chart/, build/, index.php
ls templates/     # Should see: base.html.twig, dashboard/, candidat/, etc.
ls src/Controller # Should see: *Controller.php files
```

---

## 🚀 You're Ready!

After `npm run watch` and `php bin/console server:run`, open:
- http://localhost:8000 - Candidat home
- http://localhost:8000/dashboard - Admin dashboard
- http://localhost:8000/backoffice - Backoffice
- http://localhost:8000/frontoffice - Frontoffice

**Happy coding!** 🎉

---

Need more details? See `MIGRATION_GUIDE.md` or `SETUP_SUMMARY.md`
