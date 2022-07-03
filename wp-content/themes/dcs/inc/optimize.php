<?php

add_action('wp_head', 'dns_prefetch', 0);
function dns_prefetch()
{
    ?>
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <link rel="dns-prefetch" href="//fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <?php
}
