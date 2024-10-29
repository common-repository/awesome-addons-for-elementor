<?php
$settings = $this->get_settings_for_display();
$this->add_inline_editing_attributes( 'title', 'none' );
$this->add_render_attribute( 'title', 'class', 'text-2f2f2f fz-20 font-weight-normal text-uppercase  ad-member-name' );
$this->add_render_attribute( 'title2', 'class', 'text-2f2f2f fz-18 font-weight-semi-bold  mb-0  ad-member-name' );
$this->add_render_attribute( 'title3', 'class', 'text-2f2f2f fz-18 font-weight-semi-bold  mb-0 ad-member-name' );
$this->add_render_attribute( 'title4', 'class', 'text-white mb-0 ad-member-name' );
$this->add_render_attribute( 'title5', 'class', 'mb-0 fz-18 font-weight-semi-bold ad-member-name' );


$this->add_inline_editing_attributes( 'job_title', 'none' );
$this->add_render_attribute( 'job_title', 'class', 'ad-member-position' );
$this->add_render_attribute( 'job_title2', 'class', 'ad-member-position mb-3 text-uppercase text-727272' );
$this->add_render_attribute( 'job_title3', 'class', 'ad-member-position mb-0 text-uppercase' );
$this->add_render_attribute( 'job_title4', 'class', 'ad-member-position text-white fz-14 d-block font-color' );
$this->add_render_attribute( 'job_title5', 'class', 'ad-member-position text-white fz-14 d-block font-color mb-0' );



