# Backoffice UI Reference Guide

## Visual Layout Map

```
┌─────────────────────────────────────────────────────────────────────────────┐
│  🏢 HireHive    [Search Box....................]          🔔  User  [Logout] │
├──────────────┬─────────────────────────────────────────────────────────────┤
│ Menu         │                                                             │
│              │  Tableau de bord                                            │
│ Navigation   │  Vue d'ensemble plateforme recrutement & formations         │
│ ──────────   │                                                             │
│ 🏠 Accueil   │ ┌──────────────────────────────────────────┐               │
│ 👥 Utilisat. │ │ KPI & Affiches                           │               │
│ 📚 Formation │ │                                          │               │
│ 📰 Posts     │ │ ┌─────────┐ ┌─────────┐                 │ Assistant IA │
│ 🎤 Réclam.   │ │ Users    │ │Candidats│                 │ ┌──────────┐│
│ 💼 Entretien │ │ 2504     │ │   312   │                 │ │[Input..]││
│ 💰 Offres    │ │ +12%     │ │   +8%   │                 │ │[BTN 1]  ││
│              │ └─────────┘ └─────────┘                 │ │[BTN 2]  ││
│ Administr.   │ ┌─────────┐ ┌─────────┐                 │ │[BTN 3]  ││
│ ──────────   │ │ Offres   │ │Entretien│                 │ │[Response]││
│ 📊 Statistiq │ │   48     │ │   126   │                 │ └──────────┘│
│ ⚙️ Paramètr  │ │ Stable   │ │ +24%    │                 │             │
│              │ └─────────┘ └─────────┘                 │             │
│              │                                          │             │
│              │ Dernieres affiches / Postes             │             │
│              │ ─────────────────────────────────      │             │
│              │ Dev. Java Senior ........... Il y a 2j  │             │
│              │ Formation Python avancée .. Il y a 5j   │             │
│              │ Admin Oracle / DBA ........ Il y a 1sem │             │
│              │ Full Stack Java + Angular . Il y a 1sem │             │
│              │                                          │             │
│              │ Tendances                               │             │
│              │ ─────────────────────────────────      │             │
│              │ ◯ Conversion candidatures -> entretiens │             │
│              │ 68%                                      │             │
│              │                                          │             │
└──────────────┴─────────────────────────────────────────────────────────────┘
```

## Component Breakdown

### 1. Header Bar
```
Height: 60px
Background: #0a0a0f
Border-bottom: 1px solid #1a1a24
Content: Logo (40px) | Brand Text | Search (400px max) | User Info | Logout Btn

┌──────┬──────────────────────────┬──────────────────────┬────────┬──────────┐
│ Logo │ HireHive                 │ [Search............] │ User   │ [Logout] │
│      │                          │                      │ Email  │          │
└──────┴──────────────────────────┴──────────────────────┴────────┴──────────┘
```

### 2. Sidebar
```
Width: 250px (Desktop), Full width horizontal (Mobile)
Background: #0a0a0f
Border-right: 1px solid #1a1a24

Content:
┌─────────────────────────┐
│ Menu (Logo Text)        │
│                         │
│ NAVIGATION              │
│ 🏠 Accueil          ← Active (Purple)
│ 👥 Utilisateurs
│ 📚 Formations
│ 📰 Posts
│ 🎤 Réclamations
│ 💼 Entretiens
│ 💰 Offres
│                         │
│ ADMINISTRATION          │
│ 📊 Statistiques
│ ⚙️ Paramètres
│                         │
└─────────────────────────┘

Active State: Background #7c3aed (Purple), Text white
Hover State: Background #16161f, Text #e2e8f0
```

### 3. KPI Card
```
Width: 48% (2 per row)
Background: #12121a
Border: 1px solid #252530
Border-top: 3px colored gradient

┌─────────────────────────┐
│ ▪ (Colored bar)        │  ← Purple/Blue/Green/Yellow
├─────────────────────────┤
│ UTILISATEURS            │  ← Label (12px, #64748b)
│ 2504                    │  ← Value (28px bold, #f1f5f9)
│ +12%                    │  ← Trend (12px, green if "up")
└─────────────────────────┘
```

### 4. Recent Posts Section
```
Background: #12121a
Border: 1px solid #252530
Border-radius: 12px
Padding: 20px

┌──────────────────────────────────────┐
│ Dernieres affiches / Postes ← Title  │
├──────────────────────────────────────┤
│ Dev. Java Senior ......... Il y a 2j │
├──────────────────────────────────────┤
│ Formation Python avancée .. Il y a 5j│
├──────────────────────────────────────┤
│ Admin Oracle / DBA ....... Il y a 1s │
├──────────────────────────────────────┤
│ Full Stack Java + Angular  Il y a 1s │
└──────────────────────────────────────┘
```

