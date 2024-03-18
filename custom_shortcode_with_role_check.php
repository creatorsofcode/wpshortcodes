<?php
function custom_shortcode_with_role_check($atts, $content = null) {
    // Default attributes
    $atts = shortcode_atts(
        array(
            'role' => 'premium',
        
        ),
        $atts,
        'if_role'
    );

    // Get the current user
    $user = wp_get_current_user();

    // Check if the user has the specified role
    if (in_array($atts['role'], (array) $user->roles)) {
        // User has the role, return content
        return 'Payd.';
    } else if(is_user_logged_in()){
        // User does not have the role, return alternative content
        return '<p></p>';
    }
}
add_shortcode('if_role', 'custom_shortcode_with_role_check');

