<?
/**
 * Plugin Name: DealerAnalytics
 * Description: This plugin will allow you to view your current stats with Dealer Analytics. This plugin will be located on your dashboard.
 * Version: 1.0
 * Author: Paul Luna
 * Author URI: https://google.com (I am the founder)
 */

function alert_plugin_activated() {
    echo '<script>';
    echo 'alert("ACTIVATED");';
    echo '</script>';
}


add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets') ;

function my_custom_dashboard_widgets() {
    global $wp_meta_boxes;

    wp_add_dashboard_widget('custom_help_widget', 'Dealer Analytics', 'custom_dashboard_help');
}

function custom_dashboard_help() {
    echo '<h1>Login</h1>
        <form method="GET" action="greet_user.php">
            <input type="email" name="email">
            <input type="password">
            <br>
            <input type="submit" value="Login">
        </form>
        <a href="https://dealeranalytics.com" target="_blank">Contact Us</p>';
}
?>

