<?php
if ( ! Awesome_Addons_is_ninjaf_activated() ) {
    return;
}
$settings = $this->get_settings_for_display();
if ( ! empty( $settings['form_id'] ) ) {
    echo Awesome_Addons_do_shortcode( 'ninja_form', [
        'id' => $settings['form_id'],
    ] );
}