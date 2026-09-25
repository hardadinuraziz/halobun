#!/bin/bash
# ╔══════════════════════════════════════════════════════════════════╗
# ║           HALLOBUN — SCRIPT DEPLOY HOSTING                      ║
# ║   Mendukung: Shared Hosting (cPanel/FTP) & VPS (SSH)            ║
# ╚══════════════════════════════════════════════════════════════════╝

set -e

RED='\033[0;31m'; GREEN='\033[0;32m'; YELLOW='\033[1;33m'
BLUE='\033[0;34m'; CYAN='\033[0;36m'; BOLD='\033[1m'; NC='\033[0m'

info()    { echo -e "${CYAN}[INFO]${NC}  $*"; }
success() { echo -e "${GREEN}[OK]${NC}    $*"; }
warn()    { echo -e "${YELLOW}[WARN]${NC}  $*"; }
error()   { echo -e "${RED}[ERROR]${NC} $*"; exit 1; }
step()    { echo -e "\n${BOLD}${BLUE}━━ $* ━━${NC}"; }

# ── Banner ────────────────────────────────────────────────────────
echo -e "${GREEN}"
echo '  ██╗  ██╗ █████╗ ██╗     ██╗      ██████╗ ██████╗ ██╗   ██╗███╗   ██╗'
echo '  ██║  ██║██╔══██╗██║     ██║     ██╔═══██╗██╔══██╗██║   ██║████╗  ██║'
echo '  ███████║███████║██║     ██║     ██║   ██║██████╔╝██║   ██║██╔██╗ ██║'
echo '  ██╔══██║██╔══██║██║     ██║     ██║   ██║██╔══██╗██║   ██║██║╚██╗██║'
echo '  ██║  ██║██║  ██║███████╗███████╗╚██████╔╝██████╔╝╚██████╔╝██║ ╚████║'
echo '  ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝╚══════╝ ╚═════╝ ╚═════╝  ╚═════╝ ╚═╝  ╚═══╝'
echo '             Deploy Script — Layanan Perkebunan & Pertanian'
echo -e "${NC}"

# ── Konfigurasi ───────────────────────────────────────────────────
GITHUB_REPO="git@github.com:hardadinuraziz/halobun.git"
APP_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
DEPLOY_MODE="${1:-help}"

