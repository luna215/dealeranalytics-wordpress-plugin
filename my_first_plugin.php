<?
/**
 * Plugin Name: First Plugin
 * Plugin URI: https://wwww.yourwebsiteurl.com/
 * Description: This is my first plugin
 * Version 1.0
 * Author: Paul Luna
 * Author URI: https://yoursiteurl.com
 **/

function paul_wordpress_typo($text) {
    return str_replace('wordpress', 'Wordpress', $text);
}

add_filter('the_content', 'paul_wordpress_typo_text');

?>
