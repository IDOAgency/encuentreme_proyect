=== Genesis Dashboard News ===
Contributors: daveshine, deckerweb
Donate link: http://genesisthemes.de/en/donate/
Tags: genesis, genesiswp, genesis framework, dashboard widget, dashboard, rss, news, planet, studiopress, community, deckerweb
Requires at least: 3.3
Tested up to: 3.5
Stable tag: 1.6.1
License: GPLv2 or later
License URI: http://www.opensource.org/licenses/gpl-license.php

Adds a new dashboard widget to your WordPress Admin Dashboard that pulls in items of the News Planet for the Genesis Framework and its ecosystem.

== Description ==

= Latest Genesis News - official plus community =
This **small and lightweight plugin** adds a new dashboard widget to your WordPress Admin Dashboard that pulls in the some recent (worldwide) news about the *Genesis Theme Framework* and its community/ecosystem. You can configure how many items are displayed (between 3 and 20 items). Only the headlines of the various blog posts will be shown.

The news items come from a custom **news planet** source combined of **different Genesis related sources around the world**. Currently we have mostly English-language sources though :) Just be informed about Genesis. Know what's going on in the community, and the ecosystem - new child theme releases, extension plugins, tutorials, code snippets... Enjoy :)

= Turn it into Your custom/ branded dashboard widget - great for clients! =
Since version 1.5.0 of the plugin you can customize the widget title, URL of feed source as well as the footer line to your liking via the new filters. This comes in really handy for branding/ customizing the dashboard, for clients or other purposes... [See the FAQ section here](http://wordpress.org/extend/plugins/genesis-dashboard-news/faq/) for more info on that.()

Please note: The plugin DOESN'T require the use of the *Genesis Framework* but I recommend to use it anyway :-).

= Localization =
* English (default) - always included
* German (de_DE) - always included
* .pot file (`genesis-dashboard-news.pot`) for translators is also always included :)
* Easy plugin translation platform with GlotPress tool: [Translate "Genesis Dashboard News"...](http://translate.wpautobahn.com/projects/genesis-plugins-deckerweb/genesis-dashboard-news)
* *Your translation? - [Just send it in](http://genesisthemes.de/en/contact/)*

[A plugin from deckerweb.de and GenesisThemes](http://genesisthemes.de/en/)

= Feedback =
* I am open for your suggestions and feedback - Thank you for using or trying out one of my plugins!
* Drop me a line [@deckerweb](http://twitter.com/deckerweb) on Twitter
* Follow me on [my Facebook page](http://www.facebook.com/deckerweb.service)
* Or follow me on [+David Decker](http://deckerweb.de/gplus) on Google Plus ;-)

= More =
* [Also see my other plugins](http://genesisthemes.de/en/wp-plugins/) or see [my WordPress.org profile page](http://profiles.wordpress.org/daveshine/)
* Tip: [*GenesisFinder* - Find then create. Your Genesis Framework Search Engine.](http://genesisfinder.com/)

== Installation ==

1. Upload `genesis-dashboard-news` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Visit your WordPress Dashboard to enjoy the Genesis News widget.
4. Optionally configure the number of news items by clicking the configure link the top right corner of the widget.

**Own translation/wording:** For custom and update-secure language files please upload them to `/wp-content/languages/genesis-dashboard-news/` (just create this folder) - This enables you to use fully custom translations that won't be overridden on plugin updates. Also, complete custom English wording is possible with that, just use a language file like `genesis-dashboard-news-en_US.mo/.po` to achieve that (for creating one see the tools on "Other Notes").

== Frequently Asked Questions ==

= How can I add another news or blog source to the Genesis News Planet? =
Just drop me a note at [my Twitter @deckerweb](http://twitter.com/deckerweb)

= Can I view this news planet source in a standalone modus? =
Yes, you can! Just step up to [Genesis News Planet @friendfeed](http://friendfeed.com/genesisnews) -- or [subscribe via RSS/ATM feed](http://friendfeed.com/genesisnews?format=atom) in your feed reader :)

= How can I change the RSS cache lifetime in WordPress which also effects this plugin's dashboard widget? =
Sure, you can change that. You need to add the following code to your child theme's `functions.php file`, the "Custom Code" section in Prose 1.5+ or to a functionality plugin. Please note: BACKUP the `functions.php` file before doing so! And please also note this: Changing that value will effect ALL other usages/appearances of RSS cache lifetime, so for example the built-in WordPress RSS widget and the other default dashboard widgets importing feed content. So use at your own risk!
The number at the end is the time in seconds. So 300 means actually 5 minutes. - Got it? It's that simple, yes :)
`
/** RSS cache lifetime */
add_filter( 'wp_feed_cache_transient_lifetime', create_function( '$a', 'return 300;' ) );
`

= Can I set which user role/ capability can see the dashboard widget? =
Yes, this is possible since plugin version 1.6.0! The default capability is 'read' (= 'Subscriber' user role). You can change that via the follwing filter:
`
add_filter( 'gdbn_filter_capability_all', 'custom_gdbn_capability' );
/** Genesis Dashboard News: Custom Dashboard Widget Capability */
function custom_gdbn_capability() {
	return 'edit_posts';
}
`
--> The above example code will only display the dashboard widget & the plugin's Dashboard help tab to users which have the capability of `edit_posts`.

= Can I customize the dashboard widget? =
Sure thing. I've included some filters since plugin version 1.5 so you can customize/brand it to your liking! I list the filter names in **bold** and then add more details on each of them:

**gdbn_filter_widget_title**

* Dashboard Widget/Meta Box title
* Default value: "Genesis News Planet"
* To add your own widget title here, use this code:
`
add_filter( 'gdbn_filter_widget_title', 'gdbn_custom_widget_title' );
/** Genesis Dashboard News: Custom Widget Title */
function gdbn_custom_widget_title() {
	return __( 'Custom Widget Title', 'your-textdomain' );
}
`

**gdbn_filter_feed_source_url**

* The URL of the RSS/ATOM feed
* Default value: "http://friendfeed.com/genesisnews?format=atom"
* To use a custom URL use this code:
`
add_filter( 'gdbn_filter_feed_source_url', 'gdbn_custom_source_feed_url' );
/** Genesis Dashboard News: Custom Source Feed URL */
function gdbn_custom_source_feed_url() {
	return 'http://your-source-url.com/feed-whatever/';
}
`

**gdbn_filter_widget_footer_info**

* The small info line
* Default value: feed link, plus various resource links
* To remove this line completely, add this code: 
`
/** Genesis Dashboard News: Remove Widget Footer Info */
add_filter( 'gdbn_filter_widget_footer_info', '__return_null' );
`

To add your own content here, use this code:
`
add_filter( 'gdbn_filter_widget_footer_info', 'gdbn_custom_footer_widget_info' );
/** Genesis Dashboard News: Custom Widget Footer Info */
function gdbn_custom_footer_widget_info() {
	return __( 'Your custom widget footer info here...', 'your-textdomain' );
}
`

**gdbn_filter_help_tab_title**

* The title of the left-hand help tab title
* Default value: "Genesis Dashboard News"
* To add your own help tab title here, use this code:
`
add_filter( 'gdbn_filter_help_tab_title', 'gdbn_custom_help_tab_title' );
/** Genesis Dashboard News: Custom Help Tab Title */
function gdbn_custom_help_tab_title() {
	return __( 'Custom Help Tab Title', 'your-textdomain' );
}
`

**gdbn_filter_help_tab_content**

* The actual help tab content
* Default value: the help content text...
* Customize as with the same principles shown above...

All the custom, branding and developer stuff code above can also be found as a Gist on GitHub: https://gist.github.com/2597190 (you can also add your questions/ feedback there :)

== Screenshots ==

1. Genesis Dashboard News: Dashboard widget with 5 news items ([Click here for larger version of screenshot](https://www.dropbox.com/s/p0f8lamq262whrx/screenshot-1.png))
2. Genesis Dashboard News: Configure the Dashboard widget ([Click here for larger version of screenshot](https://www.dropbox.com/s/ay45kqg4paajkrp/screenshot-2.png))
3. Genesis Dashboard News: Dashboard widget with help tab open (plugin hooks in at the bottom of the help section) ([Click here for larger version of screenshot](https://www.dropbox.com/s/sh7916xw8kwwuwz/screenshot-3.png))

== Changelog ==

= 1.6.1 (2012-11-25) =
* *Maintenance release*
* UPDATE & BUGFIX: Corrected syntax error.

= 1.6.0 (2012-11-20) =
* *Maintenance release*
* NEW: Added capability support for showing/ disabling the whole widget based on user roles/ capabilities. Default capability is 'read'. Could be changed with the filter `gdbn_filter_capability_all`. ([See FAQ](http://wordpress.org/extend/plugins/genesis-dashboard-news/faq/) for more info)
* CODE: Minor code/documentation updates & improvements.
* UPDATE: Updated readme.txt file here.
* UPDATE: Updated all existing translations plus the .pot file for all translators!
* UPDATE: Initiated new three digits versioning, starting with this version.
* UPDATE: Moved screenshots to 'assets' folder in WP.org SVN to reduce plugin package size.

= 1.5.0 (2012-05-03) =
* NEW: Performance optimization - restructuring and splitting of code into several files, loading only where and if needed. Plugin support stuff only appears now if one of the supported plugins is active!
* NEW: Added 5 filters for better customizing the plugin's output (see FAQ page here!).
* NEW: Added dashboard and support links to plugin page.
* NEW: Added possibility for custom and update-secure language files for this plugin - just upload them to `/wp-content/languages/genesis-dashboard-news/` (just create this folder) - this enables you to use fully custom wording or translations.
* UPDATE: Completely deprecated old contextual help system (from prior WordPress 3.3) - in favor of supporting the help tabs system, in a more extended form :)
* CODE: Major code tweaks and code documentation improvements - better readability, splitted in parts for better performance, reduced markup where possible.
* CODE: Successfully tested against Genesis 1.8+ plus WordPress 3.3 branch and new 3.4 branch. Also successfully tested in WP_DEBUG mode (no notices or warnings).
* UPDATE: Updated help tab screenshot, optimized the other two.
* UPDATE: Updated German translations and also the .pot file for all translators!
* NEW: Added banner image on WordPress.org for better plugin branding :)
* UPDATE: Extended GPL License info in readme.txt as well as main plugin file.
* NEW: Easy plugin translation platform with GlotPress tool: [Translate "Genesis Dashboard News"...](http://translate.wpautobahn.com/projects/genesis-plugins-deckerweb/genesis-dashboard-news)

= 1.4.0 (2011-10-02) =
* Added localization for the whole plugin, including links, tooltips, contextual help and plugin description section
* Added German translations (English included by default)
* Added contextual help - tab on the top right corner of the options page - hooked in at the bottom of the existing dashboard help tab
* Improved and documented plugin code
* Tested & proved compatibility with WordPress 3.3-aortic-dissection :-)
* Big update to readme.txt file, included new screenshot with contextual help tab :)
* Added new FAQ entry here on how to change WordPress RSS cache lifetime for faster display of new RSS items in dashboard
* Added more sources/links to the actual RSS feed for the Genesis News Planet

= 1.3.0 (2011-08/09) =
* (unreleased private beta)

= 1.2.1 (2011-08-08) =
* Updated screenshots with WordPress 3.2+ dashboard :)
* Minor style improvements

= 1.2.0 (2011-08-04) =
* Added link tips to footer line of the widget (e.g. RSS/Atom Feed, GenesisFinder etc.)

= 1.1.0 (2011-07-04) =
* Make the number of news feed items configurable

= 1.0.0 (2011-07-04) =
* Initial release

== Upgrade Notice ==

= 1.6.1 =
Maintenance release: Added widget capability support, including a filter. Minor code/documentation updates & improvements. Also uptated .pot file for translators together with German translations.

= 1.6.0 =
Maintenance release: Added widget capability support, including a filter. Minor code/documentation updates & improvements. Also uptated .pot file for translators together with German translations.

= 1.5.0 =
Major changes & improvements: Performance & code optimization. Updated to help tab system, added dashboard & settings links to plugin page. Also uptated .pot file for translators together with German translations.

= 1.4.0 =
Several changes - Added activation checks, localization/translations to the plugin, improved overall coding and documentation.

= 1.2.1 =
Minor changes - Updated screenshots for WordPress 3.2.1, minor style improvements.

= 1.2.0 =
Minor changes - added link tips to footer of dashboard widget.

= 1.1.0 =
Minor changes - Made the number of news feed items configurable.

= 1.0.0 =
Just released into the wild.

== Plugin Links ==
* [Translations (GlotPress)](http://translate.wpautobahn.com/projects/genesis-plugins-deckerweb/genesis-dashboard-news)
* [User support forums](http://wordpress.org/tags/genesis-dashboard-news?forum_id=10)
* [Developers: customization codes (GitHub Gist)](https://gist.github.com/2597190)

== Donate ==
Enjoy using *Genesis Dashboard News*? Please consider [making a small donation](http://genesisthemes.de/en/donate/) to support the project's continued development.

== Translations ==
* English - default, always included
* German (de_DE): Deutsch - immer dabei! [Download auch via deckerweb.de](http://deckerweb.de/material/sprachdateien/genesis-plugins/#genesis-dashboard-news)
* For custom and update-secure language files please upload them to `/wp-content/languages/genesis-dashboard-news/` (just create this folder) - This enables you to use fully custom translations that won't be overridden on plugin updates. Also, complete custom English wording is possible with that as well, just use a language file like `genesis-dashboard-news-en_US.mo/.po` to achieve that.

**Easy plugin translation platform with GlotPress tool:** [**Translate "Genesis Dashboard News"...**](http://translate.wpautobahn.com/projects/genesis-plugins-deckerweb/genesis-dashboard-news)

*Note:* All my plugins are internationalized/ translateable by default. This is very important for all users worldwide. So please contribute your language to the plugin to make it even more useful. For translating I recommend the awesome ["Codestyling Localization" plugin](http://wordpress.org/extend/plugins/codestyling-localization/) and for validating the ["Poedit Editor"](http://www.poedit.net/), which works fine on Windows, Mac and Linux.

== Additional Info ==
**Idea Behind / Philosophy:** I always wanted a little Dashboard Widget for Genesis with recent news pulled in. I don't like the most other theme shop dashboard widgets with feeds, so I made mine configurable - and finally, since version 1.5 customizeable via filters! This way you can use it for your clients: pull in your company's feed, add your own title, footer info and help tab info. The fastest way to get your news feed into your client's dashboard. Or just use it the way, it was intended: be informed about Genesis. Know what's going on in the community, and the ecosystem - new child theme releases, extension plugins, tutorials, code snippets... Enjoy :)
