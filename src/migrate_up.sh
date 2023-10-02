#!/usr/bin/env sh

cd /var/www/html && php yii migrate --migrationPath=@yii/rbac/migrations --interactive=0 all
cd /var/www/html && php yii migrate --interactive=0 all