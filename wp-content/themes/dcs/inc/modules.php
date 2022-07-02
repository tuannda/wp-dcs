<?php

function get_module($module_name, $args = array())
{
    ob_start();
    the_module($module_name, $args);

    $html = ob_get_contents();
    ob_get_clean();

    return $html;
}

function the_module($module_name, $args = array())
{
    if (empty($module_name)) {
        return;
    }

    extract($args, EXTR_SKIP);

    locate_template("/modules/$module_name/$module_name.php", true, false);
}
