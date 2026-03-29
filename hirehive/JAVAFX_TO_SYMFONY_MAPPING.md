# JavaFX to Symfony Web CSS Class Mapping

## MainDashboard.fxml → layout.html.twig

### BorderPane (Shell Container)
```javafx
<BorderPane fx:id="mainPane" styleClass="dashboard-root">
```
**Maps to**: `.dashboard-root`
```css
.dashboard-root {
    background-color: #0a0a0f;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
```

### Top Section (Header)
```javafx
<top>
  <!-- logo, search, user, logout -->
</top>
```
**Maps to**: `.dashboard-header`
```css
.dashboard-header {
    background-color: #0a0a0f;
    border-bottom: 1px solid #1a1a24;
    padding: 16px 32px;
    display: flex;
    align-items: center;
    gap: 24px;
}
```

**Components**:
- Logo → `.header-logo`
- Brand text → `.header-title`
- Search input → `.header-search`
- User info → `.user-block`, `.user-name`, `.user-email`
- Logout button → `.btn-logout`

### Left Section (Sidebar)
```javafx
<left>
  <!-- sidebar buttons: Accueil, Utilisateurs, etc. -->
</left>
```
**Maps to**: `.dashboard-sidebar`
```css
.dashboard-sidebar {
    background-color: #0a0a0f;
    border-right: 1px solid #1a1a24;
    width: 250px;
    padding: 24px 16px;
    overflow-y: auto;
}
```

**Navigation buttons**:
```javafx
<Button text="Accueil" ... />
```
**Maps to**: `.sidebar-btn` and `.sidebar-btn-active`
```css
.sidebar-btn {
    background-color: transparent;
    color: #94a3b8;
    padding: 12px 14px;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.sidebar-btn-active {
    background-color: #7c3aed;
    color: white;
}
```

### Center Section (Content Area)
```javafx
<center>
  <AnchorPane fx:id="contentArea" styleClass="dashboard-content"/>
</center>
```
**Maps to**: `.dashboard-content`
```css
.dashboard-content {
    background-color: #0a0a0f;
    flex: 1;
    overflow-y: auto;
    padding: 24px;
}
```

---

## Home.fxml → home.html.twig

### Scroll Container
```javafx
<ScrollPane fitToWidth="true" styleClass="home-scroll">
```
**Maps to**: `.home-scroll`

### Root VBox
```javafx
<VBox styleClass="home-root" spacing="20">
```
**Maps to**: `.home-root`
```css
.home-root {
    background-color: #0a0a0f;
    font-family: "Segoe UI", "SF Pro Display", system-ui, sans-serif;
    padding: 8px;
}
```

### Main Title
```javafx
<Label text="Tableau de bord" styleClass="home-main-title"/>
```
**Maps to**: `.home-main-title`
```css
.home-main-title {
    color: #e2e8f0;
    font-size: 32px;
    font-weight: bold;
}
```

### Subtitle
```javafx
<Label text="Vue d'ensemble..." styleClass="home-subtitle"/>
```
**Maps to**: `.home-subtitle`
```css
.home-subtitle {
    color: #64748b;
    font-size: 14px;
}
```

### Container HBox
```javafx
<HBox spacing="20" alignment="TOP_LEFT">
```
**Maps to**: `.home-container`
```css
.home-container {
    display: flex;
    gap: 20px;
    align-items: flex-start;
}
```

### Column (Left)
```javafx
<VBox styleClass="home-column" spacing="20" HBox.hgrow="ALWAYS">
    <Label text="KPI &amp; Affiches" styleClass="home-column-title"/>
```
**Maps to**: `.home-column` and `.home-column-title`
```css
.home-column {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.home-column-title {
    color: #e2e8f0;
    font-size: 16px;
    font-weight: bold;
}
```

---

## KPI Cards

### HBox Grid
```javafx
<HBox spacing="12" alignment="CENTER_LEFT">
```
**Maps to**: `.home-kpi-grid`
```css
.home-kpi-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
}
```

