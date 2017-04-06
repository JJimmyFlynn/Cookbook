<?php

/**
 * Use this snippet at the top of the wp-config file to
 * redirect all incoming request to the https + www
 * version of the site. Becasue we check the
 * site with '!=' this will redirect any
 * aliases set in Pantheon, as well
 */


// Require HTTPS, www.
if (isset($_SERVER['PANTHEON_ENVIRONMENT']) &&
  ($_SERVER['PANTHEON_ENVIRONMENT'] === 'live') &&
  // Check if Drupal or WordPress is running via command line
  (php_sapi_name() != "cli")) {
  if ($_SERVER['HTTP_HOST'] != 'www.yoursite.com' ||
      !isset($_SERVER['HTTP_X_SSL']) ||
      $_SERVER['HTTP_X_SSL'] != 'ON' ) {
    header('HTTP/1.0 301 Moved Permanently');
    header('Location: https://www.yoursite.com'. $_SERVER['REQUEST_URI']);
    exit();
  }
}