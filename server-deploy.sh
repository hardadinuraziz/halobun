#!/bin/bash
# ╔══════════════════════════════════════════════════════════════════╗
# ║     HALLOBUN — SERVER DEPLOY FROM GITHUB                        ║
# ║     Jalankan script ini di terminal hosting/VPS Anda            ║
# ║     Pertama kali: bash server-deploy.sh install                 ║
# ║     Update kode : bash server-deploy.sh                         ║
# ╚══════════════════════════════════════════════════════════════════╝

set -e

# ════════════════════════════════════════════════════════════════════
#  ⚙️  KONFIGURASI — Sesuaikan dengan hosting Anda
# ════════════════════════════════════════════════════════════════════
GITHUB_REPO="https://github.com/hardadinuraziz/halobun.git"
# Jika repo private, gunakan token:
# GITHUB_REPO="https://<TOKEN>@github.com/hardadinuraziz/halobun.git"

BRANCH="main"                      # Branch yang akan di-deploy (main/master)
APP_DIR="$HOME/hallobun"           # Folder instalasi di server
WEB_DIR="$HOME/public_html"        # Folder web publik (public_html / htdocs / www)
PHP="php"                          # Path PHP default
COMPOSER="composer"                # Path composer default

# Auto-detect PHP 8.2+ untuk environment cPanel
for candidate in /usr/local/bin/ea-php83 /usr/local/bin/ea-php82 /usr/bin/php8.3 /usr/bin/php8.2 /usr/local/bin/alt-php83 /usr/local/bin/alt-php82; do
    if [ -x "$candidate" ]; then
        PHP="$candidate"
        break
    fi
done

# Auto-detect Composer jika command composer tidak ada di PATH
if ! command -v "$COMPOSER" >/dev/null 2>&1; then
    if [ -f "$HOME/composer.phar" ]; then
        COMPOSER="$PHP $HOME/composer.phar"
    elif [ -f "/usr/local/bin/composer" ]; then
        COMPOSER="/usr/local/bin/composer"
    fi
fi
# ════════════════════════════════════════════════════════════════════

RED='\033[0;31m'; GREEN='\033[0;32m'; YELLOW='\033[1;33m'
BLUE='\033[0;34m'; CYAN='\033[0;36m'; BOLD='\033[1m'; NC='\033[0m'

info()    { echo -e "${CYAN}[INFO]${NC}  $*"; }
success() { echo -e "${GREEN}[OK]${NC}    $*"; }
warn()    { echo -e "${YELLOW}[WARN]${NC}  $*"; }
error()   { echo -e "${RED}[ERROR]${NC} $*"; exit 1; }
step()    { echo -e "\n${BOLD}${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"; echo -e "${BOLD}${BLUE}  $*${NC}"; echo -e "${BOLD}${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"; }

# ── Banner ────────────────────────────────────────────────────────
echo -e "${GREEN}"
echo '  ██╗  ██╗ █████╗ ██╗     ██╗      ██████╗ ██████╗ ██╗   ██╗███╗   ██╗'
echo '  ███████║███████║██║     ██║     ██║   ██║██████╔╝██║   ██║██╔██╗ ██║'
echo '  ██║  ██║██║  ██║███████╗███████╗╚██████╔╝██████╔╝╚██████╔╝██║ ╚████║'
echo "             SERVER DEPLOY — $(date '+%Y-%m-%d %H:%M:%S')"
echo -e "${NC}"

MODE="${1:-update}"

