<?php

echo "Auto setup WooCommerce :)\n\n";
require_once("/app/wp-load.php");

echo "Setup default values...\n";
$address        	= "Rua Teste";
$address_2      	= "Complemento Teste";
$city           	= "Rio de Janeiro";
$country_state  	= "BR:RJ";
$postcode       	= "20000000";
$currency_code  	= "BRL";
$product_type   	= "both";
$tracking       	= false;
$currency_pos 		= 'left';
$price_decimal_sep  = ',';
$price_num_decimals = '2';
$price_thousand_sep = '.';

echo "Updating options...\n";
update_option('woocommerce_store_address', $address);
update_option('woocommerce_store_address_2', $address_2);
update_option('woocommerce_store_city', $city);
update_option('woocommerce_default_country', $country_state);
update_option('woocommerce_store_postcode', $postcode);
update_option('woocommerce_currency', $currency_code);
update_option('woocommerce_product_type', $product_type);
update_option('woocommerce_currency_pos', $currency_pos);
update_option('woocommerce_price_decimal_sep', $price_decimal_sep);
update_option('woocommerce_price_num_decimals', $price_num_decimals);
update_option('woocommerce_price_thousand_sep', $price_thousand_sep);
update_option('woocommerce_store_address', $address);
update_option('woocommerce_admin_notices', 'a:0:{}');
update_option('woocommerce_flat_rate_1_settings','a:3:{s:5:"title";s:9:"Flat rate";s:10:"tax_status";s:7:"taxable";s:4:"cost";s:1:"5";}');
update_option('woocommerce_flat_rate_2_settings1','a:3:{s:5:"title";s:9:"Flat rate";s:10:"tax_status";s:7:"taxable";s:4:"cost";s:2:"30";}');
update_option('permalink_structure', '/%year%/%monthnum%/%day%/%postname%/');
update_option('woocommerce_permalinks','a:4:{s:13:"category_base";s:0:"";s:8:"tag_base";s:0:"";s:14:"attribute_base";s:0:"";s:12:"product_base";s:0:"";}');

echo "Updating tracking...\n";
if ($tracking) 
{
	update_option('woocommerce_allow_tracking','yes');
	WC_Tracker::send_tracking_data(true);
}
else 
{
	update_option('woocommerce_allow_tracking','no');
}

echo "Create pages...\n";
WC_Install::create_pages();

echo "Updating home page...\n";
$page = get_page_by_title('Shop');
update_option('show_on_front','page');
update_option('page_on_front', $page->ID);

echo "DONE! :)";
?>