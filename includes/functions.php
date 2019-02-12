<?php
/*
 * Add my new menu to the Admin Control Panel
*/

// Hook the 'admin_menu' action hook, run the function named 'Add_Admin_Link()'
add_action( 'admin_menu', 'Add_Admin_Link' );

// Add a new top level menu link to the ACP
function Add_Admin_Link()
{
    add_menu_page(
        'Manage Shopify', // Title of the page
        'Manage Shopify', // Text to show on the menu link
        'manage_options', // Capability requirement to see the link
        'manage_shopify_admin.php' // The 'slug' - file to display when clicking the link
    );
}

function product_add($data)
{
    require 'vendor/autoload.php';
    $client = new GuzzleHttp\Client();
    $url = 'https://side-by-side-garage.myshopify.com/admin/products.json';
    $user = 'bd4ee6a24ee4da8fd100497fcc91c33b';
    $pass = '4167cc2fc1e051383823c5a54683c33d';

    $response = $client->request('POST', $url, [
        'auth' => ['bd4ee6a24ee4da8fd100497fcc91c33b', '4167cc2fc1e051383823c5a54683c33d'],
        'form_params' => json_decode($data, true)]);

    $status_code = $response->getStatusCode();
    $reason = $response->getReasonPhrase();
    return $status_code . '-' . $reason;
}
