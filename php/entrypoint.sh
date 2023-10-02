#!/usr/bin/env sh

set -eu

cd /var/www/html
sudo -u php flock composer.lock composer install --prefer-dist --no-interaction


if [ ! -d "cache" ]; then
    sudo -u php mkdir cache
fi

cd /var/www/html/src
sudo -u php flock composer.lock composer install --prefer-dist --no-interaction


php --version

# if [ -e ".env" ]; then
#     php yii migrate --migrationPath=@yii/rbac/migrations --interactive=0
#     php yii migrate --interactive=0 
# fi

set -x
exec "$@"