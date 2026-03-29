@echo off
REM Quick test script for backoffice (Windows)

echo.
echo Testing Backoffice Setup...
echo.

REM Check templates
echo Checking templates...
if exist "templates\nour\backoffice\layout.html.twig" (
  echo. ^>^> layout.html.twig found ^[OK^]
) else (
  echo. ^>^> layout.html.twig NOT found ^[ERROR^]
)

if exist "templates\nour\backoffice\home.html.twig" (
  echo. ^>^> home.html.twig found ^[OK^]
) else (
  echo. ^>^> home.html.twig NOT found ^[ERROR^]
)

REM Check CSS
echo.
echo Checking CSS...
findstr /M "dashboard-root" assets\styles\app.css >nul 2>&1
if %errorlevel% equ 0 (
  echo. ^>^> dashboard-root class found in app.css ^[OK^]
) else (
  echo. ^>^> dashboard-root NOT found in app.css ^[ERROR^]
)

findstr /M "home-kpi-card" assets\styles\app.css >nul 2>&1
if %errorlevel% equ 0 (
  echo. ^>^> home-kpi-card class found in app.css ^[OK^]
) else (
  echo. ^>^> home-kpi-card NOT found in app.css ^[ERROR^]
)

REM Check Controller
echo.
echo Checking Controller...
findstr /M "nour/backoffice/home.html.twig" src\Controller\Nour\BackofficeController.php >nul 2>&1
if %errorlevel% equ 0 (
  echo. ^>^> Controller renders correct template ^[OK^]
) else (
  echo. ^>^> Controller template path incorrect ^[ERROR^]
)

findstr /M "total_users" src\Controller\Nour\BackofficeController.php >nul 2>&1
if %errorlevel% equ 0 (
  echo. ^>^> Controller passes KPI variables ^[OK^]
) else (
  echo. ^>^> Controller KPI variables missing ^[ERROR^]
)

echo.
echo Setup verification complete!
echo.
echo Next steps:
echo   1. Run: symfony serve -d
echo   2. Visit: http://localhost:8000/login
echo   3. Login as admin
echo   4. Go to: http://localhost:8000/backoffice
echo.
pause
