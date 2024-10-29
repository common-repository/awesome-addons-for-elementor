<?php
$settings = $this->get_settings_for_display();
$this->add_inline_editing_attributes( 'title', 'none' );
$this->add_render_attribute( 'title', 'class', 'card__header-title awe-card-title' );

?>
    <?php if($settings['style'] === 'style1'):?>
    <div class="image-container">
        <?php
              foreach ( $settings['image_box'] as $item ) :
              $image = $item['image']['url'];
        ?>
            <div class="image-box">
                <img src="<?php echo esc_url($image)?>">
                <span class="image-box-title"><?php echo esc_html($item['title']);?></span>
            </div>
        <?php endforeach;?>
    </div>
   <?php endif;?>


<?php if($settings['style'] === 'style2'):?>
       

<?php endif;?>