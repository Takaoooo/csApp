<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );

require_once('extend/csvGetData.php');

?>

<!DOCTYPE html>
<html>
<head>
<script> var wp_url_admin_ajax = '<?php echo admin_url('admin-ajax.php'); ?>'; </script>
<script>
  jQuery(function ($) {
    $.ajax({
      type: 'POST',
      url: wp_url_admin_ajax,
      data: {
        'action': 'tell_me'
      },
      success: function (response) {
        json = eval("(" + response + ")");
        if (json.err) {
          result = "error:404";
        } else {
          console.log(json);
        }
      }
    });
  });
</script>
</head>
<body>
  
</body>
</html>