# ════════════════════════════════════════════════════════════════════
#  INSTALL — Clone pertama kali dari GitHub
# ════════════════════════════════════════════════════════════════════
cmd_install() {
    step "INSTALL PERTAMA KALI DARI GITHUB"

    # 1. Cek git tersedia
    git --version > /dev/null 2>&1 || error "git tidak tersedia. Install dulu: yum install git / apt install git"

    # 2. Clone repo
    if [ -d "$APP_DIR/.git" ]; then
        warn "Folder $APP_DIR sudah ada dan merupakan git repo. Gunakan 'bash server-deploy.sh update'."
        exit 0
    fi

    info "Clone dari $GITHUB_REPO ..."
    git clone -b "$BRANCH" "$GITHUB_REPO" "$APP_DIR"
    success "Clone selesai → $APP_DIR"

    # 3. Buat .env
    if [ ! -f "$APP_DIR/.env" ]; then
        if [ -f "$APP_DIR/.env.example" ]; then
            cp "$APP_DIR/.env.example" "$APP_DIR/.env"
            warn ".env dibuat dari .env.example"
            warn "Sekarang EDIT $APP_DIR/.env — isi DB, APP_URL, MAIL, dll"
        else
            warn "Tidak ada .env.example. Buat .env manual!"
        fi
    fi

    # 4. Composer install
    step "INSTALL DEPENDENCIES"
    cd "$APP_DIR"
    info "Composer install..."
    $COMPOSER install --no-dev --optimize-autoloader --no-interaction
    success "Composer selesai"

    # 5. Generate key
    info "Generate APP_KEY..."
    $PHP artisan key:generate
    success "APP_KEY sudah di-set di .env"

    # 6. Storage link
    info "Storage link..."
    $PHP artisan storage:link 2>/dev/null || warn "storage:link gagal (mungkin sudah ada)"
    success "Storage link OK"

    # 7. Permission
    info "Set permission storage & bootstrap/cache..."
    chmod -R 775 storage bootstrap/cache
    success "Permission OK"

    # 8. Link public ke web dir
    step "MENGHUBUNGKAN /public KE $WEB_DIR"
    if [ -d "$APP_DIR/public" ]; then
        info "Menyalin isi public/ ke $WEB_DIR ..."
        cp -r "$APP_DIR/public/." "$WEB_DIR/"

        # Patch index.php agar mengarah ke folder laravel yang benar
        INDEX="$WEB_DIR/index.php"
        if [ -f "$INDEX" ]; then
            # Deteksi path relatif dari public_html ke app_dir
            sed -i "s|__DIR__.'/../storage|'$APP_DIR/storage|g" "$INDEX"
            sed -i "s|__DIR__.'/../vendor|'$APP_DIR/vendor|g" "$INDEX"
            sed -i "s|__DIR__.'/../bootstrap|'$APP_DIR/bootstrap|g" "$INDEX"
            success "index.php sudah di-patch → mengarah ke $APP_DIR"
        fi

        # Patch .htaccess agar rewrite ke public_html langsung
        if [ -f "$WEB_DIR/.htaccess" ]; then
            success ".htaccess sudah ada di $WEB_DIR"
        fi
    fi

    success "Instalasi selesai!"
    echo ""
    echo -e "${YELLOW}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${YELLOW}  LANGKAH SELANJUTNYA:${NC}"
    echo -e "${YELLOW}  1. Edit .env: nano $APP_DIR/.env${NC}"
    echo -e "${YELLOW}     Isi: APP_URL, DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD${NC}"
    echo -e "${YELLOW}  2. Buat database MySQL di cPanel → MySQL Databases${NC}"
    echo -e "${YELLOW}  3. Jalankan migrasi:${NC}"
    echo -e "${YELLOW}     cd $APP_DIR && php artisan migrate --force${NC}"
    echo -e "${YELLOW}  4. Optimalkan cache:${NC}"
    echo -e "${YELLOW}     cd $APP_DIR && php artisan optimize${NC}"
    echo -e "${YELLOW}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
}

