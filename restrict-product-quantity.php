<?php
/*
Plugin Name: Restrict Product Quantity
Plugin Auther: Vishal Glansa
Description: Restricts adding products Which have the Stock less than 5 or Equal to 5, User get the notification or Alert at the time of adding product in cart.
Version: 1.0.0

Author URI: https://glansa.com/
License: GPLv2 or later
Text Domain: restrict-product-quantity-asper-stock
*/



function restrict_product_quantity($passed, $product_id, $quantity) {
    // Get the product object
    $product = wc_get_product($product_id);

    // Check if the available stock is less than or equal to 5
    if ($product->get_stock_quantity() <= 5) {
        wc_add_notice('The available product quantity is less, you cannot buy this product at this moment.', 'error');
        $passed = false; // Prevent the user from adding the product to the cart
    }

    return $passed; // Return the validation status
}
add_filter('woocommerce_add_to_cart_validation', 'restrict_product_quantity', 10, 3);



