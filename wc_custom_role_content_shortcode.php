<?php
function wc_custom_role_content_shortcode($atts, $content = null) {
    // Ensure the shortcode can accept 'role' as an attribute.
    $atts = shortcode_atts(array(
        'role' => '', // Default role if none provided.
    ), $atts, 'wc_custom_role_content');

    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        $roles = (array) $user->roles;
        $target_roles = explode(',', $atts['role']); // Allows multiple roles to be specified, separated by commas.

        foreach ($target_roles as $target_role) {
            if (in_array(trim($target_role), $roles)) {
                // If the user has one of the required roles, display the content.
                return do_shortcode($content);
            }
        }
    
       
        

    // Optional: Message to show if the user doesn't have the required role(s).
    // return 'You do not have access to this content.';
    return ''; // Return nothing if the user doesn't meet the role criteria.
}
add_shortcode('wc_custom_role_content', 'wc_custom_role_content_shortcode');
