#!/bin/bash
# Quick test script for backoffice

echo "🧪 Testing Backoffice Setup..."
echo ""

# Check templates
echo "📝 Checking templates..."
if [ -f "templates/nour/backoffice/layout.html.twig" ]; then
  echo "✅ layout.html.twig found"
else
  echo "❌ layout.html.twig NOT found"
fi

if [ -f "templates/nour/backoffice/home.html.twig" ]; then
  echo "✅ home.html.twig found"
else
  echo "❌ home.html.twig NOT found"
fi

# Check CSS
echo ""
echo "🎨 Checking CSS..."
if grep -q "dashboard-root" assets/styles/app.css; then
  echo "✅ dashboard-root class found in app.css"
else
  echo "❌ dashboard-root NOT found in app.css"
fi

if grep -q "home-kpi-card" assets/styles/app.css; then
  echo "✅ home-kpi-card class found in app.css"
else
  echo "❌ home-kpi-card NOT found in app.css"
fi

# Check Controller
echo ""
echo "🎮 Checking Controller..."
if grep -q "nour/backoffice/home.html.twig" src/Controller/Nour/BackofficeController.php; then
  echo "✅ Controller renders correct template"
else
  echo "❌ Controller template path incorrect"
fi

if grep -q "total_users" src/Controller/Nour/BackofficeController.php; then
  echo "✅ Controller passes KPI variables"
else
  echo "❌ Controller KPI variables missing"
fi

echo ""
echo "✅ Setup verification complete!"
echo ""
echo "Next steps:"
echo "1. Run: symfony serve -d"
echo "2. Visit: http://localhost:8000/login"
echo "3. Login as admin"
echo "4. Go to: http://localhost:8000/backoffice"
