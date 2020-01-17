<?
/**
 * Plugin Name: DealerAnalytics
 * Description: This plugin will allow you to view your current stats with Dealer Analytics. This plugin will be located on your dashboard.
 * Version: 1.0
 * Author: Paul Luna
 * Author URI: https://google.com (I am the founder)
 */

    add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

    function my_custom_dashboard_widgets() {
        global $wp_meta_boxes;

        wp_add_dashboard_widget('custom_help_widget', 'Dealer Analytics', 'custom_dashboard_help');
    }

    function custom_dashboard_help() {

        $loggedIn = NULL;
        if(is_email($_GET['email'])) {
            $loggedIn = sanitize_email($_GET['email']);
        }

        if(isset($loggedIn)) {
?>
            <h1>Welcome <?=$_GET["email"];?>!</h1>
            <p>Here are your stats so far: </p>
            <?php
                $json_data = callAPI("GET", "https://cat-fact.herokuapp.com/facts");
                $data_arr = json_decode($json_data, true);
            ?>
            <p><?php echo $data_arr["all"]["0"]["_id"] ?></p>
            <p><?php echo $data_arr["all"]["0"]["text"] ?></p>
            <p><?php echo $data_arr["all"]["0"]["type"] ?></p>
<?php   } else { ?>
            <h1>Login</h1>
            <form method="GET">
                        <input type="email" name="email" required>
                        <input type="password" required>
                        <br>
                        <input type="submit" value="Login">
                </form>
            <a href="https://dealeranalytics.com" target="_blank">Contact Us</p>
<?php   }
    }

    /**
     * This function will be our service to calling an API
     */
    function callAPI($method, $url) {
        $curl = curl_init();
        switch($method) {
            case "GET":
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                break;

        }

        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
?>