$this->add_render_attribute( 'desc', 'none' );
$this->add_render_attribute( 'desc', 'class', 'text-555555 ad-member-desc' );
$this->add_render_attribute( 'desc4', 'class', 'text-white mb-0 ad-member-desc' );
?>
<?php if($settings['style'] == 'style1') :?>
    <div class="advanced_addons_team_member section-parent position-relative type-1 text-center bg-fafafa">
                <?php if ( $settings['image']['url'] || $settings['image']['id'] ) : 
                    $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
                    ?>
                     <img src="<?php echo $settings['image']['url'];?>">
                <?php endif; ?>
                <div class="advanced_addons_team_member_content position-relative">
                    <div class="ad-member-body">
                    <?php if ( $settings['title'] ) :
                        printf( '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape( $settings['title_tag'] ),
                            $this->get_render_attribute_string( 'title' ),
                            esc_html( $settings['title'] )
                        );
                    endif; ?>
                </div>
                    <?php if ( $settings['job_title' ] ) : ?>
                        <p <?php echo $this->get_render_attribute_string( 'job_title' ); ?>>
                            <?php echo esc_html( $settings['job_title' ] ); ?>
                        </p>
                    <?php endif; ?>
                    <?php if ( $settings['show_profiles' ] && is_array( $settings['profiles' ] ) ) : ?>
                    <div class="hoverable-block position-absolute bg-white text-center">
                        <ul class="pl-0 list-style-none d-inline-flex ad-member-links ">
                        <?php
                            foreach ( $settings['profiles'] as $profile ) :
                                $icon = $profile['name'];
                                $url = esc_url( $profile['link']['url'] );

                                if ($profile['name'] === 'website') {
                                    $icon = 'globe';
                                } elseif ($profile['name'] === 'email') {
                                    $icon = 'envelope';
                                    $url = 'mailto:' . antispambot( $profile['email'] );
                                }
                                ?>
                                <li>
                                    <?php
                                    printf( '<a target="_blank" rel="noopener" data-tooltip="hello" href="%s" class="elementor-repeater-item-%s"><i class="fa fa-%s" aria-hidden="true"></i></a>',
                                        $url,
                                        esc_attr( $profile['_id'] ),
                                        esc_attr( $icon )
                                    );
                                    ?>
                                </li>
                                <?php
                            endforeach; ?>
                            
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
                </div>
        <?php endif; ?>


        <?php if($settings['style'] == 'style2') :?>
                     <div class="advanced_addons_team_member type-2  text-center ">
						<img src="<?php echo $settings['image']['url'];?>" class="mb-0 img-fluid" alt="">
						<div class="block-body text-left">
                                <?php if ( $settings['title'] ) :
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title3' ),
                                    esc_html( $settings['title'] )
                                );
                                endif; ?>
                                <?php if ( $settings['job_title' ] ) : ?>
                                    <p <?php echo $this->get_render_attribute_string( 'job_title3' ); ?>>
                                        <?php echo esc_html( $settings['job_title' ] ); ?>
                                    </p>
                                <?php endif;?>
								<ul class="advanced_addons_icon_group pl-0 list-style-none d-inline-flex fill-icon mb-0 type-2 ml-3 ad-member-links">
                                   
                                <?php
                                    foreach ( $settings['profiles'] as $profile ) :
                                            $icon = $profile['name'];
                                            $url = esc_url( $profile['link']['url'] );

                                            if ($profile['name'] === 'website') {
                                                $icon = 'globe';
                                            } elseif ($profile['name'] === 'email') {
                                                $icon = 'envelope';
                                                $url = 'mailto:' . antispambot( $profile['email'] );
                                            }
                                    ?>
                                    <li>
                                        <?php
                                            printf( '<a target="_blank" rel="noopener" data-tooltip="hello" href="%s" class="elementor-repeater-item-%s"><i class="fa fa-%s" aria-hidden="true"></i></a>',
                                                $url,
                                                esc_attr( $profile['_id'] ),
                                                esc_attr( $icon )
                                            );
                                        ?>
                                    </li>
                                    <?php endforeach;?>
							    </ul>
							</div>
					</div>
        <?php endif; ?>

                    <?php if($settings['style'] == 'style3') :?>
                                <div class="advanced_addons_team_member type-3  d-flex align-items-center">
                                    <div class="advanced_addons_team_member_image rounded-circle ">
                                        <img src="<?php echo $settings['image']['url'];?>" class="rounded-circle" alt="">
                                    </div>
                                    <div class="advanced_addons_team_member_content">
                                        <?php if ( $settings['title'] ) :
                                            printf( '<%1$s %2$s>%3$s</%1$s>',
                                                tag_escape( $settings['title_tag'] ),
                                                $this->get_render_attribute_string( 'title' ),
                                                esc_html( $settings['title'] )
                                            );
                                        endif; ?>
                                        <?php if ( $settings['job_title' ] ) : ?>
                                            <span <?php echo $this->get_render_attribute_string( 'job_title4' ); ?>>
                                                <?php echo esc_html( $settings['job_title' ] ); ?>
                                            </span>
                                        <?php endif;?>
                                        <ul class="advanced_addons_icon_group pl-0 list-style-none d-inline-flex fill-icon mb-0 type-2 ml-0 pl-0 position-relative ad-member-links">
                                        <?php
                                            foreach ( $settings['profiles'] as $profile ) :
                                                $icon = $profile['name'];
                                                $url = esc_url( $profile['link']['url'] );

                                                if ($profile['name'] === 'website') {
                                                    $icon = 'globe';
                                                } elseif ($profile['name'] === 'email') {
                                                    $icon = 'envelope';
                                                    $url = 'mailto:' . antispambot( $profile['email'] );
                                                }
                                            ?>
                                                <li>
                                                    <?php
                                                        printf( '<a target="_blank" rel="noopener" data-tooltip="hello" href="%s" class="elementor-repeater-item-%s"><i class="fa fa-%s" aria-hidden="true"></i></a>',
                                                            $url,
                                                            esc_attr( $profile['_id'] ),
                                                            esc_attr( $icon )
                                                        );
                                                    ?>
                                                </li>
                                            <?php endforeach;?>
                                            </ul>
                                            <?php if ( $settings['desc' ] ) : ?>
                                                <p <?php echo $this->get_render_attribute_string( 'desc4' ); ?>>
                                                    <?php echo esc_html( $settings['desc' ] ); ?>
                                                </p>
                                             <?php endif; ?>
                                    </div>
                                </div>
                           
        <?php endif; ?>

       