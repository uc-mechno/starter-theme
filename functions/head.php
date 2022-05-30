<?php
/**
 * ************************************************************************
 *
 * head.php
 *
 * wp_head()で出力されるタグの内、不要なものを削除
 *
 * ************************************************************************
 */

/**
 * wp_head()で出力されるタグの内、不要なものを削除
 * ************************************************************************
 */
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
// remove_action('wp_head', 'wp_print_styles', 8);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' ); //wp5.9で追加されたsvg
remove_action( 'wp_footer', 'wp_enqueue_global_styles' ); //wp5.9で追加されたsvg
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);

function remove_dns_prefetch($hints, $relation_type)
{
  if ('dns-prefetch' === $relation_type) {
    return array_diff(wp_dependencies_unique_hosts(), $hints);
  }
  return $hints;
}
add_action('wp_enqueue_scripts', 'my_dequeue_plugins_style', 9999);
function my_dequeue_plugins_style()
{
  wp_dequeue_style('wp-block-library');
}
