<?php
require_once get_template_directory().'/framework/widgets/socials.php';
require_once get_template_directory().'/framework/widgets/post_list.php';
require_once get_template_directory().'/framework/widgets/news_tabs.php';
require_once get_template_directory().'/framework/widgets/icon_info.php';
require_once get_template_directory().'/framework/widgets/mini_account.php';
require_once get_template_directory().'/framework/widgets/mini_search.php';
if (class_exists('Woocommerce')) {
	require_once get_template_directory().'/framework/widgets/mini_cart.php';
}