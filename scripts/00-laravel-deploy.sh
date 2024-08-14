#!/usr/bin/env bash
echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

echo "installs fnm (Fast Node Manager)"
curl -fsSL https://fnm.vercel.app/install | bash

echo "activate fnm"
source ~/.bashrc

echo "download and install Node.js"
fnm use --install-if-missing 20 --working-dir=/var/www/html

echo "node..."
node -v
