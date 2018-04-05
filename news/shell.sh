#!\bin\bash

#while read -r linewp
#do
#    while read -r linewc
#	do
#		wp="$linewp"
#		wc="$linewc"
#		echo $wc
#		echo $wp
#	done < "all-wc.txt"
#done < "all-wp.txt"

cat "new_wordpress.txt" | while read LINEWP
do
	cat "woocommerce.txt" | while read LINEWC
	do
		wp="$LINEWP"
		wc="$LINEWC"
		echo wc-$wc--wp-$wp
		cp -a _3.2.6-wp4.9-php5.6 $wc-wp$wp-php5.6
		cp -a _3.2.6-wp4.9-php7.0 $wc-wp$wp-php7.0
		cp -a _3.2.6-wp4.9-php7.1 $wc-wp$wp-php7.1
		cp -a _3.2.6-wp4.9-php7.2 $wc-wp$wp-php7.2
	done
done