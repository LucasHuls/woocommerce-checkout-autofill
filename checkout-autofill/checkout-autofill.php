<?php
/*
Plugin Name: Checkout Autofill
Plugin URI: https://github.com/LucasHuls/woocommerce-checkout-autofill
Description: Automatically fills and hides the fields "User Status", "Birthday", and "Nationality" on the WooCommerce checkout page for new customers.
Version: 1.0
Author: Lucas Huls Media
Author URI: https://lucashulsmedia.nl
License: GPL-3.0
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: checkout-autofill
*/

/*
 * This plugin automatically fills in and hides the "User Status", "Birthday", and "Nationality" fields on the WooCommerce checkout page for new customers.
 * The settings for this plugin can be found under the "Checkout Autofill" tab in the WordPress dashboard.
 *
 * Birthday should be entered in DD/MM/YYYY format, and Nationality should be entered as a short land code such as NL, DE, BE, etc.
 * Please note that changing the User Status setting may affect the fields that are displayed on the checkout page, and it is recommended to leave this setting as "Individual".
 * These settings will only apply to new customers who are creating an account during checkout.
 */

// Add the settings page
function checkout_autofill_settings_page() {
  add_options_page(
    'Checkout Autofill Settings',
    'Checkout Autofill',
    'manage_options',
    'checkout-autofill-settings',
    'checkout_autofill_settings_page_html'
  );
}
add_action('admin_menu', 'checkout_autofill_settings_page');

// Register the settings
function checkout_autofill_register_settings() {
    add_option('checkout_autofill_birthday', '01/01/1999');
    add_option('checkout_autofill_mp_status', 'individual');
    add_option('checkout_autofill_nationality', 'NL');
    register_setting('checkout_autofill_settings_group', 'checkout_autofill_birthday');
    register_setting('checkout_autofill_settings_group', 'checkout_autofill_mp_status');
    register_setting('checkout_autofill_settings_group', 'checkout_autofill_nationality');
  }
  add_action('admin_init', 'checkout_autofill_register_settings');

// Define the settings page HTML
function checkout_autofill_settings_page_html() {
  ?>
  <div class="wrap">
    <h1>Checkout Autofill Settings</h1>
    <p>The following settings will apply to all new users during checkout:</p>

<ul>
  <li><strong>Birthday:</strong> Enter the desired birthday in DD/MM/YYYY format.</li>
  <li><strong>Nationality:</strong> Enter a short land code such as NL, DE, BE etc.</li>
  <li><strong>User Status:</strong> <i>Changing not recommended!</i> Select the desired user status. Please note that changing this setting may affect the fields that are displayed on the checkout page. The available options are: "Individual" & "Business User"</li>
</ul>

<p>
  Please note that these settings will only apply to new users who are creating an account during checkout. Existing users will not be affected.
</p>
    <form method="post" action="options.php">
      <?php settings_fields('checkout_autofill_settings_group'); ?>
      <?php do_settings_sections('checkout_autofill_settings_group'); ?>
      <table class="form-table">
        <tr>
          <th scope="row">Birthday</th>
          <td><input type="text" name="checkout_autofill_birthday" value="<?php echo get_option('checkout_autofill_birthday'); ?>"></td>
        </tr>
        <tr>
          <th scope="row">User Status</th>
          <td><input type="text" name="checkout_autofill_mp_status" value="<?php echo get_option('checkout_autofill_mp_status'); ?>"></td>
        </tr>
        <tr>
          <th scope="row">Nationality</th>
          <td><input type="text" name="checkout_autofill_nationality" value="<?php echo get_option('checkout_autofill_nationality'); ?>"></td>
        </tr>
      </table>
      <?php submit_button(); ?>
    </form>
  </div>
  <?php
}

// Use the settings value in the plugin
function checkout_autofill() {
  // Get the value of the settings
  $birthday = get_option('checkout_autofill_birthday');
  $mp_status = get_option('checkout_autofill_mp_status');
  $nationality = get_option('checkout_autofill_nationality');

  ?>
  <script>
    // Set the values of the fields using JavaScript
    document.getElementById("user_birthday").value = "<?php echo $birthday; ?>";
    document.getElementById("user_mp_status").value = "<?php echo $mp_status; ?>";
    document.getElementById("user_nationality").value = "<?php echo $nationality; ?>";

    // Hide the fields from the customer using CSS
    document.getElementById("user_birthday_field").style.display = "none";
    document.getElementById("user_mp_status_field").style.display = "none";
    document.getElementById("user_nationality_field").style.display = "none";
  </script>
  <?php
}
add_action('woocommerce_after_checkout_form', 'checkout_autofill');