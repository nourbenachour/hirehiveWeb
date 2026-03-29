# Backoffice Layout Structure

## HTML/Twig Hierarchy

```
backoffice/layout.html.twig (Shell)
├── <header class="dashboard-header">
│   ├── <div class="header-brand">
│   │   ├── <img> (logo)
│   │   └── <h1 class="header-title">HireHive</h1>
│   ├── <input class="header-search">
│   ├── <div class="header-spacer">
│   ├── <div class="user-block">
│   │   ├── <div class="user-name"> (User firstname lastname)
│   │   └── <div class="user-email"> (User email)
│   └── <a class="btn-logout">Déconnexion</a>
│
├── <div class="dashboard-wrapper">
│   ├── <aside class="dashboard-sidebar">
│   │   ├── <div class="sidebar-logo">
│   │   │   └── <span class="logo-text">Menu</span>
│   │   ├── <div class="sidebar-section">
│   │   │   ├── <div class="sidebar-section-label">Navigation</div>
│   │   │   ├── <a class="sidebar-btn"> 🏠 Accueil
│   │   │   ├── <a class="sidebar-btn"> 👥 Utilisateurs
│   │   │   ├── <a class="sidebar-btn"> 📚 Formations
│   │   │   ├── <a class="sidebar-btn"> 📰 Posts
│   │   │   ├── <a class="sidebar-btn"> 🎤 Réclamations
│   │   │   ├── <a class="sidebar-btn"> 💼 Entretiens
│   │   │   └── <a class="sidebar-btn"> 💰 Offres
│   │   └── <div class="sidebar-section">
│   │       ├── <div class="sidebar-section-label">Administration</div>
│   │       ├── <a class="sidebar-btn"> 📊 Statistiques
│   │       └── <a class="sidebar-btn"> ⚙️ Paramètres
│   │
│   └── <main class="dashboard-content">
│       └── {% block backoffice_content %}
│           (Rendered from home.html.twig)
│

backoffice/home.html.twig (Content)
├── <div class="home-scroll">
│   └── <div class="home-root">
│       ├── <label class="home-main-title">Tableau de bord</label>
│       ├── <label class="home-subtitle">Vue d'ensemble...</label>
│       └── <div class="home-container">
│           ├── <div class="home-column"> <!-- Left Column -->
│           │   ├── <label class="home-column-title">KPI & Affiches</label>
│           │   ├── <div class="home-kpi-grid">
│           │   │   ├── <div class="home-kpi-card">
│           │   │   │   ├── <label class="home-kpi-label">Utilisateurs</label>
│           │   │   │   ├── <label class="home-kpi-value">2504</label>
│           │   │   │   └── <label class="home-kpi-trend up">+12%</label>
│           │   │   ├── <div class="home-kpi-card card-2">... (Candidates)
│           │   │   ├── <div class="home-kpi-card card-3">... (Offers)
│           │   │   └── <div class="home-kpi-card card-4">... (Interviews)
│           │   │
│           │   ├── <div class="home-section-card"> <!-- Recent Posts -->
│           │   │   ├── <label class="home-section-title">Dernieres affiches / Postes</label>
│           │   │   └── <div class="home-posts-list">
│           │   │       ├── <div class="home-post-item">
│           │   │       │   ├── <label class="home-post-title">Dev. Java Senior</label>
│           │   │       │   └── <label class="home-post-date">Il y a 2j</label>
│           │   │       ├── <div class="home-post-item">... (Python)
│           │   │       ├── <div class="home-post-item">... (Oracle)
│           │   │       └── <div class="home-post-item">... (Full Stack)
│           │   │
│           │   └── <div class="home-section-card"> <!-- Trends -->
│           │       ├── <label class="home-section-title">Tendances</label>
│           │       └── <div class="home-trends-container">
│           │           ├── <div class="home-progress-wrapper">
│           │           │   └── <div class="home-progress">
│           │           └── <div class="home-trend-info">
│           │               ├── <label class="home-card-label">Conversion candidatures...</label>
│           │               └── <label class="home-card-value">68%</label>
│           │
│           └── <div class="home-column"> <!-- Right Column -->
│               ├── <label class="home-column-title">Assistant IA (Chatbot)</label>
│               └── <div class="home-chatbot-card">
│                   ├── <input id="chatbotInput" class="home-chatbot-input">
│                   ├── <div class="home-chatbot-buttons">
│                   │   ├── <button id="qWebsite" class="home-chatbot-question">
│                   │   │   Vérifier le site web (HTTP)</button>
│                   │   ├── <button id="qApi" class="home-chatbot-question">
│                   │   │   Rechercher INSEE (open data)</button>
│                   │   └── <button id="qRestart" class="home-chatbot-question">
│                   │       Recommencer</button>
│                   └── <label id="chatbotReply" class="home-chatbot-reply">
│                       Response text
```

## Responsive Breakpoints

### Desktop (> 1200px)
```
┌─────────────────────────────────────────────────┐
│              HEADER (Logo + Search + User)      │
├──────────────┬───────────────────────────────────┤
│              │                                   │
│   SIDEBAR    │          CONTENT AREA             │
│   (250px)    │  (KPI Cards + Posts + Trends)     │
│              │  (Chatbot on right)               │
│              │                                   │
└──────────────┴───────────────────────────────────┘
```

