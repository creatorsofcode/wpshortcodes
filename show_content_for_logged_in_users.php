<?php
function show_content_for_logged_in_users($atts, $content = null) {
    // Shortcode callback function to check user login status
    if (is_user_logged_in()) {
        // If the user is logged in, return the enclosed content
        return do_shortcode($content); // Make sure nested shortcodes are processed
    } else {
        // Optional: Return a message for users who are not logged in
        // return 'Please log in to view this content.';
        return '<p>Sinine ei ole veel sisse logitud</p>'; // Return nothing by default if the user is not logged in
    }
}
add_shortcode('logged_in_content', 'show_content_for_logged_in_users');