### Individual KPI Card
```javafx
<VBox styleClass="home-kpi-card">
    <Label text="Utilisateurs" styleClass="home-kpi-label"/>
    <Label fx:id="lblTotalUsers" text="2 504" styleClass="home-kpi-value"/>
    <Label text="+12%" styleClass="home-kpi-trend up"/>
</VBox>
```
**Maps to**: `.home-kpi-card`, `.home-kpi-label`, `.home-kpi-value`, `.home-kpi-trend`
```css
.home-kpi-card {
    background-color: #12121a;
    border-radius: 12px;
    padding: 16px;
    border: 1px solid #252530;
    position: relative;
}

.home-kpi-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(to right, #a855f7, #7c3aed);
}

.home-kpi-card.card-2::before { background: linear-gradient(to right, #0ea5e9, #06b6d4); }
.home-kpi-card.card-3::before { background: linear-gradient(to right, #10b981, #059669); }
.home-kpi-card.card-4::before { background: linear-gradient(to right, #f59e0b, #d97706); }

.home-kpi-label { color: #64748b; font-size: 12px; }
.home-kpi-value { color: #f1f5f9; font-size: 28px; font-weight: bold; }
.home-kpi-trend { color: #64748b; font-size: 12px; }
.home-kpi-trend.up { color: #10b981; font-weight: 600; }
```

---

## Section Cards

### Posts Section
```javafx
<VBox styleClass="home-section-card" spacing="10">
    <Label text="Dernieres affiches / Postes" styleClass="home-section-title"/>
    <VBox styleClass="home-posts-list" spacing="8">
```
**Maps to**: `.home-section-card`, `.home-section-title`, `.home-posts-list`
```css
.home-section-card {
    background-color: #12121a;
    border-radius: 12px;
    padding: 20px;
    border: 1px solid #252530;
}

.home-section-title {
    color: #f1f5f9;
    font-size: 16px;
    font-weight: bold;
}

.home-posts-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
}
```

### Individual Post Item
```javafx
<HBox styleClass="home-post-item" spacing="10">
    <Label text="Dev. Java Senior" styleClass="home-post-title"/>
    <Label text="Il y a 2j" styleClass="home-post-date"/>
</HBox>
```
**Maps to**: `.home-post-item`, `.home-post-title`, `.home-post-date`
```css
.home-post-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 0;
    border-bottom: 1px solid #252530;
}

.home-post-title { color: #e2e8f0; font-size: 14px; flex: 1; }
.home-post-date { color: #64748b; font-size: 12px; white-space: nowrap; }
```

---

## Trends Section

### Progress Container
```javafx
<HBox spacing="16" alignment="CENTER_LEFT">
    <ProgressIndicator styleClass="home-progress" progress="0.68" prefWidth="64" prefHeight="64"/>
    <VBox spacing="4">
        <Label text="Conversion candidatures -> entretiens" styleClass="home-card-label"/>
        <Label text="68%" styleClass="home-card-value"/>
    </VBox>
</HBox>
```
**Maps to**: `.home-trends-container`, `.home-progress`, `.home-trend-info`, `.home-card-label`, `.home-card-value`
```css
.home-trends-container {
    display: flex;
    gap: 16px;
    align-items: center;
}

.home-progress-wrapper {
    width: 64px;
    height: 64px;
    position: relative;
}

.home-progress {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: conic-gradient(
        #a855f7 0deg,
        #a855f7 calc(var(--progress) * 3.6deg),
        #252530 calc(var(--progress) * 3.6deg)
    );
}

.home-card-label { color: #64748b; font-size: 13px; }
.home-card-value { color: #f1f5f9; font-size: 20px; font-weight: bold; }
```

---

## Chatbot Section

