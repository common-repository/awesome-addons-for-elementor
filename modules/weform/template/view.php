<?php
if ( ! Awesome_Addons_is_weform_activated() ) {
    return;
}

$settings = $this->get_settings_for_display();

if ( ! empty( $settings['form_id'] ) ) {
    echo Awesome_Addons_do_shortcode( 'weforms', [
        'id' => $settings['form_id'],
    ] );
}