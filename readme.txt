=== WP Notify Me ===
Contributors: creapptivo
Tags: notify, emails, posts
Requires at least: 4.7
Tested up to: 5.2
Stable tag: 5.2
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://www.paypal.me/creapptivo

WP Notify Me is a plugin that allows you to receive notifications by email when a publication changes its status.

== Description ==

WP Notify Me is a plugin that allows you to receive notifications by email when a publication changes its status.

The available status are the following:

- Published Post
- Update Post
- Scheduler Post
- Save as Draft
- Delete Post
- Saving as Private
- Saving as Pending Review


Note.- Use wp_email function to send email.

Languages:
- English
- Spanish (Spain and Mexico)
- French.


== Installation ==
Installing the plugin is easy. Just follow these steps:

1. Upload the entire wp-notify-me folder to the /wp-content/plugins/ directory.
2. Activate the plugin through the "Plugins" menu in WordPress.

You will find "Notify Me" menu in your WordPress admin panel.


== Frequently Asked Questions ==

= Can you only notify in Entries? =
Yes, at the moment the plugin only works with Post Entries.

= Can the notification be sent to more than one email? =
Yes, in the email to section, email addresses separated by comma should be provided

= Can I suggest new features for the plugin? =
Of course, all suggestions and / or contributions are welcome.



== Screenshots ==

1. These are the plugin configuration options.
2. The mail data, title, and body of the message. You can also indicate if you want to include the metadata and the permalink.
3. The Actions that can be configured for sending the notice.
4. You can use the meta-tags to create a personalized message.
5. If the Include Metadata box is checked, the Title, Author, Email, Status and Permalink data will be added in the message field, in addition to the text in the Message field.


== Changelog ==

= 1.2 =

* Set Meta-tags {post-permalink} and {post-status} correctly
* Change mail function to wp_mail


= 1.1 =

* Meta-tags were added to be used in the Title or Message field of the Email.


= 1.0 =

* Initial version


== Upgrade Notice == 


= 1.2 =

* Set Meta-tags {post-permalink} and {post-status} correctly
* Change mail function to wp_mail


= 1.1 =

* Meta-tags were added to be used in the Title or Message field of the Email.



= 1.0 =

* Initial version