### Chatbot Card Container
```javafx
<VBox styleClass="home-chatbot-card" spacing="10">
    <TextField fx:id="chatbotInput" promptText="Entrez le nom ou l'URL..." styleClass="home-chatbot-input" prefHeight="36"/>
    <VBox spacing="6">
        <Button fx:id="qWebsite" text="Verifier le site web (HTTP)" styleClass="home-chatbot-question" wrapText="true"/>
        <Button fx:id="qApi" text="Rechercher INSEE (open data)" styleClass="home-chatbot-question" wrapText="true"/>
        <Button fx:id="qRestart" text="Recommencer" styleClass="home-chatbot-question" wrapText="true"/>
    </VBox>
    <Label fx:id="chatbotReply" text="Saisissez le nom..." styleClass="home-chatbot-reply" wrapText="true"/>
</VBox>
```
**Maps to**: `.home-chatbot-card`, `.home-chatbot-input`, `.home-chatbot-buttons`, `.home-chatbot-question`, `.home-chatbot-reply`
```css
.home-chatbot-card {
    background-color: #12121a;
    border-radius: 12px;
    padding: 18px;
    border: 1px solid #252530;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.home-chatbot-input {
    background-color: #16161f;
    border: 1px solid #252530;
    border-radius: 6px;
    color: #e2e8f0;
    padding: 10px 12px;
    font-size: 13px;
    height: 36px;
}

.home-chatbot-buttons {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.home-chatbot-question {
    background-color: #16161f;
    color: #e2e8f0;
    border: 1px solid #252530;
    border-radius: 6px;
    padding: 8px 12px;
    font-size: 12px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.home-chatbot-question:hover {
    background-color: #1f1f2a;
    border-color: #a855f7;
}

.home-chatbot-reply {
    color: #94a3b8;
    font-size: 12px;
    line-height: 1.5;
    min-height: 36px;
    padding: 8px 0;
}
```

---

## Color Scheme Mapping

| JavaFX FX-Value | Description | CSS Color |
|---|---|---|
| `#0a0a0f` | Primary background | `#0a0a0f` |
| `#12121a` | Card/Surface background | `#12121a` |
| `#16161f` | Hover state background | `#16161f` |
| `#252530` | Border color | `#252530` |
| `#1a1a24` | Header/Sidebar border | `#1a1a24` |
| `#f1f5f9` | Primary text | `#f1f5f9` |
| `#e2e8f0` | Secondary text | `#e2e8f0` |
| `#94a3b8` | Muted text | `#94a3b8` |
| `#64748b` | Hint text | `#64748b` |
| `#a855f7` | Purple accent | `#a855f7` |
| `#c084fc` | Light purple (hover) | `#c084fc` |
| `#7c3aed` | Dark purple (active) | `#7c3aed` |
| `#0ea5e9` | Blue (info) | `#0ea5e9` |
| `#10b981` | Green (success) | `#10b981` |
| `#f59e0b` | Yellow (warning) | `#f59e0b` |

---

## Responsive Behavior

### JavaFX: Fixed Layout
```
BorderPane
├── Fixed width sidebar (250px)
├── Dynamic content area
└── Fixed header
```

### Web: Responsive
```
@media (max-width: 1200px)
├── Two-column layout collapses
└── Content becomes single column

@media (max-width: 768px)
├── Sidebar becomes horizontal menu
├── All content stacks vertically
└── Header becomes compact
```

---

## Event Handlers

### JavaFX (Java)
```java
qWebsite.setOnAction(event -> {
    String url = chatbotInput.getText();
    // HTTP HEAD check...
});
```

### Symfony Web (JavaScript)
```javascript
qWebsite.addEventListener('click', function() {
    let url = chatbotInput.value;
    fetch('/backoffice/chatbot/ping', {
        method: 'POST',
        body: JSON.stringify({ url: url })
    })
    .then(r => r.json())
    .then(data => chatbotReply.textContent = data.message);
});
```

Both achieve the same functionality through their respective platforms' event systems.
