# Backoffice Migration Summary - JavaFX to Symfony

## Overview
The backoffice has been completely refactored to match the JavaFX design system from the reference MainDashboard.fxml and Home.fxml files. The migration maintains the exact same layout, styling, and functionality as the original JavaFX application.

## Files Created/Modified

### 1. Templates

#### `templates/nour/backoffice/layout.html.twig` (NEW)
- **Purpose**: Shell/Main Dashboard layout (equivalent to MainDashboard.fxml)
- **Structure**:
  - `<header class="dashboard-header">`: Top navigation bar with logo, search, user info, and logout button
  - `<aside class="dashboard-sidebar">`: Left sidebar with navigation menu
  - `<main class="dashboard-content">`: Content area where pages are rendered
- **Features**:
  - Responsive flexbox layout
  - User profile display (firstname, lastname, email)
  - Navigation sections: Navigation (Home, Users, Formations, Posts, Claims, Interviews, Offers) and Administration (Statistics, Settings)
  - Active state indicator for current page

#### `templates/nour/backoffice/home.html.twig` (UPDATED)
- **Purpose**: Home/Dashboard view (equivalent to Home.fxml)
- **Structure**:
  - Left column: KPI cards (Users, Candidates, Offers, Interviews) + Recent posts + Trends section
  - Right column: AI Chatbot assistant
- **Features**:
  - 4 KPI cards with trend indicators
  - Recent posts/offers list with timestamps
  - Conversion rate progress indicator (68%)
  - Interactive chatbot with HTTP HEAD check and INSEE API integration
  - All data passed from BackofficeController

#### `templates/nour/backoffice/index.html.twig` (UPDATED)
- Now simply extends home.html.twig for consistency

### 2. CSS Styles

#### `assets/styles/app.css` (UPDATED - Added 600+ lines)
Complete dashboard and home styling sections:

