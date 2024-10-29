<?php
// $aae_elements_keys = [
//             'instagram_user_id',
//             'instagram_access_token',
  
//         ];
//         $aae_default_settings = array_fill_keys( $aae_elements_keys, true ); 
//         $check_component_active = get_option( 'aae_save_settings', $aae_default_settings );
        //echo $check_component_active['maps-api'];
$settings = $this->get_settings_for_display();
$this->add_inline_editing_attributes( 'title', 'none' );
$this->add_render_attribute( 'title', 'class', 'text-white fz-18 font-weight-normal text-uppercase mb-0 pt-2  ad-instagram-name' );

$this->add_render_attribute( 'advanced_instragram', 'class', 'advanced-instragram' );
        $this->add_render_attribute( 'advanced_instragram', 'class', 'advanced-instragram-style-'.$settings['instagram_style'] );
        $imagesize = $settings['instagram_image_size'];

        $limit  = !empty( $settings['limit'] ) ? $settings['limit'] : 8;
        $id     = !empty( $check_component_active['userid'] ) ? $check_component_active['userid'] : 6666969077;
        $token  = !empty( $check_component_active['access_token'] ) ? $check_component_active['access_token'] : '6666969077.1677ed0.d325f406d94c4dfab939137c5c2cc6c2';
            
        $response = wp_remote_get( 'https://api.instagram.com/v1/users/' . esc_attr( $id ) . '/media/recent/?access_token=' . esc_attr( $token ) . '&count=' . esc_attr( $limit ) );
        
        if ( ! is_wp_error( $response ) ) {
    
            $response_body = json_decode( $response['body'] );
            
            if ( empty( $response_body ) ) {
                echo '<p>'.esc_html__('Incorrect user ID specified.','aa_elementor').'</p>';
                return;
            }
            
             $username = $profile_link = '';
            if(isset($response_body->data)){
                $items_as_objects = $response_body->data;
                $items = array();
                foreach ( $items_as_objects as $item_object ) {
                    $item['link']           = $item_object->link;
                    $item['imgsrc']         = $item_object->images->low_resolution->url;
                    $item['imgfullsrc']     = $item_object->images->$imagesize->url;
                    $item['comments']       = $item_object->comments->count;
                    $item['likes']          = $item_object->likes->count;
                    $username               = $item_object->user->username;
                    $profile_link           = 'https://www.instagram.com/'.$username;
                    $items[]      = $item;
                }
            }
        }

        $short_user = substr($username,10);
        ?>
        <?php if($settings['style'] == 'style1'):?>
            <div class="pb-120 border-bottom advanced_addons_instagram type-1 aae-instagram">
                <div class="advanced_addons_instagram_container d-flex align-items-center flex-wrap">
                    <?php
                            if ( isset( $items ) && !empty($items)):
                                foreach ( $items as $item ):
                        ?>
                    <div class="single-image position-relative">
                        <img src="<?php echo esc_url( $item['imgsrc'] ); ?>" class="img-fluid" alt="<?php echo esc_html__($username,'aa_elementor');?>">
                        <div class="position-absolute">
                            <i class="fa fa-instagram text-white fz-40"></i>
                            <h5 <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo esc_html__($short_user,'aa_elementor');?></h5>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        <?php endif;?>

        <?php if($settings['style'] == 'style2'):?>
            <div class="advanced_addons_instagram_area type-2 pt-120 pb-120 aae-instagram">
                <div class="advanced_addons_dribble_images type-1 d-flex flex-wrap">
                        <?php
                                if ( isset( $items ) && !empty($items)):
                                    foreach ( $items as $item ):
                            ?>
                                    <div class="single-image">
                                        <img src="<?php echo esc_url( $item['imgsrc'] ); ?>" class="img-fluid" alt="<?php echo esc_html__($username,'aa_elementor');?>">
                                    </div>
                        <?php endforeach; endif; ?> 
                </div>
            </div>
        <?php endif;?>

        <?php if($settings['style'] == 'style3'):?>
            <div class="pb-120 border-bottom advanced_addons_instagram type-1 grad-style pt-120 aae-instagram">
                <div class="advanced_addons_instagram_container grad-style d-flex align-items-center flex-wrap row no-gutters">
                    <?php
                            if ( isset( $items ) && !empty($items)):
                            foreach ( $items as $item ):
                        ?>
                        <div class="single-image position-relative col-md-3">
                            <img src="<?php echo esc_url( $item['imgsrc'] ); ?>" class="img-fluid" alt="<?php echo esc_html__($username,'aa_elementor');?>">
                            <div class="position-absolute">
                                <a href="<?php echo esc_url( $item['link'] ); ?>">
                                    <i class="fa fa-plus-circle text-white"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; endif; ?> 
                </div>
            </div>
        <?php endif;?>

        <?php 
        // $aae_elements_keys = [
        //     'maps-api',
        //     'facebook_app_id',
  
        // ];
        // $aae_default_settings = array_fill_keys( $aae_elements_keys, true ); 
        // $check_component_active = get_option( 'aae_save_settings', $aae_default_settings );
        // echo $check_component_active['maps-api'];
         ?>

       