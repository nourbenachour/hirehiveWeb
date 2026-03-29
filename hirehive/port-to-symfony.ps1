# port-to-symfony.ps1
# Migration script for porting JavaFX project to Symfony
# Usage: .\port-to-symfony.ps1 -JavaFxSourcePath "C:\path\to\javafx\project" -TargetPath "."

param(
    [Parameter(Mandatory=$true)]
    [string]$JavaFxSourcePath,
    
    [Parameter(Mandatory=$false)]
    [string]$TargetPath = ".",
    
    [switch]$SkipAssets,
    [switch]$SkipDependencies
)

Write-Host "===============================================" -ForegroundColor Cyan
Write-Host "HireHive JavaFX to Symfony Migration Script" -ForegroundColor Cyan
Write-Host "===============================================" -ForegroundColor Cyan

# Validate source path
if (-not (Test-Path $JavaFxSourcePath)) {
    Write-Host "❌ Source path not found: $JavaFxSourcePath" -ForegroundColor Red
    exit 1
}

$TargetPath = (Resolve-Path $TargetPath).Path
Write-Host "`n✓ Target: $TargetPath" -ForegroundColor Green
Write-Host "✓ Source: $JavaFxSourcePath" -ForegroundColor Green

# Step 1: Install npm dependencies
if (-not $SkipDependencies) {
    Write-Host "`n[1/4] Installing npm dependencies..." -ForegroundColor Yellow
    Push-Location $TargetPath
    if (Test-Path "package.json") {
        npm install
        Write-Host "✓ npm dependencies installed" -ForegroundColor Green
    }
    Pop-Location
}

# Step 2: Create directory structure
Write-Host "`n[2/4] Ensuring directory structure..." -ForegroundColor Yellow
$dirs = @(
    "assets/styles",
    "assets/js",
    "public/assets",
    "public/chart",
    "templates/dashboard",
    "templates/candidat",
    "templates/backoffice",
    "templates/frontoffice"
)

foreach ($dir in $dirs) {
    $fullPath = Join-Path $TargetPath $dir
    if (-not (Test-Path $fullPath)) {
        New-Item -ItemType Directory -Path $fullPath -Force | Out-Null
        Write-Host "  ✓ Created: $dir" -ForegroundColor Cyan
    } else {
        Write-Host "  ✓ Exists: $dir" -ForegroundColor Cyan
    }
}

# Step 3: Copy JavaFX assets
if (-not $SkipAssets) {
    Write-Host "`n[3/4] Copying JavaFX assets..." -ForegroundColor Yellow
    
    # Copy resources/assets
    $assetsSource = Join-Path $JavaFxSourcePath "src/main/resources/assets"
    if (Test-Path $assetsSource) {
        Copy-Item -Path "$assetsSource/*" -Destination (Join-Path $TargetPath "public/assets") -Recurse -Force
        Write-Host "  ✓ Assets copied" -ForegroundColor Green
    } else {
        Write-Host "  ⚠ Assets folder not found at: $assetsSource" -ForegroundColor Yellow
    }
    
    # Copy chart.min.js
    $chartSource = Join-Path $JavaFxSourcePath "src/main/resources/chart/chart.min.js"
    if (Test-Path $chartSource) {
        Copy-Item -Path $chartSource -Destination (Join-Path $TargetPath "public/chart/") -Force
        Write-Host "  ✓ Chart.js copied" -ForegroundColor Green
    } else {
        Write-Host "  ⚠ Chart.js not found at: $chartSource" -ForegroundColor Yellow
    }
}

# Step 4: Convert JavaFX CSS
Write-Host "`n[4/4] Converting JavaFX CSS (if available)..." -ForegroundColor Yellow
$cssSource = Join-Path $JavaFxSourcePath "src/main/resources/resources/tn/esprit/javafx"
if (Test-Path $cssSource) {
    $nodeScript = Join-Path $TargetPath "convert-javafx-css.js"
    if (Test-Path $nodeScript) {
        Push-Location $TargetPath
        node $nodeScript $cssSource "assets/styles/javafx.css"
        Write-Host "  ✓ CSS conversion completed" -ForegroundColor Green
        Pop-Location
    }
} else {
    Write-Host "  ⚠ JavaFX CSS folder not found" -ForegroundColor Yellow
}

Write-Host "`n===============================================" -ForegroundColor Cyan
Write-Host "Migration Complete! ✓" -ForegroundColor Green
Write-Host "===============================================" -ForegroundColor Cyan
Write-Host "`nNext steps:" -ForegroundColor Yellow
Write-Host "1. cd $TargetPath"
Write-Host "2. npm install (if not done)"
Write-Host "3. npm run dev (to build assets)"
Write-Host "4. composer require symfony/webpack-encore-bundle"
Write-Host "5. php bin/console server:run (to start dev server)"
Write-Host ""