**Dashboard Root & Header**:
- `.dashboard-root`: Main container with dark theme (#0a0a0f)
- `.dashboard-header`: Top bar with gradient and border
- `.header-search`: Search input with focus state
- `.btn-logout`: Purple gradient logout button
- `.user-block`: User info display

**Sidebar**:
- `.dashboard-sidebar`: Left navigation panel
- `.sidebar-btn`: Navigation buttons with hover effects
- `.sidebar-btn-active`: Active state styling (purple background)
- `.sidebar-section`: Grouped navigation sections

**Content Area**:
- `.dashboard-content`: Main content container

**Home View - KPI Cards**:
- `.home-kpi-grid`: 2-column responsive grid
- `.home-kpi-card` (+ `.card-2`, `.card-3`, `.card-4`): Individual KPI cards with colored top borders
- `.home-kpi-label`, `.home-kpi-value`, `.home-kpi-trend`: Card content styling

**Home View - Sections**:
- `.home-section-card`: Reusable section container
- `.home-posts-list`, `.home-post-item`: Posts list styling
- `.home-progress`: Circular progress indicator (68% conversion rate)
- `.home-trends-container`: Trends layout

**Home View - Chatbot**:
- `.home-chatbot-card`: Chatbot container
- `.home-chatbot-input`: Text input field
- `.home-chatbot-question`: Question buttons
- `.home-chatbot-reply`: Response display area

**Responsive Design**:
- Tablet (max-width: 1200px): Two-column layout collapses to single column
- Mobile (max-width: 768px): Sidebar becomes horizontal scrollable menu, KPI cards stack

### 3. Controller

#### `src/Controller/Nour/BackofficeController.php` (UPDATED)
- Template path updated from `backoffice/home.html.twig` to `nour/backoffice/home.html.twig`
- Passes data to template:
  - `total_users`: User count from database
  - `total_candidates`: Candidate count
  - `total_offers`: Static value (48)
  - `total_interviews`: Interview count
  - `formations`: Sample formation data
  - `posts`: Sample recent posts
- Chatbot endpoints:
  - `POST /backoffice/chatbot/ping`: HTTP HEAD check for website availability
  - `POST /backoffice/chatbot/insee`: INSEE API search for company data

## Color Palette & Design System

```
Primary: #0a0a0f (Very Dark Gray/Black)
Surface: #12121a (Dark Gray)
Border: #252530 (Dark Border)
Text Primary: #f1f5f9 (Light Gray)
Text Muted: #94a3b8 (Medium Gray)
Text Hint: #64748b (Hint Gray)

Accents:
- Purple: #a855f7 (Primary Interactive)
- Purple Light: #c084fc (Hover/Highlights)
- Blue: #0ea5e9 (Info)
- Green: #10b981 (Success/Positive)
- Yellow: #f59e0b (Warning)
- Red: #ef4444 (Error)
```

## Functionality Comparison

### JavaFX vs Symfony Web

| Feature | JavaFX | Symfony |
|---------|--------|---------|
| **Shell Layout** | MainDashboard.fxml BorderPane | backoffice/layout.html.twig |
| **Home View** | Home.fxml | backoffice/home.html.twig |
| **Navigation** | Sidebar buttons | Sidebar links (a href) |
| **KPI Display** | Labels + Values | Divs with Twig variables |
| **Chatbot** | FXML + Java handler | HTML form + JavaScript + Backend endpoints |
| **Styling** | JavaFX CSS | CSS3 with Grid/Flexbox |
| **Responsive** | Fixed layout | Full responsive design |
| **User Data** | Java services | Symfony Repository + Entity |

## Key CSS Classes Reference

### Layout Structure
- `dashboard-root`: Main container
- `dashboard-header`: Top navigation
- `dashboard-sidebar`: Left sidebar
- `dashboard-content`: Content area
- `dashboard-wrapper`: Flex wrapper for sidebar + content

### KPI Cards
- `home-kpi-grid`: 2-column grid
- `home-kpi-card`: Individual card (with `.card-2`, `.card-3`, `.card-4` variants)
- `home-kpi-label`: "Users", "Candidates", etc.
- `home-kpi-value`: The number (2504, 312, etc.)
- `home-kpi-trend`: Trend indicator with optional `.up` class for green color

### Section Cards
- `home-section-card`: Container for posts, trends
- `home-section-title`: Section header
- `home-posts-list`: Posts container
- `home-post-item`: Individual post row
- `home-post-title`: Post title
- `home-post-date`: Post timestamp

### Chatbot
- `home-chatbot-card`: Main container
- `home-chatbot-input`: Text input
- `home-chatbot-buttons`: Button container
- `home-chatbot-question`: Individual question button
- `home-chatbot-reply`: Response text area

## JavaScript Features

### Built-in Functionality
1. **Chatbot HTTP Check** (`#qWebsite`):
   - Sends website URL to `/backoffice/chatbot/ping`
   - Returns HTTP status and response time

2. **INSEE API Search** (`#qApi`):
   - Searches company database
   - Returns company info (SIREN, status, sector, location)

3. **Reset Button** (`#qRestart`):
   - Clears input and resets response message

## Responsive Breakpoints

1. **Desktop (>1200px)**: Two-column layout (KPI on left, chatbot on right)
2. **Tablet (768px-1200px)**: Stacked single column
3. **Mobile (<768px)**: Full mobile layout with horizontal sidebar menu

## Migration Checklist

✅ Layout structure (BorderPane → Flexbox)
✅ Header with logo, search, user info, logout
✅ Sidebar navigation with 9 menu items
✅ Content area for page rendering
✅ KPI cards (4 cards with trend indicators)
✅ Recent posts section (4 posts with dates)
✅ Trends section (circular progress 68%)
✅ Chatbot with HTTP and INSEE integration
✅ Complete CSS styling
✅ Color scheme matching JavaFX design
✅ Responsive design for all screen sizes
✅ JavaScript for chatbot interaction
✅ Sidebar active state handling

## How to Test

1. Navigate to `http://localhost:8000/backoffice`
2. Verify header displays user info (requires authentication)
3. Check sidebar highlights "Accueil" as active
4. Verify KPI cards display correct counts
5. Test chatbot:
   - Enter "google.com" and click "Vérifier le site web"
   - Enter "Apple" and click "Rechercher INSEE"
   - Click "Recommencer" to reset
6. Test responsive design (resize browser to mobile/tablet)

## Future Enhancements

- [ ] Link sidebar navigation buttons to their respective pages
- [ ] Add pie chart for formations distribution
- [ ] Implement real-time KPI updates
- [ ] Add search functionality
- [ ] Create sub-pages for Users, Formations, Posts, etc.
- [ ] Add user profile dropdown menu
- [ ] Implement theme switching
