<?php
// Dynamic URL based on the Host header from Nginx
if (!empty($_SERVER['HTTP_HOST'])) {
    define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
    define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
}
