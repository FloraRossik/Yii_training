#!/usr/bin/env sh

cd /var/www/html && php yii migrate/down --interactive=0 all
cd /var/www/html && php yii migrate/down --migrationPath=@yii/rbac/migrations --interactive=0 all
