# ============================================================
#  EXTEIN AUTO-DEPLOY  –  extein.com.mx
#  Token guardado en Windows Credential Manager (seguro)
# ============================================================

$REPO_DIR = "C:\paginaweb"

Write-Host ""
Write-Host "=======================================" -ForegroundColor Cyan
Write-Host "  EXTEIN DEPLOY  ->  extein.com.mx" -ForegroundColor Cyan
Write-Host "=======================================" -ForegroundColor Cyan
Write-Host ""

Set-Location $REPO_DIR

Write-Host "Sincronizando con GitHub..." -ForegroundColor Yellow
git pull origin main --quiet

git add .

$status = git status --porcelain
if (-not $status) {
    Write-Host "No hay cambios nuevos que subir." -ForegroundColor Green
    pause
    exit
}

$timestamp = Get-Date -Format "yyyy-MM-dd HH:mm"
git commit -m "deploy: actualizacion sitio $timestamp"

Write-Host ""
Write-Host "Subiendo a GitHub..." -ForegroundColor Yellow
git push origin main

Write-Host ""
Write-Host "Listo! Cambios subidos a GitHub." -ForegroundColor Green
Write-Host "Hostinger actualizara extein.com.mx en segundos." -ForegroundColor Green
Write-Host ""
pause
