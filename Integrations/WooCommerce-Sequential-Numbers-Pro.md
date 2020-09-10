# WooCommerce Sequential Numbers Pro
This enables auto-generation of sequential order numbers when importing WooCommerce Orders while this plugin is active: https://woocommerce.com/products/sequential-order-numbers-pro/.

### Import Settings
In the import settings, use the "Choose which data to update" section to make sure these 3 custom fields are not updated:

```
_order_number
_order_number_formatted
_order_number_meta
```

See: https://d.pr/i/ZA91NE.

### Function Editor
In the Function Editor at All Import -> Settings, save the following code:

```php
add_action( 'pmxi_saved_post', 'my_set_ordernumber', 10, 3 );

function my_set_ordernumber( $id, $xml, $is_update ) {	
    if ( $is_update ) return; // don't do anything for existing orders
    global $argv;

    $import_id = ( isset( $_GET['id'] ) ? $_GET['id'] : ( isset( $_GET['import_id'] ) ? $_GET['import_id'] : ( isset( $argv[3] ) ? $argv[3] : 'new' ) ) );

    $import = new PMXI_Import_Record();
    $import->getById( $import_id );

    if ( $import->isEmpty() ) return;

    $import_options = $import->options;

    if ( ! $import_options['custom_type'] == 'shop_order' || ! is_plugin_active( 'woocommerce-sequential-order-numbers-pro/woocommerce-sequential-order-numbers-pro.php' ) ) {
        return;
    }

    $helper = wc_seq_order_number_pro();
    if ( ! $helper ) return;

    $order = get_post( $id );
    if ( ! $order ) return;
    
    $helper->set_sequential_order_number( $id, $order );
}
```