### 5. Trends Section
```
Background: #12121a
Border: 1px solid #252530

Content:
    ┌─────────────┐  Conversion candidatures
    │      68%    │  -> entretiens
    │    ╱ ╲      │
    │   ╱   ╲     │
    │  ║  •  ║    │
    │   ╲   ╱     │
    │    ╲ ╱      │
    └─────────────┘

Progress: Conic-gradient (Purple 0deg - 244.8deg, Rest gray)
Label: #64748b, 13px
Value: #f1f5f9, 20px bold
```

### 6. Chatbot Card
```
Background: #12121a
Border: 1px solid #252530
Border-radius: 12px
Padding: 18px
Width: 100% or 350px (Desktop)

┌──────────────────────────────────────────┐
│ Assistant IA (Chatbot)                   │
├──────────────────────────────────────────┤
│ [Entrez le nom ou l'URL de l'entreprise] │  ← Input
│                                          │
│ [Vérifier le site web (HTTP)]            │  ← Button 1
│ [Rechercher INSEE (open data)]           │  ← Button 2
│ [Recommencer]                            │  ← Button 3
│                                          │
│ Saisissez le nom ou l'URL...             │  ← Response
│                                          │
└──────────────────────────────────────────┘

Input: Height 36px, #16161f bg, #252530 border
Buttons: Height auto, #16161f bg, hover → #1f1f2a
Reply: #94a3b8, 12px, min-height 36px
```

## Color Reference Chart

```
┌─────────────────┬──────────┬────────────────────────────────────────────┐
│ Category        │ Hex      │ Usage                                      │
├─────────────────┼──────────┼────────────────────────────────────────────┤
│ Dark BG         │ #0a0a0f  │ Main background, root container            │
│ Surface BG      │ #12121a  │ Cards, panels                              │
│ Hover BG        │ #16161f  │ Button hover, inputs                       │
│ Border Light    │ #1a1a24  │ Header/sidebar borders                     │
│ Border Dark     │ #252530  │ Card borders, dividers                     │
│                 │          │                                            │
│ Text Primary    │ #f1f5f9  │ Headings, primary text                     │
│ Text Secondary  │ #e2e8f0  │ Regular text, labels                       │
│ Text Muted      │ #94a3b8  │ Secondary info, hints                      │
│ Text Hint       │ #64748b  │ Placeholder, very subtle                   │
│                 │          │                                            │
│ Purple Main     │ #a855f7  │ Logout button, KPI accent, focus           │
│ Purple Light    │ #c084fc  │ Hover states, highlights                   │
│ Purple Dark     │ #7c3aed  │ Active sidebar, sidebar hover               │
│ Purple Darker   │ #6d28d9  │ Alternative active state                   │
│                 │          │                                            │
│ Blue            │ #0ea5e9  │ KPI card 2 (Candidates), info              │
│ Green           │ #10b981  │ KPI card 3 (Offers), positive trends       │
│ Yellow          │ #f59e0b  │ KPI card 4 (Interviews), warnings          │
│ Cyan            │ #06b6d4  │ Hover accent for blue elements             │
│                 │          │                                            │
│ Success         │ #059669  │ Positive indicators                        │
│ Warning         │ #d97706  │ Caution states                             │
└─────────────────┴──────────┴────────────────────────────────────────────┘
```

## Responsive Behavior

### Desktop (> 1200px)
```
┌────────────────────────────────────────────────┐
│              HEADER (Full width)               │
├──────────────┬────────────────────────────────┤
│  SIDEBAR     │                                │
│  (250px)     │    CONTENT (2 columns)         │
│              │                                │
│              │ Left Column:  Right Column:   │
│              │ - KPI Cards   - Chatbot      │
│              │ - Posts                       │
│              │ - Trends                      │
└──────────────┴────────────────────────────────┘
```

### Tablet (768px - 1200px)
```
┌──────────────────────────────────────┐
│      HEADER (Responsive)             │
├──────────────────────────────────────┤
│  SIDEBAR (Vertical, narrower)        │
├──────────────────────────────────────┤
│         CONTENT (Single Column)      │
│  - KPI Cards (2 per row still)       │
│  - Posts section                     │
│  - Trends section                    │
│  - Chatbot below                     │
└──────────────────────────────────────┘
```

### Mobile (< 768px)
```
┌────────────────────────┐
│   HEADER (Compact)     │
├────────────────────────┤
│ SIDEBAR (Horizontal)   │
│ 🏠 👥 📚 📰 🎤 💼 💰  │
├────────────────────────┤
│   CONTENT (Full Width) │
│ - KPI Cards (1 per row)│
│ - Posts section        │
│ - Trends section       │
│ - Chatbot (full width) │
└────────────────────────┘
```

