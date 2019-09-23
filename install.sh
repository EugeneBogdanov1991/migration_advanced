mysql -hmysql -uadmin -padmin -e "DROP DATABASE migration232"
mysql -hmysql -uadmin -padmin -e "CREATE DATABASE migration232"
rm app/etc/env.php
rm -rf generated/code
rm -rf generated/metadata
rm -rf var/cache
rm -rf var/page_cache
rm -rf var/view_preprocessed
rm -rf var/log
rm var/migration-tool-progress.lock
php bin/magento setup:install --base-url=http://migration-m232.magento23.local/ --db-host=mysql --db-name=migration232 --db-user=admin --db-password=admin --admin-firstname=Admin --admin-lastname=Admin --admin-email=admin@admin.com --admin-user=admin --admin-password=admin123 --language=en_US --currency=USD --timezone=America/Chicago --use-rewrites=1 --backend-frontname=admin
php bin/magento cache:flush
php bin/magento migrate:settings migration/config.xml
php bin/magento migrate:data migration/config.xml
php bin/magento indexer:reindex
