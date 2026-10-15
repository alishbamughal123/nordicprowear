#!/bin/sh
set -e

# SQLite file for contact requests (ephemeral on Render's free tier).
[ -f database/database.sqlite ] || touch database/database.sqlite

php artisan migrate --force
php artisan config:cache
php artisan view:cache

# Render supplies $PORT; TLS is terminated by Render, so serve plain HTTP.
export SERVER_NAME=":${PORT:-10000}"
exec frankenphp run --config /etc/caddy/Caddyfile --adapter caddyfile