## Typography

```
┌──────────────────────┬──────────┬─────────────────┬─────────────────────┐
│ Element              │ Size     │ Weight          │ Color               │
├──────────────────────┼──────────┼─────────────────┼─────────────────────┤
│ Main Title           │ 32px     │ bold (700)      │ #e2e8f0             │
│ Subtitle             │ 14px     │ regular (400)   │ #64748b             │
│ Column Title         │ 16px     │ bold (700)      │ #e2e8f0             │
│ Card Title           │ 18px     │ bold (700)      │ #f1f5f9             │
│ Section Title        │ 16px     │ bold (700)      │ #f1f5f9             │
│                      │          │                 │                     │
│ KPI Label            │ 12px     │ semi-bold (600) │ #64748b             │
│ KPI Value            │ 28px     │ bold (700)      │ #f1f5f9             │
│ KPI Trend            │ 12px     │ regular (400)   │ #64748b / #10b981   │
│                      │          │                 │                     │
│ Post Title           │ 14px     │ medium (500)    │ #e2e8f0             │
│ Post Date            │ 12px     │ regular (400)   │ #64748b             │
│                      │          │                 │                     │
│ User Name            │ 14px     │ bold (700)      │ #f1f5f9             │
│ User Email           │ 12px     │ regular (400)   │ #64748b             │
│                      │          │                 │                     │
│ Button Text          │ 13px     │ bold (700)      │ white / #e2e8f0     │
│ Sidebar Button       │ 14px     │ regular (400)   │ #94a3b8 / white     │
└──────────────────────┴──────────┴─────────────────┴─────────────────────┘

Font Family: "Segoe UI", "SF Pro Display", system-ui, sans-serif
Line Height: 1.5 (body text), 1 (values)
Letter Spacing: Normal (0.5px for section labels)
```

## Spacing System

```
┌─────────────┬─────────┬─────────────────────────────────────┐
│ Name        │ Size    │ Usage                               │
├─────────────┼─────────┼─────────────────────────────────────┤
│ xs          │ 4px     │ Micro spacing within components     │
│ sm          │ 8px     │ Small gaps, icon spacing            │
│ md          │ 12px    │ Default padding inside cards        │
│ lg          │ 16px    │ Margin between components           │
│ xl          │ 24px    │ Large gaps, header padding          │
│ 2xl         │ 32px    │ Section margins                     │
│ 3xl         │ 48px    │ Large layout spacing                │
└─────────────┴─────────┴─────────────────────────────────────┘
```

## Border Radius System

```
sm:   6px   → Input fields, buttons
md:   8px   → Hover backgrounds, inputs  
lg:  12px   → Cards, containers
full: 50%   → Circular progress indicator
```

## Shadow System

```
sm:       0 1px 2px rgba(0, 0, 0, 0.05)
md:       0 4px 6px rgba(0, 0, 0, 0.1)
lg:       0 10px 15px rgba(0, 0, 0, 0.1)
purple:   0 4px 12px rgba(168, 85, 247, 0.15)  → Logo glow effect
```

## Animation Timings

```
Transitions: 0.2s ease (hover, focus states)
Durations: 
  - Hover effects: 150ms
  - Focus states: 200ms
  - Page transitions: 300ms
```

## Interactive Elements

### Hover Effects
```
Button:
  Background: #16161f → #1f1f2a
  Border: #252530 → #a855f7
  Transition: 0.2s ease

Sidebar Button:
  Background: transparent → #16161f
  Text: #94a3b8 → #e2e8f0
  Transition: 0.2s ease

Active Sidebar:
  Background: #7c3aed
  Text: white
  No transition (immediate)
```

### Focus States
```
Input/Search:
  Border-color: #252530 → #a855f7
  Border-width: 1px
  Outline: none
  Transition: 0.2s ease
```

## KPI Card Gradient Variants

```
Card 1 (Users - Purple):
  Top Border: linear-gradient(to right, #a855f7, #7c3aed)

Card 2 (Candidates - Blue):
  Top Border: linear-gradient(to right, #0ea5e9, #06b6d4)

Card 3 (Offers - Green):
  Top Border: linear-gradient(to right, #10b981, #059669)

Card 4 (Interviews - Yellow):
  Top Border: linear-gradient(to right, #f59e0b, #d97706)
```

## Progress Indicator

```
Base: Circle (64px diameter)
Inner: Solid circle (52px diameter, background color #0a0a0f)
Progress: Conic gradient from top
  - Colored arc: 0deg to (68 * 3.6deg = 244.8deg)
  - Remaining: #252530 from 244.8deg to 360deg
Color: #a855f7 (purple)
```

This visual guide can be used for:
- Designer reference
- Developer implementation checklist
- QA testing validation
- User feedback discussions