### Tablet (768px - 1200px)
```
┌──────────────────────────────────┐
│      HEADER (Logo + User)        │
├──────────────────────────────────┤
│                                  │
│       CONTENT AREA               │
│  (KPI Cards stacked)             │
│  (Posts section)                 │
│  (Trends section)                │
│  (Chatbot below)                 │
│                                  │
└──────────────────────────────────┘
```

### Mobile (< 768px)
```
┌──────────────────────┐
│   HEADER (compact)   │
├──────────────────────┤
│  SIDEBAR (horiz.)    │
├──────────────────────┤
│ CONTENT (full width) │
│ (All stacked)        │
└──────────────────────┘
```

## CSS Class Hierarchy

### Layout Classes
```
dashboard-root
├── dashboard-header
│   ├── dashboard-header-content
│   ├── header-brand
│   │   ├── header-logo
│   │   └── header-title
│   ├── header-search
│   ├── header-spacer
│   ├── user-block
│   │   ├── user-name
│   │   └── user-email
│   └── btn-logout
├── dashboard-wrapper
│   ├── dashboard-sidebar
│   │   ├── sidebar-logo
│   │   │   └── logo-text
│   │   └── sidebar-section (multiple)
│   │       ├── sidebar-section-label
│   │       └── sidebar-btn (multiple)
│   │           └── sidebar-btn-active
│   └── dashboard-content
│       └── (home-* classes below)
```

### Home/Content Classes
```
home-scroll
└── home-root
    ├── home-main-title
    ├── home-subtitle
    └── home-container
        ├── home-column (left)
        │   ├── home-column-title
        │   ├── home-kpi-grid
        │   │   └── home-kpi-card (x4)
        │   │       ├── card-2
        │   │       ├── card-3
        │   │       ├── card-4
        │   │       ├── home-kpi-label
        │   │       ├── home-kpi-value
        │   │       └── home-kpi-trend
        │   │           └── up
        │   ├── home-section-card (posts)
        │   │   ├── home-section-title
        │   │   └── home-posts-list
        │   │       └── home-post-item (x4)
        │   │           ├── home-post-title
        │   │           └── home-post-date
        │   └── home-section-card (trends)
        │       ├── home-section-title
        │       └── home-trends-container
        │           ├── home-progress-wrapper
        │           │   └── home-progress
        │           └── home-trend-info
        │               ├── home-card-label
        │               └── home-card-value
        │
        └── home-column (right)
            ├── home-column-title
            └── home-chatbot-card
                ├── home-chatbot-input
                ├── home-chatbot-buttons
                │   └── home-chatbot-question (x3)
                └── home-chatbot-reply
```

## Color Palette

### Backgrounds
- `#0a0a0f` - Primary dark background (dashboard-root, main)
- `#12121a` - Secondary dark (cards, sidebar)
- `#16161f` - Lighter secondary (hover states)

### Borders
- `#1a1a24` - Header/Sidebar borders
- `#252530` - Card borders, input borders

### Text
- `#f1f5f9` - Primary text (headings, values)
- `#e2e8f0` - Secondary text
- `#94a3b8` - Muted text (labels, hints)
- `#64748b` - Dimmed text (descriptions)

### Accents
- `#a855f7` - Purple (primary accent, logout button)
- `#c084fc` - Light purple (hover states)
- `#7c3aed` - Darker purple (active sidebar)

### Status Colors (KPI Cards)
- `#a855f7` - Purple gradient (Users)
- `#0ea5e9` - Blue gradient (Candidates)
- `#10b981` - Green gradient (Offers/Stable)
- `#f59e0b` - Yellow gradient (Interviews)
- `#10b981` - Green (Positive trends)

## Data Flow

```
BackofficeController (index action)
    ↓
    Queries UserRepository, CondidatRepository, ExperienceRepository
    ↓
    Prepares data: total_users, total_candidates, total_offers, total_interviews
    ↓
    Renders nour/backoffice/home.html.twig
    ↓
    home.html.twig extends nour/backoffice/layout.html.twig
    ↓
    Twig interpolates {{}} variables
    ↓
    HTML rendered with CSS classes from app.css
    ↓
    Browser renders with app.js + chatbot.js
```

## JavaScript Interactions

### Chatbot Functions
```javascript
// Website HTTP Check
qWebsite.click() → POST /backoffice/chatbot/ping 
    ↓
BackofficeController::pingWebsite()
    ↓
httpClient.request('HEAD', url)
    ↓
Returns: {ok, status, time_ms, message}
    ↓
Display message in chatbotReply

// INSEE API Search
qApi.click() → POST /backoffice/chatbot/insee
    ↓
BackofficeController::searchInsee()
    ↓
curl recherche-entreprises.api.gouv.fr
    ↓
Returns: {ok, result{denomination, siren, etat, naf, ...}}
    ↓
Display in chatbotReply

// Reset
qRestart.click() → Clear input + Reset message
```

## Template Path Resolution

```
@template('nour/backoffice/home.html.twig')
    ↓
templates/nour/backoffice/home.html.twig
    ↓
{% extends 'nour/backoffice/layout.html.twig' %}
    ↓
templates/nour/backoffice/layout.html.twig
    ↓
{% block backoffice_content %} (filled by home.html.twig)
```