# ════════════════════════════════════════════════════════════════════
#  UPDATE — Pull kode terbaru dari GitHub
# ════════════════════════════════════════════════════════════════════
cmd_update() {
    step "PULL UPDATE DARI GITHUB"

    # Validasi folder
    [ -d "$APP_DIR/.git" ] || error "Folder $APP_DIR bukan git repo. Jalankan install dulu: bash server-deploy.sh install"

    cd "$APP_DIR"

    # Simpan perubahan lokal jika ada
    if ! git diff --quiet 2>/dev/null; then
        warn "Ada perubahan lokal — disimpan dulu (git stash)..."
        git stash
    fi

    # Pull branch terbaru
    info "Pull dari branch '$BRANCH'..."
    git fetch origin
    git reset --hard "origin/$BRANCH"
    git clean -fd --exclude='.env' --exclude='storage/*' --exclude='bootstrap/cache/*'
    success "Kode berhasil diupdate dari GitHub"

    # Info versi terbaru
    LATEST_COMMIT=$(git log -1 --pretty=format:"%h — %s (%an, %ar)")
    info "Commit terbaru: $LATEST_COMMIT"

    # ── Composer install jika composer.json berubah ──────────────────
    if git diff HEAD~1 HEAD --name-only 2>/dev/null | grep -q "composer.json\|composer.lock"; then
        step "COMPOSER UPDATE (composer.json berubah)"
        $COMPOSER install --no-dev --optimize-autoloader --no-interaction
        success "Composer selesai"
    else
        info "composer.json tidak berubah, skip install"
    fi

    # ── Migrasi database ─────────────────────────────────────────────
    step "MIGRASI DATABASE"
    info "Cek migrasi baru..."
    PENDING=$($PHP artisan migrate:status 2>/dev/null | grep "No" | wc -l || echo "0")
    if [ "$PENDING" -gt "0" ]; then
        $PHP artisan migrate --force
        success "Migrasi selesai"
    else
        info "Tidak ada migrasi baru"
        $PHP artisan migrate --force 2>/dev/null || true
    fi

    # ── Sinkron file public/ ke public_html ─────────────────────────
    if [ -d "$APP_DIR/public" ]; then
        step "SINKRON ASET KE $WEB_DIR"
        info "Menyalin aset build & gambar terbaru ke $WEB_DIR ..."
        cp -r "$APP_DIR/public/build" "$WEB_DIR/" 2>/dev/null || true
        cp -r "$APP_DIR/public/images" "$WEB_DIR/" 2>/dev/null || true
        [ -f "$APP_DIR/public/favicon.ico" ] && cp "$APP_DIR/public/favicon.ico" "$WEB_DIR/" 2>/dev/null || true
        success "Aset public sinkron ke $WEB_DIR"
    fi

    # ── Optimasi cache ───────────────────────────────────────────────
    step "OPTIMASI CACHE"
    $PHP artisan config:clear
    $PHP artisan route:clear
    $PHP artisan view:clear
    $PHP artisan config:cache
    $PHP artisan route:cache
    $PHP artisan view:cache
    success "Cache dioptimasi"

    # Permission
    chmod -R 775 storage bootstrap/cache 2>/dev/null || true

    success "Update selesai! 🌿"
    echo -e "  ${CYAN}Commit: $LATEST_COMMIT${NC}"
}

# ════════════════════════════════════════════════════════════════════
#  MIGRATE — Hanya jalankan migrasi
# ════════════════════════════════════════════════════════════════════
cmd_migrate() {
    step "MIGRASI DATABASE"
    cd "$APP_DIR"
    $PHP artisan migrate --force
    success "Migrasi selesai"
}

# ════════════════════════════════════════════════════════════════════
#  OPTIMIZE — Bersihkan & rebuild cache
# ════════════════════════════════════════════════════════════════════
cmd_optimize() {
    step "OPTIMASI CACHE LARAVEL"
    cd "$APP_DIR"
    $PHP artisan config:clear && $PHP artisan route:clear && $PHP artisan view:clear
    $PHP artisan config:cache && $PHP artisan route:cache && $PHP artisan view:cache
    $PHP artisan optimize
    chmod -R 775 storage bootstrap/cache 2>/dev/null || true
    success "Cache dioptimasi"
}