# ═══════════════════════════════════════════════════════════════════
# FUNGSI: Build lokal
# ═══════════════════════════════════════════════════════════════════
build_local() {
    step "BUILD ASET LOKAL"
    export NVM_DIR="$HOME/.nvm"
    [ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"

    info "Composer install (production)..."
    composer install --no-dev --optimize-autoloader --no-interaction 2>&1 | tail -3
    success "Composer selesai"

    info "NPM install..."
    npm ci --prefer-offline 2>&1 | tail -3
    success "NPM install selesai"

    info "Build aset Vite (production)..."
    npm run build 2>&1 | tail -5
    success "Build selesai → public/build/"

    info "Optimasi Laravel cache..."
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    success "Cache Laravel dioptimasi"
}

# ═══════════════════════════════════════════════════════════════════
# FUNGSI: Push ke GitHub
# ═══════════════════════════════════════════════════════════════════
push_github() {
    step "PUSH KE GITHUB"
    cd "$APP_DIR"

    if ! git rev-parse --git-dir > /dev/null 2>&1; then
        info "Inisialisasi git..."
        git init
        git remote add origin "$GITHUB_REPO"
    fi

    info "Status git:"
    git status --short | head -20
    echo ""

    read -p "Pesan commit [default: 'deploy: update $(date +%Y-%m-%d)']: " COMMIT_MSG
    COMMIT_MSG="${COMMIT_MSG:-deploy: update $(date +%Y-%m-%d)}"

    git add -A
    git commit -m "$COMMIT_MSG" || warn "Tidak ada perubahan baru"
    git push -u origin main 2>&1 || git push -u origin master 2>&1
    success "Push ke GitHub berhasil!"
    echo -e "  ${CYAN}→ https://github.com/hardadinuraziz/halobun${NC}"
}

# ═══════════════════════════════════════════════════════════════════
# FUNGSI: Deploy ke VPS via SSH
# ═══════════════════════════════════════════════════════════════════
deploy_vps() {
    step "DEPLOY KE VPS (SSH)"

    # ── Edit variabel ini sesuai server Anda ───────────────────────
    VPS_HOST="${VPS_HOST:-}"
    VPS_USER="${VPS_USER:-}"
    VPS_PORT="${VPS_PORT:-22}"
    VPS_PATH="${VPS_PATH:-/var/www/hallobun}"
    VPS_KEY="${VPS_KEY:-$HOME/.ssh/id_rsa}"
    # ──────────────────────────────────────────────────────────────

    if [ -z "$VPS_HOST" ] || [ -z "$VPS_USER" ]; then
        echo -e "${YELLOW}Isi konfigurasi VPS:${NC}"
        read -p "  IP/Domain VPS        : " VPS_HOST
        read -p "  Username SSH         : " VPS_USER
        read -p "  Port SSH [22]        : " PORT_IN; VPS_PORT="${PORT_IN:-22}"
        read -p "  Path di server       : " PATH_IN; VPS_PATH="${PATH_IN:-/var/www/hallobun}"
        read -p "  SSH Key [~/.ssh/id_rsa]: " KEY_IN; VPS_KEY="${KEY_IN:-$HOME/.ssh/id_rsa}"
    fi

    SSH_CMD="ssh -i $VPS_KEY -p $VPS_PORT -o StrictHostKeyChecking=no $VPS_USER@$VPS_HOST"

    info "Test koneksi SSH..."
    $SSH_CMD "echo 'Koneksi OK'" || error "Gagal SSH. Cek IP/user/key/port."
    success "SSH terhubung"

    build_local

    info "Upload via rsync..."
    rsync -az --progress \
        --exclude='.git' \
        --exclude='node_modules' \
        --exclude='.env' \
        --exclude='storage/logs/*.log' \
        --exclude='storage/framework/sessions/*' \
        --exclude='storage/framework/cache/data/*' \
        -e "ssh -i $VPS_KEY -p $VPS_PORT -o StrictHostKeyChecking=no" \
        "$APP_DIR/" "$VPS_USER@$VPS_HOST:$VPS_PATH/"
    success "Upload selesai"

    info "Menjalankan perintah di server..."
    $SSH_CMD bash -s << REMOTE
        set -e
        cd $VPS_PATH
        echo "→ composer install..."
        composer install --no-dev --optimize-autoloader --no-interaction 2>&1 | tail -2
        echo "→ migrate..."
        php artisan migrate --force
        echo "→ storage:link..."
        php artisan storage:link 2>/dev/null || true
        echo "→ cache..."
        php artisan config:cache && php artisan route:cache && php artisan view:cache
        echo "→ permission..."
        chmod -R 775 storage bootstrap/cache
        chown -R www-data:www-data . 2>/dev/null || true
        echo "→ restart nginx/php-fpm..."
        sudo systemctl restart php8.2-fpm 2>/dev/null || sudo service nginx reload 2>/dev/null || true
        echo "Deploy server selesai!"
REMOTE

    success "Deploy VPS selesai! 🚀"
    echo -e "  ${CYAN}→ http://$VPS_HOST${NC}"
}

# ═══════════════════════════════════════════════════════════════════
# FUNGSI: Buat ZIP untuk Shared Hosting (cPanel)
# ═══════════════════════════════════════════════════════════════════
deploy_cpanel() {
    step "PERSIAPAN SHARED HOSTING (cPanel)"
    cd "$APP_DIR"

    BUILD_DIR="$APP_DIR/../hallobun-hosting"
    ZIP_FILE="$APP_DIR/../hallobun-deploy-$(date +%Y%m%d_%H%M%S).zip"

    build_local

    info "Menyiapkan folder deploy..."
    rm -rf "$BUILD_DIR"
    mkdir -p "$BUILD_DIR"

    rsync -a \
        --exclude='.git' \
        --exclude='node_modules' \
        --exclude='.env' \
        --exclude='storage/logs/*.log' \
        --exclude='storage/framework/sessions/*' \
        --exclude='storage/framework/cache/data/*' \
        --exclude='tests' \
        --exclude='deploy.sh' \
        "$APP_DIR/" "$BUILD_DIR/"

    # .htaccess untuk root domain
    cat > "$BUILD_DIR/.htaccess-root" << 'HTA'
# Letakkan sebagai .htaccess di public_html/
# Mengarahkan semua traffic ke /public/ Laravel
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
HTA

    # Template .env production
    cat > "$BUILD_DIR/.env.production" << 'ENVFILE'
# Rename menjadi .env dan isi sesuai konfigurasi hosting Anda

APP_NAME=Hallobun
APP_ENV=production
APP_KEY=                      ← Jalankan: php artisan key:generate
APP_DEBUG=false
APP_URL=https://domainanda.com

LOG_CHANNEL=stack
LOG_LEVEL=error

# Database MySQL (cPanel)
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=cpanel_username_hallobun
DB_USERNAME=cpanel_username_hallobun
DB_PASSWORD=password_anda

# Mail
MAIL_MAILER=smtp
MAIL_HOST=mail.domainanda.com
MAIL_PORT=465
MAIL_USERNAME=info@domainanda.com
MAIL_PASSWORD=
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=info@domainanda.com
MAIL_FROM_NAME="Hallobun"

# Midtrans
MIDTRANS_SERVER_KEY=
MIDTRANS_CLIENT_KEY=
MIDTRANS_IS_PRODUCTION=false

# WhatsApp Admin
ADMIN_PHONE=6281234567890

SESSION_DRIVER=file
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
ENVFILE

    # Panduan deploy
    cat > "$BUILD_DIR/PANDUAN-HOSTING.md" << 'GUIDE'
# Panduan Deploy Hallobun ke Shared Hosting (cPanel)

## Langkah 1 — Upload
Upload ZIP ini ke hosting Anda melalui:
- cPanel → File Manager, atau
- FTP client (FileZilla, Cyberduck)

Ekstrak di luar public_html (mis: /home/username/)

## Langkah 2 — Struktur Folder di Server
```
/home/username/
├── hallobun/          ← isi ZIP diekstrak di sini
│   ├── app/
│   ├── config/
│   ├── vendor/
│   └── ...
└── public_html/       ← isi folder /hallobun/public/ dipindah ke sini
    ├── index.php
    ├── .htaccess
    └── build/
```

## Langkah 3 — Edit index.php di public_html
```php
// Ubah dua baris ini:
require __DIR__.'/../../hallobun/vendor/autoload.php';
$app = require_once __DIR__.'/../../hallobun/bootstrap/app.php';
```

## Langkah 4 — Setup .env
1. Copy .env.production → rename .env
2. Letakkan di folder hallobun/ (bukan public_html)
3. Isi DB_*, MAIL_*, APP_URL
4. Jalankan: php artisan key:generate

## Langkah 5 — Database (via cPanel)
1. MySQL Databases → buat database
2. Buat user, tambahkan ke database (All Privileges)
3. Update DB_* di .env
4. php artisan migrate --force

## Langkah 6 — Selesai
```bash
php artisan storage:link
php artisan config:cache
php artisan route:cache
chmod -R 775 storage bootstrap/cache
```

## Troubleshooting
- 500 Error → cek storage/logs/laravel.log
- Blank page → pastikan APP_KEY sudah di-set
- Gambar error → php artisan storage:link
- Permission → chmod -R 775 storage bootstrap/cache
GUIDE

    info "Membuat file ZIP..."
    cd "$APP_DIR/.."
    zip -r "$ZIP_FILE" "hallobun-hosting/" -x "*/node_modules/*" -x "*/.git/*" 2>&1 | tail -2
    rm -rf "$BUILD_DIR"

    success "ZIP siap: $ZIP_FILE"
    info "Ukuran: $(du -sh "$ZIP_FILE" | cut -f1)"
    echo ""
    echo -e "${GREEN}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${GREEN}  Upload ZIP ini ke cPanel Anda!${NC}"
    echo -e "${GREEN}  Ikuti instruksi di PANDUAN-HOSTING.md dalam ZIP.${NC}"
    echo -e "${GREEN}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
}

# ═══════════════════════════════════════════════════════════════════
# FUNGSI: Full deploy
# ═══════════════════════════════════════════════════════════════════
full_deploy() {
    step "FULL DEPLOY: Build → GitHub → VPS"
    build_local
    push_github
    deploy_vps
    success "Full deploy selesai! 🚀🌿"
}

# ═══════════════════════════════════════════════════════════════════
# MENU HELP
# ═══════════════════════════════════════════════════════════════════
show_help() {
    echo -e "${BOLD}Penggunaan:${NC}  bash deploy.sh <perintah>"
    echo ""
    echo -e "  ${GREEN}build${NC}    → Build aset (npm + composer + cache)"
    echo -e "  ${GREEN}github${NC}   → Commit & push ke GitHub"
    echo -e "  ${GREEN}vps${NC}      → Deploy ke VPS via SSH + rsync"
    echo -e "  ${GREEN}cpanel${NC}   → Buat ZIP untuk shared hosting cPanel"
    echo -e "  ${GREEN}full${NC}     → Build + GitHub + VPS sekaligus"
    echo ""
    echo -e "${BOLD}Contoh:${NC}"
    echo -e "  bash deploy.sh build"
    echo -e "  bash deploy.sh github"
    echo -e "  bash deploy.sh cpanel"
    echo -e "  bash deploy.sh vps"
    echo -e "  VPS_HOST=1.2.3.4 VPS_USER=root bash deploy.sh vps"
    echo ""
}

# ═══════════════════════════════════════════════════════════════════
# MAIN
# ═══════════════════════════════════════════════════════════════════
case "$DEPLOY_MODE" in
    build)         build_local ;;
    github)        push_github ;;
    vps)           deploy_vps ;;
    cpanel)        deploy_cpanel ;;
    full)          full_deploy ;;
    help|--help|-h|"") show_help ;;
    *) error "Perintah tidak dikenal: '$DEPLOY_MODE'. Gunakan: bash deploy.sh help" ;;
esac
