<?php
/**
 *  Place these redirects in your wp-config file on Pantheon
 *  to redirect the Pantheon platform domains to defined
 *  domains for the dev and/or test environments,
 *  Useful if you want to have beta.client-site.com
 *  or dev.client-site.com
 * 
 */

/**
 * Dev Environment Redirect
 */
if (isset($_SERVER['PANTHEON_ENVIRONMENT']) &&
  ($_SERVER['PANTHEON_ENVIRONMENT'] === 'dev') &&
  // Check if Drupal or WordPress is running via command line
  (php_sapi_name() != "cli")) {
  if ($_SERVER['HTTP_HOST'] != 'dev.client-site.com') {
    header('HTTP/1.0 301 Moved Permanently');
    header('Location: http://dev.client-site.com'. $_SERVER['REQUEST_URI']);
    exit();
  }
}

/**
 * Test Environment Redirect
 */
if (isset($_SERVER['PANTHEON_ENVIRONMENT']) &&
  ($_SERVER['PANTHEON_ENVIRONMENT'] === 'test') &&
  // Check if Drupal or WordPress is running via command line
  (php_sapi_name() != "cli")) {
  if ($_SERVER['HTTP_HOST'] != 'beta.client-site.com') {
    header('HTTP/1.0 301 Moved Permanently');
    header('Location: http://beta.client-site.com'. $_SERVER['REQUEST_URI']);
    exit();
  }
}