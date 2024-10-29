<?php
if ( ! Awesome_Addons_is_wpf_activated() ) {
    return;
}

$settings = $this->get_settings_for_display();

if ( ! empty( $settings['form_id'] ) ) {
    echo Awesome_Addons_do_shortcode( 'wpforms', [
        'id' => $settings['form_id'],
    ] );
}