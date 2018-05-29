<?php

/**
 * Adds Google Analytics to wp_footer action
 * Detects if in production and not logged in as an admin
 * Otherwise, outputs faux data as if sent to GA
 */

namespace Halt;

class GoogleAnalytics {

  public function __construct() {
    add_action( 'wp_footer', array( $this, 'load_google_analytics' ) );
  }

  public function load_google_analytics() {
    $gaID = 'UA-49436039-1';
      if (!$gaID) { return; }
        $loadGA = ( in_array( $_ENV['PANTHEON_ENVIRONMENT'], array( 'live' ) ) ) && !current_user_can('manage_options');
      ?>
      <script>
        <?php if ($loadGA) : ?>
          window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
        <?php else : ?>
          (function(s,o,i,l){s.ga=function(){s.ga.q.push(arguments);if(o['log'])o.log(i+l.call(arguments))}
          s.ga.q=[];s.ga.l=+new Date;}(window,console,'Google Analytics: ',[].slice))
        <?php endif; ?>
        ga('create','<?= $gaID; ?>','auto');ga('send','pageview')
      </script>
      <?php if ($loadGA) : ?>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
      <?php endif; ?>
    <?php
  }
}

new GoogleAnalytics();