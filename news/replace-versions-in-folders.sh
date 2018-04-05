#!/bin/bash
for D in *; do
    if [ -d "${D}" ]; then
        echo "${D}"
		WC_VERSION="$(cut -d'-' -f1 <<< ${D})"
		WP_VERSION="$(cut -d'-' -f2 <<< ${D})"
		WP_VERSION="$(sed 's/wp//g' <<< ${WP_VERSION})"
		echo "${WC_VERSION}"
		echo "${WP_VERSION}"

		sed -i 's|WOOCOMMERCE_VERSION=3.2.6|WOOCOMMERCE_VERSION='"$WC_VERSION"'|g' ${D}/Dockerfile
		sed -i 's|wordpress:4.9-php|wordpress:'"$WP_VERSION"'-php|g' ${D}/Dockerfile
    fi
done
