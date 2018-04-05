FROM thiagobarradas/wordpress:4.8.1-php7.0
MAINTAINER Thiago Barradas <th.barradas@gmail.com>

# VARIABLES
ENV WOOCOMMERCE_VERSION=2.6.0

# COPY SCRIPT TO SETUP WOOCOMMERCE
COPY scripts/supervisord-zwoocommerce.conf /etc/supervisor/conf.d/supervisord-zwoocommerce.conf
COPY scripts/setup-woocommerce.sh /setup-woocommerce.sh
COPY scripts/setup-wizard-woocommerce.php /setup-wizard-woocommerce.php

# EXPOSE AND RUN
RUN chmod -R 777 /var/www/html
WORKDIR /var/www/html
EXPOSE 80 3306
CMD ["/run.sh"]