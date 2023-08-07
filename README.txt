=== Product Specific Email Content for WooCommerce ===
Contributors: petermorlion
Donate link: https://redstar.be
Tags: woocommerce, email
Requires at least: 6.1.1
Tested up to: 6.2
Stable tag: 1.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin allows you to add content to the order emails per product. 
This is useful if a purchased product requires some more explanation.

== Description ==

If you want to add custom content to your order emails, on a per-product basis, this is
the plugin for you. With this plugin, you can add text to your order emails for each product
that your customer bought. Only the content for the bought products will be added to the
email.

This is useful if you want to send some extra info to the customer, depending on the products
they bought.

== Installation ==

1. Upload `product-specific-email-content-for-woocommerce.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to your product and you will see a new 'Email' tab under the product data.

== Frequently Asked Questions ==

= Can my other plugin add to the content? =

Yes! There are two actions that you can hook into:

- `product_specific_email_content_before_content`
- `product_specific_email_content_after_content`

Both accept a two arguments:

- `$item`: the current Order item
- `$product`: the current Product

With these hooks, you can add extra info before or after the content defined through this plugin.

== Screenshots ==

1. Adding the email text to the product.
2. What the email will look like.

== Changelog ==

= 1.2.2 =
* Remove empty admin JS
* Remove empty public JS and CSS.

= 1.2.1 =
* Sanitize input and escape output
* Update "tested up to" version
* Add nonce and verify

= 1.2.0 =
* Add `product_specific_email_content_before_content` and `product_specific_email_content_after_content`

= 1.1.0 =
* Increase height of editor

= 1.0.0 =
* Initial version
