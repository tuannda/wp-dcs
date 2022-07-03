<?php
if (! defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/modules.php';
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/enqueues.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/optimize.php';
require get_template_directory() . '/inc/acf.php';
require get_template_directory() . '/inc/cpt.php';
