sleep 60

wp plugin install woocommerce --version=$WOOCOMMERCE_VERSION --allow-root --activate
wp theme install storefront --allow-root --activate 
wp plugin install woocommerce-extra-checkout-fields-for-brazil --activate --allow-root 
wp plugin install wordpress-importer --activate --allow-root 
php -f /setup-wizard-woocommerce.php
chmod -R 777 /app 
wp import /app/wp-content/plugins/woocommerce/dummy-data/dummy-data.xml --authors=create --allow-root 

chmod -R 777 /app 
rm -f /etc/supervisor/conf.d/supervisord-zwordpress.conf