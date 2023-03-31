# Checkout Autofill

Automatically fills and hides the fields "User Status", "Birthday", and "Nationality" on the WooCommerce checkout page for new customers.

## Installation

1. Upload the `checkout-autofill` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Configure the settings under the 'Checkout Autofill' tab in the WordPress dashboard

## Usage

This plugin automatically fills in and hides the "User Status", "Birthday", and "Nationality" fields on the WooCommerce checkout page for new customers. The settings for this plugin can be found under the "Checkout Autofill" tab in the WordPress dashboard.

Birthday should be entered in DD/MM/YYYY format, and Nationality should be entered as a short land code such as NL, DE, BE, etc. Please note that changing the User Status setting may affect the fields that are displayed on the checkout page, and it is recommended to leave this setting as "Individual". These settings will only apply to new customers who are creating an account during checkout.

## Settings

The following settings will apply to all new users during checkout:

- **Birthday:** Enter the desired birthday in DD/MM/YYYY format.
- **Nationality:** Enter a short land code such as NL, DE, BE, etc.
- **User Status:** <i>Changing not recommended!</i> Select the desired user status. Please note that changing this setting may affect the fields that are displayed on the checkout page. The available options are: "Individual" & "Business User"

Please note that these settings will only apply to new users who are creating an account during checkout. Existing users will not be affected.

## Contributing

If you find a bug or would like to suggest an improvement, please create a new issue or pull request on GitHub.

## License

This plugin is licensed under the [GPL-3.0](https://www.gnu.org/licenses/gpl-3.0.html) license.

## Author

This plugin was created by [Lucas Huls Media](https://lucashulsmedia.nl).