# ════════════════════════════════════════════════════════════════════
#  STATUS — Cek status deploy
# ════════════════════════════════════════════════════════════════════
cmd_status() {
    step "STATUS HALLOBUN DI SERVER"
    cd "$APP_DIR" 2>/dev/null || error "Folder $APP_DIR tidak ditemukan. Jalankan install dulu."

    echo -e "${BOLD}📁 Folder     :${NC} $APP_DIR"
    echo -e "${BOLD}🌐 Web Dir    :${NC} $WEB_DIR"
    echo -e "${BOLD}🌿 Branch     :${NC} $(git rev-parse --abbrev-ref HEAD 2>/dev/null || echo '-')"
    echo -e "${BOLD}📌 Commit     :${NC} $(git log -1 --pretty=format:'%h — %s (%ar)' 2>/dev/null || echo '-')"
    echo -e "${BOLD}🐘 PHP        :${NC} $($PHP -r 'echo PHP_VERSION;' 2>/dev/null || echo 'tidak ditemukan')"
    echo -e "${BOLD}📦 Composer   :${NC} $($COMPOSER --version 2>/dev/null | head -1 || echo 'tidak ditemukan')"
    echo ""

    if [ -f "$APP_DIR/.env" ]; then
        APP_URL=$(grep "^APP_URL=" "$APP_DIR/.env" | cut -d= -f2)
        APP_ENV=$(grep "^APP_ENV=" "$APP_DIR/.env" | cut -d= -f2)
        APP_DEBUG=$(grep "^APP_DEBUG=" "$APP_DIR/.env" | cut -d= -f2)
        echo -e "${BOLD}🔗 APP_URL    :${NC} $APP_URL"
        echo -e "${BOLD}🌍 APP_ENV    :${NC} $APP_ENV"
        echo -e "${BOLD}🐛 APP_DEBUG  :${NC} $APP_DEBUG"
    else
        warn ".env tidak ditemukan!"
    fi

    echo ""
    info "Cek migrasi pending:"
    $PHP artisan migrate:status 2>/dev/null | tail -10 || warn "Tidak bisa cek migrasi"

    echo ""
    info "Disk usage:"
    du -sh "$APP_DIR" 2>/dev/null
    du -sh "$WEB_DIR" 2>/dev/null
}

# ════════════════════════════════════════════════════════════════════
#  ROLLBACK — Kembali ke commit sebelumnya
# ════════════════════════════════════════════════════════════════════
cmd_rollback() {
    step "ROLLBACK KE COMMIT SEBELUMNYA"
    cd "$APP_DIR"
    CURRENT=$(git log -1 --pretty=format:"%h — %s")
    PREV=$(git log -2 --pretty=format:"%h — %s" | tail -1)
    echo -e "  ${YELLOW}Saat ini :${NC} $CURRENT"
    echo -e "  ${CYAN}Rollback ke :${NC} $PREV"
    read -p "  Lanjutkan rollback? [y/N]: " CONFIRM
    if [ "$CONFIRM" = "y" ] || [ "$CONFIRM" = "Y" ]; then
        git reset --hard HEAD~1
        $PHP artisan config:cache && $PHP artisan route:cache && $PHP artisan view:cache
        success "Rollback berhasil ke: $PREV"
    else
        info "Rollback dibatalkan."
    fi
}

# ════════════════════════════════════════════════════════════════════
#  HELP
# ════════════════════════════════════════════════════════════════════
show_help() {
    echo -e "${BOLD}Penggunaan:${NC}  bash server-deploy.sh <perintah>"
    echo ""
    echo -e "  ${GREEN}install${NC}    Pertama kali: clone repo, setup .env, composer install"
    echo -e "  ${GREEN}update${NC}     Pull kode terbaru dari GitHub (default)"
    echo -e "  ${GREEN}migrate${NC}    Jalankan migrasi database"
    echo -e "  ${GREEN}optimize${NC}   Bersihkan & rebuild cache Laravel"
    echo -e "  ${GREEN}status${NC}     Cek versi, branch, env, PHP, dan migrasi"
    echo -e "  ${GREEN}rollback${NC}   Kembali ke commit sebelumnya"
    echo ""
    echo -e "${BOLD}Quick start di server baru:${NC}"
    echo -e "  ${CYAN}curl -sO https://raw.githubusercontent.com/hardadinuraziz/halobun/main/server-deploy.sh${NC}"
    echo -e "  ${CYAN}bash server-deploy.sh install${NC}"
    echo ""
    echo -e "${BOLD}Update rutin:${NC}"
    echo -e "  ${CYAN}bash server-deploy.sh update${NC}"
    echo ""
    echo -e "${BOLD}Konfigurasi variabel (edit di atas script):${NC}"
    echo -e "  GITHUB_REPO, BRANCH, APP_DIR, WEB_DIR, PHP, COMPOSER"
    echo ""
}

# ═══════════════════════════════════════════════════════════════════
# MAIN
# ═══════════════════════════════════════════════════════════════════
case "$MODE" in
    install)   cmd_install ;;
    update|"") cmd_update ;;
    migrate)   cmd_migrate ;;
    optimize)  cmd_optimize ;;
    status)    cmd_status ;;
    rollback)  cmd_rollback ;;
    help|--help|-h) show_help ;;
    *) error "Perintah tidak dikenal: '$MODE'. Gunakan: bash server-deploy.sh help" ;;
esac
